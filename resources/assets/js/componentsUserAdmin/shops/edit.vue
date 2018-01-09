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
//        watch: {
//            checkedProduct: function (val) {
//                if (val.hasOwnProperty('description')) {
//                    this.description = val.description
//                    this.features = JSON.parse(val.features)
//                } else {
//                    this.description = ''
//                    this.features = [
//                        {
//                            name: '',
//                            params: [
//                                {
//                                    title: '',
//                                    param: ''
//                                }
//                            ]
//                        }
//                    ]
//                }
//            }
//        },
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
                    'price': +this.price,
                    'images': this.images,
                    'features': this.features
                };
                axios.post('/shop/shop/create', data)
                    .then(response => {
                        location.href = '/shop/products';
                    })
                    .catch(function (error) {
                        console.log(error.response.data);
                    });
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
            //fix for test
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