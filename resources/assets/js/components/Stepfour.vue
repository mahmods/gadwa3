<template>
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
                            <div v-if="asset.deprecation_id==deprecation.id" class="row" v-for="(asset,index) in assets" :key="index">
                                <div v-show="deprecation.id != 1" v-bind:class="[deprecation.id==5 ? 'col-s-12 col-m-6' : 'col-s-12 col-m-4']">
                                    <input name="assets[]" v-model="asset.title"  type="text" placeholder="بيان" v-validate="''" :class="{'input': true, 'is-danger': errors.has('assets[]') }">
                                </div>
                                <div v-show="deprecation.id == 1 || deprecation.id==2"  v-bind:class="[deprecation.id==1 ? 'col-s-12 col-m-6' : 'col-s-12 col-m-4']">
                                    <input name="assets[]" v-model="asset.space"  type="text" placeholder="مساحة الارض" v-validate="'decimal'" :class="{'input': true, 'is-danger': errors.has('assets[]') }">
                                </div>
                                <div v-show="deprecation.id == 3 || deprecation.id==4 || deprecation.id==6" class="col-s-12 col-m-4">
                                    <input name="assets[]" v-model="asset.count"  type="text" placeholder="العدد" v-validate="'numeric'" :class="{'input': true, 'is-danger': errors.has('assets[]') }">
                                </div>
                                <div v-bind:class="[deprecation.id==1 || deprecation.id==5 ? 'col-s-12 col-m-6' : 'col-s-12 col-m-4']">
                                    <input name="assets[]" v-model="asset.value" type="text" placeholder="التكلفة" v-validate="'required|decimal'" :class="{'input': true, 'is-danger': errors.has('assets[]') }">
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
        <div v-show="errors.has('assets[]')">       
            <ul>
                <li>
                    <span v-show="errors.has('assets[]')" class="help is-danger">غير مسموح بوجود حقل فارغ !</span>
                </li>
                <li>
                    <span v-show="errors.has('assets[]')" class="help is-danger">لابد أن يكون العدد فى صورة رقم صحيح</span>
                </li>
                <li>
                    <span v-show="errors.has('assets[]')" class="help is-danger">لابدان يكون يكون السعر فى صورة صحيحة</span>
                </li>
                <li>
                    <span v-show="errors.has('assets[]')" class="help is-danger">لابدان تكون المساحة فى صورة صحيحة</span>
                </li>
            </ul>
        </div>

        <!-- buttons -->
        <div class="col-s-12 col-m-8 col-l-9 clear-after">
            <input type="hidden" id="studyId" value="" name="studyId" v-model="studyStatus.study_id"/>
            <router-link v-on:click.native="createFourthStep(false)" to="/step-3" class="btn round-corner right prev-btn">الخطوة السابقه</router-link>
            <button class="btn secondary round-corner left next-btn" type="submit">الخطوة التالية</button>
        </div>
        <!-- // buttons -->
    </div>
    </form>
</template>
<script>
    export default {
        props: ['currentStudy', 'deprecations'],
        data () {
            return {
                assets_completed: [],
                assets: [],
                studyStatus: []
            }
        },
        created() {
            this.assets = this.currentStudy.assets;
            this.assets_completed = this.currentStudy.assets_completed;
            this.studyStatus = this.currentStudy.studyStatus;
        },
        methods: {
            createFourthStep(par=true) {
                this.$validator.validateAll();
                if (!this.errors.any()) {
                    this.$http.post(window.hostname +'/api/study-assets/add-asset',
                    {
                        assets:this.assets,
                        sid:this.studyStatus.study_id})
                    .then(function(respone){
                    //console.log(respone);
                });
                //Study status
                if (this.assets_completed.length>=6) {
                    this.currentStudy.studyStatus.step_four = 1;
                } else {
                    this.currentStudy.studyStatus.step_four = 0;
                }
                if(
                    this.currentStudy.studyStatus.step_one === 1 &&
                    this.currentStudy.studyStatus.step_two === 1 &&
                    this.currentStudy.studyStatus.step_three === 1 &&
                    this.currentStudy.studyStatus.step_four === 1 &&
                    this.currentStudy.studyStatus.step_five === 1 &&
                    this.currentStudy.studyStatus.step_six === 1
                ) {
                    this.currentStudy.studyStatus.is_completed = 1;
                }else {
                    this.currentStudy.studyStatus.is_completed = 0;
                }
                this.$http.post(window.hostname + '/api/studies/status', {
                    sid: this.studyStatus.study_id,
                    study_status: this.currentStudy.studyStatus
                });
                //this.$router.push('/step-5');
                if(par==true) {
                    window.location.hash = "/step-5";
                }
                }
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
            
        }
    }
</script>