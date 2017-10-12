<template>
    <div>
        <div class="row">
            <div class="col-lg-12" v-if="false">
                <a href="#" class="btn btn-success">
                    Додати магазин
                </a>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <table class="table table-hover">
                    <thead>
                    <th class="text-center">ID</th>
                    <th class="text-left">Название компании</th>
                    <th class="text-left">Рейтинг</th>
                    <th class="text-center">ID Компании</th>
                    <th class="text-center">Статус</th>
                    <th class="text-center">Действия</th>
                    </thead>
                    <tbody>
                    <tr v-for="shop in shopsList.data">
                        <td class="text-center">{{ shop.id }}</td>
                        <td class="text-left">{{ shop.name }}</td>
                        <td class="text-left">{{ shop.rating }}</td>
                        <td class="text-center">{{ shop.company_id }}</td>
                        <td class="text-center">{{ shop.status ? 'Активен' : 'Деактивирован' }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm" :class="{'btn-primary': shop.status, 'btn-danger': shop.status}" @click.prevent="changeStatus(shop)">
                                <i class="glyphicon glyphicon-trash" v-if="shop.status" title="Деактивировать"></i>
                                <i class="glyphicon glyphicon-ok" title="Активировать" v-else></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <paginate :page-count="shopsList.last_page"
                          :page-range="3"
                          :margin-pages="2"
                          :initial-page="page"
                          :click-handler="clickCallback"
                          :container-class="'pagination'"
                          :prev-text="'<<'"
                          :next-text="'>>'"
                          :prev-class="'prev-items'"
                          :next-class="'next-items'"
                          ref="paginate"
                          :page-class="'page-item'"></paginate>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import Paginate from 'vuejs-paginate';

    export default{
        data(){
            return{
                page: 0,
                shopsList: this.shops
            }
        },
        props: ['shops'],
        components: {
            Paginate
        },
        methods: {
            changeStatus(shop){
                var data = null;
                if(shop.status){
                    data = {
                        status: 0
                    };
                } else {
                    data = {
                        status: 1
                    };
                }
                this.$http.post('/admin/shops/'+shop.id+'/edit', data).then(res => {
                        shop.status = data.status
                }, err =>{

                })
            },
            clickCallback(page){
                this.page = page;
                this.$http.post('/admin/shops', {'page': this.page}).then(res => {
                    this.shopsList = res.data;
                }, err => {

                })
            }
        }
    }
</script>