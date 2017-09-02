<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                    <th class="text-center">ID</th>
                    <th class="text-center">Название</th>
                    <th class="text-center">Описание</th>
                    <th class="text-center">Действие</th>
                    </thead>
                    <tbody>
                    <tr v-for="product in products.data">
                        <td class="text-center">{{ product.id }}</td>
                        <td class="text-center">{{ product.name }}</td>
                        <td class="text-center">{{ product.description }}</td>
                        <td class="text-center">
                            <a :href="'/admin/moderation/accept/'+product.id" class="btn btn-primary btn-sm btn-success">
                                <i class="fa fa-check-square-o"></i>
                            </a>
                            <a :href="'/admin/moderation/show/'+product.id" class="btn btn-primary btn-sm btn-success">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a :href="'/admin/moderation/edit/'+product.id" class="btn btn-primary btn-sm">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            <a :href="'/admin/moderation/delete/'+product.id" class="btn btn-primary btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <paginate :page-count="products.last_page"
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

<script>
    import paginate from 'vuejs-paginate';
    export default{
        data(){
            return{
                page: 0
            }
        },
        created(){
            if(location.search){
                this.page = +location.search.split('=')[1] - 1;
            }
        },
        components: {
            paginate
        },
        props: ['products'],
        methods: {
            clickCallback(page){
                location.href = '?page='+page;
            }
        }
    }
</script>