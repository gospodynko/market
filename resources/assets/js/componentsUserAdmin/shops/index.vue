<script>
    import axios from 'axios';

    export default{
        data(){
            return{
                checkedShopId: null,
                details: null
            }
        },
        props: ['shops'],
        methods: {
            setShop(e,shop){
                e.preventDefault();
                this.activeId = shop.id;
                this.checkedShop = shop;
            },

            productDetails (id) {
                axios.post('/shop/product/details', { id: id})
                    .then(response => {

                        this.details = response.data;
                        this.checkedShopId = id;
                        console.log(this.details);

                    })
                    .catch(function (error) {
                        console.log(error.response.data);
                    });
            }
        }
    }
</script>