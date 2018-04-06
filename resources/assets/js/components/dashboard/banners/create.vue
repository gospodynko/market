<template>
    <div>
        <div class="row">
            <h2>Створити баннер</h2>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Спецпредложение</label>
                    <label class="checkbox inline">
                        <input type="radio" name="is_spec" id="inlineCheckbox1" value="1" v-model="isSpecial"> Да
                    </label>
                    <label class="checkbox inline">
                        <input type="radio" name="is_spec" id="inlineCheckbox2" value="0" v-model="isSpecial"> Нет
                    </label>
                </div>
                <div class="form-group">
                    <label>Загрузить изоборажение</label>
                    <input type="file" v-on:change="setFile">
                </div>
                <div class="form-group">
                    <label>URL</label>
                    <input type="text" v-model="url">
                </div>
                <div class="form-group">
                    <button @click="sendForm" class="btn btn-success">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    export default{
        data(){
            return{
                isSpecial: 0,
                file: null,
                url: ''
            }
        },
        props:['translate'],
        methods: {
            setFile(e){

                this.file = e.target.files[0]
            },
            sendForm(){
                let data = new FormData();
                data.append('is_special', +this.isSpecial);
                data.append('image', this.file);
                data.append('url', this.url);

                this.$http.post('/admin/banner', data).then(res => {
                    console.log(res);
                }, err => {

                })
            }
        }
    }
</script>