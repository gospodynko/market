<template>
    <div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;Магазин</div>
                    <div class="panel-body">
                        <input type="text" class="form-control" readonly v-model="userProduct.shop.name">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;Детально о продукте</div>
                        <div class="panel-body">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Цена:</label>
                                    <input type="number" class="form-control" v-model="userProduct.price">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Валюта:</label>
                                    <select class="form-control" v-model="userProduct.currency">
                                    <option :value="currency" v-for="currency in data.currencies">{{currency.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Единица измерения:</label>
                                    <input type="text" class="form-control" v-model="userProduct.quantity_price">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Доставка:</label>
                                    <multiselect v-model="userProduct.delivery_types" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="id" :options="data.deliveries" :multiple="true"></multiselect>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Оплата:</label>
                                    <multiselect v-model="userProduct.pay_types" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="id" :options="data.pays" :multiple="true"></multiselect>
                                </div>
                            </div>
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
                userProduct: this.data.user_product
            }
        },
        props: ['data'],
        components: {
            Multiselect
        },
        methods: {
            updateProduct(){
                this.$http.put('/admin/user-products/'+this.userProduct.id, this.userProduct).then(res => {
                    location.href = '/admin/user-products';
                }, err => {

                })
            }
        }
    }
</script>