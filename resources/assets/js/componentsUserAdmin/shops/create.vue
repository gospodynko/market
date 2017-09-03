<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <label>Выбор категории:</label>
                            <select class="form-control" @change="setProducer" v-model="checkedCategory">
                                <option :value="null" disabled selected>Выберите категорию</option>
                                <option :value="category" v-for="category in categories">{{category.name}}</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Производитель:</label>
                            <!--<select class="form-control">-->
                                <!--<option value="0" disabled selected>Выберите производителя</option>-->
                                <!---->
                            <!--</select>-->
                            <multiselect v-model="checkedTag" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="id" :options="checkedProducers" :multiple="false" :taggable="true" @tag="addTag"></multiselect>
                        </div>
                        <div class="col-md-3">
                            <label>Продукт:</label>
                            <multiselect v-model="checkedProduct" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="id" :options="checkedTag.hasOwnProperty('products') ? checkedTag.products : checkedProducts" :multiple="false" :taggable="true" @tag="addTagProduct"></multiselect>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>

                    </div>
                    <div v-if="checkedProduct && !Number.isInteger(checkedProduct.id)">
                        <div class="col-lg-12">
                            <label>Описание продукта</label>
                            <textarea class="form-control" v-model="description"></textarea>
                        </div>
                        <div class="col-md-12">
                            <h2>Характеристики</h2>
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
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <label>Загрузить картинки (макс 5шт)</label>
                                <input type="file" @change="fileLoad">
                            </div>
                            <div class="col-md-3" v-for="image in images">
                                <img :src="image.path" alt="image">
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-lg-3">
                            <label>Цена:</label>
                            <input type="number" class="form-control" v-model="price">
                        </div>
                        <div class="col-lg-3">
                            <label>Валюта:</label>
                            <select class="form-control" v-model="currencyType">
                                <option :value="null">Выберите валюту</option>
                                <option :value="currency" v-for="currency in data.currencies">{{currency.name}}</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <div class="col-md-12">
                            <div class="col-lg-3">
                                <label>Тип доставки:</label>
                                <multiselect v-model="deliveryType" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="id" :options="data.delivery_type" :multiple="true"></multiselect>
                            </div>
                            <div class="col-lg-3">
                                <label>Тип оплаты:</label>
                                <multiselect v-model="paymentType" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="id" :options="data.pay_type" :multiple="true"></multiselect>
                            </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-lg-12">
                            <hr>
                            <a href="/user-shops/shop/all-shops" class="btn btn-danger">
                                <i class="glyphicon glyphicon-remove"></i>&nbsp;
                                Отмена
					        </a>
                            <button class="btn btn-success" @click="createProduct">
                                <i class="glyphicon glyphicon-send"></i>&nbsp;
                                Створити
					        </button>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import Multiselect from 'vue-multiselect'
    export default{
        data(){
            return{
                checkedProducers: [],
                checkedCategory: null,
                newProducer: null,
                checkedTag: [],
                checkedProducts: [],
                checkedProduct: null,
                shop: this.data.shop,
                categories: this.data.categories,
                deliveryType: [],
                paymentType: [],
                currencyType: null,
                description: '',
                price: 1,
                images: [],
                features: [
                    {
                        name: '',
                        params: [
                            {
                                title: '',
                                param: ''
                            }
                        ]
                    }
                ]
            }
        },
        props: ['data'],
        components: {
            Multiselect
        },
        methods: {
            createProduct(){
                let data = {
                    'product': this.checkedProduct,
                    'type': 'items',
                    'pay_type': this.paymentType,
                    'delivery_type': this.deliveryType,
                    'currency': this.currencyType,
                    'description': this.description,
                    'producer': this.checkedTag,
                    'category': this.checkedCategory,
                    'shop_id': this.shop.id,
                    'price': this.price,
                    'images': this.images,
                    'features': this.features
                };
                this.$http.post('/user-shop/shop/'+this.shop.id+'/create', data).then(res => {
                    console.log(res);
                }, err => {

                })
            },
            setProducer(){
                this.checkedProducers = this.checkedCategory.producers;
            },
            addTag (newTag) {
                this.checkedProducers.push({'name': newTag, 'id': newTag});
                this.checkedTag = {'name': newTag, 'id': newTag};
                if(newTag.hasOwnProperty('products')){
                    this.checkedProducts.push(newTag.products);
                }
            },
            addTagProduct(newTag){
                this.checkedProduct = {'name': newTag, 'id': newTag};
                this.checkedProducts.push({'name': newTag, 'id': newTag});
            },
            fileLoad(e){
                let data = new FormData();
                data.append('file', e.target.files[0]);

                this.$http.post('/products/upload', data).then(res => {
                    this.images.push({'path': res.data, 'id': '-1'});
                }, err => {

                })
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