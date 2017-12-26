<script>
    import axios from 'axios';

    export default{
        data(){
            return{
                checkedShopId: null,
                details: null
            }
        },
        methods: {
            productDetails (id) {
                axios.post('/shop/product/details', { id: id})
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