<script type="text/babel">
    import Multiselect from 'vue-multiselect'
    export default{
        data(){
            return{
                checkedProduct: this.product,
                images: []
            }
        },
        props: ['product'],
        components: {
            Multiselect
        },
        methods: {
            updateProduct() {
                axios.post('/shop/product/update/' + this.product.id, this.product)
                    .then(response => {
                        location.href = '/shop/products/';
                    })
                    .catch(function (error) {
                        console.log(error.response.data);
                    })
                ;
            },
            fileLoad(e) {
                let data = new FormData();
                data.append('file', e.target.files[0]);

                axios.post('/products/upload', data)
                    .then(response => {
                        this.images.push({'path': response.data});
                    })
                    .catch(function (error) {
                        console.log(error.response.data);
                    })
                ;
            },
            addParameter(feature) {
                feature.params.push({
                    title: '',
                    param: ''
                });
            },
            checkSymbol (e){
                var charCode = (e.which) ? e.which : e.keyCode
                if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                    e.preventDefault()
                } else {
                    return true
                }
            },
            addFeature() {
                this.product.features.push({
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