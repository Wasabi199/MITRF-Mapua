<template>
    <AppLayout title="Loans">
        <template #header>
            <div class="flex justify-between">
                <div class="flex items-center ">
                    <h1 class="font-extrabold text-xl text-gray-800 leading-tight">Loans</h1>
                </div>
            </div>
        </template>

        <div class="p-2 px-6 leading-tight flex justify-between items-center">
            <h1 class="text-xl text-gray-700 font-extrabold pl-8">Approved Loans</h1>

            <!-- <div class="flex-1">
                <Link :href="route('registerUser')" class="text-blue-500 font-semibold text-sm hover:underline ml-4">
                    Unapproved/Pending Loans
                </Link>
            </div> -->

            <!-- <input id="search_term"  class="border rounded-md mx-4" v-model="form.search" name="search_term" placeholder="Search" type="text"> -->
                   <div class="flex px-3 py-1 gap-2">
                    <Listbox class="w-80" v-model="form.approval">
                         <div class="relative">
                            <ListboxButton class="elative w-full py-2 pl-3 pr-10 text-left bg-white rounded-lg shadow-md cursor-default focus:outline-none focus-visible:ring-2 focus-visible:ring-opacity-75 focus-visible:ring-white focus-visible:ring-offset-orange-300 focus-visible:ring-offset-2 focus-visible:border-indigo-500 sm:text-sm">
                                Sort By: {{form.approval}}
                                <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                    <SelectorIcon class="w-5 h-5 text-gray-400" aria-hidden="true" />
                                </span>
                            </ListboxButton>
                            <transition
                                leave-active-class="transition duration-100 ease-in"
                                leave-from-class="opacity-100"
                                leave-to-class="opacity-0"
                            >
                                <ListboxOptions class="absolute w-full py-1 mt-1 overflow-auto text-base bg-white rounded-md shadow-lg max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                    <ListboxOption v-for="status in statuses" :key="status" :value="status" as="template"><li class="px-3 py-2 hover:bg-gray-200 cursor-pointer"> {{status}}</li></ListboxOption>
                                </ListboxOptions>
                            </transition>
                        </div>
                        </Listbox>
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
                                    <tbody class="bg-white divide-y divide-gray-200  border-gray-200 sm:rounded-lg">
                                        
                                        <th class="text-left px-16 bg-gray-100">Name</th>
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
                                                            {{ loan.user.name }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            

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
                                                            {{ loan.loan_amount }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ loan.interest }}
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
                                                            {{ loan.duration }}
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

                                            <!--<td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ loan.attachment_path }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>-->
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
        // SelectorIcon

    },
    props: {
        loans: Object,
        filters: Object,
        
    },
    

    setup() {
        // const forms = useForm({
        //     file:null,
        // })
        // return { forms }
    },

    data() {
        return {
            id: Number,
            form:{
                // search: this.filters.search,
                approval: this.filters.approval == null ? 'All' : this.filters.approval,
            },

            statuses:[
                'All',
                'Reviewing',
                'Approved',
                'Pending',
            ],
        }
    },

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
</script>
<style scoped>
 i {
        font-size: 1rem !important;
    }
</style>