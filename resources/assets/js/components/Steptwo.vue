<template>
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
                                    <div class="row" v-for="(sector,index) in sectors" :key="index">
                                        <div class="col-s-12">
                                            <input type="text" v-validate="'required'"
                                    :class="{'input': true, 'is-danger': errors.has('sectors[]') }" v-model="sector.title" name="sectors[]"
                                                   placeholder="اسم القطاع">
                                                   
                                
                                        </div>
                                        <button type="button" @click="removeSector" :data-index="index"
                                                class="remove-button ti-trash-b-io">
                                        </button>
                                    </div>
                                    <span style="color:red;" v-show="errors.has('sectors[]')" class="help is-danger"> غير مسموح بوجود حقل فارغ !</span>
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
                                <div class="row" v-for="(competitor,index) in competitors" :key="index">
                                    <div class="col-s-12 col-m-6 col-l-4">
                                        <input name="competitor" v-model="competitor.title" value="" type="text"
                                               placeholder="اسم المنافس" v-validate="'required'"
                                    :class="{'input': true, 'is-danger': errors.has('competitor') }" >
                                    </div>
                                    <div class="col-s-12 col-m-6 col-l-4">
                                        <input name="competitor" v-model="competitor.product" type="text"
                                               placeholder="المنتجات التى يقدمها"  v-validate="'required'"
                                    :class="{'input': true, 'is-danger': errors.has('competitor') }" >
                                    </div>
                                    <div class="col-s-12 col-m-6 col-l-4">
                                        <input name="competitor" v-model="competitor.place" type="text" placeholder="المكان"  v-validate="'required'"
                                    :class="{'input': true, 'is-danger': errors.has('competitor')}">
                                    </div>
                                    <button type="button" @click="removeCompetitors" :data-index="index"
                                            class="remove-button ti-trash-b-io">
                                    </button>
                                </div>
                                <span style="color:red;" v-show="errors.has('competitor')" class="help is-danger"> غير مسموح بوجود حقل فارغ !</span>

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
                                    <div class="row" v-for="(marketing,index) in marketings" :key="index">
                                        <div class="col-s-12">
                                            <input name="marketing" v-model="marketing.title" value="" type="text"
                                                   placeholder="طريقه الترويج" v-validate="'required'"
                                    :class="{'input': true, 'is-danger': errors.has('marketing') }">
                                        </div>
                                        <button type="button" @click="removeMarketing" :data-index="index"
                                                class="remove-button ti-trash-b-io">
                                        </button>
                                    </div>
                                    <span style="color:red;" v-show="errors.has('marketing')" class="help is-danger"> غير مسموح بوجود حقل فارغ !</span>

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
                                <div class="row" v-for="(fourAnalyze,index) in fourAnalyzes" :key="index">
                                    <div class="col-s-12 col-m-6">
                                        <div class="clone-area">
                                            <!-- clone item -->
                                            <div class="clone-item">
                                                <div class="row">
                                                    <div class="col-s-12">
                                                        <input name="four_analyze" v-model="fourAnalyze.power" value="" type="text"
                                                               placeholder="نقاط القوة" v-validate="'required'"
                                    :class="{'input': true, 'is-danger': errors.has('four_analyze') }"></div>
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
                                                        <input name="four_analyze" v-model="fourAnalyze.athreat" type="text"
                                                               placeholder="نقاط التهديد" v-validate="'required'"
                                    :class="{'input': true, 'is-danger': errors.has('four_analyze') }"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-s-12 col-m-6">
                                        <div class="clone-area">
                                            <!-- clone item -->
                                            <div class="clone-item">
                                                <div class="row">
                                                    <div class="col-s-12"><input name="four_analyze" v-model="fourAnalyze.chance"
                                                                                 type="text" placeholder="الفرص" v-validate="'required'"
                                    :class="{'input': true, 'is-danger': errors.has('four_analyze') }"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-s-12 col-m-6">
                                        <div class="clone-area">
                                            <!-- clone item -->
                                            <div class="clone-item">
                                                <div class="row">
                                                    <div class="col-s-12"><input name="four_analyze" v-model="fourAnalyze.challenge"
                                                                                 type="text" placeholder="التحديات" v-validate="'required'"
                                    :class="{'input': true, 'is-danger': errors.has('four_analyze') }">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" @click="removeFourAnalyze" :data-index="index"
                                            class="remove-button ti-trash-b-io">
                                    </button>

                                </div>
                                <span style="color:red;" v-show="errors.has('four_analyze')" class="help is-danger"> غير مسموح بوجود حقل فارغ !</span>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="studyId" value="" name="studyId" v-model="studyStatus.study_id"/>
                    <router-link :to="{ name: 'Stepone' }"
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
</template>
<script>
    export default {
        props: ['currentStudy', 'userId'],
        data() {
            return {
                //step: 'step-two',
                sectors: [],
                marketings: [],
                competitors: [],
                fourAnalyzes: [],
                studyStatus: []
            }

        },
        created() {
            this.studyStatus = this.currentStudy.studyStatus;
            this.sectors = this.currentStudy.sectors;
            this.marketings = this.currentStudy.marketings;
            this.competitors = this.currentStudy.competitors;
            this.fourAnalyzes = this.currentStudy.fourAnalyzes;
        },
        methods: {
            createSecondStep(par = true) {
                this.$validator.validateAll();
                if (!this.errors.any()) {
                    this.$http.post(window.hostname + '/api/study-sectors/add-study-sector', {
                        sectors: this.sectors,
                        sid: this.studyStatus.study_id
                    }).then(function (respone) {
                        console.log(respone);
                    });

                    this.$http.post(window.hostname + '/api/study-competitors/add-competitor', {
                        competitors: this.competitors,
                        sid: this.studyStatus.study_id
                    }).then(function (respone) {
                        console.log(respone);
                    });
                    this.$http.post(window.hostname + '/api/study-marketing/add-study-marketing', {
                        marketings: this.marketings,
                        sid: this.studyStatus.study_id
                    }).then(function (respone) {
                        console.log(respone);
                    });
                    this.$http.post(window.hostname + '/api/study-four-analyzes/add-study-four-analyzes', {
                        fourAnalyzes: this.fourAnalyzes,
                        sid: this.studyStatus.study_id
                    }).then(function (respone) {
                        console.log(respone);
                    });
                    this.addStudyStatus();
                    if (par == true) {
                        window.location.hash = "/step-3";
                    }
                }
                
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
                    this.studyStatus.step_two = 1;
                } else {
                    this.studyStatus.step_two = 0;
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
        }
    }
</script>