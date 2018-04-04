<template id="step1-template">
    <div class="container page-content">
        <div class="steps">
            <div v-bind:class="[study_status.step_one==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link :to="{ name: 'Stepone' }"><span> بيانات المشروع</span></router-link>
            </div>
            <div v-bind:class="[study_status.step_two==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createStudy(false)" to="/step-2"><span>بيانات السوق</span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_three==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <a href="javascript:void"><span>الطاقه الانتاجيه</span>
                </a>
            </div>
            <div v-bind:class="[study_status.step_four==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <a href="javascript:void"><span>رأس المال الثابت</span>
                </a>
            </div>
            <div v-bind:class="[study_status.step_five==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <a href="javascript:void"><span> تكاليف التشغيل </span>
                </a>
            </div>
            <div v-bind:class="[study_status.step_five==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <a href="javascript:void"><span> الاستثمار والتمويل  </span>
                </a>
            </div>
            <div v-bind:class="[study_status.is_completed==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <a href="javascript:void"><span> التقرير   </span>
                </a>
            </div>

        </div>
        <div class="row">
            <div class="col-s-12 clear-after">
                <div class="content-box">
                    <h2 class="head"></h2>
                    <form method="post" @submit.prevent="createStudy()" v-if="!formSubmitted" class="form-ui row">
                        <div class="col-s-12 col-m-6">
                            <label>اسم المشروع</label>
                            <p :class="{ 'control': true }">
                                <input v-model="info.title" v-validate="'required'"
                                       :class="{'input': true, 'is-danger': errors.has('title') }" name="title"
                                       type="text" placeholder="اسم المشروع">
                                <span v-show="errors.has('title')" class="help is-danger">@{{ errors.first('title')
                                    }}</span>
                            </p>
                        </div>
                        <div class="col-s-12 col-m-6">
                            <label> البريد الالكترونى</label>
                            <p :class="{ 'control': true }">
                                <input v-model="info.email" v-validate="'required|email'"
                                       :class="{'input': true, 'is-danger': errors.has('email') }" name="email"
                                       type="text" placeholder="البريد الألكترونى">
                                <span v-show="errors.has('email')" class="help is-danger">@{{ errors.first('email')
                                    }}</span>
                            </p>
                        </div>
                        <div class="col-s-12 col-m-6">
                            <label> رقم الهاتف</label>
                            <p :class="{ 'control': true }">
                                <input v-model="info.phone" v-validate="'required|numeric'"
                                       :class="{'input': true, 'is-danger': errors.has('phone') }" name="phone"
                                       type="number" placeholder="رقم الهاتف">
                                <span v-show="errors.has('phone')" class="help is-danger">@{{ errors.first('phone')
                                    }}</span>
                            </p>
                        </div>
                        <div class="col-s-12 col-m-6">
                            <label>اختر الدوله</label>
                            <p :class="{ 'control': true }">
                            <select v-model="info.country_id" name="country_id" v-validate="'required'"
                                    :class="{'input': true, 'is-danger': errors.has('country_id') }">
                                <option v-for="c in this.countries" :value="c.id">{{c.title}}</option>
                            </select>
                            </p>
                            <!--<select class="select2" name="things" id="things" v-model="thing2" v-selecttwo="thing2">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>
                                <option value="5">Five</option>
                            </select>-->
                        </div>
                        <div class="col-s-12 col-m-6">
                            <label>موقع المشروع</label>
                            <p :class="{ 'control': true }">
                                <input v-model="info.location" v-validate="'required'"
                                       :class="{'input': true, 'is-danger': errors.has('location') }" name="location"
                                       type="text" placeholder="موقع المشروع">
                                <span v-show="errors.has('location')"
                                      class="help is-danger">@{{ errors.first('location')
                                    }}</span>
                            </p>
                        </div>
                        <div class="col-s-12 col-m-6">
                            <label>مساحة المشروع</label>
                            <p :class="{ 'control': true }">
                                <input v-model="info.space" v-validate="'required|decimal'"
                                       :class="{'input': true, 'is-danger': errors.has('space') }" name="space"
                                       type="text" placeholder="مساحة المشروع">
                                <span v-show="errors.has('space')" class="help is-danger">@{{ errors.first('space')
                                    }}</span>
                            </p>
                        </div>
                        <div class="col-s-12 col-m-6">
                            <label>اختر العملة</label>
                            <p :class="{ 'control': true }">
                            <select v-model="info.currency_id" name="currency_id" v-validate="'required'"
                                    :class="{'input': true, 'is-danger': errors.has('currency_id') }" >
                                <option v-for="currency in this.currencies" :value="currency.id">{{currency.symbol}}
                                </option>
                            </select>
                            </p>
                        </div>
                        <div class="col-s-12">
                            <label>اختر القطاع</label>
                            <p :class="{ 'control': true }">
                            <select v-model="info.sector_id" name="sector_id" v-validate="'required'"
                                    :class="{'input': true, 'is-danger': errors.has('sector_id') }" dir="rtl">
                                <option v-for="sector in this.sectors" :value="sector.id">{{sector.title}}</option>
                            </select>
                            </p>
                        </div>
                        <div class="col-s-12 col-m-12">
                            <label>وصف المشروع</label>
                            <p :class="{ 'control': true }">
                                <textarea v-validate="'required'" v-model="info.description"
                                          :class="{'input': true, 'is-danger': errors.has('description') }"
                                          name="description" placeholder="وصف المشروع"></textarea>
                                <span v-show="errors.has('description')"
                                      class="help is-danger">@{{ errors.first('description')
                                    }}</span>
                            </p>
                        </div>
                        <input type="hidden" id="userId" value="" name="userId" v-model="userId"/>
                        <input type="hidden" id="studyId" value="" name="studyId" v-model="info.studyId"/>
                        <button
                                class="btn secondary round-corner left next-btn" type="submit">الخطوة التالية
                        </button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</template>

<script>


    import Vue from 'vue'
    //import vSelect from "vue-select"
    import VeeValidate from 'vee-validate';
    Vue.use(VeeValidate);
    //Vue.use(vSelect);



    Vue.directive('selecttwo', {
        /*twoWay: true,
        bind: function () {
            $(this.el).select2()
                .on("select2:select", function(e) {
                    this.set($(this.el).val());
                }.bind(this));
        },
        update: function(nv, ov) {
            $(this.el).trigger("change");
        }*/
    });


    export default {
        //dependencies: ["screenWidth"],
        //components: {vSelect},
        data () {
            return {
                countries: [],
                currencies: [],
                sectors: [],
                options: [
                    { id: 1, text: 'Hello' },
                    { id: 2, text: 'World' }
                ],
                thing2: null,
                info: {
                    id: '',
                    title: '',
                    phone: '',
                    space: '',
                    working_capital_months: 0,
                    email: '',
                    location: '',
                    description: '',
                    user_id: '',
                    country_id: '',
                    city_id: '1',
                    currency_id: '',
                    sector_id: '',
                    studyId: 0,
                },
                study_status:
                    {
                        step_one: null,
                        step_two: null,
                        step_three: null,
                        step_four: null,
                        step_five: null,
                        step_six: null,
                        is_completed: null,
                        study_id:0
                    }
                ,
                formSubmitted: false,
                edit: false,
                userId: 0,
                fakeUsers: [],
                fakeUser: {id: ''},
                options: null
            };
        },
        created() {
            this.getUserId();
            this.getCountries();
            this.getCurrencies();
            this.getSectors();
            //this.showStudy();
        },
        methods: {
            log: function(str) {
                $('#log').append(str + "<br>");
            },
            getCountries() {
                this.$http.get(window.hostname + '/api/countries').then(function (response) {
                    this.countries = response.data
                });
            },
            getCurrencies() {
                this.$http.get(window.hostname + '/api/currencies').then(function (response) {
                    this.currencies = response.data
                });
            },
            getSectors() {
                this.$http.get(window.hostname + '/api/sectors').then(function (response) {
                    this.sectors = response.data
                });
            },
            getUserId() {
                this.$http.get(window.hostname + '/ar/get-id').then(function (response) {
                    this.info.user_id = response.data.user_id;
                    this.userId = response.data.user_id;
                    //this.fakeUser.id=response.data.user_id
                    //this.fakeUsers.push(this.fakeUser);
                    this.$http.get(window.hostname + '/api/studies/study-by-user-id/' + response.data.user_id).then(function (response) {
                        this.info.title = response.data.study.title;
                        this.info.phone = response.data.study.phone;
                        this.info.space = response.data.study.space;
                        this.info.email = response.data.study.email;
                        this.info.location = response.data.study.location;
                        this.info.description = response.data.study.description;
                        this.info.user_id = response.data.study.user_id;
                        this.info.country_id = response.data.study.country_id;
                        this.info.currency_id = response.data.study.currency_id;
                        this.info.sector_id = response.data.study.sector_id;
                        this.info.studyId = response.data.study.id;
                        this.info.working_capital_months = response.data.study.working_capital_months;
                        /*city_id: '1',*/
                        //study staus
                        this.$http.get(window.hostname + '/api/studies/status/' + this.info.studyId).then(function (response) {
                            this.study_status=response.data.study_status
                            console.log(response)
                        });

                        });
                });
            },
            createStudy(e) {
                this.$validator.validateAll();
                if (!this.errors.any()) {
                    //this.submitForm()
                    this.$http.post(window.hostname + '/api/studies/add-study', this.info);
                    //this.$router.go('/step-2');
                    //create study status
                    let info=this.info;
                    let info_swap=[];
                    info_swap = Object.keys(info).map(function(key) {
                        return info[key];
                    });
                    this.$http.post(window.hostname + '/api/studies/status',{sid:this.info.studyId,study_status:this.study_status});
                    if(
                        this.info.phone!=null
                        && this.info.space!=null
                        && this.info.email!=null
                        && this.info.location!=null
                        && this.info.user_id!=null
                        && this.info.country_id!=null
                        && this.info.currency_id!=null
                        && this.info.sector_id!=null
                    ){
                        this.study_status.step_one=1;
                    }else{
                        this.study_status.step_one=0;
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
                    this.$http.post(window.hostname + '/api/studies/status',{sid:this.info.studyId,study_status:this.study_status});
                    window.location.hash="/step-2";
                }
            },
            submitForm(){
                this.formSubmitted = true
            }
            /*,
             showStudy: function() {
             console.log('hihi');
             console.log('h:'+this.fakeUser.id);
             this.$http.get(window.hostname +'/api/studies/study-by-user-id').then(function (response) {
             console.log(response.data.study);
             this.info.title = response.data.study.title
             this.info.phone = response.data.study.phone
             });
             //this.$els.taskinput.focus()
             }*/
        }
    };
</script>

<style>
</style>