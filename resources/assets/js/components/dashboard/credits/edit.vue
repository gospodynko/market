<template>
    <div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp Редактирование кредитного союза:</div>
                    <div class="panel-body">
                        <label>Название кредитного союза:</label>
                        <input type="text" class="form-control"  v-model="creditData.title">
                    </div>
                    <div class="panel-body">
                        <label>Контакты:</label>
                        <input type="text" class="form-control"  v-model="creditData.contacts">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div ></div>
                    <div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;Выберите регион:</div>
                    <div class="panel-body" v-for="(branch, i) in creditData.branches">
                        <div class="form-group">
                            <label class="mini-title region-title">Регионы кредитования:</label>
                            <select class="form-control region-form" v-model="branch.id_credit_region">
                                <option value="0" disabled selected>Выберите регион</option>
                                <option :value="region.id" v-for="region in regions ">{{region.region_name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="name" v-model="branch.region_email">
                        </div>
                        <button class="btn btn-danger cancel-btn" @click="removeRegion(i)">
                            <i class="glyphicon glyphicon-remove"></i>&nbsp;
                            Удалить регион
                        </button>
                    </div>
                </div>
                <div class="form-group" align="center">
                    <button class="btn btn-success" @click="addRegion()"><i class="glyphicon glyphicon-plus"></i>
                        Добавить регион кредитования
                    </button>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <hr>
                <button type="submit" class="btn btn-success" @click="updateProduct">
                    <i class="glyphicon glyphicon-send"></i>&nbsp;
                    Зберегти
                </button>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import Multiselect from 'vue-multiselect';
    export default{
        data(){
            return {
                creditData: this.credit,
                checkedRegion: ''
            }
        },
        components: {
            Multiselect
        },
        props: ['credit', 'regions'],
        created () {
            if (!this.creditData.branches.length) {
                this.creditData.branches = [
                    {
                        id_credit_region: '',
                        region_email: ''
                    }
                ]
            }
        },
        methods: {
            updateProduct(){
                this.$http.put('/admin/credits/update/'+this.credit.id, this.creditData).then(res => {
                    location.href = '/admin/credits';
                }, err => {

                })
            },
            addRegion(){
                this.creditData.branches.push({
                    id_credit_region: '',
                    region_email: ''
                })
            },
            removeRegion(i){
               this.creditData.branches.splice(i, 1);
            }
        }
    }
</script>