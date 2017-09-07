<template>
    <div class="row">
        <div class="col-lg-6">
				<div class="form-group">
                    <label>Название:</label>
                    <input type="text" class="form-control" name="name" v-model="name">
                </div>
            <div class="form-group">
                <button class="btn btn-success" @click="setType">
                    Добавить
                </button>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    export default{
        data(){
            return{
                name: ''
            }
        },
        methods: {
            setType(){
                this.$http.post('/admin/deliveries/create', {'name': this.name}).then(res => {
                    location.href = '/admin/deliveries';
                }, err => {

                })
            }
        }
    }
</script>