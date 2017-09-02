<template>
    <div class="noselect-wrap">
        <div class="head">
            <h2>Выберите роль на сайте</h2>
            <p>Это ваше первое посещение АгроЯрд маркетплейс, выберите пожалуйста роль.</p>
        </div>
        <div class="main">
            <div class="select-role-wrap">
                <select @change="setRole" v-model="userRole">
                    <option value="customer">Покупатель</option>
                    <option value="seller">Продавец</option>
                </select>
            </div>
            <div class="error-wrap" v-if="errors">
                <p class="error" v-for="error in errors">{{error.text}}</p>
            </div>
        </div>
        <div class="footer">
            <button class="btn" :disabled="!showSaveBtn" @click="saveRole">Сохранить</button>
        </div>
    </div>
</template>

<script type="text/babel">
    import {Events} from './../../app';
    export default{
        data(){
            return{
                userRole: '',
                showSaveBtn: false,
                errors:[],
                userUpd: null
            }
        },
        props: ['user'],
        methods: {
            setRole(){
                if(this.userRole == 'customer'){
                    this.showSaveBtn = true;
                    this.userUpd = this.user
                    this.errors = [];
                } else if(this.userRole == 'seller'){
                    this.$http.post('/api/check-user', {}).then(res => {
                        if(res.data.status){
                            this.showSaveBtn = true;
                        } else {
                            this.showSaveBtn = false;
                            res.data.errors.forEach(error => {
                                this.errors.push(error);
                            })
                        }
                    }, err => {

                    })
                }
            },
            saveRole(){
                if(!this.userRole){
                    this.errors.push(
                        {
                            text: 'Выберите роль'
                        }
                    );
                    return false;
                }
                if(this.errors.length) return false;
                this.$http.post('/api/set-role', {'role': this.userRole}).then(res => {
                    if(res.data.status){
                        Events.$emit('updateRole', res.data.user);
                    } else {
                        res.data.errors.forEach(error => {
                            this.errors.push(error);
                        })
                    }
                }, err => {

                })

            }
        }
    }
</script>