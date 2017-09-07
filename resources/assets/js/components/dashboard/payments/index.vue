<template>
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/payments/create" class="btn btn-success">
                Добавить платежную систему
            </a>
            <hr>
        </div>
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                <th class="text-center">ID</th>
                <th class="text-center">Название</th>
                </thead>
                <tbody>
                <tr v-for="payment in payments.data">
                    <td class="text-left">{{ payment.id }}</td>
                    <td class="text-left">{{payment.name}}</td>
                </tr>
                </tbody>
            </table>
            <paginate :page-count="payments.last_page"
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
</template>

<script type="text/babel">
    import Paginate from 'vuejs-paginate';
    export default {
        data(){
            return {
                page: 0
            }
        },
        props: ['payments'],
        components: {
            Paginate
        },
        methods :{
            clickCallback(page){
                this.page = page;
            }
        }
    }
</script>