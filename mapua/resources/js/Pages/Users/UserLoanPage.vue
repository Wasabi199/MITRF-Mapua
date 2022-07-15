<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Apply for Personal Loan
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="ml-5">
                        <p class="mb-1 mt-4 text-lg">Purpose of Loan</p>
                        <select
                            v-model="form.loan_type" 
                            @change="showModal = !showModal"
                            class="mb-5  border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 transition ease-in duration-150 rounded-md ">
                            <option value="placeholder" disabled>Select Loan Type</option>
                            <option  v-for="type in loanTypes" v-bind:key="type" :value="type">{{type}}</option>

                        </select>
                    </div>

                    <!-- Loan For Home -->
                    <form v-if="form.loan_type == 'Housing Loan'" @submit.prevent="submit" class="p-6 sm:px-20 bg-white border-b border-gray-200" enctype="multipart/form-data">
                        
                        <p class="mb-1 text-lg">Terms (Months)</p>
                        <select v-model="form.duration"
                            class="mb-5 border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 transition ease-in duration-150 rounded-md">
                            <option value="12">12</option>
                            <option value="24">24</option>
                            <option value="36">36</option>
                            <option value="48">48</option>
                            <option value="60">60</option>
                        </select>
                        <div>
                            <label class="mb-1 text-lg text-gray-700" for="amount">Amount</label><br>
                         
                                <div class="mt-1 relative w-64 rounded-md">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 text-lg">
                                            ₱
                                        </span>
                                    </div>
                                    <input v-model="amount" type="number" placeholder="0.00"
                                        class="focus:ring-indigo-500 border-2 
                                    border-opacity-50 border-gray-400 hover:border-indigo-500 text-black block pl-7 pr-12 w-64 mb-5 font-lg rounded-md" />
                                
                                </div>
                              
                        </div>
                        <p class="mb-1 text-lg">Upload Requirements</p>

                        <div class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 w-5/12 rounded-md  mb-10">
                            <input @change="onChange"  type="file" accept=".png, .jpg, .jpeg, .pdf, .docx"
                                class="block w-full text-[1rem] text-slate-500 file:mr-4 file:py-2 file:px-4
                            file:border-0 file:text-md file:font-semibold file:bg-gray-200   file:text-gray-500 hover:file:bg-gray-300"
                                multiple />
                        </div>
                        <div class="flex justify-center">
                            <button type="button"  @click="submit"
                                class=" py-2 px-4 mb-5 bg-indigo-600 hover:bg-indigo-700 focus:ring focus:ring-indigo-300 text-white w-64 
                                transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg">Submit</button>
                        </div>
                    </form>

                    <!-- Loan For Educational -->
                     <form v-if="form.loan_type == 'Educational Loan'" class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        
                        
                        <p class="mb-1 text-lg">Terms (Months)</p>
                        <select
                            class="mb-5 border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 transition ease-in duration-150 rounded-md">
                            <option value="12">12</option>
                            <option value="24">24</option>
                            <option value="36">36</option>
                            <option value="48">48</option>
                            <option value="60">60</option>
                        </select>
                        <div>
                            <label class="mb-1 text-lg text-gray-700" for="amount">Amount</label><br>
                            <div class="mt-1 relative w-64 rounded-md">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 text-lg">
                                        ₱
                                    </span>
                                </div>
                                <input type="number" placeholder="0.00"
                                    class="focus:ring-indigo-500 border-2 
                                border-opacity-50 border-gray-400 hover:border-indigo-500 text-black block pl-7 pr-12 w-64 mb-5 font-lg rounded-md" />
                            </div>
                        </div>
                        <p class="mb-1 text-lg">Upload Requirements</p>

                        <div class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 w-5/12 rounded-md  mb-10">
                            <input type="file" accept=".png, .jpg, .jpeg, .pdf, .docx"
                                class="block w-full text-[1rem] text-slate-500 file:mr-4 file:py-2 file:px-4
                            file:border-0 file:text-md file:font-semibold file:bg-gray-200   file:text-gray-500 hover:file:bg-gray-300"
                                multiple />
                        </div>
                        <div class="flex justify-center">
                            <button type="button" @click="submitModal = !submitModal"
                                class=" py-2 px-4 mb-5 bg-indigo-600 hover:bg-indigo-700 focus:ring focus:ring-indigo-300 text-white w-64 
                                transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg">Submit</button>
                        </div>
                    </form>

                    <!-- Loan For Medical -->
                     <form v-if="form.loan_type == 'Medical Reimbursement'" class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <p class="mb-1 text-lg">Terms (Months)</p>
                        <select
                            class="mb-5 border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 transition ease-in duration-150 rounded-md">
                            <option value="12">12</option>
                            <option value="24">24</option>
                            <option value="36">36</option>
                            <option value="48">48</option>
                            <option value="60">60</option>
                        </select>
                        <div>
                            <label class="mb-1 text-lg text-gray-700" for="amount">Amount</label><br>
                            <div class="mt-1 relative w-64 rounded-md">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 text-lg">
                                        ₱
                                    </span>
                                </div>
                                <input type="number" placeholder="0.00"
                                    class="focus:ring-indigo-500 border-2 
                                border-opacity-50 border-gray-400 hover:border-indigo-500 text-black block pl-7 pr-12 w-64 mb-5 font-lg rounded-md" />
                            </div>
                        </div>
                        <p class="mb-1 text-lg">Upload Requirements</p>

                        <div class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 w-5/12 rounded-md  mb-10">
                            <input type="file" accept=".png, .jpg, .jpeg, .pdf, .docx"
                                class="block w-full text-[1rem] text-slate-500 file:mr-4 file:py-2 file:px-4
                            file:border-0 file:text-md file:font-semibold file:bg-gray-200   file:text-gray-500 hover:file:bg-gray-300"
                                multiple />
                        </div>
                        <div class="flex justify-center">
                            <button type="button" @click="submitModal = !submitModal"
                                class=" py-2 px-4 mb-5 bg-indigo-600 hover:bg-indigo-700 focus:ring focus:ring-indigo-300 text-white w-64 
                                transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg">Submit</button>
                        </div>
                    </form>

                    <!-- Loan For Emergencies -->
                     <form v-if="form.loan_type == 'Emergency Loan'" class="p-6 sm:px-20 bg-white borsder-b border-gray-200">
                        <p class="mb-1 text-lg">Terms (Months)</p>
                        <select
                            class="mb-5 border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 transition ease-in duration-150 rounded-md">
                            <option value="12">12</option>
                            <option value="24">24</option>
                            <option value="36">36</option>
                            <option value="48">48</option>
                            <option value="60">60</option>
                        </select>
                        <div>
                            <label class="mb-1 text-lg" for="amount">Amount</label><br>
                            <div class="mt-1 relative w-64 rounded-md">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 text-lg">
                                        ₱
                                    </span>
                                </div>
                                <input type="number" placeholder="0.00"
                                    class="focus:ring-indigo-500 border-2 
                                border-opacity-50 border-gray-400 hover:border-indigo-500 text-black block pl-7 pr-12 w-64 mb-5 font-lg rounded-md" />
                            </div>
                        </div>
                        <p class="mb-1 text-lg">Upload Requirements</p>

                        <div class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 w-5/12 rounded-md  mb-10">
                            <input type="file" accept=".png, .jpg, .jpeg, .pdf, .docx"
                                class="block w-full text-[1rem] text-slate-500 file:mr-4 file:py-2 file:px-4
                            file:border-0 file:text-md file:font-semibold file:bg-gray-200   file:text-gray-500 hover:file:bg-gray-300"
                                multiple />
                        </div>
                        <div class="flex justify-center">
                            <button type="button" @click="submitModal = !submitModal"
                                class=" py-2 px-4 mb-5 bg-indigo-600 hover:bg-indigo-700 focus:ring focus:ring-indigo-300 text-white w-64 
                                transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Guidelines -->
        <Modal  :show="showModal" :closeable="true" >
        <!-- Housing Loan Guidelines -->
        <div v-if="form.loan_type == 'Housing Loan'" class="p-5">
            <div class="flex justify-center text-xl font-bold text-gray-900 my-3">
                <span>Guideline : {{form.loan_type}}</span>
             
            </div>
            <div>

            </div>
            <div class="flex justify-end text-xl font-bold dark:text-gray-200 my-3">
                <div @click="accept" class="flex space-x-2 px-4 py-1 border text-sm leading-snug font-semibold text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:bg-green-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                    </svg>
                    <span>Accept</span>
                </div>
            </div>
        </div>

        <!-- Educational Loan Guidelines -->
        <div v-if="page == 'Educational Loan'" class="p-5">
            <div class="flex justify-center text-xl font-bold text-gray-900 my-3">
                <span>Guideline : {{form.loan_type}}</span>
            
            </div>
            <div>

            </div>
            <div  class="flex justify-end text-xl font-bold dark:text-gray-200 my-3">
                <div @click="accept" class="flex space-x-2 px-4 py-1 border text-sm leading-snug font-semibold text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:bg-green-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                    </svg>
                    <span>Accept</span>
                </div>
            </div>
        </div>

          <!-- Medical Reimbursement Loan Guidelines -->
        <div v-if="page == 'Medical Reimbursement'" class="p-5">
            <div class="flex justify-center text-xl font-bold text-gray-900 my-3">
                <span>Guideline : {{form.loan_type}}</span>
              
            </div>
            <div>

            </div>
            <div class="flex justify-end text-xl font-bold dark:text-gray-200 my-3">
                <div @click="accept" class="flex space-x-2 px-4 py-1 border text-sm leading-snug font-semibold text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:bg-green-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                    </svg>
                    <span>Accept</span>
                </div>
            </div>
        </div>
         <!-- Emergency Loan Guidelines -->
        <div v-if="page == 'Emergency Loan'" class="p-5">
            <div class="flex justify-center text-xl font-bold text-gray-900 my-3">
                <span>Guideline : {{form.loan_type}}</span>
              
            </div>
            <div>

            </div>
            <div class="flex justify-end text-xl font-bold dark:text-gray-200 my-3">
                <div @click="accept" class="flex space-x-2 px-4 py-1 border text-sm leading-snug font-semibold text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:bg-green-500 cursor-pointer">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                    </svg>
                    <span>Accept</span>
                </div>
            </div>
        </div>


        <!-- Submit modal -->
        
    </Modal>
    <Modal  :show="submitModal" :closeable="true" >
    <div  class="p-5">
            <div class="flex justify-center text-xl font-bold text-gray-900 my-3">
                <span>Agreement</span>
              
            </div>
            <div>

            </div>
            <div class="flex justify-end text-xl font-bold dark:text-gray-200 my-3">
              
                <div @click="proceed" class="flex space-x-2 px-4 py-1 border text-sm leading-snug font-semibold text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:bg-green-500 cursor-pointer">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                    </svg>
                    <span>Submit</span>
                </div>
               
            </div>
        </div>
        </Modal>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Modal from '@/Jetstream/Modal';
import axios from 'axios';
import {Link } from '@inertiajs/inertia-vue3';
export default {
    
    components:{
        AppLayout,
        Modal,
        Link
    },
    setup() {
        
    },
    
    data(){
        return {
            isSubmiting: false,
            showModal: false,
            submitModal: false,
            amount:'',
            total_amount:0,
            
            // image:null,
            loanTypes:[
                'Housing Loan',
                'Educational Loan',
                'Medical Reimbursement',
                'Emergency Loan',
            ],
            form: this.$inertia.form({
                user_loan: this.$attrs.user.id,
                loan_type:'',
                loan_amount:'',
                duration:'',
                interest:'',
                attactment_path:'',

                
            }),
          
        }
        
    },
    methods:{
        accept(){
            console.log('clicked')
            this.showModal = false
        },
        onChange(e){
            console.log("Selected File", e.target.files[0])
            this.form.attactment_path = e.target.files[0]
        },
        submit(){
            // console.log(this.$attrs.user.id);
            this.submitModal = true;
             if(this.form.loan_type == 'Housing Loan'){
                this.form.interest ='5%';
                this.total_amount = parseFloat(this.amount) * 0.05;
                this.form.loan_amount = this.amount + this.total_amount;
             }
            if(this.form.loan_type == 'Educational Loan'){
                this.form.interest ='5%';
                this.total_amount = parseFloat(this.amount) * 0.05;
                this.form.loan_amount = this.amount + this.total_amount;
             }
            if(this.form.loan_type == 'Medical Reimbursement'){
                this.form.interest ='5%';
                this.total_amount = parseFloat(this.amount) * 0.05;
                this.form.loan_amount = this.amount + this.total_amount;
             }
            if(this.form.loan_type == 'Emergency Loan'){
                this.form.interest ='5%';
                this.total_amount = parseFloat(this.amount) * 0.05;
                this.form.loan_amount = this.amount + this.total_amount;
             }
        },

        proceed(){
           
                this.form.post(route('createLoans'),{
                    onStart:(visit)=>{
                        this.isSubmiting == true
                    },
                    onFinish: visit =>{
                        this.isSubmiting == false
                    }
                });
           
            console.log('clicked')
            this.submitModal = false
        }
    },
  
    
}
</script>

<style scoped>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>