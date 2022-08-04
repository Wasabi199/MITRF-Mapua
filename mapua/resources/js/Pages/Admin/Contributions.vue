<template>
    <AppLayout>
        <template #header>
             <div class="flex justify-between">
                <div class="flex items-center ">
                    <Link :href="route('adminLoansView')" class="hover:underline">
                    <h1 class="font-extrabold text-xl text-gray-800 leading-tight">Loans</h1>
                    </Link>
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <h1 class="font-extrabold text-xl text-gray-800 leading-tight">{{info.first_name}} {{info.middle_name}} {{info.last_name}}</h1>
                </div>

            </div>
        </template>
    
    <div class="grid grid-cols-1 m-8 gap-8 lg:m-10 lg:grid-cols-2">
        <div class="bg-white p-4 overflow-hidden border-gray-300 shadow-xl rounded-lg lg:m-20 lg:max-w-[60%]">
            <div>
                <!-- Contact -->           
                <div class="flex lg:text-lg">
                    <svg class="h-6 w-6 text-red-900" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                            stroke-linecap="round"
                            stroke-linejoin="round"/>
                    </svg>

                    <p class="pl-2 font-semibold">{{loan.loan_type}}</p>
                    <!-- <p class="pl-2 font-semibold">{{ user.email }}</p> -->
                </div>
                <div class="flex lg:text-lg pb-2">
                    <svg class="h-6 w-6 text-red-900" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                            stroke-linecap="round"
                            stroke-linejoin="round"/>
                    </svg>

                    <p class="pl-2 font-semibold">{{loan.loan_amount}}</p>
                    <!-- <p class="pl-2 font-semibold">{{ user.admin_reg.mobile_number }}</p> -->
                </div>

                <!-- Name -->
                <div class="justify-between flex">
                    <div class="flex lg:text-lg">
                        <p class="font-semibold">Name: </p>
                        <p class="ml-2 underline">{{info.first_name}} {{info.middle_name}} {{info.last_name}}</p>
                    </div>


                    <svg @click="showModal = !showModal" class="h-6 w-6 text-red-900 hover:text-red-700" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                            stroke-linecap="round"
                            troke-linejoin="round"/>
                    </svg>

                </div>

                <!-- Civil status -->
                <div class="flex lg:text-lg">
                    <p class="font-semibold">Civil Status:</p>
                    <p class="ml-2 underline">{{info.civil_status}}</p>
                </div>

                <!-- birth date -->
                <div class="flex lg:text-lg">
                    <p class="font-semibold">Birthdate:</p>
                    <p class="ml-2 underline">{{info.birth_date}}</p>
                </div>

                <!-- place of birth -->
                <div class="flex lg:text-lg">
                    <p class="font-semibold">Place of Birth:</p>
                    <p class="ml-2 underline">{{info.birth_place}}</p>
                </div>

                <!-- department -->
                <div class="flex lg:text-lg">
                    <p class="font-semibold">Department:</p>
                    <p class="ml-2 underline">{{info.department}}</p>

                </div>

                <!-- membership date -->
                <div class="flex lg:text-lg">
                    <p class="font-semibold">Member Since:</p>
                    <p class="ml-2 underline">{{info.membership}}</p>

                </div>

                <!-- Loan -->
                <div class="flex lg:text-lg">
                    <p class="font-semibold">Loan Duration:</p>
                    <p class="ml-2 underline">{{loan.duration}} month's</p>
                </div>
            </div>
        </div>
        <div v-if="loan.approval == 'Reviewing' ">     
            
                <div class="bg-white shadow-xl rounded-lg content-center lg:mr-50 "> 
                    <img :src="loan.attachment_path == null ? '' : loan.attachment_path" class="w-auto h-auto" >
                </div>
            

            <br>
            <div  class="w-full p-0 m-0 flex items-center justify-center gap-20">
                    <button  type="button" class=" py-2 px-4 mb-5 bg-red-600 hover:bg-red-700 focus:ring focus:ring-red-300 text-white w-64 
                        transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg"  @click="rejectLoan(loan)">Reject</button>
 
                    <button type="button" class=" py-2 px-4 mb-5 bg-green-600 hover:bg-green-700 focus:ring focus:ring-green-300 text-white w-64 
                        transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg"  @click="acceptLoan(loan)">Accept</button>
            </div>
        </div>

        <div v-if="loan.approval == 'Pending' ">     
            
                <div class="bg-white shadow-xl rounded-lg content-center lg:mr-50 "> 
                    <img :src="loan.attachment1 == null ? '' : loan.attachment1" class="w-auto h-auto" >
                </div>
                   <div class="bg-white shadow-xl rounded-lg content-center lg:mr-50 "> 
                    <img :src="loan.attachment2 == null ? '' : loan.attachment2" class="w-auto h-auto" >
                </div>
                   <div class="bg-white shadow-xl rounded-lg content-center lg:mr-50 "> 
                    <img :src="loan.attachment3 == null ? '' : loan.attachment3" class="w-auto h-auto" >
                </div>
            <br>
            <div  class="w-full p-0 m-0 flex items-center justify-center gap-20">
                    <button  type="button" class=" py-2 px-4 mb-5 bg-red-600 hover:bg-red-700 focus:ring focus:ring-red-300 text-white w-64 
                        transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg"  @click="rejectLoan(loan)">Reject</button>
 
                    <button type="button" class=" py-2 px-4 mb-5 bg-green-600 hover:bg-green-700 focus:ring focus:ring-green-300 text-white w-64 
                        transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg"  @click="acceptLoan(loan)">Accept</button>
            </div>
        </div>
        
    <div v-else-if="loan.approval == 'Approved'" class="bg-white p-4 overflow-x-auto border-gray-300 shadow-xl rounded-lg lg:m-20 lg:max-w-[75%] shadow-lg max-width: 768px">
                <table class="min-w-auto divide-y divide-gray-200 table-fixed">
                    <thead class="inline-auto">
                        <tr class="box-content h-10 w-20 p-4 border-10  bg-red-800 text-yellow-400">
                            <th class="text-left px-16">Past Loan</th>
                            <th class="text-left px-16">Amount</th>
                            <th class="text-left px-16">Date of Completion</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="contribution in contributions.data" v-bind:key="contribution.id">
                            <td class="px-6 py-6 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div>
                                            <div class="px-12 text-sm font-medium text-gray-900">
                                                   {{contribution.id}}
                                            </div>
                                        </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div>
                                        <div class="px-10 text-sm font-medium text-gray-900">
                                            {{ contribution.contribution_amount}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div>
                                        <div class="px-5 text-sm font-medium text-gray-900">
                                            {{ contribution.created_at}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <pagination :links="contributions.links"/>
    </div> 
    <div v-else-if="loan.approval == 'Rejected'" class="bg-white p-4 overflow-x-auto border-gray-300 shadow-xl rounded-lg lg:m-20 lg:max-w-[75%] shadow-lg max-width: 768px">
            <h1>Rejected Loan Application</h1>
        </div>
     <Modal :closeable="true" :show="showApproveModal"
        @close="showApproveModal = !showApproveModal">
        <div class="p-5">
            <div class="flex justify-between text-xl font-bold text-gray-900 my-3">
                <span></span>
                <svg class="h-6 w-6 cursor-pointer"
                    fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    @click="showApproveModal = !showApproveModal">
                    <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"/>
                </svg>
            </div>
            <div class="flex flex-col items-center text-xl font-bold text-gray-900 my-3">
                
                <span class="text-center">Approve {{ info.first_name }} {{info.last_name}} loan?</span>
            </div>
            <div class="flex justify-center">
                <div class="flex justify-between text-xl font-bold dark:text-gray-200 my-3">
                    <div
                        class="flex space-x-2 mr-5 px-4 py-1 border text-md text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:text-white hover:border-none hover:bg-green-500 cursor-pointer"
                        @click="submitApproveLoan">
                            
                        <span>Approve</span>
                    </div>
                </div>
                
            </div>
        </div>
    </Modal>
<Modal :closeable="true" :show="showRejectModal"
        @close="showRejectModal = !showRejectModal">
        <div class="p-5">
            <div class="flex justify-between text-xl font-bold text-gray-900 my-3">
                <span></span>
                <svg class="h-6 w-6 cursor-pointer"
                    fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    @click="showRejectModal = !showRejectModal">
                    <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"/>
                </svg>
            </div>
            <div class="flex flex-col items-center text-xl font-bold text-gray-900 my-3">
                
                <span class="text-center">Reject {{ info.first_name }} {{info.last_name}} loan?</span>
            </div>
            <div class="flex justify-center">
                
                <div class="flex text-xl font-bold dark:text-gray-200 my-3">
                    <div
                        class="flex space-x-2 px-4 py-1 border text-md text-red-600 dark:text-red-600 dark:border-red-600 border-red-600 uppercase rounded-full dark:hover:text-gray-200 hover:text-white hover:border-none hover:bg-red-500 cursor-pointer"
                        @click="submitRejectLoan">
                        
                        <span>Reject</span>
                    </div>
                </div>
            </div>
        </div>
    </Modal>        
</div>
</AppLayout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';
import {pickBy, throttle} from 'lodash';
import Modal from '@/Jetstream/Modal';
export default {
    components:{
        AppLayout,
        Link,
        Pagination,
        Modal,
    },
    props:{
        loan:Object,
        info:Object,
        contributions:Object
    },
    setup() {
        
    },
    data(){
        return{
            loanToReject: Object,
            loanToApprove: Object,
            showRejectModal: false,
            showApproveModal: false,

            rejectForm: this.$inertia.form({
                id: Number,
                approval:'',
            }),

            approveForm: this.$inertia.form({
                id: Number, 
                approval:'',
            }),

   watch: {
        form: {
            deep: true,
            handler:
                throttle(
                    function () {
                        this.$inertia.get(route('adminLoansView'), pickBy(this.form), {preserveState: true, preserveScroll: true,
                        })
                    },
                    600
                ),
        },
    },
        }
    },
    watch: {
        form: {
            deep: true,
            handler:
                throttle(
                    function () {
                        this.$inertia.get(route('contributions'), pickBy(this.form), {preserveState: true, preserveScroll: true,
                        })
                    },
                    600
                ),
        },
    },
    methods:{
        rejectLoan(loan) {
            this.loanToReject = loan
            this.showRejectModal = !this.showRejectModal
        },
        acceptLoan(loan) {
            this.loanToApprove = loan
            this.showApproveModal = !this.showApproveModal
        },

        submitRejectLoan() {
            this.rejectForm.id = this.loanToReject.id;
            this.rejectForm.approval = 'Rejected';
            this.rejectForm.post(route('loanReject'), {
                onSuccess: () => {
                    this.showRejectModal = false
                }
            });
        },
        submitApproveLoan() {
            this.approveForm.id = this.loanToApprove.id;
            this.approveForm.approval = 'Approved';
            this.approveForm.post(route('loanApprove'), {
                onSuccess: () => {
                    this.showApproveModal = false
                }
            });
        },
    }
}
</script>