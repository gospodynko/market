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
                            <textarea class="multiselect__input" style="width:100%; height: 50px; resize: none;" v-model="checkedProduct.name" >@{{ checkedProduct.name }}</textarea>
                         </div>
                        <div class="col-lg-3">
                            <br/>
                        </div>
                        <div class="col-lg-3">
                            <label class="mini-title status-title">Вiдображаеться на маркетi:</label>
                            <input id="status" type="checkbox">
                        </div>
                        </div>
                        <div class="col-lg-12 description-block">
                            <label class="mini-title description-title">Опис продукту*</label>
                            <textarea v-model="checkedProduct.description" class="form-control description-form" style="width: 90%; height: 200px; resize: none;">@{{ checkedProduct.description }}</textarea>

                        </div>
                        <div class="col-md-12">
                            <h2 class="props-title">Характеристики</h2>
                            <div v-for="(feature, i) in checkedProduct.features">
                                <div style="display:flex">
                                    <input type="text" placeholder="Заголовок характеристики" class="form-control head-param-title" v-model="feature.name">
                                    <button @click="deleteFeature(i)" style="height:38px; margin-left:7px">x</button>
                                </div>
                                <div v-for="(param, i) in feature.params" class="param-block">
                                    <input type="text" class="param-name" placeholder="Назва параметру" v-model="param.title">
                                    <input type="text" class="parametr" placeholder="Параметр" v-model="param.param">
                                    <button @click="deleteParam(feature, i)">x</button>
                                </div>
                                <button class="btn btn-success add-param-btn" @click="addParameter(feature)"><i class="glyphicon glyphicon-plus"></i><span class="add-btn-text"> Додати параметр</span></button>
                            </div>
                            <button class="btn btn-success add-prop-btn" @click="addFeature"><i class="glyphicon glyphicon-plus"></i><span class="add-btn-text"> Додати характеристику</span></button>
                        </div>
                        <div class="col-md-12 after-load-hr">
                            <hr>
                        </div>
                        <div class="col-md-12 load-file-block">
                            <div class="col-md-3">
                               <label class="mini-title load-title">Завантаження фотографiй (макс 5шт)</label>
                            </div>
                            <div class="col-md-3">
                                {{--<input type="file" class="btn btn-success add-prop-btn" @change="fileLoad">--}}
                                <label for="file-upload" class="custom-file-upload">
                                    <i class="fa fa-cloud-upload"></i> Додати фото
                                </label>
                                 <input id="file-upload" type="file"  @change="fileLoad"/>
                            </div>
                            <div class="col-md-3" v-for="(image, i) in checkedProduct.pictures" style="width: auto">
                                <br/>
                                <div class="img">
                                    <img :src="image.path" alt="image" width="100px" height="100px" border="0">
                                    <button @click="removeImage(i, image.id)">Видалити</button>
                                </div>
                            </div>
                    </div>
                        <div class="col-md-12 after-load-hr">
                            <hr>
                        </div>
                    <div class="col-md-12 currency-block">
                        <div class="col-lg-3">
                            <label class="mini-title price-title">Ціна*:</label>
                            <input type="number" class="form-control price-form" v-model="checkedProduct.price" value="@{{ checkedProduct.price }}" v-on:keypress="checkSymbol">
                        </div>
                        <div class="col-lg-3">
                            <label class="mini-title currency-title">Валюта*:</label>
                            <select class="form-control currency-form" v-model="checkedProduct.currency">
                                {{--<option :value="null" selected>@{{ checkedProduct.currency.name }}</option>--}}
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
                            <button class="btn btn-danger cancel-btn" @click="removeProduct">

                                <i class="glyphicon glyphicon-remove"></i>&nbsp;
                                Видалити продукт
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