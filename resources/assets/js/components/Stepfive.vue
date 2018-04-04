<template>
    <div class="container page-content">
        <!-- Steps -->
        <div class="steps">
            <div v-bind:class="[study_status.step_one==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createFifthStep(false)" :to="{ name: 'Stepone' }"><span></span>بيانات المشروع
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_two==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createFifthStep(false)" to="/step-2"><span>بيانات السوق</span></router-link>
            </div>
            <div v-bind:class="[study_status.step_three==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createFifthStep(false)" to="/step-3"><span>الطاقه الانتاجيه</span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_four==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createFifthStep(false)" to="/step-4"><span>رأس المال الثابت</span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_five==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createFifthStep(false)" to="/step-5"><span> تكاليف التشغيل </span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.step_one==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <router-link v-on:click.native="createFifthStep(false)" to="/step-6"><span> الاستثمار والتمويل  </span>
                </router-link>
            </div>
            <div v-bind:class="[study_status.is_completed==1 ? 'step-item done' : 'step-item']">
                <i></i>
                <button style="background: none;border: none" @click="createSixStep(false)"><span>التقرير</span></button>
            </div>
        </div>
        <!-- // Steps -->
        <form @submit.prevent="createFifthStep()" class="form-ui">
            <div class="row cols-gutter-20">
                <!-- Form Area -->
                <div class="col-s-12 col-m-8 col-l-9 clear-after">
                    <div class="content-box">
                        <h2 class="head"><button type="button" @click="addRawMaterial" class="add-button ti-plus-io">
                        </button> تكاليف التشغيل الكليه</h2>
                        <div class="form-ui">
                            <!-- Area Titles -->
                            <div class="clone-area">
                                <div class="row cols-gutter-10 clone-item">
                                    <div class="col-s-12 col-m-6 col-l-3 title">نوع المنتج</div>
                                    <div class="col-s-12 col-m-6 col-l-3 title">وحدة القياس</div>
                                    <div class="col-s-12 col-m-6 col-l-3 title">الطاقه التشغيليه الشهريه</div>
                                    <div class="col-s-12 col-m-6 col-l-3 title">تكلفه الوحدة</div>
                                </div>
                            </div>
                            <!-- // Area Titles -->
                            <div class="clone-area">
                                <!-- clone item -->
                                <div class="clone-item">
                                    <div class="row" v-for="(raw_material,index) in raw_materials">
                                        <div class="col-s-12 col-m-6 col-l-3">
                                            <input v-model="raw_material.title" name="raw_material[]" type="text"
                                                   placeholder="اسم المنتج">
                                        </div>
                                        <div class="col-s-12 col-m-6 col-l-3">
                                            <select v-model="raw_material.unit_id" name="raw_materials[]" dir="rtl"
                                                    class="">
                                                <option v-for="unit in unites" :value="unit.id">{{unit.title}}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-s-12 col-m-6 col-l-3">
                                            <input v-model="raw_material.production" name="raw_materials[]" type="text"
                                                   placeholder="الطاقه الانتاجيه">
                                        </div>
                                        <div class="col-s-12 col-m-6 col-l-3">
                                            <input v-model="raw_material.price" name="raw_materials[]" type="text"
                                                   placeholder="السعر">
                                        </div>
                                        <!--<input type="hidden" id="productId" value="" name="productId" v-model="product.id"/>-->
                                        <button type="button" @click="removeRawMaterial(raw_material.id,index)" :data-index="index"
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
                <div class="col-s-12 col-m-4 col-l-3 clear-after">
                    <div class="describe-box">
                        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                        <a href="#" class="more" target="_blank">قراء المزيد</a>
                    </div>
                </div>
                <!-- Form Area -->
                <div v-for="category in expense_categories" class="col-s-12 col-m-8 col-l-9 clear-after">
                    <div class="content-box">
                        <h2 class="head"><button type="button" @click="addExpense(category.id)" class="add-button ti-plus-io">
                        </button> {{category.title}} </h2>
                        <div class="form-ui">
                            <div class="clone-area">
                                <!-- clone item -->
                                <div class="clone-item">
                                    <div v-if="expense.category_id ==category.id" v-for="(expense,index) in expenses" class="row">
                                        <div  v-show="(category.id==1 || category.id==5)" v-bind:class="[category.id==1 ? 'col-s-12 col-m-6' : 'col-s-12 col-m-4']">
                                            <input v-model="expense.item" name="expenses[]" type="text" placeholder="بيان">
                                        </div>
                                        <div v-show=" category.id==5" v-bind:class="{ 'col-s-12 col-m-4': category.id==5 }">
                                            <input v-model="expense.count" name="expenses[]" type="text" placeholder="العدد">
                                        </div>
                                        <div v-show="(category.id==2 || category.id==3)" v-bind:class="{ 'col-s-12 col-m-6': (category.id==2 || category.id==3) }" >
                                            <input v-model="expense.type" name="expenses[]" type="text" placeholder="النوع">
                                        </div>
                                        <div v-show="category.id==4" v-bind:class="{ 'col-s-12 col-m-4': category.id==4 }">
                                            <input v-model="expense.location" name="expenses[]" type="text" placeholder="الموقع">
                                        </div>
                                        <div v-show="category.id==4" v-bind:class="{ 'col-s-12 col-m-4': category.id==4 }">
                                            <input v-model="expense.space" name="expenses[]" type="text" placeholder="المساحة">
                                        </div>
                                        <div v-bind:class="[category.id==4 || category.id==5? 'col-s-12 col-m-4' : 'col-s-12 col-m-6']" >
                                            <input v-model="expense.value" name="expenses[]" type="text" placeholder="التكلفه الشهريه">
                                        </div>
                                        <button type="button" @click="removeExpense(expense.id,index)" :data-index="index"
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

                <!-- buttons -->
                <div class="col-s-12 col-m-8 col-l-9 clear-after">
                    <router-link v-on:click.native="createFifthStep(false)" to="/step-4" class="btn round-corner right prev-btn">الخطوة السابقه</router-link>
                    <button class="btn secondary round-corner left next-btn" type="submit">الخطوة التالية</button>
                </div>
                <!-- // buttons -->
            </div>
        </form>
    </div>
</template>
<script>
    export default {
        data() {
            return {
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
                expense_categories: [],
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
            }
        },
        created() {
            this.getUnites();
            this.getExpenseCategories();
            this.fireEvent();
        },
        methods: {
            getUnites() {
                this.$http.get(window.hostname + '/api/unites').then(function (response) {
                    this.unites = response.data
                });
            },
            getExpenseCategories() {
                this.$http.get(window.hostname + '/api/expense_categories').then(function (response) {
                    this.expense_categories = response.data
                });
            },
            createFifthStep(par=true) {
                this.$http.post(window.hostname + '/api/study-raw-materials/add-raw-material', {
                    raw_materials: this.raw_materials,
                    sid: this.studyId
                }).then(function (respone) {
                    console.log(respone);
                });
                this.$http.post(window.hostname + '/api/expenses/add-expense', {
                    expenses: this.expenses,
                    sid: this.studyId
                }).then(function (respone) {
                    console.log(respone);
                });
                //Study status
                if (this.raw_materials_completed.length >= 1 && this.expenses_completed.length>=5 ) {
                    this.study_status.step_five = 1;
                } else {
                    this.study_status.step_five = 0;
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
                //this.$router.push('/step-6');
                if(par==true) {
                    window.location.hash = "/step-6";
                }
            },
            addRawMaterial: function () {
                this.raw_materials.push(
                    {
                        title: '',
                        unit_id: '',
                        production: '',
                        price: '',
                    }
                );
            },
            removeRawMaterial(raw_material_id,index){
                this.$http.delete(window.hostname + '/api/study-raw-material/raw-material/' + raw_material_id).then(function (response) {
                    this.raw_materials.splice(index, 1);
                });

            },
            addExpense: function (id) {
                    this.expenses.push(
                        {
                            category_id: id,
                            type: '',
                            item: '',
                            location: '',
                            space: null,
                            count: null,
                            value: null,
                        }
                    );
            },
            removeExpense(expense_id,index){
                this.$http.delete(window.hostname + '/api/expenses/expense/' + expense_id).then(function (response) {
                    this.expenses.splice(index, 1);
                });
            },
            fireEvent(){
                this.$http.get(window.hostname + '/ar/get-id').then(function (response) {
                    //this.info.user_id = response.data.user_id
                    this.$http.get(window.hostname + '/api/studies/study-by-user-id/' + response.data.user_id).then(function (response) {
                        this.studyId = response.data.study.id
                        this.$http.get(window.hostname + '/api/study-raw-materials/' + this.studyId).then(function (response) {
                            if (response.data.raw_materials) {
                                this.raw_materials = response.data.raw_materials
                            }
                            let raw_materials_swap=[];
                            raw_materials_swap = Object.keys(response.data.raw_materials).map(function(key) {
                                return response.data.raw_materials[key];
                            });
                            if(raw_materials_swap.length>0)
                                this.raw_materials_completed=raw_materials_swap;
                            this.raw_materials=raw_materials_swap;
                        });
                        this.$http.get(window.hostname + '/api/expenses/' + this.studyId).then(function (response) {
                            if (response.data.expenses)
                            {
                                this.expenses = response.data.expenses
                            }
                            let expenses=this.expenses;
                            let expenses_swap=[];
                            expenses_swap = Object.keys(expenses).map(function(key) {
                                return expenses[key];
                            });
                            if(expenses_swap.length>0)
                                this.expenses_completed=expenses_swap;
                            this.expenses=expenses_swap;
                        });
                        this.$http.get(window.hostname + '/api/studies/status/' + this.studyId).then(function (response) {
                            this.study_status=response.data.study_status;
                            console.log(response)
                        });
                    });
                });
            }
        },
    }
</script>