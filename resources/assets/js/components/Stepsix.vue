<template>
    <form @submit.prevent="createSixStep()" class="form-ui">
        <div class="row cols-gutter-20">
            <!-- Form Area -->
            <div class="col-s-12 col-m-8 col-l-9 clear-after">
                <div class="content-box">
                    <h2 class="head">الاستثمار والتمويل</h2>

                    <div class="row clone-item">
                        <div class="col-s-12 col-m-4 title">التكلفه الاستثماريه الثابته</div>
                        <div class="col-s-12 col-m-8 title">القيمة</div>
                    </div>

                    <div class="row">
                        <div class="col-s-12 col-m-4"><span class="input-tit"> تكاليف الارض </span></div>
                        <div class="col-s-12 col-m-8">{{ this.asset1 }}</div>
                        <div class="col-s-12 col-m-4"><span class="input-tit"> تكاليف المباني والانشاءات </span>
                        </div>
                        <div class="col-s-12 col-m-8">{{ this.asset2 }}</div>
                        <div class="col-s-12 col-m-4"><span class="input-tit"> تكاليف الالات والمعدات </span></div>
                        <div class="col-s-12 col-m-8">{{ this.asset3 }}</div>
                        <div class="col-s-12 col-m-4"><span class="input-tit"> تكاليف السيارات </span></div>
                        <div class="col-s-12 col-m-8">{{ this.asset4 }}</div>
                        <div class="col-s-12 col-m-4"><span class="input-tit"> مصروفات التأسيس </span></div>
                        <div class="col-s-12 col-m-8">{{ this.asset5 }}</div>
                        <div class="col-s-12 col-m-4"><span class="input-tit"> تكاليف الاثاث والتجهيزات </span></div>
                        <div class="col-s-12 col-m-8">{{ this.asset6 }}</div>
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
                    <h2 class="head">رأس المال العامل</h2>

                    <div class="row clone-item">
                        <div class="col-s-12 title">مدة رأس المال العامل</div>
                        <div class="col-s-12">
                            <select data-selected="selectedOption"  name="working_capital_months" v-model="info.working_capital_months" @change="workingCapital" dir="rtl" class="">
                                <option value="1">شهر</option>
                                <option value="2">شهرين</option>
                                <option value="3">3 اشهر</option>
                                <option value="4">4 اشهر</option>
                                <option value="5">5 اشهر</option>
                                <option value="6">6 اشهر</option>
                            </select>
                        </div>
                    </div>
                    <div class="row clone-item">
                        <div class="col-s-12 col-m-4 title">رأس المال العامل</div>
                        <div class="col-s-12 col-m-4 title">القيمة / ريال</div>
                        <div class="col-s-12 col-m-4 title">رأس المال العامل</div>
                    </div>
                    <div v-for="capital in working_capital" class="row">
                        <div class="col-s-12 col-m-4"><span class="input-tit">{{capital.title}}</span>
                        </div>
                        <div class="col-s-12 col-m-4">{{capital.cost}}</div>
                        <div class="col-s-12 col-m-4">{{(capital.cost* info.working_capital_months) /12 }}</div>
                        <input v-model="total_capital" type="hidden" :value="(capital.cost*info.working_capital_months)/12"/>
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
                    <h2 class="head">اجمالي الاستثمار</h2>
                    <div class="row clone-item">
                        <div class="col-s-12 col-m-4 title">رأس المال المستثمر</div>
                        <div class="col-s-12 col-m-8 title">القيمة</div>
                    </div>
                    <div class="row">
                        <div class="col-s-12 col-m-4"><span class="input-tit"> رأس المال الثابت </span></div>

                        <div class="col-s-12 col-m-8">
                            <div placeholder="القيمة">{{ this.total_cost }} </div>
                        </div>
                        <div class="col-s-12 col-m-4"><span class="input-tit"> رأس المال العامل </span></div>
                        <div class="col-s-12 col-m-8">
                            <div placeholder="القيمة">{{ this.total_capital }} </div>
                        </div>
                        <div class="col-s-12 col-m-4"><span class="input-tit"> رأس المال المستثمر </span></div>
                        <div class="col-s-12 col-m-8">
                            <div placeholder="القيمة">{{ this.all_total }} </div>
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
                    <h2 class="head">مصادر التمويل</h2>
                    <div class="row clone-item">
                        <div class="col-s-12 col-m-4 title">نوع التمويل</div>
                        <div class="col-s-12 col-m-8 title">النسبه</div>
                    </div>
                    <div class="row" v-for="financeInvestment in financeInvestments">
                        <div class="col-s-12 col-m-4"><span class="input-tit"> تمويل ذاتي </span></div>
                        <div class="col-s-12 col-m-8">
                            <p :class="{ 'control': true }">
                            <input v-model="financeInvestment.personal_investment" name="personal_investment[]" type="text"
                                    v-validate="'required|decimal|max_value:100'"
                                    :class="{'input': true, 'is-danger': errors.has('personal_investment') }" placeholder="النسبه">
                                <span v-show="errors.has('personal_investment')" class="help is-danger">{{ errors.first('personal_investment')
                                    }}</span>
                            </p>
                        </div>
                        <div class="col-s-12 col-m-4"><span class="input-tit"> القرض </span></div>
                        <div class="col-s-12 col-m-8">
                            <input :value="100-financeInvestment.personal_investment" type="text"
                                                                placeholder="النسبه" readonly>
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
                <input type="hidden" id="studyId" value="" name="sid" v-model="studyId"/>
                <router-link  to="/step-5"
                                class="btn round-corner right prev-btn">الخطوة السابقه
                </router-link>
                <button class="btn secondary round-corner left next-btn" type="submit">التقرير  </button>
            </div>
            <!-- // buttons -->
        </div>
    </form>
</template>
<script>
    export default {
        data() {
            return {
                studyId: 0,
                asset1: 0,
                asset2: 0,
                asset3: 0,
                asset4: 0,
                asset5: 0,
                asset6: 0,
                capital: 0,
                raw_materials: 0,
                working_capital: [],
                //working_capital_months: 0,
                total_cost: 0,
                total_capital: 0,
                all_total: 0,
                financeInvestments: [{personal_investment: 0,loan:0}],
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
            }
        },
        created() {
            this.fireEvent();
        },
        methods: {
            createSixStep(par=true){
                this.$http.post(window.hostname + '/api/study-finance-investments/add', {
                    financeInvestments: this.financeInvestments,
                    sid: this.studyId
                }).then(function (respone) {
                    //console.log(respone);
                });
                this.$http.post(window.hostname + '/api/studies/add-study', this.info);
                //this.$router.go('/home/study');
                //Study status
                this.study_status.step_six = 1;
                if(
                    this.study_status.step_one === 1 &&
                    this.study_status.step_two === 1 &&
                    this.study_status.step_three === 1 &&
                    this.study_status.step_four === 1 &&
                    this.study_status.step_five === 1
                ) {
                    this.study_status.is_completed = 1;
                }else {
                    this.study_status.is_completed = 0;
                }
                this.$http.post(window.hostname + '/api/studies/status', {
                    sid: this.studyId,
                    study_status: this.study_status
                });
                window.location.href = './../study-view/' + this.info.studyId;
            },
             fireEvent(){
                let list1 = 0;
                let list2 = 0;
                let list3 = 0;
                let list4 = 0;
                let list5 = 0;
                let list6 = 0;
                this.$http.get(window.hostname + '/ar/get-id').then(function (response) {
                    //this.info.user_id = response.data.user_id
                    this.$http.get(window.hostname + '/api/studies/study-by-user-id/' + response.data.user_id).then(function (response) {
                        this.studyId = response.data.study.id;
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
                        this.$http.get(window.hostname + '/api/study-assets/' + this.studyId).then(function (response) {
                            if (response.data.assets) {
                                for (let key in response.data.assets)
                                {
                                    if (response.data.assets[key].deprecation_id == 1) {
                                        list1 += response.data.assets[key].value * response.data.assets[key].space
                                    }
                                    if (response.data.assets[key].deprecation_id == 2) {
                                        list2 += response.data.assets[key].value * response.data.assets[key].space
                                    }
                                    if (response.data.assets[key].deprecation_id == 3) {
                                        list3 += response.data.assets[key].value * response.data.assets[key].count
                                    }
                                    if (response.data.assets[key].deprecation_id == 4) {
                                        list4 += response.data.assets[key].value * response.data.assets[key].count
                                    }
                                    if (response.data.assets[key].deprecation_id == 5) {
                                        list5 += response.data.assets[key].value
                                    }
                                    if (response.data.assets[key].deprecation_id == 6) {
                                        list6 += response.data.assets[key].value * response.data.assets[key].count
                                    }
                                }
                                this.asset1 = list1;
                                this.asset2 = list2;
                                this.asset3 = list3;
                                this.asset4 = list4;
                                this.asset5 = list5;
                                this.asset6 = list6;
                                this.total_cost = list1 + list2 + list3 + list4 + list5 + list6;
                            }
                        });
                        this.$http.get(window.hostname + '/api/study-raw-materials/' + this.studyId).then(function (response) {
                            let total_raw_materials=0;
                            for  (let key  in response.data.raw_materials) {
                                total_raw_materials+=(response.data.raw_materials[key].price*response.data.raw_materials[key].production)*12;
                            }
                            this.raw_materials=total_raw_materials;
                            this.workingCapital();
                            console.log(total_raw_materials)
                        });
                        this.$http.get(window.hostname + '/api/study-finance-investments/' + this.studyId).then(function (response) {
                            if (response.data.financeInvestment) {
                                this.financeInvestments = response.data.financeInvestment
                            }
                        });
                        this.$http.get(window.hostname + '/api/studies/status/' + this.studyId).then(function (response) {
                            this.study_status=response.data.study_status;
                            console.log(response)
                        });
                    });
                });
            },
            workingCapital() {
                let working_capital_months = this.info.working_capital_months;
                let study_id=this.info.studyId;
                this.$http.get(window.hostname + '/api/expense_categories/working-capital/'+study_id).then(function (response) {
                    this.working_capital = response.data.working_capital;
                    let sum_capital = 0;
                    let sum_total_cost = 0;
                    for(let key in response.data.working_capital){
                        if(working_capital_months>=1) {
                            sum_capital += response.data.working_capital[key].cost * (working_capital_months / 12);
                        }
                    }
                    this.total_capital = sum_capital+(this.raw_materials* (working_capital_months / 12));
                    //this.total_cost = sum_total_cost;
                    this.all_total = this.total_cost + this.total_capital;
                });
            }
        }
    }
</script>