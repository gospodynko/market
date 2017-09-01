<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <h2>Название продукта</h2>
                <p>{{product.name}}</p>
                <hr>
                <h2>Описание продукта</h2>
                <p>{{product.name}}</p>
                <hr>
                <h2>Артикул</h2>
                <p>{{product.bar_code}}</p>
                <hr>
                <h2>Создано пользователем</h2>
                <p>{{product.user.first_name+' '+product.user.last_name}}</p>
                <h2>Картинки</h2>
                <div class="row">
                    <div class="col-sm-3" v-for="image in product.images">
                        <img :src="image" width="30%" alt="">
                    </div>
                </div>
                <hr>
                <button class="btn btn-success" @click="acceptProd">Принять</button>
                <button class="btn btn-danger">Удалить</button>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    export default {
        data(){
            return{

            }
        },
        props: ['product'],
        methods: {
            acceptProd(){
                this.$http.post('/admin/moderation/accept-product', {'product_id': this.product.id}).then(res => {
                    location.href = '/admin/moderation';
                },err => {

                })
            }
        }
    }
</script>