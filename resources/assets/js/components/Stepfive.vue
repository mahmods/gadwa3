<template>
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
                                        <input v-model="raw_material.title" name="raw_materials[]" type="text"
                                                placeholder="اسم المنتج" v-validate="'required'" :class="{'input': true, 'is-danger': errors.has('raw_material[]') }">
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
                                                placeholder="الطاقة التشغيلية الشهرية" v-validate="'numeric'" :class="{'input': true, 'is-danger': errors.has('raw_material[]') }">
                                    </div>
                                    <div class="col-s-12 col-m-6 col-l-3">
                                        <input v-model="raw_material.price" name="raw_materials[]" type="text"
                                                placeholder="السعر" v-validate="'required|decimal'" :class="{'input': true, 'is-danger': errors.has('raw_material[]') }">
                                    </div>
                                    
                                    <!--<input type="hidden" id="productId" value="" name="productId" v-model="product.id"/>-->
                                    <button type="button" @click="removeRawMaterial(raw_material.id,index)" :data-index="index"
                                            class="remove-button ti-trash-b-io">
                                    </button>
                                </div>
                                <div v-show="errors.has('raw_materials[]')">       
                                    <ul>
                                        <li>
                                            <span v-show="errors.has('raw_materials[]')" class="help is-danger">غير مسموح بوجود حقل فارغ !</span>
                                        </li>
                                        <li>
                                            <span v-show="errors.has('raw_materials[]')" class="help is-danger">لابد أن يكون الطاقة التشغيلية فى صورة رقم صحيح</span>
                                        </li>
                                        <li>
                                            <span v-show="errors.has('raw_materials[]')" class="help is-danger">لابدان تكون تكلفة الوحدة فى صورة صحيحة</span>
                                        </li>
                                    </ul>
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
                                        <input v-model="expense.item" name="expenses[]" type="text" placeholder="بيان" v-validate="''" :class="{'input': true, 'is-danger': errors.has('expenses[]') }">
                                    </div>
                                    <div v-show=" category.id==5" v-bind:class="{ 'col-s-12 col-m-4': category.id==5 }">
                                        <input v-model="expense.count" name="expenses[]" type="text" placeholder="العدد" v-validate="'numeric'" :class="{'input': true, 'is-danger': errors.has('expenses[]') }">
                                    </div>
                                    <div v-show="(category.id==2 || category.id==3)" v-bind:class="{ 'col-s-12 col-m-6': (category.id==2 || category.id==3) }" >
                                        <input v-model="expense.type" name="expenses[]" type="text" placeholder="النوع" v-validate="''" :class="{'input': true, 'is-danger': errors.has('expenses[]') }">
                                    </div>
                                    <div v-show="category.id==4" v-bind:class="{ 'col-s-12 col-m-4': category.id==4 }">
                                        <input v-model="expense.location" name="expenses[]" type="text" placeholder="الموقع" v-validate="''" :class="{'input': true, 'is-danger': errors.has('expenses[]') }">
                                    </div>
                                    <div v-show="category.id==4" v-bind:class="{ 'col-s-12 col-m-4': category.id==4 }">
                                        <input v-model="expense.space" name="expenses[]" type="text" placeholder="المساحة" v-validate="'decimal'" :class="{'input': true, 'is-danger': errors.has('expenses[]') }">
                                    </div>
                                    <div v-bind:class="[category.id==4 || category.id==5? 'col-s-12 col-m-4' : 'col-s-12 col-m-6']" >
                                        <input v-model="expense.value" name="expenses[]" type="text" placeholder="التكلفه الشهرية" v-validate="'required|decimal'" :class="{'input': true, 'is-danger': errors.has('expenses[]') }">
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
            <div v-show="errors.has('expenses[]')">       
            <ul>
                <li>
                    <span v-show="errors.has('expenses[]')" class="help is-danger">غير مسموح بوجود حقل فارغ !</span>
                </li>
                <li>
                    <span v-show="errors.has('expenses[]')" class="help is-danger">لابد أن يكون العدد فى صورة رقم صحيح</span>
                </li>
                <li>
                    <span v-show="errors.has('expenses[]')" class="help is-danger">لابدان  تكون المساحة فى صورة صحيحة</span>
                </li>
                <li>
                    <span v-show="errors.has('expenses[]')" class="help is-danger">لابدان تكون التكلفة الشهرية فى صورة صحيحة</span>
                </li>
            </ul>
        </div>
            <!-- buttons -->
            <div class="col-s-12 col-m-8 col-l-9 clear-after">
                <router-link v-on:click.native="createFifthStep(false)" to="/step-4" class="btn round-corner right prev-btn">الخطوة السابقه</router-link>
                <button class="btn secondary round-corner left next-btn" type="submit">الخطوة التالية</button>
            </div>
            <!-- // buttons -->
        </div>
    </form>
</template>
<script>
    export default {
        props: ['currentStudy', 'unites', 'expense_categories'],
        data() {
            return {
                raw_materials_completed: [],
                expenses_completed: [],
                raw_materials: [],
                expenses: [],
                studyStatus: []
            }
        },
        created() {
            this.raw_materials = this.currentStudy.raw_materials;
            this.raw_materials_completed = this.currentStudy.raw_materials_completed;
            this.expenses = this.currentStudy.expenses;
            this.expenses_completed = this.currentStudy.expenses_completed;
            this.studyStatus = this.currentStudy.studyStatus;
        },
        methods: {
            createFifthStep(par=true) {
                this.$validator.validateAll();
                if (!this.errors.any()) {
                     this.$http.post(window.hostname + '/api/study-raw-materials/add-raw-material', {
                    raw_materials: this.raw_materials,
                    sid: this.studyStatus.study_id
                }).then(function (respone) {
                    console.log(respone);
                });
                this.$http.post(window.hostname + '/api/expenses/add-expense', {
                    expenses: this.expenses,
                    sid: this.studyStatus.study_id
                }).then(function (respone) {
                    console.log(respone);
                });
                //Study status
                if (this.raw_materials_completed.length >= 1 && this.expenses_completed.length>=5 ) {
                    this.studyStatus.step_five = 1;
                } else {
                    this.studyStatus.step_five = 0;
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
                //this.$router.push('/step-6');
                if(par==true) {
                    window.location.hash = "/step-6";
                }

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
        },
    }
</script>