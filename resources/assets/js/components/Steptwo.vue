<template>
    <div class="container page-content">
        <!-- Steps -->
        <div class="steps">
            <div v-bind:class="[study_status.step_one==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createSecondStep(false)" :to="{ name: 'Stepone' }">
                    <span>بيانات المشروع</span></router-link>
            </div>
            <div v-bind:class="[study_status.step_two==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createSecondStep(false)" to="/step-2"><span>بيانات السوق</span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_three==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createSecondStep(false)" to="/step-3"><span>الطاقه الانتاجيه</span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_four==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createSecondStep(false)" to="/step-4"><span>رأس المال الثابت</span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_five==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createSecondStep(false)" to="/step-5"><span> تكاليف التشغيل </span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_five==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createSecondStep(false)" to="/step-6"><span> الاستثمار والتمويل  </span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.is_completed==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <button style="background: none;border: none" @click="createSixStep(false)"><span>التقرير</span>
                </button>
            </div>
        </div>
        <!-- // Steps -->

        <div class="row cols-gutter-20">
            <form class="form-ui row" @submit.prevent="createSecondStep()">
                <!-- Form Area -->
                <div class="col-s-12 col-m-8 col-l-9 clear-after">
                    <div class="content-box">
                        <h2 class="head"> <button type="button" @click="addSector" class="add-button ti-plus-io">
                        </button> القطاعات المستهدفه</h2>
                        <h1></h1>
                        <div class="col-s-12">
                            <div class="clone-area">
                                <!-- clone item -->
                                <div class="clone-item">
                                    <div class="row" v-for="(sector,index) in sectors">
                                        <div class="col-s-12">
                                            <input type="text" v-model="sector.title" name="sectors[]"
                                                   placeholder="اسم القطاع">
                                        </div>
                                        <button type="button" @click="removeSector" :data-index="index"
                                                class="remove-button ti-trash-b-io">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-box">
                        <h2 class="head"><button type="button" @click="addCompetitors" class="add-button ti-plus-io">
                        </button>أهم المنافسين </h2>
                        <!-- Area Titles -->
                        <div class="clone-area">
                            <div class="row clone-item">
                                <div class="col-s-12 col-m-6 col-l-4 title">اسم المنافس</div>
                                <div class="col-s-12 col-m-6 col-l-4 title">المنتجات التى يقدمها</div>
                                <div class="col-s-12 col-m-6 col-l-4 title">المكان</div>
                            </div>
                        </div>
                        <!-- // Area Titles -->
                        <div class="clone-area">
                            <!-- clone item -->
                            <div class="clone-item">
                                <div class="row" v-for="(competitor,index) in competitors">
                                    <div class="col-s-12 col-m-6 col-l-4">
                                        <input v-model="competitor.title" value="" type="text"
                                               placeholder="اسم المنافس">
                                    </div>
                                    <div class="col-s-12 col-m-6 col-l-4">
                                        <input v-model="competitor.product" type="text"
                                               placeholder="المنتجات التى يقدمها">
                                    </div>
                                    <div class="col-s-12 col-m-6 col-l-4">
                                        <input v-model="competitor.place" type="text" placeholder="المكان">
                                    </div>
                                    <button type="button" @click="removeCompetitors" :data-index="index"
                                            class="remove-button ti-trash-b-io">
                                    </button>
                                </div>
                                <!--<a href="#" class="remove-item ti-trash-b-io"></a>-->
                            </div>
                        </div>
                    </div>

                    <div class="content-box">
                        <h2 class="head"> <button type="button" @click="addMarketing" class="add-button ti-plus-io">
                        </button> طرق الترويج</h2>
                        <div class="col-s-12">
                            <div class="clone-area">
                                <!-- clone item -->
                                <div class="clone-item">
                                    <div class="row" v-for="(marketing,index) in marketings">
                                        <div class="col-s-12">
                                            <input v-model="marketing.title" value="" type="text"
                                                   placeholder="طريقه الترويج">
                                        </div>
                                        <button type="button" @click="removeMarketing" :data-index="index"
                                                class="remove-button ti-trash-b-io">
                                        </button>
                                    </div>
                                </div>
                                <!-- // clone item -->

                            </div>
                        </div>
                    </div>

                    <div class="content-box">
                        <h2 class="head"><button type="button" @click="addFourAnalyze" class="add-button ti-plus-io">
                        </button> التحليل الرباعي</h2>
                        <div class="clone-area">
                            <!-- clone item -->
                            <div class="clone-item">
                                <div class="row" v-for="(fourAnalyze,index) in fourAnalyzes">
                                    <div class="col-s-12 col-m-6">
                                        <div class="clone-area">
                                            <!-- clone item -->
                                            <div class="clone-item">
                                                <div class="row">
                                                    <div class="col-s-12">
                                                        <input v-model="fourAnalyze.power" value="" type="text"
                                                               placeholder="نقاط القوة"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-s-12 col-m-6">
                                        <div class="clone-area">
                                            <!-- clone item -->
                                            <div class="clone-item">
                                                <div class="row">
                                                    <div class="col-s-12">
                                                        <input v-model="fourAnalyze.athreat" type="text"
                                                               placeholder="نقاط التهديد"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-s-12 col-m-6">
                                        <div class="clone-area">
                                            <!-- clone item -->
                                            <div class="clone-item">
                                                <div class="row">
                                                    <div class="col-s-12"><input v-model="fourAnalyze.chance"
                                                                                 type="text" placeholder="الفرص"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-s-12 col-m-6">
                                        <div class="clone-area">
                                            <!-- clone item -->
                                            <div class="clone-item">
                                                <div class="row">
                                                    <div class="col-s-12"><input v-model="fourAnalyze.challenge"
                                                                                 type="text" placeholder="التحديات">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" @click="removeFourAnalyze" :data-index="index"
                                            class="remove-button ti-trash-b-io">
                                    </button>

                                </div>

                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="studyId" value="" name="studyId" v-model="studyId"/>
                    <router-link v-on:click.native="createSecondStep(false)" :to="{ name: 'Stepone' }"
                                 class="btn round-corner right prev-btn">الخطوة السابقه
                    </router-link>
                    <button class="btn secondary round-corner left next-btn" type="submit">الخطوة التالية</button>
                </div>
                <!-- // Form Area -->

                <!-- Description Area -->
                <div class="col-s-12 col-m-4 col-l-3 clear-after">
                    <div class="describe-box">
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                        <a href="#" class="more" target="_blank">قراء المزيد</a>
                    </div>

                    <div class="describe-box">
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                        <a href="#" class="more" target="_blank">قراء المزيد</a>
                    </div>

                    <div class="describe-box">
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                        <a href="#" class="more" target="_blank">قراء المزيد</a>
                    </div>

                    <div class="describe-box">
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                        <a href="#" class="more" target="_blank">قراء المزيد</a>
                    </div>
                </div>
                <!-- // Description Area -->
            </form>
        </div>
    </div>
</template>
<script>
    import Vue from 'vue'
    import VeeValidate from 'vee-validate';
    Vue.use(VeeValidate);

    export default {
        //dependencies: ["screenWidth"],
        props: ['index', 'value', 'listKey', 'title'],
        data() {
            return {
                //step: 'step-two',
                sectors: [{title: null}],
                marketings: [{title: null}],
                competitors: [{title: null, product: null, place: null}],
                fourAnalyzes: [{power: null, athreat: null, chance: null, challenge: null}],
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
                studyId: 0,
            }

        },
        created() {
            this.fireEvent()
        }
        , methods: {
            createSecondStep(par = true) {
                this.$http.post(window.hostname + '/api/study-sectors/add-study-sector', {
                    sectors: this.sectors,
                    sid: this.studyId
                }).then(function (respone) {
                    console.log(respone);
                });
                this.$http.post(window.hostname + '/api/study-competitors/add-competitor', {
                    competitors: this.competitors,
                    sid: this.studyId
                }).then(function (respone) {
                    console.log(respone);
                });
                this.$http.post(window.hostname + '/api/study-marketing/add-study-marketing', {
                    marketings: this.marketings,
                    sid: this.studyId
                }).then(function (respone) {
                    console.log(respone);
                });
                this.$http.post(window.hostname + '/api/study-four-analyzes/add-study-four-analyzes', {
                    fourAnalyzes: this.fourAnalyzes,
                    sid: this.studyId
                }).then(function (respone) {
                    console.log(respone);
                });
                this.addStudyStatus();
                //this.$router.push('/step-3');
                //console.log(par)
                if (par == true) {
                    window.location.hash = "/step-3";
                }
            },
            getAllData(){
                this.$http.get(window.hostname + '/api/study-sectors/' + this.studyId).then(function (response) {
                    //console.log(response.sectors);
                    if (response.data.returnSectors) {
                        this.sectors = response.data.returnSectors
                    }
                    let sectors_swap = [];
                    sectors_swap = Object.keys(response.data.returnSectors).map(function (key) {
                        return response.data.returnSectors[key];
                    });
                    this.sectors = sectors_swap;
                });
                this.$http.get(window.hostname + '/api/study-competitors/' + this.studyId).then(function (response) {
                    if (response.data.competitors) {
                        this.competitors = response.data.competitors
                    }
                    let competitors_swap = [];
                    competitors_swap = Object.keys(response.data.competitors).map(function (key) {
                        return response.data.competitors[key];
                    });
                    this.competitors = competitors_swap;
                });
                this.$http.get(window.hostname + '/api/study-marketing/' + this.studyId).then(function (response) {
                    if (response.data.marketings) {
                        this.marketings = response.data.marketings
                    }
                    let marketing_swap = [];
                    marketing_swap = Object.keys(response.data.marketings).map(function (key) {
                        return response.data.marketings[key];
                    });
                    this.marketings = marketing_swap;
                });
                this.$http.get(window.hostname + '/api/study-four-analyzes/' + this.studyId).then(function (response) {
                    if (response.data.fourAnalyzes) {
                        this.fourAnalyzes = response.data.fourAnalyzes
                    }
                    let fourAnalyzes_swap = [];
                    fourAnalyzes_swap = Object.keys(response.data.fourAnalyzes).map(function (key) {
                        return response.data.fourAnalyzes[key];
                    });
                    this.fourAnalyzes = fourAnalyzes_swap;
                });
            },
            addStudyStatus(){
                //Study status
                if (
                    this.sectors[0].title &&
                    this.competitors[0].title &&
                    this.marketings[0].title &&
                    this.fourAnalyzes[0].power &&
                    this.fourAnalyzes[0].athreat &&
                    this.fourAnalyzes[0].chance &&
                    this.fourAnalyzes[0].challenge
                ) {
                    this.study_status.step_two = 1;
                } else {
                    this.study_status.step_two = 0;
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
            }
            ,
            addSector: function () {
                this.sectors.push({title: null});
            },
            removeSector(e){
                var index = e.target.getAttribute('data-index');
                this.sectors.splice(index, 1);
            },
            addCompetitors: function () {
                this.competitors.push({title: null, product: null, place: null});
            },
            removeCompetitors(e){
                var index = e.target.getAttribute('data-index');
                this.competitors.splice(index, 1);
            },
            addMarketing: function () {
                this.marketings.push({title: null});
            },
            removeMarketing(e){
                var index = e.target.getAttribute('data-index');
                this.marketings.splice(index, 1);
            },
            addFourAnalyze: function () {
                this.fourAnalyzes.push({power: null, athreat: null, chance: null, challenge: null});
            },
            removeFourAnalyze(e){
                var index = e.target.getAttribute('data-index');
                this.fourAnalyzes.splice(index, 1);
            }
            , fireEvent(){
                this.$http.get(window.hostname + '/ar/get-id').then(function (response) {
                    //this.info.user_id = response.data.user_id
                    this.$http.get(window.hostname + '/api/studies/study-by-user-id/' + response.data.user_id).then(function (response) {
                        this.studyId = response.data.study.id
                        //get all data
                        this.getAllData();
                        this.$http.get(window.hostname + '/api/studies/status/' + this.studyId).then(function (response) {
                            this.study_status=response.data.study_status;
                            console.log(response)
                        });
                    });
                });
            },
        }
    }
</script>