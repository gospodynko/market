<template>
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/credits/create" class="btn btn-success">
                Добавить кредитный союз
            </a>
            <hr>
        </div>
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                <th class="text-left">ID</th>
                <th class="text-left">Название</th>
                <th class="text-left">Контакты</th>
                </thead>
                <tbody>
                <tr v-for="credits in credits.data">
                    <td class="text-left">{{credits.id }}</td>
                    <td class="text-left">{{credits.title}}</td>
                    <td class="text-left">{{credits.contacts}}</td>
                </tr>
                </tbody>
            </table>
            <paginate :page-count="credits.last_page"
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
        props: ['credits'],
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