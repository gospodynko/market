<script>
    export default{
        data(){
            return{
                // activeId: this.shops[0].id,
                // checkedShop: this.shops[0]
            }
        },
        props: [
            'orders'
        ],
        
        methods: {
            orderDetails(id){
                console.log(id);
            }
        }
    }
</script>
