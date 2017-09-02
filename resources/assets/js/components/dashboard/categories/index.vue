<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <a href="/dashboard/categories/create" class="btn btn-success">
                    Создать категорию
                </a>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                    <th class="text-center">ID</th>
                    <th class="text-center">Иконка</th>
                    <th class="text-left">Название</th>
                    <th class="text-left">Родительская категория</th>
                    <th class="text-center">Статус</th>
                    <th class="text-center">Действие</th>
                    </thead>
                    <tbody>
                    <tr v-for="category in categories.data">
                        <td class="text-center">{{ category.id }}</td>
                        <td class="text-center"><i :class="category.icon"></i></td>
                        <td class="text-left">{{ category.name }}</td>
                        <td class="text-left">{{ !category.parent ? '---'  : ''}}</td>
                        <td class="text-center">
                                <span class="label label-success" v-if="category.status">Активная</span>
                                <span class="label label-danger" v-else>Деактивирована</span>
                        </td>
                        <td class="text-center">
                            <a :href="'/dashboard/categories/'+category.id+'/edit'" class="btn btn-primary btn-sm">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <paginate :page-count="categories.last_page"
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
    import paginate from 'vuejs-paginate';
    export default {
        data(){
            return {
                page: 0
            }
        },
        components: {
            paginate
        },
        created(){
            if(location.search){
                this.page = +location.search.split('=')[1] - 1;
            }
        },
        props: ['categories'],
        methods: {
            clickCallback(page){
               location.href = '?page='+page;
            }
        }
    }
</script>