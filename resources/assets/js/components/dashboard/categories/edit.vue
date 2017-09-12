<template>
    <div class="row">

        <div class="col-lg-6">
				<div class="form-group">
                <label>Название:</label>
                <input type="text" class="form-control" name="name" v-model="checkedCategory.name">
            </div>
                <div class="form-group">
                    <label>Описание :</label>
                    <textarea class="form-control"  name="description" cols="30" rows="2" v-model="checkedCategory.description">{{ checkedCategory.description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Статус:</label>
                    <select name="status" class="form-control" v-model="checkedCategory.status">
                        <option value="1" v-if="checkedCategory.status" selected="selected">Активная</option>
                        <option value="0" v-else selected="selected">Деактивирована</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Родительская категория:</label>
                    <select name="checkedCategory_id" class="form-control" v-model="checkedCategory.category_id">
                        <option value="">---</option>
                        <option :value="parent.id" :selected="hasParent && parent.id == checkedCategory.category_id" v-for="parent in parents">
                            {{ parent.name }}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-12">
                            <label>Изображение:</label>
                            <input type="file" class="form-control" name="_pictures_file" @change="fileLoad">
                        </div>
                        <div class="ol-md-3" v-if="checkedCategory.image"><img :src="checkedCategory.image" alt=""></div>
                    </div>
                </div>
                <div class="form-group">
                    <hr>
                    <a href="/dashboard/categories" class="btn btn-danger">
                        <i class="glyphicon glyphicon-remove"></i>&nbsp;
                       Отмена
					</a>
                    <button type="submit" class="btn btn-success" @click="editCategory">
                        <i class="glyphicon glyphicon-send"></i>&nbsp;
                        Редактировать
					</button>
                </div>
        </div>
    </div>
</template>

<script type="text/babel">
    export default {
        data(){
            return{
                checkedCategory: this.category
            }
        },
        props: ['category', 'parents', 'hasParent'],
        methods:{
            fileLoad(e){
                let data = new FormData();
                data.append('file', e.target.files[0]);

                this.$http.post('/admin/category/upload', data).then(res => {
                    this.checkedCategory.image = res.data;
                }, err => {

                })
            },
            editCategory(){
                this.$http.patch('/dashboard/categories/'+this.checkedCategory.id, this.checkedCategory).then(res => {
                    location.href = '/dashboard/categories/';
                }, err => {

                })
            }
        }

    }
</script>