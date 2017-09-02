<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs nav-justified">
                        <li :class="{'active': activeId == shop.id}" v-for="shop in shops"><a href="#"  @click="setShop($event, shop)">{{shop.name}}</a></li>
                    </ul>  
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 add-new-product">
                    <a :href="'/user-shop/shop/'+checkedShop.id+'/create'" class="btn btn-success btn-lg">Добавить продукт</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    export default{
        data(){
            return{
                activeId: this.shops[0].id,
                checkedShop: this.shops[0]
            }
        },
        props: ['shops'],
        methods: {
            setShop(e,shop){
                e.preventDefault();
                this.activeId = shop.id;
                this.checkedShop = shop;
            }
        }
    }
</script>