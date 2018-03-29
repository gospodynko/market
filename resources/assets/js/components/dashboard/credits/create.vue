<template>
    <div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp Создание нового кредитного союза:</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Название:</label>
                            <input type="text" class="form-control" name="name" v-model="title">
                        </div>
                        <div class="form-group">
                            <label>Контакты:</label>
                            <input type="text" class="form-control" name="name" v-model="contacts">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" @click="createAlliance">
                                Добавить
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div ></div>
                    <div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;Выберите регион:</div>
                    <div class="panel-body" v-for="branch in branches">
                        <div class="form-group">
                            <label class="mini-title region-title">Регионы кредитования:</label>
                            <select class="form-control region-form" v-model="branch.id_credit_region">
                                <option value="0" disabled selected>Выберите регион</option>
                                <option :value="region.id" v-for="region in data.regions ">{{region.region_name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="name" v-model="branch.region_email">
                        </div>
                    </div>
                </div>
                <div class="form-group" align="center">
                    <button class="btn btn-success" @click="addRegion()"><i class="glyphicon glyphicon-plus"></i>
                        Добавить регион кредитования
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    export default{
        data(){
            return{
                title: '',
                contacts: '',
                branches:[
                    {
                        id_credit_region: '',
                        region_email: ''
                    }]

            }
        },
        props: ['data'],
        methods: {
            createAlliance(){
                let data = {
                    'title': this.title,
                    'contacts': this.contacts,
                    branches: this.branches
                };
                this.$http.post('/admin/credits/create/add/'+this.id ,data).then(res => {
                    location.href = '/admin/credits';
                }, err => {

                })
            },
            addRegion(){
                this.branches.push({
                    id_credit_region: '',
                    region_email: ''
                })
            }
        }
    }
</script>