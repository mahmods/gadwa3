<template>
    <div class="container page-content">
        <div class="steps">
            <div v-bind:class="[study_status.step_one==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createThirdStep(false)" :to="{ name: 'Stepone' }">
                    <span>بيانات المشروع</span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_two==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createThirdStep(false)" to="/step-2"><span>بيانات السوق</span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_three==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createThirdStep(false)" to="/step-3"><span>الطاقه الانتاجيه</span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_four==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createThirdStep(false)" to="/step-4"><span>رأس المال الثابت</span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_five==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createThirdStep(false)" to="/step-5"><span> تكاليف التشغيل </span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_five==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createThirdStep(false)" to="/step-6"><span> الاستثمار والتمويل  </span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.is_completed==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <button style="background: none;border: none" @click="createSixStep(false)"><span>التقرير</span>
                </button>
            </div>
        </div>
        <form @submit.prevent="createThirdStep()" v-if="!formSubmitted" class="form-ui">
            <div class="row cols-gutter-20">
                <!-- Form Area -->
                <div class="col-s-12 col-m-8 col-l-9 clear-after">
                    <div class="content-box">
                        <h2 class="head">
                            <button type="button" @click="addProduct"
                                    class="add-button ti-plus-io">
                            </button>
                            الطاقة الإنتاجية و المبيعات
                        </h2>
                        <div class="form-ui">
                            <!-- Area Titles -->
                            <div class="clone-area">
                                <div class="row clone-item">
                                    <div class="col-s-12 col-m-6 col-l-3 title">اسم المنتج</div>
                                    <div class="col-s-12 col-m-6 col-l-3 title">وحدة القياس</div>
                                    <div class="col-s-12 col-m-6 col-l-3 title">الطاقه الانتاجيه الشهريه</div>
                                    <div class="col-s-12 col-m-6 col-l-3 title">السعر</div>
                                </div>
                            </div>
                            <!-- // Area Titles -->
                            <div class="clone-area">
                                <!-- clone item -->
                                <div class="clone-item">
                                    <div class="row" v-for="(product,index) in products">
                                        <div class="col-s-12 col-m-6 col-l-3">
                                            <p :class="{ 'control': true }">
                                                <input v-model="product.title"
                                                       :class="{'input': true, 'is-danger': errors.has('products[]') }"
                                                       name="products[]" type="text"
                                                       placeholder="اسم المنتج">
                                                <span v-show="errors.has('products[]')"
                                                      class="help is-danger">@{{ errors.first('products[]')
                                                    }}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-s-12 col-m-6 col-l-3">
                                            <p :class="{ 'control': true }">
                                                <select v-model="product.unit_id" name="products[]" dir="rtl" class="">
                                                    <option v-for="unit in unites" :value="unit.id">{{unit.title}}
                                                    </option>
                                                </select>
                                            </p>
                                            <span v-show="errors.has('products[]')"
                                                  class="help is-danger">@{{ errors.first('products[]')
                                                }}
                                            </span>
                                        </div>
                                        <div class="col-s-12 col-m-6 col-l-3">
                                            <p :class="{ 'control': true }">
                                                <input v-model="product.production"
                                                       :class="{'input': true, 'is-danger': errors.has('products[]') }"
                                                       name="products[]" type="text"
                                                       placeholder="الطاقه الانتاجيه">
                                                <span v-show="errors.has('products[]')"
                                                      class="help is-danger">@{{ errors.first('products[]')
                                                    }}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-s-12 col-m-6 col-l-3">
                                            <p :class="{ 'control': true }">
                                                <input v-model="product.price"
                                                       :class="{'input': true, 'is-danger': errors.has('products[]') }"
                                                       name="products[]" type="text"
                                                       placeholder="السعر">
                                                <span v-show="errors.has('products[]')"
                                                      class="help is-danger">@{{ errors.first('products[]')
                                                    }}
                                                </span>
                                            </p>
                                        </div>
                                        <!--<input type="hidden" id="productId" value="" name="productId" v-model="product.id"/>-->

                                        <button type="button" @click="removeProduct(product.id,index)"
                                                :data-index="index"
                                                class="remove-button ti-trash-b-io">
                                        </button>

                                    </div>

                                </div>
                                <!-- // clone item -->
                            </div>

                        </div>

                    </div>
                </div>
                <!-- // Form Area -->

                <!-- Description Area -->
                <div class="col-s-12 col-m-4 col-l-3 clear-after">
                    <div class="describe-box">
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                        <a href="#" class="more" target="_blank">قراء المزيد</a>
                    </div>
                </div>
                <!-- // Description Area -->

                <!-- Form Area -->
                <div class="col-s-12 col-m-8 col-l-9 clear-after">
                    <div class="content-box">
                        <h2 class="head">معدل النمو للمشروع</h2>
                        <div v-for="rate in increase_rates" class="row">
                            <div class="col-s-12 col-m-6">
                                <input v-model="rate.years"
                                       :class="{'input': true, 'is-danger': errors.has('increase_rates_title[]') }"
                                       v-validate="'required'" name="increase_rates_title[]" type="text"
                                       placeholder="السنه الاولي">
                                <span v-show="errors.has('increase_rates_title[]')"
                                      class="help is-danger">@{{ errors.first('increase_rates_title[]')
                                    }}
                                </span>
                            </div>
                            <div class="col-s-12 col-m-6">
                                <select v-model="rate.percentage" v-validate="'required'" name="increase_rates_values[]"
                                        dir="rtl"
                                        class="">
                                    <option v-for="per in percentages" :value="per">
                                        {{per}}%
                                    </option>
                                </select>
                                <span v-show="errors.has('increase_rates_values[]')"
                                      class="help is-danger">@{{ errors.first('increase_rates_values[]')
                                    }}
                                        </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- // Form Area -->

                <!-- Description Area -->
                <div class="col-s-12 col-m-4 col-l-3 clear-after">
                    <div class="describe-box">
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                        <a href="#" class="more" target="_blank">قراء المزيد</a>
                    </div>
                </div>
                <!-- // Description Area -->
                <!-- buttons -->
                <div class="col-s-12 col-m-8 col-l-9 clear-after">
                    <router-link v-on:click.native="createThirdStep(false)" to="/step-2"
                                 class="btn round-corner right prev-btn">الخطوة السابقه
                    </router-link>
                    <button class="btn secondary round-corner left next-btn" type="submit">الخطوة التالية</button>
                </div>
                <!-- // buttons -->
            </div>
        </form>
    </div>
</template>
<script>
    import Vue from 'vue';
    import VeeValidate from 'vee-validate';
    Vue.use(VeeValidate);
    export default {
        //dependencies: ["api"],
        props: ['index', 'value', 'listKey'],
        data() {
            return {
                products: [
                    {
                        title: null,
                        unit_id: null,
                        production: null,
                        price: null,
                    }
                ],
                percentages: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
                increase_rates: [
                    {years: '', percentage: 0},
                    {years: '', percentage: 0},
                    {years: '', percentage: 0},
                    {years: '', percentage: 0},
                    {years: '', percentage: 0},
                ],
                studyId: 0,
                study_status: {
                    step_one: null,
                    step_two: null,
                    step_three: null,
                    step_four: null,
                    step_five: null,
                    step_six: null,
                    is_completed: null,
                    study_id: 0
                },
                unites: [],
                productId: 0,
                formSubmitted: false,

            }
        },
        created() {
            this.getUnites();
            this.fireEvent();
        },
        methods: {
            getUnites() {
                this.$http.get(window.hostname + '/api/unites').then(function (response) {
                    this.unites = response.data
                });
            },
            createThirdStep(par = true) {
                this.$validator.validateAll();
                if (!this.errors.any()) {
                    this.$http.post(window.hostname + '/api/products/add-product', {
                        products: this.products,
                        sid: this.studyId
                    }).then(function (respone) {
                        this.products_completed.push(respone.data.product);
                    });
                    this.$http.post(window.hostname + '/api/increase_rates/add-increase-rate', {
                        increase_rates: this.increase_rates,
                        sid: this.studyId,
                    }).then(function (respone) {
                        console.log(respone);
                    });
                    //Study status
                    if (this.products[0].title && this.products[0].production &&  this.products[0].price) {
                        this.study_status.step_three = 1;
                    } else {
                        this.study_status.step_three = 0;
                    }
                    if(
                        this.study_status.step_one === 1 &&
                        this.study_status.step_two === 1 &&
                        this.study_status.step_three === 1 &&
                        this.study_status.step_four === 1 &&
                        this.study_status.step_five === 1 &&
                        this.study_status.step_six === 1
                    ) {
                        this.study_status.is_completed = 1;
                    }else {
                        this.study_status.is_completed = 0;
                    }
                    this.$http.post(window.hostname + '/api/studies/status', {
                        sid: this.studyId,
                        study_status: this.study_status
                    });
                    //this.$router.push('/step-4');
                    if (par == true) {
                        window.location.hash = "/step-4";
                    }
                }
            },
            addProduct: function () {
                this.products.push(
                    {
                        title: null,
                        unit_id: null,
                        production: null,
                        price: null,
                    }
                );
            },
            removeProduct(id, index){
                this.$http.delete(window.hostname + '/api/products/product/' + id).then(function (response) {
                    this.products.splice(index, 1);
                });
            },
            fireEvent(){
                this.$http.get(window.hostname + '/ar/get-id').then(function (response) {
                    //this.info.user_id = response.data.user_id
                    this.$http.get(window.hostname + '/api/studies/study-by-user-id/' + response.data.user_id).then(function (response) {
                        this.studyId = response.data.study.id;
                        this.$http.get(window.hostname + '/api/products/' + this.studyId).then(function (response) {
                            if (response.data.products) {
                                this.products = response.data.products
                            }
                            let products_swap = [];
                            products_swap = Object.keys(response.data.products).map(function (key) {
                                return response.data.products[key];
                            });
                            if(products_swap.length>0)
                                this.products_completed=products_swap;
                            this.products = products_swap;
                        });
                        this.$http.get(window.hostname + '/api/increase_rates/' + this.studyId).then(function (response) {
                            if (response.data.increase_rates) {
                                this.increase_rates = response.data.increase_rates
                            }
                        });
                        this.$http.get(window.hostname + '/api/studies/status/' + this.studyId).then(function (response) {
                            this.study_status = response.data.study_status;
                            console.log(response)
                        });
                    });
                });
            }
        },
        submitForm(){
            this.formSubmitted = true
        }
    }
</script>