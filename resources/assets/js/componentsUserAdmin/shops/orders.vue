<script>
    export default{
        data(){
            return{
                details: null
            }
        },

        methods: {
            orderDetails (id) {
                axios.post('/shop/orders/details', { id: id })
                    .then(response => {
                        this.details = response.data;
                        this.checkedShopId = id;
                    })
                    .catch(function (error) {
                        console.log(error.response.data);
                    });
            }
        }
    }
</script>
