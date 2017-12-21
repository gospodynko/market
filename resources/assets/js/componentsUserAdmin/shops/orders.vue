<script>
    export default{
        data(){
            return{
                checkedShopId: null,
                details: null
            }
        },
        props: [
            'orders'
        ],

        methods: {
            setShop(e,shop){
                e.preventDefault();
                this.activeId = shop.id;
                this.checkedShop = shop;
            },

            orderDetails (id) {
                axios.post('/shop/orders/details', { id: id})
                    .then(response => {

                        this.details = response.data;
                        this.checkedShopId = id;
                        // console.log(this.details[0].buyer.id);

                    })
                    .catch(function (error) {
                        console.log(error.response.data);
                    });
            }
        }
    }
</script>
