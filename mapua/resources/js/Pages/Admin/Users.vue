<template>
    <AppLayout title="Users">
        <template #header>
            <div class="flex justify-between">
                <div class="flex items-center ">
                    <h1 class="font-extrabold text-xl text-gray-800 leading-tight">Users</h1>
                </div>
            </div>
        </template>

        <div class="p-2 px-6 leading-tight flex justify-between items-center">
            <h1 class="text-xl text-gray-700 font-extrabold pl-8">User Management</h1>

            <div class="flex-1">
                <Link :href="route('registerUser')" class="text-blue-500 font-semibold text-sm hover:underline ml-4">
                    Register new user
                </Link>
            </div>

            <input v-model="this.form.search" name="search_term" id="search_term" class="border rounded-md mx-4 " placeholder="Search" type="text">
        </div>

        <div class="mx-12 my-6 shadow-md">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="inline-flex">
                                <tr class="m-2">
                                    <th class="text-left px-16">Name</th>
                                    <th class="text-left px-16">Contact No.</th>
                                    <th class="text-left px-16">Address</th>
                                    <th class="text-left px-16">Status</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    </tbody>
                                    </table>
                                    </div>
                                    </div>
                                    </div>
                                    </div>

        <div class="flex flex-col ">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                        
                            <tbody class="bg-white divide-y divide-gray-200">

                                <tr v-for="user in users.data" v-bind:key="user.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ user.name }}
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </td>
                                         <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ user.admin_reg.mobile_number }}
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </td>
                                         <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ user.admin_reg.address }}
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </td>
                                         <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ user.email }}
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <!-- edit user info -->
                                        <div class="inline-flex">
                                            <Link :href="route('userProfile',user.id)"
                                                  class="text-indigo-600 hover:text-indigo-900">
                                                <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                                     stroke-width="2" viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"/>
                                                </svg>
                                            </Link>
                                            <!-- delete user -->

                                           
                                                <svg @click="deleteUser(user)" class="h-6 w-6" fill="none" stroke="currentColor"
                                                     stroke-width="2" viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"/>
                                                </svg>
                                      
                                        </div>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <pagination :links="users.links"/>
            <Modal :show="showDeleteModal" :closeable="true" @close="showDeleteModal = !showDeleteModal">
                <div class="p-5">
                    <div class="flex justify-between text-xl font-bold text-gray-900 my-3">
                        <span>Update User Table</span>
                        <svg @click="showDeleteModal = !showDeleteModal" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-center text-xl font-bold text-gray-900 my-3">
                        <svg class="h-36 w-36 rounded-full text-red-700 opacity-60 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" stroke="currentColor" stroke-width="1.5px" fill="none" version="1.1"  viewBox="0 0 40 40"  xml:space="preserve">
                            <g>
                                <path d="M17.125,0C7.668,0,0,7.667,0,17.125S7.668,34.25,17.125,34.25c9.459,0,17.125-7.667,17.125-17.125S26.584,0,17.125,0z    M23.445,11.422c1.355,0,2.453,1.099,2.453,2.453s-1.098,2.453-2.453,2.453c-1.354,0-2.451-1.099-2.451-2.453   S22.093,11.422,23.445,11.422z M10.806,11.422c1.354,0,2.453,1.099,2.453,2.453s-1.099,2.453-2.453,2.453s-2.453-1.099-2.453-2.453   S9.453,11.422,10.806,11.422z M26.457,25.641c-0.26,0.492-0.77,0.801-1.328,0.801H9.121c-0.559,0-1.067-0.309-1.328-0.801   c-0.26-0.494-0.225-1.09,0.093-1.549c2.098-3.046,5.551-4.865,9.239-4.865c3.689,0,7.146,1.819,9.24,4.866   C26.684,24.55,26.718,25.146,26.457,25.641z"/>
                            </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                        </svg>
                        <span class="text-center">You are about to delete {{userToDelete.name}}'s account are you sure you want to proceed?</span>
                    </div>
                    <div class="flex justify-center">
                        <div class="flex justify-between text-xl font-bold dark:text-gray-200 my-3">
                            <div @click="submitDeleteUser" class="flex space-x-2 mr-5 px-4 py-1 border text-md text-red-600 dark:text-red-600 dark:border-red-600 border-red-600 uppercase rounded-full dark:hover:text-gray-200 hover:text-white hover:border-none hover:bg-red-500 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                <span>Yes I'm sure</span>
                            </div>
                        </div>
                        <div class="flex text-xl font-bold dark:text-gray-200 my-3">
                            <div @click="showDeleteModal = !showDeleteModal" class="flex space-x-2 px-4 py-1 border text-md text-gray-600 dark:text-gray-600 dark:border-gray-600 border-gray-600 uppercase rounded-full dark:hover:text-gray-200 hover:text-white hover:border-none hover:bg-gray-500 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Nevermind</span>
                            </div>
                        </div>
                    </div>
                </div>
            </Modal>
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



export default {
    components: {
        AppLayout,
        Pagination,
        JetApplicationLogo,
        Link,
        Modal

    },
    props: {
        filters: Object,
        users: Object,
       
    },


    setup() {

    },
    data(){
        return{
            userToDelete: Object,
            showDeleteModal: false,

            form: {
                search: this.filters.search,
            },

            deleteForm: this.$inertia.form({
                id: Number,
            }),
         
            
        }

    },
     watch: {
        form: {
            deep: true,
            handler: 
                throttle( 
                    function (){
                        this.$inertia.get(route('users'), pickBy(this.form), {preserveState: true, preserveScroll:true,})
                    },
                    600
                ),
        },
    },
    methods:{
            deleteUser(user){
            this.userToDelete = user
            this.showDeleteModal = !this.showDeleteModal
        },
        submitDeleteUser(){
            this.deleteForm.id = this.userToDelete.id;
            this.deleteForm.delete(route('userDelete'), {
                onSuccess: () => {
                    this.showDeleteModal = false
                }
            });
        }
    }

}
</script>

