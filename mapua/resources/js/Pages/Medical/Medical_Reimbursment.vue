<template>
    <AppLayout>
        <template #header>
            <div class="flex justify-between">
                <div class="flex items-center ">
                    <h1 class="font-extrabold text-xl text-gray-800 leading-tight">Current Loans</h1>
                </div>
            </div>
        </template>
         <!-- <div class="p-2 px-6 leading-tight flex justify-between items-center">
            <h1 class="text-xl text-gray-700 font-extrabold pl-8">Medical Management</h1>
                        <input id="search_term" v-model="this.form.search" class="border rounded-md mx-4 " name="search_term"
                            placeholder="Search" type="text"> 
             
        </div> -->

        <div class="mx-12 my-6 shadow-md">

        <div class="flex flex-col ">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        
                                        <!-- <th class="text-left px-16 bg-gray-100">Name</th> -->
                                        <th class="text-left px-16 bg-gray-100">Medical Type</th>
                                        <th class="text-left px-16 bg-gray-100">Name</th>
                                        <th class="text-left px-16 bg-gray-100">Medical Benifit</th>
                                        <th class="text-left px-16 bg-gray-100">Status</th>
                                        <th class="text-left px-16 bg-gray-100">Amount</th>

                                        <tr v-for="med in medical.data" v-bind:key="med.id">
                                        <!-- <tr> -->
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div>
                                                        <Link :href="route('medicalProfile',med.id)">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{med.reimbursment_type}}
                                                            </div>
                                                        </Link>
                                                    </div>
                                                </div>

                                            </td>
                                              <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{med.user.name}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{med.medical_benifit}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ med.status }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{  med.amount.toLocaleString('en-US')}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <pagination :links="medical.links"/>
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
import {Listbox, ListboxButton, ListboxOptions, ListboxOption} from '@headlessui/vue';
export default {
    

components:{
        AppLayout,
        Pagination,
        JetApplicationLogo,
        Link,
        Listbox,
        ListboxButton,
        ListboxOptions,
        ListboxOption,
},

    setup() {
        
    },
    props:{
        medical:Object,
        notification:Object,
        count:Number,
    },
    data(){
        return{

            // form: {
            // search: this.filters.search,
            
            // },
            statuses:[
            'Pending',
            'Aprrove',
            'Processing',
            ]
        }


   

    },
     watch: {
        form: {
            deep: true,
            handler:
                throttle(
                    function () {
                        this.$inertia.get(route('medicalList'), pickBy(this.form), {preserveState: true, preserveScroll: true,
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