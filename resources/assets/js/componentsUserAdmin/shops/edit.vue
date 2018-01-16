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
            checkSymbol (e){
                var charCode = (e.which) ? e.which : e.keyCode
                if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                    e.preventDefault()
                } else {
                    return true
                }
            },
            addParameter(feature) {
                feature.params.push({
                    title: '',
                    param: ''
                });
            },
            addFeature() {
                if (this.product.features) {
                    console.log(1)
                    this.product.features.push({
                        name: '',
                        params: [
                            {
                                title: '',
                                param: ''
                            }
                        ]
                    })
                } else {
                    console.log(2)
                    this.product.features = [];
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
            },
            deleteFeature (i) {
                console.log(i);
                this.product.features.splice(i,1);
            },
            deleteParam (feature, i) {
                feature.params.splice(i,1);
            }
        }
    }
</script>