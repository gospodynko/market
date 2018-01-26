<script type="text/babel">
    import VueLadda from 'vue-ladda'
    import StarRating from 'vue-star-rating';
    import Multiselect from 'vue-multiselect';
    export default {
        data () {
            return {
                loadProduct: false,
                page: this.products.current_page,
                shopProducts: this.products.data,
                allProducts: this.products,
                hideShowMore: false,
                sortType: null,
                showList: false,
                categoryIds: [],
                showPhone: false,
                sortTypes: [
                    {
                        id: 1,
                        type: 'desc',
                        slug: 'price',
                        name: 'Ціна: Від більшої до меншої'
                    },
                    {
                        id: 2,
                        type: 'asc',
                        slug: 'price',
                        name: 'Ціна: Від меншої до більшої'
                    },
                    {
                        id: 3,
                        type: 'desc',
                        slug: 'created_at',
                        name: 'Спочатку нові'
                    },

                ]
            }
        },
        components: {
            VueLadda,
            StarRating
        },
        props: ['shop', 'categories', 'products'],
        methods: {
            getNew () {
                this.loadProduct = true
                ++this.page
                let data = {
                    page: this.page
                }
                if (this.sortType) {
                    this.sortTypes.forEach(type => {
                        if (+type.id === +this.sortType) {
                            data.order_by = type.slug
                            data.order_by_type = type.type
                        }
                    })
                }
                if (this.categoryIds.length) {
                    data.category_id = this.categoryIds
                }
                this.$http.post('/shop/' + this.shop.slug + '/load', data).then(res => {
                    if (res.data.last_page === this.page) {
                        this.hideShowMore = true
                    }
                    let arrConcat = this.shopProducts.concat(res.data.data)
                    this.shopProducts = arrConcat
                    this.loadProduct = false
                }, err => {
                    this.loadProduct = false
                })
            },
            sortFilter () {
                let data = {}
                this.sortTypes.forEach(type => {
                    if (+type.id === +this.sortType) {
                        data.order_by = type.slug
                        data.order_by_type = type.type
                    }
                })
                if (this.categoryIds.length) {
                    data.category_id = this.categoryIds
                }
                this.$http.post('/shop/' + this.shop.slug + '/load', data).then(res => {
                    this.shopProducts = res.data.data
                    this.allProducts = res.data
                    this.page = res.data.current_page
                    if (res.data.last_page !== this.page) {
                        this.hideShowMore = false
                    }
                }, err => {
                })
            },
            numberWithSpaces (x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            },
            setSort () {
                console.log(this.categoryIds)
                this.$http.post('/shop/' + this.shop.slug + '/load', {category_id: this.categoryIds}).then(res => {
                    this.shopProducts = res.data.data
                    this.allProducts = res.data
                    this.page = res.data.current_page
                    if (res.data.last_page !== this.page) {
                        this.hideShowMore = false
                    }
                }, err => {
                })
            }
        }
    }
</script>