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
        <div v-if="loan.approval != 'Approved'">     
                <div class="bg-white shadow-xl rounded-lg content-center lg:mr-20 ">
                    <img :src="loan.attachment_path == null ? '' : loan.attachment_path" class="w-auto h-auto">
                </div>
            

            <br>
            <div  class="w-full p-0 m-0 flex items-center justify-center gap-20">
                    <button  type="button" class=" py-2 px-4 mb-5 bg-red-600 hover:bg-red-700 focus:ring focus:ring-red-300 text-white w-64 
                        transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg"  @click="deleteLoan(loan)">Reject</button>
 
                    <button type="button" class=" py-2 px-4 mb-5 bg-green-600 hover:bg-green-700 focus:ring focus:ring-green-300 text-white w-64 
                        transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg"  @click="reviewLoan(loan)">Accept</button>
            </div>
        </div>
    <div v-if="loan.approval == 'Approved'" class="bg-white p-4 overflow-hidden border-gray-300 shadow-xl rounded-lg lg:m-20 lg:max-w-[75%] shadow-lg max-width: 768px">
                <table class="min-w-auto divide-y divide-gray-200 table-flex">
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
     <Modal :closeable="true" :show="showReviewModal"
        @close="showReviewModal = !showReviewModal">
        <div class="p-5">
            <div class="flex justify-between text-xl font-bold text-gray-900 my-3">
                <span></span>
                <svg class="h-6 w-6 cursor-pointer"
                    fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    @click="showReviewModal = !showReviewModal">
                    <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"/>
                </svg>
            </div>
            <div class="flex flex-col items-center text-xl font-bold text-gray-900 my-3">
                
                <span class="text-center">Approve/Reject {{ info.first_name }} {{info.last_name}} loan?</span>
            </div>
            <div class="flex justify-center">
                <div class="flex justify-between text-xl font-bold dark:text-gray-200 my-3">
                    <div
                        class="flex space-x-2 mr-5 px-4 py-1 border text-md text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:text-white hover:border-none hover:bg-green-500 cursor-pointer"
                        @click="submitApproveLoan">
                            
                        <span>Approve</span>
                    </div>
                </div>
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
<Modal :closeable="true" :show="showDeleteModal"
        @close="showDeleteModal = !showDeleteModal">
        <div class="p-5">
            <div class="flex justify-between text-xl font-bold text-gray-900 my-3">
                <span>Update Loan Table</span>
                <svg class="h-6 w-6 cursor-pointer"
                    fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    @click="showDeleteModal = !showDeleteModal">
                    <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"/>
                </svg>
            </div>
            <div class="flex flex-col items-center text-xl font-bold text-gray-900 my-3">
                <svg class="h-36 w-36 rounded-full text-red-700 opacity-60 "
                    fill="none"
                    stroke="currentColor" stroke-width="1.5px"
                    version="1.1" viewBox="0 0 40 40" xml:space="preserve"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
    <g>
        <path
            d="M17.125,0C7.668,0,0,7.667,0,17.125S7.668,34.25,17.125,34.25c9.459,0,17.125-7.667,17.125-17.125S26.584,0,17.125,0z    M23.445,11.422c1.355,0,2.453,1.099,2.453,2.453s-1.098,2.453-2.453,2.453c-1.354,0-2.451-1.099-2.451-2.453   S22.093,11.422,23.445,11.422z M10.806,11.422c1.354,0,2.453,1.099,2.453,2.453s-1.099,2.453-2.453,2.453s-2.453-1.099-2.453-2.453   S9.453,11.422,10.806,11.422z M26.457,25.641c-0.26,0.492-0.77,0.801-1.328,0.801H9.121c-0.559,0-1.067-0.309-1.328-0.801   c-0.26-0.494-0.225-1.09,0.093-1.549c2.098-3.046,5.551-4.865,9.239-4.865c3.689,0,7.146,1.819,9.24,4.866   C26.684,24.55,26.718,25.146,26.457,25.641z"/>
    </g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                </svg>
                <span class="text-center">You are about to delete {{ info.first_name }}'s {{info.last_name}} loan are you sure you want to proceed?</span>
            </div>
            <div class="flex justify-center">
                <div class="flex justify-between text-xl font-bold dark:text-gray-200 my-3">
                    <div
                        class="flex space-x-2 mr-5 px-4 py-1 border text-md text-red-600 dark:text-red-600 dark:border-red-600 border-red-600 uppercase rounded-full dark:hover:text-gray-200 hover:text-white hover:border-none hover:bg-red-500 cursor-pointer"
                        @click="submitDeleteLoan">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"/>
                        </svg>
                        <span>Yes I'm sure</span>
                    </div>
                </div>
                <div class="flex text-xl font-bold dark:text-gray-200 my-3">
                    <div
                        class="flex space-x-2 px-4 py-1 border text-md text-gray-600 dark:text-gray-600 dark:border-gray-600 border-gray-600 uppercase rounded-full dark:hover:text-gray-200 hover:text-white hover:border-none hover:bg-gray-500 cursor-pointer"
                        @click="showDeleteModal = !showDeleteModal">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"/>
                        </svg>
                        <span>Nevermind</span>
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
            loanToDelete: Object,
            loanToReview: Object,
            showDeleteModal: false,
            showReviewModal: false,
             deleteForm: this.$inertia.form({
                id: Number,
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
        deleteLoan(loan) {
            this.loanToDelete = loan
            this.showDeleteModal = !this.showDeleteModal
        },
        reviewLoan(loan) {
            this.loanToReview = loan
            this.showReviewModal = !this.showReviewModal
        },

        submitDeleteLoan() {
            this.deleteForm.id = this.loanToDelete.id;
            this.deleteForm.delete(route('loanDelete'), {
                onSuccess: () => {
                    this.showDeleteModal = false
                }
            });
        },
        submitApproveLoan() {
            this.approveForm.id = this.loanToReview.id;
            this.approveForm.approval = 'Approved';
            this.approveForm.post(route('loanApprove'), {
                onSuccess: () => {
                    this.showReviewModal = false
                }
            });
        },
    }
}
</script>