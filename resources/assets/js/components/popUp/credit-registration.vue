<template>
    <div class="popUp-credit-section">
        <button class="di-buy-credit" @click="addToCredit"> Купити в кредит</button>
        <div class="popUp-Credit" v-if="showCreditForm" :class="{'open': showCreditForm}">
            <transition name="fade">
                <div class="popup-application-credit" v-if="step == 1">
                    <div class="popup-application-credit-header">
                        <h2>Заява на кредит</h2>
                        <div class="circle-close" @click.prevent="close">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="15px" height="15px" fill="#838383" viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982;" xml:space="preserve">
<g id="Close">
	<path style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312   c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312   l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937   c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
                        </div>
                    </div>
                    <div class="steps">
                        <div class="step active">  <!--:class="{'active': step == 1, 'success': step > 1}"-->
                                <i class="circle">1</i> <!--  v-if="step <= 1" -->
                                <!--<i class="circle" v-else><img src="/dist/img/svg-icon/ok.png" alt=""></i>-->
                                <p>Оберіть умови</p>
                        </div>
                        <div class="step">   <!--:class="{'active': step == 2, 'success': step >= 2}"-->
                                <i class="circle">2</i> <!-- v-if="step <= 2" -->
                                <!--<i class="circle" v-else><img src="/dist/img/svg-icon/ok.png" alt=""></i>-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="287" height="4" viewBox="0 0 287 4"><defs><path id="mzj5a" d="M246 155c0-1.1.9-2 2-2h283a2 2 0 1 1 0 4H248a2 2 0 0 1-2-2z"/></defs><g><g transform="translate(-246 -153)"><use fill="#e2e9f0" xlink:href="#mzj5a"/></g></g></svg>
                                <p>Заповніть дані</p>
                        </div>
                    </div>
                    <form id="form-conditions" action="">
                        <div class="credit-conditions">
                            <div class="reg-obl">
                                <p>Де Ви зареєстровані?</p>
                                <div class="obl-select">
                                    <div class="select-side">
                                        <i class="obl obl-menu-down gray">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" viewBox="0 0 37 27"><g><g transform="translate(-570 -284)"><image width="37" height="27" transform="translate(570 284)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAbCAYAAAD77kbeAAACCElEQVRYR+2V30sUURSAvxlStz9A01LbkKByyzUxA0Ux3IyKwsrMZPsB/j1FkVjpshYmJmIvPUiksFtL6EMUJUEvET3G7po/Vne2mYk7NLGQ5b1sQdAMzNMc5nz3O+eeo9m2bfOPPZoHJVkRz5SkKDxTnilZA7Jx/2dPiYWhaZqsJCdOyZRIYJqmk0TX9U2TWZaNZZlOrHhlH2kosSE/J5NcuzXM4cZ6Oo+04vOVbAjmrtP5l68ZffiIjrZmTh0PbXoIF1oBymZkbJLpp3FWMxn6wz0cC7VRUlz8UzLTtHj1ZoGbd0ZIpRZpbT7EpQtn2FZWKiVLCcqyLO5Gx5h99oL1rMGVi+c40dn+A0wYEjFv373nxmCUZDpNY32dA1RVWfHnTYkjOj31HSyWmGM1s8bl3rMO2Fafj6+myYIAuh0llV6kqSHofK8oL/s7PeV6d21EH0zyZDbO2nrWSRxqb+HDx09cH4iwtLJCMLCPcE8Xu/xV0oaUeyq/GVywoXvjzMQSZI0cXSePEns+x5elZQ4GA/R1n8ZfXalkqCCo/FJG7o8zPRPHMHIUFW2hoS7A1b5udmwvVzZUMJQLJhp7MDJKLDHP7ho//eHz+HdWo+tqAzO/EtK371d3WZTSyOWYmHrM/to9HKjdWxCQ8kT/3ZBxB6bqStnonwWbkpqGikEelKwwz5SsqW8fvjC/keZcfgAAAABJRU5ErkJggg=="/></g></g></svg>
                                        </i>
                                    </div>
                                    <select class="form-control" id="sel1" v-model="checkedRegion">
                                        <option :value="null"><p>Оберіть регіон</p></option>
                                        <option :value="region.id" v-for="region in regions"><p>{{region.region_name}}</p></option>
                                    </select>
                                </div>
                            </div>
                            <div class="credit-union" v-for="branch in alliances">
                                <p>{{branch.alliance.title}}</p>
                                <div>
                                    <div class="credit-union-select">
                                        <div class="select-side">
                                            <i class="credit-union-down gray">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" viewBox="0 0 37 27"><g><g transform="translate(-570 -284)"><image width="37" height="27" transform="translate(570 284)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAbCAYAAAD77kbeAAACCElEQVRYR+2V30sUURSAvxlStz9A01LbkKByyzUxA0Ux3IyKwsrMZPsB/j1FkVjpshYmJmIvPUiksFtL6EMUJUEvET3G7po/Vne2mYk7NLGQ5b1sQdAMzNMc5nz3O+eeo9m2bfOPPZoHJVkRz5SkKDxTnilZA7Jx/2dPiYWhaZqsJCdOyZRIYJqmk0TX9U2TWZaNZZlOrHhlH2kosSE/J5NcuzXM4cZ6Oo+04vOVbAjmrtP5l68ZffiIjrZmTh0PbXoIF1oBymZkbJLpp3FWMxn6wz0cC7VRUlz8UzLTtHj1ZoGbd0ZIpRZpbT7EpQtn2FZWKiVLCcqyLO5Gx5h99oL1rMGVi+c40dn+A0wYEjFv373nxmCUZDpNY32dA1RVWfHnTYkjOj31HSyWmGM1s8bl3rMO2Fafj6+myYIAuh0llV6kqSHofK8oL/s7PeV6d21EH0zyZDbO2nrWSRxqb+HDx09cH4iwtLJCMLCPcE8Xu/xV0oaUeyq/GVywoXvjzMQSZI0cXSePEns+x5elZQ4GA/R1n8ZfXalkqCCo/FJG7o8zPRPHMHIUFW2hoS7A1b5udmwvVzZUMJQLJhp7MDJKLDHP7ho//eHz+HdWo+tqAzO/EtK371d3WZTSyOWYmHrM/to9HKjdWxCQ8kT/3ZBxB6bqStnonwWbkpqGikEelKwwz5SsqW8fvjC/keZcfgAAAABJRU5ErkJggg=="/></g></g></svg>
                                            </i>
                                        </div>
                                        <select class="form-control" id="sel2">
                                            <option>6 месяців</option>
                                            <option>18 месяців</option>
                                            <option>24 месяці</option>
                                        </select>
                                    </div>
                                    <p>399 грн/пл</p>
                                    <div class="btn-checkout-credit" @click.prevent="sendForm($event, branch.alliance.id)">
                                        <p>Оформити</p>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </form>
                </div>
                <div class="popup-application-creditM" v-if="step == 2">
                    <div class="popup-application-credit-header">
                        <h2>Заява на кредит</h2>
                        <div class="circle-close" @click.prevent="close">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="15px" height="15px" fill="#838383" viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982;" xml:space="preserve">
<g id="Close">
	<path style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312   c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312   l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937   c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
                        </div>
                    </div>
                    <div class="steps">
                        <div class="step active">  <!--:class="{'active': step == 1, 'success': step > 1}"-->
                            <i class="circle">1</i> <!--  v-if="step <= 1" -->
                            <!--<i class="circle" v-else><img src="/dist/img/svg-icon/ok.png" alt=""></i>-->
                            <p>Оберіть умови</p>
                        </div>
                        <div class="step active">   <!--:class="{'active': step == 2, 'success': step >= 2}"-->
                            <i class="circle">2</i> <!-- v-if="step <= 2" -->
                            <!--<i class="circle" v-else><img src="/dist/img/svg-icon/ok.png" alt=""></i>-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="287" height="4" viewBox="0 0 287 4"><defs><path id="mzj5a" d="M246 155c0-1.1.9-2 2-2h283a2 2 0 1 1 0 4H248a2 2 0 0 1-2-2z"/></defs><g><g transform="translate(-246 -153)"><use fill="#14c44d" xlink:href="#mzj5a"/></g></g></svg>
                            <p>Заповніть дані</p>
                        </div>
                    </div>
                    <form id="form-user-info" action="">
                        <div class="popup-credit-caption">ПІБ</div>
                        <input type="text" name="name" value="" v-model="userData.fio" id="firstName" :class="{'error': errors.fio}">
                        <div class="popup-credit-caption">E-mail</div>
                        <input type="email" name="email" value="" v-model="userData.email" id="email" :class="{'error': errors.email}" required>
                        <div class="popup-credit-caption">Телефон</div>
                        <input type="tel" name="tel" v-model="phone" id="tel" placeholder="099 999-99-99" maxlength="10" required :class="{'error': errors.phone}">
                        <div class="popup-credit-caption">Оберіть спосіб оплати</div>
                        <div class="how-buy-select">
                            <div class="select-side">
                                <i class="how-buy-down gray">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" viewBox="0 0 37 27"><g><g transform="translate(-570 -284)"><image width="37" height="27" transform="translate(570 284)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAbCAYAAAD77kbeAAACCElEQVRYR+2V30sUURSAvxlStz9A01LbkKByyzUxA0Ux3IyKwsrMZPsB/j1FkVjpshYmJmIvPUiksFtL6EMUJUEvET3G7po/Vne2mYk7NLGQ5b1sQdAMzNMc5nz3O+eeo9m2bfOPPZoHJVkRz5SkKDxTnilZA7Jx/2dPiYWhaZqsJCdOyZRIYJqmk0TX9U2TWZaNZZlOrHhlH2kosSE/J5NcuzXM4cZ6Oo+04vOVbAjmrtP5l68ZffiIjrZmTh0PbXoIF1oBymZkbJLpp3FWMxn6wz0cC7VRUlz8UzLTtHj1ZoGbd0ZIpRZpbT7EpQtn2FZWKiVLCcqyLO5Gx5h99oL1rMGVi+c40dn+A0wYEjFv373nxmCUZDpNY32dA1RVWfHnTYkjOj31HSyWmGM1s8bl3rMO2Fafj6+myYIAuh0llV6kqSHofK8oL/s7PeV6d21EH0zyZDbO2nrWSRxqb+HDx09cH4iwtLJCMLCPcE8Xu/xV0oaUeyq/GVywoXvjzMQSZI0cXSePEns+x5elZQ4GA/R1n8ZfXalkqCCo/FJG7o8zPRPHMHIUFW2hoS7A1b5udmwvVzZUMJQLJhp7MDJKLDHP7ho//eHz+HdWo+tqAzO/EtK371d3WZTSyOWYmHrM/to9HKjdWxCQ8kT/3ZBxB6bqStnonwWbkpqGikEelKwwz5SsqW8fvjC/keZcfgAAAABJRU5ErkJggg=="/></g></g></svg>
                                </i>
                            </div>
                            <select class="form-control" id="sel3" v-model="userData.payType" :class="{'error': errors.payType}">
                                <option :value="null">Выберите тип</option>
                                <option :value="type.name" v-for="type in payTypes">{{type.name}}</option>
                            </select>
                        </div>
                        <div class="popup-regMBtn">
                            <button type="submit" @click.prevent="sendMobForm($event)"><p>Відправити</p></button>
                        </div>
                    </form>
                </div>
            </transition>
        </div>
        <div class="overlay" :class="{'open': showCreditForm}" @click="addToCredit"></div>
    </div>
</template>


<script type="text/babel">
    import VueToast from 'vue-toast'
    export default {
        data () {
            return {
                showCreditForm: false,
                step: 1,
                regions: null,
                checkedRegion: null,
                alliances: null,
//                checkedAlliance: null,
                phone: '',
                payTypes: [
                    {
                        id: 1,
                        name: 'Готівкою'
                    },
                    {
                        id: 2,
                        name: 'Безготівковий'
                    }
                ],
                userData: {
                    phone: '',
                    fio: '',
                    email: '',
                    payType: '',
                    region: null,
                    alliance: null
                },
                errors: {
                    phone: false,
                    fio: false,
                    email: false,
                    payType: false
                }
            }
        },
        created () {
            this.getRegions()
        },
        components: {
            VueToast
        },
        watch: {
            showCreditForm: function (val) {
                if (val) {
                    this.hiddenBody('open')
                } else {
                    this.hiddenBody('close')
                }
            },
            checkedRegion: function (val) {
                if (val) {
                    this.getAlliance()
                }
            },
            phone: function (val) {
                if (val.length >= 10) {
                    this.userData.phone = val.replace(/[^\d,]/g, '')
                }else {
                    this.userData.phone = ''
                }
            },
            user: function (val){
               this.userData.fio = val.first_name
            },
            email: function (val){
                this.userData.email = val.email
            }
        },
        methods: {
            getAlliance () {
                this.$http.get('/credit-alliance/' + this.checkedRegion)
                    .then(res => {
                        this.alliances = res.data.branches
                    }, err => {
                    })
            },
            getRegions () {
                this.$http.get('/credit-regions')
                .then(res => {
                    this.regions = res.data.regions
                }, err => {
                    this.close()
                })
            },
            sendForm (e, allianceId) {
                this.step = 2;
                this.userData.alliance = allianceId
                this.userData.region = this.checkedRegion
                //add data in userData (alliance & regionId)
//                TODO
            },
            validate (e) {
                for (let key in this.userData) {
                    console.log(key)
                    switch (key) {
                        case 'phone':
                            if (!this.userData[key] || !this.userData[key].length || this.userData[key][0] !== 0) {
                                this.errors.phone = true
                            } else {
                                this.errors.phone = false
                            }
                            break;
                        case 'fio':
                            if (!this.userData[key] || !this.userData[key].length || this.userData[key][0] !== 0) {
                                this.errors.fio = true
                            } else {
                                this.errors.fio = false
                            }
                            break;
                        case 'email':
                            if (!this.userData[key] || !this.userData[key].length || this.userData[key][0] !== 0) {
                                this.errors.email = true
                            } else {
                                this.errors.email = false
                            }
                            break;
                        case 'payType':
                            if (!this.userData[key] || !this.userData[key].length || this.userData[key][0] !== 0) {
                                this.errors.payType = true
                            } else {
                                this.errors.payType = false
                            }
                            break;

                    }
                }
                let hasError = false
                for (let key in this.errors) {
                    if (this.errors[key]) {
                        hasError = true
                    }
                }
                return hasError
            },
            sendMobForm (e) {
                if (this.validate()) return false

                //TODO send ajax
            },
            close () {
                this.step = 1;
                this.showCreditForm = false
            },
            addToCredit(){
                this.showCreditForm = !this.showCreditForm
            },
            hiddenBody (key) {
                if (key === 'open') {
                    $('body').css('overflow', 'hidden')
                } else {
                    $('body').css('overflow', 'scroll')
                }
            }
        }
    }
</script>

<style>
    circle{
        color: #fff;
        width: 30px;
        height: 30px;
        background: lightgray;
        border: 1px solid lightgray;
        border-radius: 50%;
    }
</style>