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
                creditData: this.credit
            }
        },
        components: {
            Multiselect
        },
        props: ['credit'],
        methods: {
            updateProduct(){
                this.$http.put('/admin/credits/'+this.credits.id, this.credits).then(res => {
                    location.href = '/admin/credits';
                }, err => {

                })
            }
        }
    }
</script>