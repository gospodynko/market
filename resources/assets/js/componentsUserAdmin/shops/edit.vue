<script type="text/babel">
    function getIndex(product) {
        let current_category_index = product.category.id;
                            product.categories.forEach(function(item, i) {
                                if(item.id === current_category_index)
                                    return i;
                            });
    };

    import Multiselect from 'vue-multiselect'
    export default{
        data(){
            return{
                checkedProduct: this.product,
                category_id: '',
                current_category: '',
                current_category_id: '',
                images: []


            }
        },
        props: ['product'],
        components: {
            Multiselect
        },
        created: function() {
            let current_category_id = this.product.category.parent_category_id;
            let that = this;
            this.product.categories.forEach(function(item, i) {
                if(item.id === current_category_id) {
                    that.current_category = that.checkedProduct.categories[i];
                    that.category_id = i;
                }

            });
        },
        watch: {
            category_id: function(id) {
                this.current_category = this.checkedProduct.categories[id];
            }
        },
        methods: {
            setCurrentCategory(index) {
                console.log(index);
                this.current_category = this.checkedProduct.categories[index];
            },
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
            updateProduct() {

                axios.post('/shop/product/update/' + this.product.id, this.product)
                    .then(response => {
                        location.href = '/shop/products/';
                    })
                    .catch(function (error) {
                        console.log(error.response.data);
                    })
                ;
            },
            removeProduct() {
                axios.post('/shop/product/remove/' + this.product.id, this.product)
                    .then(response => {
                        location.href = '/shop/products/';
                    })
                    .catch(function (error) {
                        console.log(error.response.data);
                    });
            },
            fileLoad(e) {
                if (this.checkedProduct.pictures && this.checkedProduct.pictures.length >= 5) return false
                let data = new FormData();
                data.append('file', e.target.files[0]);

                axios.post('/products/upload', data)
                    .then(response => {
                        if (!this.checkedProduct.pictures) {
                            this.checkedProduct.pictures = [];
                            this.checkedProduct.pictures.push({'id': 0, 'path': response.data});
                        } else {
                            this.checkedProduct.pictures.push({'id': 0, 'path': response.data});
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
            addParameter(feature) {
                feature.params.push({
                    title: '',
                    param: ''
                });
            },
            addFeature() {
                if (this.product.features) {
                    console.log(1)
                    this.product.features.push({
                        name: '',
                        params: [
                            {
                                title: '',
                                param: ''
                            }
                        ]
                    })
                } else {
                    console.log(2)
                    this.product.features = [];
                    this.product.features.push({
                        name: '',
                        params: [
                            {
                                title: '',
                                param: ''
                            }
                        ]
                    })
                }
            },
            checkSymbol (e){
                var charCode = (e.which) ? e.which : e.keyCode
                if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                    e.preventDefault()
                } else {
                    return true
                }
            },
            deleteFeature (i) {
                console.log(i);
                this.product.features.splice(i,1);
            },
            deleteParam (feature, i) {
                feature.params.splice(i,1);
            },
            removeImage (i, id) {
                if (id) {
                    let data = []
                    data.push(id)
                    axios.post('/shop/product/' + this.checkedProduct.id + '/delete-image', data)
                        .then(response => {
                            if (response.status == 202) {
                                this.checkedProduct.pictures.splice(i, 1)
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                } else {
                    this.checkedProduct.pictures.splice(i, 1)
                }

            },
            show () {
                this.$modal.show('deleting-modal');
            },
            hide () {
                this.$modal.hide('deleting-modal');
            }
        }
    }
</script>