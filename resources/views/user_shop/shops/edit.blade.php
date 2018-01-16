@extends('user_shop.layouts.index')

@section('user-shop-content')
    <shops-edit-vue inline-template :product="{{$product}}" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="title">&nbsp;&nbsp;&nbsp;&nbsp;Внесіть зміни: </h2>
                    <div v-if="checkedProduct">
                        <div class="col-md-3 ">
                            <label class="mini-title prod-title">Продукт*:</label>
                            <textarea class="multiselect__input" v-model="checkedProduct.name" >@{{ checkedProduct.name }}</textarea>
                         </div>
                        </div>
                        <div class="col-lg-12 description-block">
                            <label class="mini-title description-title">Опис продукту*</label>
                            <textarea v-model="checkedProduct.description" class="form-control description-form">@{{ checkedProduct.description }}</textarea>

                        </div>
                        <div class="col-md-12">
                            <h2 class="props-title">Характеристики</h2>
                            <div v-for="feature in checkedProduct.features">
                                <input type="text" placeholder="Заголовок характеристики" class="form-control head-param-title" v-model="feature.name">
                                <div v-for="param in feature.params" class="param-block">
                                    <input type="text" class="param-name" placeholder="Назва параметру" v-model="param.title">
                                    <input type="text" class="parametr" placeholder="Параметр" v-model="param.param">
                                </div>
                                <button class="btn btn-success add-param-btn" @click="addParameter(feature)"><i class="glyphicon glyphicon-plus"></i><span class="add-btn-text"> Додати параметр</span></button>
                            </div>
                            <button class="btn btn-success add-prop-btn" @click="addFeature"><i class="glyphicon glyphicon-plus"></i><span class="add-btn-text"> Додати характеристику</span></button>
                        </div>
                        <div class="col-md-12 load-file-block">
                            <div class="col-md-3">
                                <label class="mini-title load-title">Загрузить картинки (макс 5шт)</label>
                                <input type="file" class="load-btn" @change="fileLoad">
                            </div>

                            <div class="pictures" v-if="images.length == 0">
                                <div class="col-md-3" v-for="pictures in checkedProduct.pictures">
                                    <img :src="pictures.path" alt="image">
                                </div>
                            </div>
                            <div v-else>
                                <div class="col-md-3" v-for="image in checkedProducts.images" style="width: auto">
                                    <div class="img">
                                        <img :src="image.path" alt="image">
                                        <button @click="removeImage">Видалити</button>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-12 after-load-hr">
                            <hr>
                        </div>
                    </div>
                    <div class="col-md-12 currency-block">
                        <div class="col-lg-3">
                            <label class="mini-title price-title">Ціна*:</label>
                            <input type="number" class="form-control price-form" v-model="checkedProduct.price" value="@{{ checkedProduct.price }}" v-on:keypress="checkSymbol">
                        </div>
                        <div class="col-lg-3">
                            <label class="mini-title currency-title">Валюта*:</label>
                            <select class="form-control currency-form" v-model="checkedProduct.currency">
                                <option :value="null" selected>@{{ checkedProduct.currency.name }}</option>
                                <option :value="currency" v-for="currency in checkedProduct.currencies">@{{  currency.name }}</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <div class="col-md-12 post-block">
                        <div class="col-lg-3">
                            <label class="mini-title post-title">Тип доставки*:</label>

                            <multiselect v-model="checkedProduct.delivery_types" tag-placeholder="Додайте новий тег" selected-label = "Обрано" select-label="Натисніть enter" deselect-label="Зняти" placeholder="Пошук тегу" label="name" track-by="id" :options="checkedProduct.delivery_type" :multiple="true"></multiselect>
                        </div>
                        <div class="col-lg-3">
                            <label class="mini-title pay-type-title">Тип оплати*:</label>
                            <multiselect v-model="checkedProduct.pay_types" tag-placeholder="Додайте новий тег"  selected-label = "Обрано" select-label="Натисніть enter" deselect-label="Зняти" placeholder="Пошук тегу" label="name" track-by="id" :options="checkedProduct.pay_type" :multiple="true"></multiselect>
                        </div>
                    </div>
                    <div class="col-md-12 btn-block">
                        <div class="col-lg-12 btn-lg-block">
                            <hr class="after-line">
                            <button class="btn send-btn" @click="updateProduct">
                                <i class="glyphicon glyphicon-send"></i>&nbsp;
                                Редагувати
                            </button>
                            <a href="{{ route('user_shop.products') }}" class="btn btn-danger cancel-btn">
                                <i class="glyphicon glyphicon-remove"></i>&nbsp;
                                Відміна
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </shops-edit-vue>
@endsection