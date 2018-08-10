<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" style="display: flex; flex-direction: column">
                <h2 class="title">&nbsp;&nbsp;&nbsp;&nbsp;Внесіть зміни: </h2>
                <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp Редагування назви магазину в маркетi:</div>
                        <div class="panel-body">
                            <label>Змiнiть назву:</label>
                            <input type="text" class="form-control"  v-model="checkedShop.name">
                        </div>
                    </div>
                </div>
                <br/>
                <div class="col-md-12 after-load-hr">
                    <hr>
                </div>
                <div class="col-md-12 load-file-block">
                    <div class="col-md-3">
                        <label class="mini-title load-title">Завантаження логотипу компанii</label>
                    </div>
                    <div class="col-md-3">
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> Додати фото
                        </label>
                        <input id="file-upload" type="file"  @change="updatePicture"/>
                    </div>
                    <div class="col-md-3" v-if="checkedShop.logo" style="width: auto">
                        <br/>
                        <div class="img">
                            <img :src="checkedShop.logo" alt="image" width="100px" height="100px" border="0">
                            <button @click="removeImage()">Видалити</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 btn-block">
                <div class="col-lg-12 btn-lg-block">
                    <hr class="after-line">
                    <button class="btn send-btn" @click="updateShop">
                        <i class="glyphicon glyphicon-send"></i>&nbsp;
                        Редагувати
                    </button>
                    <job></job>
                    <a href="/shop/products" class="btn btn-danger cancel-btn">
                        <i class="glyphicon glyphicon-remove"></i>&nbsp;
                        Відміна
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import Multiselect from 'vue-multiselect'
    export default{
        data(){
            return{
                checkedShop: this.shop,
                logo: []
            }
        },
        props: ['shop'],
        components: {
            Multiselect
        },
        methods: {
            alert() {
                this.$swal({
                    title: 'Ви дiйсно бажаете видалити даний продукт?',
                    icon: "warning",
                    buttons: ["Нi", "Так"],
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            axios.post('/shop/product/remove/' + this.product.id, this.product)
                            swal("Ви успiшно видалили даний продукт!", {
                                icon: "success",
                            })
                                .then(response => {
                                    location.href = '/shop/products/';
                                })
                                .catch(function (error) {
                                    console.log(error.response.data);
                                });
                        } else {
                            swal("Продукт не видалено");
                        }
                    });
            },
            updateShop() {
                axios.post('/shop/update/' + this.shop.id, this.shop)
                    .then(response => {
                        location.href = '/shop/all-user-shops/';
                    })
                    .catch(function (error) {
                        console.log(error.response.data);
                    })
                ;
            },
            fileLoad(e) {
                if (this.checkedShop.logo) return false
                let data = new FormData();
                data.append('file', e.target.files[0]);

                axios.post('/products/upload', data)
                    .then(response => {
                        if (!this.checkedShop.logo) {
                            this.checkedShop.logo = [];
                            this.checkedShop.logo.push({'id': 0, 'path': response.data});
                        } else {
                            this.checkedShop.logo.push({'id': 0, 'path': response.data});
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                ;
            },
            checkSymbol (e){
                var charCode = (e.which) ? e.which : e.keyCode
                if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                    e.preventDefault()
                } else {
                    return true
                }
            },
            updatePicture (e) {
//                update-image
                var data = new FormData()
                data.append('image', e.target.files[0]);

                axios.post('/shop/'+this.checkedShop.id + '/update-image', data)
                    .then(response => {
                        if (response.status == 201) {
                            location.reload();
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
            removeImage () {
                    let data = []
                    data.push(this.logo)
                    axios.post('/shop/'+this.checkedShop.id + '/delete-image', data)
                        .then(response => {
                            if (response.status == 202) {
                                location.reload();
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
            }
        }
    }
</script>