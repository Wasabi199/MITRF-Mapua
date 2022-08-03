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

            <div class="flex-1">
                <Link :href="route('userLoan')" class="text-yellow-500 font-semibold text-sm hover:underline ml-4">
                    Create New Loan
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
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        
                                        <!-- <th class="text-left px-16 bg-gray-100">Name</th> -->
                                        <th class="text-left px-16 bg-gray-100">Loan Type</th>
                                        <th class="text-left px-16 bg-gray-100">Loan Amount</th>
                                        <th class="text-left px-16 bg-gray-100">Interest</th>
                                        <th class="text-left px-16 bg-gray-100">Approval</th>
                                        <th class="text-left px-16 bg-gray-100">Duration</th>
                                        <th class="text-left px-16 bg-gray-100">Loan Status</th>

                                        <tr v-for="loan in loans.data" v-bind:key="loan.id">

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div>
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
                                        </tr>
                                    </tbody>
                                </table>

                                <pagination :links="loans.links"/>
                            </div>
                        </div>
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