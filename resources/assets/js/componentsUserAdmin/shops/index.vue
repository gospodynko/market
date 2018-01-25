<script>
    export default{
        data(){
            return{
                checkedShopId: null,
                products: []
            }
        },

        props: [
            'shops'
        ],

        methods: {
            productsCount (shop) {
                return shop.products.length;
            },

            productDetails (shop) {
                this.products = [];
                this.checkedShopId = shop.id;

                $.each(shop.products, function (key, product) {
                    this.products.push(product);
                }.bind(this));
            },

            editProduct (id) {
                location.href = '/shop/product/edit/'+id;
            },
            setStatus(product){
                let data = {}
                data.status = product.status ? 1 : 0;
                axios.post('/shop/product/edit/'+ product.id + '/status', data).then(res => {
                    product.status = data.status
                });
            }
        }
    }
</script>