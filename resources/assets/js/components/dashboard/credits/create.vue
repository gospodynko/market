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
                            <label>Email:</label>
                            <input type="text" class="form-control" name="name" v-model="contacts">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;Выберите регион:</div>
                    <div class="panel-body">
                        <label class="mini-title region-title">Регионы кредитования:</label>
                        <select class="form-control region-form" v-model="checkedRegion">
                            <option value="0" disabled selected>Выберите регион</option>
                            <option :value="region" v-for="region in data.regions ">{{region.region_name}}</option>
                        </select>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="name" v-model="contacts">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-success" @click="createAlliance">
                Добавить
            </button>
        </div>
    </div>
</template>

<script type="text/babel">
    export default{
        data(){
            return{
                title: '',
                contacts: '',
                checkedRegion: null,
                regionContact:null
            }
        },
        props: ['data'],
        methods: {
            createAlliance(){
                let data = {
                    'title': this.title,
                    'contacts': this.contacts,
                    'region_name': this.checkedRegion,
                    'region_contact': this.regionContact
                };
                this.$http.post('/admin/credits/create', data).then(res => {
                    location.href = '/admin/credits';
                }, err => {

                })
            }
        }
    }
</script>