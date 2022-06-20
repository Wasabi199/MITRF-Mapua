<template>
    <AppLayout title="Users">
        <template #header>
            <div class="flex justify-between">
                <div class="flex items-center ">
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Users</h1>
                </div>
            </div>
        </template>
        <h1 class="font-black uppercase text-xl ml-5">User Management Dashboard</h1>
            <div class="flex">
                <div class="grid grid-cols-1 md:grid-cols-1 gap-3 max-w-2xl ">
                </div>
            </div>

        <div class="flex flex-col ">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
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
                                    <Link :href="route('userProfile',user.id)" class="text-indigo-600 hover:text-indigo-900">
                                        Edit
                                    </Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
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
import { Link } from '@inertiajs/inertia-vue3';
// import Table from "@/Components/Table";
export default {
    components:{
        AppLayout,
        pagination,
        JetApplicationLogo,
        // Table,
        Link,

    },
    props:{
        users:Object,
    },
  

    setup() {
        
    },

}
</script>

