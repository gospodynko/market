<script>
    export default{
        data(){
            return{
                orders: []
            }
        },

        props: [
            'shops'
        ],

        methods: {
            ordersCount (shop) {
                let count = 0;

                $.each(shop.products, function (key, value) {
                    count += value.user_product_offers.length;
                });

                return count;
            },

            orderDetails (shop) {
                this.orders = [];

                $.each(shop.products, function (key, product) {
                    $.each(product.user_product_offers, function (key, value) {
                        this.orders.push({
                            id: value.id,
                            name: product.name,
                            buyer: value.buyer,
                            created_at: value.created_at,
                            url: "/shop/" + product.user_shop.slug + "/" + product.slug
                        });
                    }.bind(this));
                }.bind(this));
            }
        }
    }
</script>
