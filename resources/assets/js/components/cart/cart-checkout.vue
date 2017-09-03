<template>
    <section class="cart-checkout-sect">
        <div class="cart-checkout-wrap">
            <div class="breadcrumbs"></div>

            <div class="all-items-cart-wrap">
                <div class="checkout-user-wrap">
                    <h2>Ваши товары</h2>
                    <div class="checked-product">
                        <div class="image-prod">
                            <img :src="checkedItem.product.default_picture" alt="">
                        </div>
                        <div class="detail-description">
                            <div class="head">
                                <p class="title">{{checkedItem.product.name}}</p>
                                <p class="shop-title">Магазин {{checkedItem.store.shop.name}}</p>
                            </div>
                            <div class="footer">
                                <p class="price">{{checkedItem.store.price * checkedItem.store.store_count}} грн</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="detail-user-fields">
                    <h2>Данные покупателя</h2>
                    <div class="field-list">
                        <p>
                            <span>Имя</span>
                            <input type="text">
                        </p>
                        <p>
                            <span>Фамилия</span>
                            <input type="text">
                        </p>
                    </div>
                    <div class="field-list">
                        <p>
                            <span>Телефон</span>
                            <input type="text">
                        </p>
                        <p>
                            <span>Email</span>
                            <input type="text">
                        </p>
                    </div>
                </div>
                <div class="payment-delivery-wrap">
                    <h2>Доставка</h2>
                    <div class="checked-payment">
                        blabla..
                    </div>
                    <div class="other-info">
                        <p class="comments">Комментарий:</p>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="end-section">
                    <div class="two-wrap">
                        <div class="left">
                            <p class="title">Итого:</p>
                            <p class="price">12 000 грн</p>
                        </div>
                        <div class="right">
                            <button class="btn">Заказать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script type="text/babel">
    export default {
        data(){
            return {
                cartItems: JSON.parse(localStorage.getItem('cart')),
                checkedItem: null
            }
        },
        props: ['store', 'user'],
        created(){
            if(this.cartItems.length){
                this.cartItems.forEach(item => {
                    if(item.store.id == this.store){
                        this.checkedItem = item;
                    }
                })
            }
        }

    }
</script>