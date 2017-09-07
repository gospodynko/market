<template>
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/deliveries/create" class="btn btn-success">
                Добавить доставку
            </a>
            <hr>
        </div>
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                <th class="text-left">ID</th>
                <th class="text-left">Название</th>
                </thead>
                <tbody>
                <tr v-for="delivery in deliveries.data">
                    <td class="text-left">{{ delivery.id }}</td>
                    <td class="text-left">{{delivery.name}}</td>
                </tr>
                </tbody>
            </table>
            <paginate :page-count="deliveries.last_page"
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
        props: ['deliveries'],
        components: {
            Paginate
        },
        methods: {
            clickCallback(page){
                this.page = page;
            }
        }
    }
</script>