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
                <Link class="text-blue-500 font-semibold text-sm hover:underline ml-4" href="/users/create">
                    Register new user
                </Link>
            </div>

            <input v-model="search" class="border rounded-md mx-4 " placeholder="Search" type="text">
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
                                <tr v-for="user in users" v-bind:key="user.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ user.name }}
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

                                            <Link :href="route('userProfile',user.id)"
                                                  class="text-indigo-600 hover:text-indigo-900">
                                                <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                                     stroke-width="2" viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"/>
                                                </svg>
                                            </Link>
                                        </div>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>

</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import pagination from '@/Components/Pagination.vue';
import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue';
import {Link} from '@inertiajs/inertia-vue3';
// import Table from "@/Components/Table";
export default {
    components: {
        AppLayout,
        pagination,
        JetApplicationLogo,
        // Table,
        Link,

    },
    props: {
        users: Object,
    },


    setup() {

    },

}
</script>

