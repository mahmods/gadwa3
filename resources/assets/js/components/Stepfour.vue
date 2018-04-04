<template>
    <div class="container page-content">
        <!-- Steps -->
        <div class="steps">
            <div v-bind:class="[study_status.step_one==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createFourthStep(false)" :to="{ name: 'Stepone' }"><span>بيانات المشروع</span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_two==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createFourthStep(false)" to="/step-2"><span>بيانات السوق</span></router-link>
            </div>
            <div v-bind:class="[study_status.step_three==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createFourthStep(false)" to="/step-3"><span>الطاقه الانتاجيه</span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_four==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createFourthStep(false)" to="/step-4"><span>رأس المال الثابت</span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_five==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createFourthStep(false)" to="/step-5"><span> تكاليف التشغيل </span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_five==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createFourthStep(false)" to="/step-6"><span> الاستثمار والتمويل  </span>
            </router-link>
            </div>
            <div v-bind:class="[study_status.is_completed==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <button style="background: none;border: none" @click="createSixStep(false)"><span>التقرير</span></button>
            </div>
        </div>
        <!-- // Steps -->
        <form @submit.prevent="createFourthStep()" class="form-ui">
        <div class="row cols-gutter-20">
            <!-- Form Area -->
            <div v-for="deprecation in deprecations" class="col-s-12 col-m-8 col-l-9 clear-after">
                <div class="content-box">
                    <h2 class="head">{{deprecation.title}} <button type="button" @click="addAsset(deprecation.id)" class="add-button ti-plus-io">
                    </button></h2>
                    <div class="form-ui">
                        <!-- Area Titles -->
                        <div class="clone-area">
                            <div class="row clone-item">
                                <div v-show="deprecation.id != 1"  v-bind:class="[deprecation.id==5 ? 'col-s-12 col-m-6 title' : 'col-s-12 col-m-4 title']">بيان</div>
                                <div v-show="deprecation.id == 1 || deprecation.id==2" v-bind:class="[deprecation.id==1 ? 'col-s-12 col-m-6 title' : 'col-s-12 col-m-4 title']">المساحة /م2</div>
                                <div v-show="deprecation.id == 3 || deprecation.id==4 || deprecation.id==6" class="col-s-12 col-m-4 title">العدد</div>
                                <div v-bind:class="[deprecation.id==1 || deprecation.id==5 ? 'col-s-12 col-m-6 title' : 'col-s-12 col-m-4 title']">التكلفة</div>
                            </div>
                        </div>
                        <!-- // Area Titles -->
                        <div class="clone-area">
                            <div class="clone-item">
                                <div v-if="asset.deprecation_id==deprecation.id" class="row" v-for="(asset,index) in assets">
                                    <div v-show="deprecation.id != 1" v-bind:class="[deprecation.id==5 ? 'col-s-12 col-m-6' : 'col-s-12 col-m-4']">
                                        <input name="assets[]" v-model="asset.title"  type="text" placeholder="بيان">
                                    </div>
                                    <div v-show="deprecation.id == 1 || deprecation.id==2"  v-bind:class="[deprecation.id==1 ? 'col-s-12 col-m-6' : 'col-s-12 col-m-4']">
                                        <input name="assets[]" v-model="asset.space"  type="text" placeholder="مساحة الارض">
                                    </div>
                                    <div v-show="deprecation.id == 3 || deprecation.id==4 || deprecation.id==6" class="col-s-12 col-m-4">
                                        <input name="assets[]" v-model="asset.count"  type="text" placeholder="العدد">
                                    </div>
                                    <div v-bind:class="[deprecation.id==1 || deprecation.id==5 ? 'col-s-12 col-m-6' : 'col-s-12 col-m-4']">
                                        <input name="assets[]" v-model="asset.value" type="text" placeholder="التكلفة">
                                    </div>
                                    <button type="button" @click="removeAsset(asset.id,index)"  :data-index="index"  class="remove-button ti-trash-b-io">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Form Area -->

            <!-- Description Area -->
            <div class="col-s-12 col-m-4 col-l-3 clear-after">
                <div class="describe-box">
                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                    <a href="#" class="more" target="_blank">قراء المزيد</a>
                </div>
            </div>
            <!-- // Description Area -->

            <!-- buttons -->
            <div class="col-s-12 col-m-8 col-l-9 clear-after">
                <input type="hidden" id="studyId" value="" name="studyId" v-model="studyId"/>
                <router-link v-on:click.native="createFourthStep(false)" to="/step-3" class="btn round-corner right prev-btn">الخطوة السابقه</router-link>
                <button class="btn secondary round-corner left next-btn" type="submit">الخطوة التالية</button>
            </div>
            <!-- // buttons -->
        </div>
        </form>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                assets_completed: [],
                deprecations: [],
                assets:[
                    {title:'',value:null,space:null,count:null,deprecation_id:1},
                    {title:'',value:null,space:null,count:null,deprecation_id:2},
                    {title:'',value:null,space:null,count:null,deprecation_id:3},
                    {title:'',value:null,space:null,count:null,deprecation_id:4},
                    {title:'',value:null,space:null,count:null,deprecation_id:5},
                    {title:'',value:null,space:null,count:null,deprecation_id:6}
                ],
                studyId:0,
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
            this.getDeprecations();
            this.fireEvent();
        },
        methods: {
            createFourthStep(par=true) {
                this.$http.post(window.hostname +'/api/study-assets/add-asset',
                    {
                        assets:this.assets,
                        sid:this.studyId})
                    .then(function(respone){
                    //console.log(respone);
                });
                //Study status
                if (this.assets_completed.length>=6) {
                    this.study_status.step_four = 1;
                } else {
                    this.study_status.step_four = 0;
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
                //this.$router.push('/step-5');
                if(par==true) {
                    window.location.hash = "/step-5";
                }
            }
            ,
            getDeprecations() {
                this.$http.get(window.hostname + '/api/deprecations').then(function (response) {
                    this.deprecations = response.data.deprecations
                });
            },
            addAsset: function (id) {
                this.assets.push(
                    {title:'',value:null,space:null,count:null,deprecation_id:id}
                );
            },
            removeAsset(asset_id,index){
                this.$http.delete(window.hostname + '/api/study-assets/asset/' + asset_id).then(function (response) {
                    this.assets.splice(index, 1);
                });
            },
            fireEvent(){
                this.$http.get(window.hostname + '/ar/get-id').then(function (response) {
                    //this.info.user_id = response.data.user_id
                    this.$http.get(window.hostname +'/api/studies/study-by-user-id/'+response.data.user_id).then(function (response) {
                        this.studyId = response.data.study.id;
                        console.log(this.studyId);
                        this.$http.get(window.hostname + '/api/study-assets/'+this.studyId).then(function (response) {
                            //console.log(response.sectors);
                            if(response.data.assets) {
                                this.assets=response.data.assets;
                            }
                            let assets_swap=[];
                            assets_swap = Object.keys(response.data.assets).map(function(key) {
                                return response.data.assets[key];
                            });
                            this.assets_completed=assets_swap;
                            this.assets=assets_swap;

                        });
                        this.$http.get(window.hostname + '/api/studies/status/' + this.studyId).then(function (response) {
                            this.study_status=response.data.study_status;
                            console.log(response)
                        });
                    });
                });
            }
        }
    }
</script>