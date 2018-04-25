<template>
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
                                                       placeholder="اسم المنتج" v-validate="'required'">
                                            </p>
                                        </div>
                                        <div class="col-s-12 col-m-6 col-l-3">
                                            <p :class="{ 'control': true }">
                                                <select v-model="product.unit_id" name="products[]" dir="rtl" class="">
                                                    <option v-for="unit in unites" :value="unit.id">{{unit.title}}
                                                    </option>
                                                </select>
                                            </p>
                                        </div>
                                        <div class="col-s-12 col-m-6 col-l-3">
                                            <p :class="{ 'control': true }">
                                                <input v-model="product.production" 
                                                       :class="{'input': true, 'is-danger': errors.has('products[]') }"
                                                       name="products[]" type="text"
                                                       placeholder="الطاقه الانتاجيه" v-validate="'required|numeric'">
                                                
                                            </p>
                                        </div>
                                        <div class="col-s-12 col-m-6 col-l-3">
                                            <p :class="{ 'control': true }">
                                                <input v-model="product.price"
                                                       :class="{'input': true, 'is-danger': errors.has('products[]') }"
                                                       name="products[]" type="text"
                                                       placeholder="السعر" v-validate="'required|decimal'">

                                            </p>
                                        </div>
                                        <!--<input type="hidden" id="productId" value="" name="productId" v-model="product.id"/>-->

                                        <button type="button" @click="removeProduct(product.id,index)"
                                                :data-index="index"
                                                class="remove-button ti-trash-b-io">
                                        </button>

                                    </div>

                                </div>
                                <div v-show="errors.has('products[]')">       

                                <ul>
                                    <li>
                                <span v-show="errors.has('products[]')" class="help is-danger">غير مسموح بوجود حقل فارغ !
                                </span>
                                    </li>

                                    <li>
                                <span v-show="errors.has('products[]')" class="help is-danger">لابد أن تكون الطاقة الانتاجية فى صورة رقم صحيح</span>
                                    </li>
                                    <li>
                                <span v-show="errors.has('products[]')" class="help is-danger">لابدان يكون يكون السعر فى صورة صحيحة</span>
                                </li>
                                </ul>
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
                                       placeholder="السنه الاولي على سبيل المثال .. ">
                            </div>
                            <div class="col-s-12 col-m-6">
                                <select v-model="rate.percentage" v-validate="'required'" name="increase_rates_values[]"
                                        dir="rtl"
                                        class="">
                                    <option v-for="per in percentages" :value="per">
                                        {{per}}%
                                    </option>
                                </select>
                               
                            </div>
                        </div>
                        <span v-show="errors.has('increase_rates_title[]')" class="help is-danger"> 
                                    غير مسموح بوجود حقل فارغ
                        </span>
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
</template>
<script>
    export default {
        props: ['currentStudy', 'unites'],
        data() {
            return {
                products: [],
                increase_rates: [],
                productId: null,
                percentages: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
                formSubmitted: false,
            }
        },
        created() {
            this.products = this.currentStudy.products;
            this.increase_rates = this.currentStudy.increase_rates;
            this.productId = this.currentStudy.productId;
            this.studyStatus = this.currentStudy.studyStatus;
        },
        methods: {
            createThirdStep(par = true) {
                this.$validator.validateAll();
                if (!this.errors.any()) {
                    this.$http.post(window.hostname + '/api/products/add-product', {
                        products: this.products,
                        sid: this.studyStatus.study_id
                    }).then(function (respone) {
                        this.products_completed.push(respone.data.product);
                    });
                    this.$http.post(window.hostname + '/api/increase_rates/add-increase-rate', {
                        increase_rates: this.increase_rates,
                        sid: this.studyStatus.study_id,
                    }).then(function (respone) {
                        console.log(respone);
                    });
                    //Study status
                    if (this.products[0].title && this.products[0].production &&  this.products[0].price) {
                        this.studyStatus.step_three = 1;
                    } else {
                        this.studyStatus.step_three = 0;
                    }
                    if(
                        this.studyStatus.step_one === 1 &&
                        this.studyStatus.step_two === 1 &&
                        this.studyStatus.step_three === 1 &&
                        this.studyStatus.step_four === 1 &&
                        this.studyStatus.step_five === 1 &&
                        this.studyStatus.step_six === 1
                    ) {
                        this.studyStatus.is_completed = 1;
                    }else {
                        this.studyStatus.is_completed = 0;
                    }
                    this.$http.post(window.hostname + '/api/studies/status', {
                        sid: this.studyStatus.study_id,
                        study_status: this.studyStatus
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
        },
        submitForm(){
            this.formSubmitted = true
        }
    }
</script>