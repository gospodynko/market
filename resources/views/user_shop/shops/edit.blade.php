@extends('user_shop.layouts.index')

@section('user-shop-content')
    <shops-edit-vue inline-template :data="{{$data}}">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="title">Редактирование товара: </h2>

                    <div class="col-md-12 props-block">
                    <div class="col-md-3">
                    <label class="mini-title category-title">Выбор категории:</label>
                    <select class="form-control category-form" @change="setProducer" v-model="checkedCategory">
                    <option :value="null" disabled selected>Выберите категорию</option>
                    <option :value="category" v-for="category in categories">{{category.name}}</option>
                    </select>
                    </div>
                    {{--<div class="col-md-3">--}}
                    {{--<label class="mini-title creator-title">Производитель:</label>--}}
                    {{--<multiselect v-model="checkedTag" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="id" :options="checkedProducers" :multiple="false" :taggable="true" @tag="addTag"></multiselect>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 ">--}}
                    {{--<label class="mini-title prod-title">Продукт:</label>--}}
                    {{--<multiselect  v-model="checkedProduct" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="id" :options="checkedTag.hasOwnProperty('products') ? checkedTag.products : checkedProducts" :multiple="false" :taggable="true" @tag="addTagProduct"></multiselect>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div v-if="checkedProduct">--}}
                    {{--<div class="col-lg-12 description-block">--}}
                    {{--<label class="mini-title description-title">Описание продукта</label>--}}
                    {{--<textarea class="form-control description-form" v-model="description"></textarea>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-12">--}}
                    {{--<h2 class="props-title">Характеристики</h2>--}}
                    {{--<div v-for="feature in features">--}}
                    {{--<input type="text" placeholder="Заголовок характеристики" class="form-control head-param-title" v-model="feature.name">--}}
                    {{--<div v-for="param in feature.params" class="param-block">--}}
                    {{--<input type="text" class="param-name" placeholder="Название параметра" v-model="param.title">--}}
                    {{--<input type="text" class="parametr" placeholder="Параметр" v-model="param.param">--}}
                    {{--</div>--}}
                    {{--<button class="btn btn-success add-param-btn" @click="addParameter(feature)"><i class="glyphicon glyphicon-plus"></i><span class="add-btn-text"> Добавить параметр</span></button>--}}
                    {{--</div>--}}
                    {{--<button class="btn btn-success add-prop-btn" @click="addFeature"><i class="glyphicon glyphicon-plus"></i><span class="add-btn-text"> Добавить характеристику</span></button>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-12 load-file-block">--}}
                    {{--<div class="col-md-3">--}}
                    {{--<label class="mini-title load-title">Загрузить картинки (макс 5шт)</label>--}}
                    {{--<input type="file" class="load-btn" @change="fileLoad">--}}
                    {{--</div>--}}

                    {{--<div class="pictures" v-if="images.length == 0">--}}
                    {{--<div class="col-md-3" v-for="pictures in checkedProduct.pictures">--}}
                    {{--<img :src="pictures.path" alt="image">--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-3" v-for="image in images">--}}
                    {{--<img :src="image.path" alt="image">--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-12 after-load-hr">--}}
                    {{--<hr>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-12 currency-block">--}}
                    {{--<div class="col-lg-3">--}}
                    {{--<label class="mini-title price-title">Цена:</label>--}}
                    {{--<input type="number" class="form-control price-form" v-model="price">--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-3">--}}
                    {{--<label class="mini-title currency-title">Валюта:</label>--}}
                    {{--<select class="form-control currency-form" v-model="currencyType">--}}
                    {{--<option :value="null">Выберите валюту</option>--}}
                    {{--<option :value="currency" v-for="currency in data.currencies">{{currency.name}}</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-12">--}}
                    {{--<hr>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-12 post-block">--}}
                    {{--<div class="col-lg-3">--}}
                    {{--<label class="mini-title post-title">Тип доставки:</label>--}}
                    {{--<multiselect v-model="deliveryType" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="id" :options="data.delivery_type" :multiple="true"></multiselect>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-3">--}}
                    {{--<label class="mini-title pay-type-title">Тип оплаты:</label>--}}
                    {{--<multiselect v-model="paymentType" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="id" :options="data.pay_type" :multiple="true"></multiselect>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-12 btn-block">--}}
                        {{--<div class="col-lg-12 btn-lg-block">--}}
                            {{--<hr class="after-line">--}}
                            {{--<a href="/shop/products" class="btn btn-danger cancel-btn">--}}
                                {{--<i class="glyphicon glyphicon-remove"></i>&nbsp;--}}
                                {{--Отмена--}}
                            {{--</a>--}}
                            {{--<button class="btn send-btn" @click="createProduct">--}}
                                {{--<i class="glyphicon glyphicon-send"></i>&nbsp;--}}
                                {{--Створити--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                </div>
            </div>
            </div>
        </div>
    </shops-edit-vue>
@endsection
