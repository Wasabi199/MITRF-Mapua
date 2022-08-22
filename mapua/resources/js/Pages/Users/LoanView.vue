<template>
    <AppLayout>
        <template #header>
            <div class="flex justify-between">
                <div class="flex items-center ">
                    <h1 class="font-extrabold text-xl text-gray-800 leading-tight">Current Loans</h1>
                </div>
            </div>
        </template>
            <div class="p-2 px-6 leading-tight flex justify-between items-center">
            <h1 class="text-xl text-gray-700 font-extrabold pl-8">Loans Management</h1>

            <div class="px-6 py-4 whitespace-nowrap">
                <Link :href="route('userLoan')" class="flex space-x-2 mr-5 px-4 py-1 border text-md text-yellow-600 dark:text-yellow-600 dark:border-yellow-600 border-yellow-600 uppercase rounded-full dark:hover:text-gray-200 hover:text-white hover:border-none hover:bg-yellow-500 cursor-pointer">
                    <button>APPLY NEW LOAN</button>
                </Link>
            </div>
            
        </div>

        <div class="mx-12 my-6 shadow-md">
                <!--
                <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 table-auto">
                                <thead class="inline-flex">
                                <tr class="m-2">
                                    <th class="text-left px-16">Name</th>
                                    <th class="text-left px-16">Loan Type</th>
                                    <th class="text-left px-16">Loan Amount</th>
                                    <th class="text-left px-16">Interest</th>
                                    <th class="text-left px-16">Approval</th>
                                    <th class="text-left px-16">Duration</th>
                                    <th class="text-left px-16">Loan Status</th>
                                    <th class="text-left px-16">Attachment Path</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
                -->
        

        <div class="flex flex-col ">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg hidden md:block">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        
                                        <!-- <th class="text-left px-16 bg-gray-100">Name</th> -->
                                        <th class="text-left px-16 bg-gray-100">Loan Type</th>
                                        <th class="text-left px-16 bg-gray-100">Loan Amount</th>
                                        <th class="text-left px-16 bg-gray-100">Interest</th>
                                        <th class="text-left px-16 bg-gray-100">Approval</th>
                                        <th class="text-left px-16 bg-gray-100">Duration</th>
                                        <th class="text-left px-16 bg-gray-100">Loan Status</th>
                                        <th class="text-left px-16 bg-gray-100">Action</th>

                                        <tr v-for="loan in loans.data" v-bind:key="loan.id">
                                            

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div>
                                                        <!--
                                                        <Link :href="route('UserLoanView',loan.id)">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ loan.loan_type }}
                                                            </div>
                                                        </Link>
                                                        -->
                                                            <div class="text-sm font-medium text-gray-900">
                                                                
                                                                {{ loan.loan_type }}
                                                            </div>
                                                    </div>
                                                </div>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ loan.loan_amount }} PHP
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ loan.interest }}%
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ loan.approval }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ loan.duration }} months
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ loan.loan_status }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center pl-12 py-1 border text-md text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:text-white hover:border-none hover:bg-green-500 cursor-pointer">
                                                    <Link :href="route('UserLoanView',loan.id)">
                                                    <div>
                                                        <button>VIEW EXISTING LOAN</button>
                                                    </div>
                                                    
                                                    </Link>
                                                </div>

                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                                

                                <pagination :links="loans.links"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 md:hidden" v-for="loan in loans.data" v-bind:key="loan.id">
                    <div class="bg-white p-4 rounded-lg shadow"> 
                        <div><b>Loan Type:</b> {{ loan.loan_type }}</div>
                        <div><b>Loan Amount:</b> {{ loan.loan_amount }} PHP</div>
                        <div><b>Interest:</b> {{ loan.interest }}%</div>
                        <div><b>Approval:</b> {{ loan.approval }}</div>
                        <div><b>Duration:</b> {{ loan.duration }} months</div>
                        <div><b>Loan Status:</b> {{ loan.loan_status }}</div>
                        <div class="flex items-center pl-12 py-1 border text-md text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:text-white hover:border-none hover:bg-green-500 cursor-pointer">
                                                    <Link :href="route('UserLoanView',loan.id)">
                                                    <div>
                                                        <button>VIEW EXISTING LOAN</button>
                                                    </div>
                                                    
                                                    </Link>
                                                </div>

                    </div>
                </div>
                
            </div>
            <div class="flex justify-center">
                <div class="flex justify-between my-3">
                    <div class="flex space-x-2 mr-5 px-4 py-1 border text-md text-red-600 dark:text-red-600 dark:border-red-600 border-red-600 uppercase rounded-full dark:hover:text-gray-200 hover:text-white hover:border-none hover:bg-red-500 cursor-pointer">
                        <Link :href="route('dashboard')">
                        <button>BACK TO HOME</button>
                        </Link>
                    </div>
                </div>
            </div>
    </AppLayout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue';
import {Link} from '@inertiajs/inertia-vue3';
import Modal from '@/Jetstream/Modal';
import {pickBy, throttle} from 'lodash';
import route from '../../../../vendor/tightenco/ziggy/src/js';
import { useForm } from '@inertiajs/inertia-vue3'
import {Listbox, ListboxButton, ListboxOptions, ListboxOption} from '@headlessui/vue';
// import SelectorIcon 
export default {
    components:{
        AppLayout,
        Pagination,
        JetApplicationLogo,
        Link,
        Modal,
        Listbox,
        ListboxButton,
        ListboxOptions,
        ListboxOption,

    },
    props: {
        loans: Object,
        notification:Object,
        count:Number,
    },
    

    setup() {

    },

    data() {
        return {
            id: Number,
        }
    },

    watch: {
        form: {
            deep: true,
            handler:
                throttle(
                    function () {
                        this.$inertia.get(route('usersLoansView'), pickBy(this.form), {preserveState: true, preserveScroll: true,
                        })
                    },
                    600
                ),
        },
    },
}
</script>
<style scoped>
 i {
        font-size: 1rem !important;
    }
</style>