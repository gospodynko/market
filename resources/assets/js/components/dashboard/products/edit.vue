<template>
    <div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;Категория</div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label>Категорія:</label>
                            <select name="category" class="form-control" v-model="product.category">
                                <option :value="category" v-for="category in categories">{{category.name}}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Виробник:</label>
                            <multiselect v-model="product.producer" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="id" :options="product.category.producers" :multiple="false" :taggable="true" @tag="addTag"></multiselect>
                            <!--<select name="category" class="form-control">-->
                                <!--<option :value="producer" v-for="producer in checkedProducers">{{producer.name}}</option>-->
                            <!--</select>-->
                        </div>

                        <div class="form-group">
                            <label>Продукт:</label>
                            <input type="text" v-model="product.name" class="form-control">
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;Описание продукта</div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label>Описание:</label>
                            <textarea class="form-control" v-model="product.description"></textarea>
                        </div>

                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;Pictures</div>
                    <div class="panel-body" style="padding: 15px 25px; box-sizing: border-box">
                        <div class="row">
                            <div class="image thumbnail col-sm-3" v-for="(image , i) in product.pictures"  :style="'backgroundImage:url('+image.path+')'">
                                <button class="btn btn-danger btn-xs pull-right" type="button" @click="delImage(i)">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>

                            </div>
                        </div>

					<div class="form-group">
                        <label for="">Добавить изображения: </label>
                        <input type="file" class="form-control" name="" @change="fileLoad">
                    </div>



            </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;Характеристики</div>
                    <div v-for="feature in features">
                        <input type="text" placeholder="Заголовок характеристики" class="form-control" v-model="feature.name">
                        <div v-for="param in feature.params">
                            <input type="text" placeholder="Название параметра" v-model="param.title">
                            <input type="text" placeholder="Параметр" v-model="param.param">
                        </div>
                        <button class="btn btn-success" @click="addParameter(feature)">Добавить параметр</button>
                    </div>
                    <button class="btn btn-success" @click="addFeature">Добавить характеристику</button>
                </div>

            </div>
            <!--<div class="col-lg-6">-->
                <!--<div class="panel panel-info">-->
                    <!--<div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;Выберите магазин</div>-->
                    <!--<div class="panel-body">-->
                        <!--<select v-model="shopId" class="form-control">-->
                            <!--<option :value="shop.id" v-for="shop in data.shops">{{shop.name}}</option>-->
                        <!--</select>-->
                    <!--</div>-->
                <!--</div>-->

            <!--</div>-->
            <!--<div class="col-lg-6" v-if="shopId">-->
                <!--<div class="panel panel-info">-->
                    <!--<div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;Детально о продукте</div>-->
                    <!--<div class="panel-body">-->
                        <!--<div class="col-lg-6">-->
                            <!--<div class="form-group">-->
                                <!--<label>Цена:</label>-->
                                <!--<input type="price" class="form-control" v-model="price">-->
                            <!--</div>-->
                        <!--</div>-->
                        <!--<div class="col-lg-6">-->
                            <!--<div class="form-group">-->
                                <!--<label>Валюта:</label>-->
                                <!--<select class="form-control" v-model="currencyType">-->
                                    <!--<option :value="currency" v-for="currency in data.currencies">{{currency.name}}</option>-->
                                <!--</select>-->
                            <!--</div>-->
                        <!--</div>-->
                        <!--<div class="col-lg-6">-->
                            <!--<div class="form-group">-->
                                <!--<label>Доставка:</label>-->
                                <!--<multiselect v-model="deliveryType" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="id" :options="data.delivery_type" :multiple="true"></multiselect>-->
                            <!--</div>-->
                        <!--</div>-->
                        <!--<div class="col-lg-6">-->
                            <!--<div class="form-group">-->
                                <!--<label>Оплата:</label>-->
                                <!--<multiselect v-model="paymentType" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="id" :options="data.pay_type" :multiple="true"></multiselect>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->

            <!--</div>-->
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
            return{
                categories: this.data.categories,
                product: this.data.product,
                features: JSON.parse(this.data.product.features)
            }
        },
        components: {
            Multiselect
        },
        props: ['data'],
        methods: {
            updateProduct(){
                this.product.features = this.features;
                this.$http.put('/admin/products/'+this.product.id, this.product).then(res => {
                    location.href = '/admin/products'
                }, err => {

                })
            },
            addTag(newTag){
              this.product.producer = newTag;
            },
            fileLoad(e){
                let data = new FormData();
                data.append('file', e.target.files[0]);

                this.$http.post('/products/upload', data).then(res => {
                    this.product.pictures.push({'path': res.data, 'id': '-1'});
                }, err => {

                })
            },
            delImage(i){
                this.product.pictures.splice(i,1);
            },
            addParameter(feature){
                feature.params.push({
                    title: '',
                    param: ''
                });
            },
            addFeature(){
                this.features.push({
                    name: '',
                    params: [
                        {
                            title: '',
                            param: ''
                        }
                    ]
                })
            }
        }
    }
</script>