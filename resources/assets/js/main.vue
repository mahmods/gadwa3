
<template>
<div class="container page-content" v-if="finished">
    <div class="steps">
        <div v-bind:class="[currentStudy.studyStatus.step_one==1 ? 'step-item done' : 'step-item']">
            <i></i>
            <router-link :to="{ name: 'Stepone' }">
                <span>بيانات المشروع</span></router-link>
        </div>
        <div v-bind:class="[currentStudy.studyStatus.step_two==1 ? 'step-item done' : 'step-item']">
            <i></i>
            <router-link to="/step-2"><span>بيانات السوق</span>
            </router-link>
        </div>
        <div v-bind:class="[currentStudy.studyStatus.step_three==1 ? 'step-item done' : 'step-item']">
            <i></i>
            <router-link to="/step-3"><span>الطاقه الانتاجيه</span>
            </router-link>
        </div>
        <div v-bind:class="[currentStudy.studyStatus.step_four==1 ? 'step-item done' : 'step-item']">
            <i></i>
            <router-link to="/step-4"><span>رأس المال الثابت</span>
            </router-link>
        </div>
        <div v-bind:class="[currentStudy.studyStatus.step_five==1 ? 'step-item done' : 'step-item']">
            <i></i>
            <router-link to="/step-5"><span> تكاليف التشغيل </span>
            </router-link>
        </div>
        <div v-bind:class="[currentStudy.studyStatus.step_five==1 ? 'step-item done' : 'step-item']">
            <i></i>
            <router-link to="/step-6"><span> الاستثمار والتمويل  </span>
            </router-link>
        </div>
        <div v-bind:class="[currentStudy.studyStatus.is_completed==1 ? 'step-item done' : 'step-item']">
            <i></i>
            <button style="background: none;border: none" @click="createSixStep(false)"><span>التقرير</span>
            </button>
        </div>
    </div>
    <router-view
        
        :currentStudy="currentStudy"
        :userId="userId"
        :countries="countries"
        :currencies="currencies"
        :sectors="sectors"
        :unites="unites"
        :deprecations="deprecations"
        :expense_categories="expense_categories"
        >
    </router-view>
</div>
<div v-else class="container page-content" style="min-height:500px;">
    <div  class="loader"></div>
</div>
</template>

<script>
export default {
    name: 'app',
    data() {
        return {
            finished: false,
            currentStudy: {
                info: {
                    id: 0,
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
                    studyId: null
                },
                sectors: [{title: null}],
                marketings: [{title: null}],
                competitors: [{title: null, product: null, place: null}],
                fourAnalyzes: [{power: null, athreat: null, chance: null, challenge: null}],
                products: [
                    {
                        title: null,
                        unit_id: null,
                        production: null,
                        price: null,
                    }
                ],
                increase_rates: [
                    {years: '', percentage: 0},
                    {years: '', percentage: 0},
                    {years: '', percentage: 0},
                    {years: '', percentage: 0},
                    {years: '', percentage: 0},
                ],
                productId: 0,
                products_completed: [],
                assets:[
                    {title:'',value:null,space:null,count:null,deprecation_id:1},
                    {title:'',value:null,space:null,count:null,deprecation_id:2},
                    {title:'',value:null,space:null,count:null,deprecation_id:3},
                    {title:'',value:null,space:null,count:null,deprecation_id:4},
                    {title:'',value:null,space:null,count:null,deprecation_id:5},
                    {title:'',value:null,space:null,count:null,deprecation_id:6}
                ],
                assets_completed: [],
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
                raw_materials_completed: [],
                expenses_completed: [],
                raw_materials: [
                    {
                        title: '',
                        unit_id: '',
                        production: '',
                        price: '',
                    }
                ],
                expenses: [
                    {
                        category_id: 1,
                        type: '',
                        item: '',
                        location: '',
                        space: null,
                        count: null,
                        value: null,
                    },
                    {
                        category_id: 2,
                        type: '',
                        item: '',
                        location: '',
                        space: null,
                        count: null,
                        value: null,
                    },
                    {
                        category_id: 3,
                        type: '',
                        item: '',
                        location: '',
                        space: null,
                        count: null,
                        value: null,
                    },
                    {
                        category_id: 4,
                        type: '',
                        item: '',
                        location: '',
                        space: null,
                        count: null,
                        value: null,
                    },
                    {
                        category_id: 5,
                        type: '',
                        item: '',
                        location: '',
                        space: null,
                        count: null,
                        value: null,
                    },
                ],
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
                studyStatus: {
                    step_one: null,
                    step_two: null,
                    step_three: null,
                    step_four: null,
                    step_five: null,
                    step_six: null,
                    is_completed: null,
                    study_id:0
                },
            },
            userId: 0,
            countries: [],
            currencies: [],
            sectors: [],
            unites: [],
            deprecations: [],
            expense_categories: []
        };
    },
    created() {
        this.getUserId().then(()=> { 
            this.getStudy().then(()=> {
                this.getStudyStatus().then(() => {
                    this.getStepTwoData()
                    Promise.all([
                        this.getStepTwoData(),
                        this.getStepThreeData(),
                        this.getStepFourData(),
                        this.getStepFiveData(),
                    ]).then(() => this.finished = true)
                });
            })
        });
        this.getCountries()
        .then(() => {
            this.getCurrencies()
            .then(() => {
                this.getSectors()
                .then(() => {
                    this.getUnites()
                    .then(() => {
                        this.getDeprecations()
                        .then(() => {
                            this.getExpenseCategories();
                        });
                    });
                });
            });
        });
    },
    methods: {
        getUserId() {
            return this.$http.get(window.hostname + '/ar/get-id').then(function (response) {
                this.currentStudy.info.user_id = response.data.user_id;
                this.userId = response.data.user_id;
            });
        },
        getStudy() {
            return this.$http.get(window.hostname + '/api/studies/study-by-user-id/' + this.userId).then(function (response) {
                if (response.data.study) {
                    this.currentStudy.info = response.data.study;
                }
                if (response.data.study.id) {
                    this.currentStudy.info.studyId = response.data.study.id
                }
            });
        },
        getStudyStatus(){
            return this.$http.get(window.hostname + '/api/studies/status/' + this.currentStudy.info.id).then(function (response) {
                this.currentStudy.studyStatus=response.data.study_status;
            });
        },
        getCountries() {
            return this.$http.get(window.hostname + '/api/countries').then(function (response) {
                this.countries = response.data
            });
        },
        getCurrencies() {
            return this.$http.get(window.hostname + '/api/currencies').then(function (response) {
                this.currencies = response.data
            });
        },
        getSectors() {
            return this.$http.get(window.hostname + '/api/sectors').then(function (response) {
                this.sectors = response.data
            });
        },
        getUnites() {
            return this.$http.get(window.hostname + '/api/unites').then(function (response) {
                this.unites = response.data
            });
        },
        getDeprecations() {
            return this.$http.get(window.hostname + '/api/deprecations').then(function (response) {
                this.deprecations = response.data.deprecations
            });
        },
        getExpenseCategories() {
            return this.$http.get(window.hostname + '/api/expense_categories').then(function (response) {
                this.expense_categories = response.data
            });
        },
        getStepTwoData(){
            var p1 = this.$http.get(window.hostname + '/api/study-sectors/' + this.currentStudy.studyStatus.study_id).then(function (response) {
                if (response.data.returnSectors) {
                    this.currentStudy.sectors = response.data.returnSectors
                }
                let sectors_swap = [];
                sectors_swap = Object.keys(response.data.returnSectors).map(function (key) {
                    return response.data.returnSectors[key];
                });
                this.currentStudy.sectors = sectors_swap;
            });
            var p2 = this.$http.get(window.hostname + '/api/study-competitors/' + this.currentStudy.studyStatus.study_id).then(function (response) {
                if (response.data.competitors) {
                    this.currentStudy.competitors = response.data.competitors
                }
                let competitors_swap = [];
                competitors_swap = Object.keys(response.data.competitors).map(function (key) {
                    return response.data.competitors[key];
                });
                this.currentStudy.competitors = competitors_swap;
            });
            var p3 = this.$http.get(window.hostname + '/api/study-marketing/' + this.currentStudy.studyStatus.study_id).then(function (response) {
                if (response.data.marketings) {
                    this.currentStudy.marketings = response.data.marketings
                }
                let marketing_swap = [];
                marketing_swap = Object.keys(response.data.marketings).map(function (key) {
                    return response.data.marketings[key];
                });
                this.currentStudy.marketings = marketing_swap;
            });
            var p4 = this.$http.get(window.hostname + '/api/study-four-analyzes/' + this.currentStudy.studyStatus.study_id).then(function (response) {
                if (response.data.fourAnalyzes) {
                    this.currentStudy.fourAnalyzes = response.data.fourAnalyzes
                }
                let fourAnalyzes_swap = [];
                fourAnalyzes_swap = Object.keys(response.data.fourAnalyzes).map(function (key) {
                    return response.data.fourAnalyzes[key];
                });
                this.currentStudy.fourAnalyzes = fourAnalyzes_swap;
            });
            return Promise.all([p1, p2, p3, p4]);
        },
        getStepThreeData(){
            var p1 = this.$http.get(window.hostname + '/api/products/' + this.currentStudy.studyStatus.study_id).then(function (response) {
                if (response.data.products) {
                    this.currentStudy.products = Object.keys(response.data.products).map(function (key) {
                        return response.data.products[key];
                    });
                    if(this.currentStudy.products > 0)
                    this.currentStudy.products_completed = this.currentStudy.products;
                }
            });
            var p2 = this.$http.get(window.hostname + '/api/increase_rates/' + this.currentStudy.studyStatus.study_id).then(function (response) {
                if (response.data.increase_rates.length > 1) {
                    this.currentStudy.increase_rates = response.data.increase_rates
                }
            });
            return Promise.all([p1, p2]);
        },
        getStepFourData(){
            return this.$http.get(window.hostname + '/api/study-assets/' + this.currentStudy.studyStatus.study_id).then(function (response) {
                console.log(response.data.assets);
                if(response.data.assets.length > 1) {
                    this.currentStudy.assets = Object.keys(response.data.assets).map(function(key) {
                        return response.data.assets[key];
                    });
                    this.currentStudy.assets_completed = this.currentStudy.assets;
                }
            });
        },
        getStepFiveData(){
            var p1 = this.$http.get(window.hostname + '/api/study-raw-materials/' + this.currentStudy.studyStatus.study_id).then(function (response) {
                if (response.data.raw_materials) {
                    this.currentStudy.raw_materials = Object.keys(response.data.raw_materials).map(function(key) {
                        return response.data.raw_materials[key];
                    });
                    if(this.currentStudy.raw_materials.length > 0)
                        this.currentStudy.raw_materials_completed = this.currentStudy.raw_materials;
                }
            });
            var p2 = this.$http.get(window.hostname + '/api/expenses/' + this.currentStudy.studyStatus.study_id).then(function (response) {
                if (response.data.expenses.length > 1)
                {
                    this.currentStudy.expenses = response.data.expenses
                }
                let expenses=this.currentStudy.expenses;
                let expenses_swap=[];
                expenses_swap = Object.keys(expenses).map(function(key) {
                    return expenses[key];
                });
                if(expenses_swap.length>0)
                    this.currentStudy.expenses_completed=expenses_swap;
                this.currentStudy.expenses=expenses_swap;
            });
            return Promise.all([p1, p2]);
        }
    }
}
</script>
<style>
.loader {
    border: 12px solid #f3f3f3; /* Light grey */
    border-top: 12px solid #137abb; /* Blue */
    border-radius: 50%;
    width: 100px;
    height: 100px;
    animation: spin 2s linear infinite;
    margin: 0 auto;
    margin-top: 200px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
