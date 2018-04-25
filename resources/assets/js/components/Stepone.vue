<template id="step1-template">
    <div class="row">
        <div class="col-s-12 clear-after">
            <div class="content-box">
                <h2 class="head"></h2>
                <form @submit.prevent="createStudy()" class="form-ui row">
                    <div class="col-s-12 col-m-6">
                        <label>اسم المشروع</label>
                        <p :class="{ 'control': true }">
                            <input v-model="info.title" v-validate="'required'"
                                    :class="{'input': true, 'is-danger': errors.has('title') }" name="title"
                                    type="text" placeholder="اسم المشروع">
                            <span   v-show="errors.has('title')" class="help is-danger">غير مسموح أن يكون هذا الحقل فارغ !</span>
                        </p>
                    </div>
                    <div class="col-s-12 col-m-6">
                        <label> البريد الالكترونى</label>
                        <p :class="{ 'control': true }">
                            <input v-model="info.email" v-validate="'required|email'"
                                    :class="{'input': true, 'is-danger': errors.has('email') }" name="email"
                                    type="text" placeholder="البريد الألكترونى">
                            <span v-show="errors.has('email')" class="help is-danger">أكتب البريد الالكترونى بصورة صحيحة</span>
                        </p>
                    </div>
                    <div class="col-s-12 col-m-6">
                        <label> رقم الهاتف</label>
                        <p :class="{ 'control': true }">
                            <input v-model="info.phone" v-validate="'required|numeric'"
                                    :class="{'input': true, 'is-danger': errors.has('phone') }" name="phone"
                                    type="number" placeholder="رقم الهاتف">
                            <span v-show="errors.has('phone')" class="help is-danger">أكتب رقم الهاتف بصورة صحيحة</span>
                        </p>
                    </div>
                    <div class="col-s-12 col-m-6">
                        <label>اختر الدوله</label>
                        <p :class="{ 'control': true }">
                        <select v-model="info.country_id" name="country_id" v-validate="'required'"
                                :class="{'input': true, 'is-danger': errors.has('country_id') }">
                            <option v-for="c in this.countries" :value="c.id" :key="c.id">{{c.title}}</option>
                        </select>
                        </p>
                    </div>
                    <div class="col-s-12 col-m-6">
                        <label>موقع المشروع</label>
                        <p :class="{ 'control': true }">
                            <input v-model="info.location" v-validate="'required'"
                                    :class="{'input': true, 'is-danger': errors.has('location') }" name="location"
                                    type="text" placeholder="موقع المشروع">
                            <span v-show="errors.has('location')"
                                    class="help is-danger">غير مسموح أن يكون هذا الحقل فارغ !</span>
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
                            <option v-for="currency in this.currencies" :value="currency.id" :key="currency.id">{{currency.symbol}}
                            </option>
                        </select>
                        </p>
                    </div>
                    <div class="col-s-12">
                        <label>اختر القطاع</label>
                        <p :class="{ 'control': true }">
                        <select v-model="info.sector_id" name="sector_id" v-validate="'required'"
                                :class="{'input': true, 'is-danger': errors.has('sector_id') }" dir="rtl">
                            <option v-for="sector in this.sectors" :value="sector.id" :key="sector.id">{{sector.title}}</option>
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
                                    class="help is-danger">غير مسموح أن يكون هذا الحقل فارغ !</span>
                        </p>
                    </div>
                    <button class="btn secondary round-corner left next-btn" type="submit">الخطوة التالية</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['userId', 'countries', 'currencies', 'sectors', 'currentStudy'],
    data () {
        return {
            studyStatus: [],
            info: []
        };
    },
    created() {
        console.log(this.currentStudy.info);
            this.info = this.currentStudy.info;
            this.studyStatus = this.currentStudy.studyStatus;
            console.log(this.info);
    },
    methods: {
        createStudy(e) {
            console.log(this.info);
            this.$validator.validateAll();
            if (!this.errors.any()) {
                this.$http.post(window.hostname + '/api/studies/add-study', this.info);
                //create study status
                let info=this.info;
                let info_swap=[];
                info_swap = Object.keys(info).map(function(key) {
                    return info[key];
                });
                //this.$http.post(window.hostname + '/api/studies/status',{sid:this.info.studyId,study_status:this.studyStatus});
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
                    this.studyStatus.step_one=1;
                }else{
                    this.studyStatus.step_one=0;
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
                this.$http.post(window.hostname + '/api/studies/status',{sid:this.info.studyId,study_status:this.studyStatus});
                window.location.hash="/step-2";
                window.scrollTo(0,0);
            }
        },
    }
};
</script>