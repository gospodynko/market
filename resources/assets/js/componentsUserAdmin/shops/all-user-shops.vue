<script>
    export default{
        data(){
            return{
                checkedShopId: null,

            }
        },

        props: [
            'shops'
        ],

        methods: {
            editShop (id) {
                location.href = '/shop/edit-info/'+id;
            }
        }
    }
</script>