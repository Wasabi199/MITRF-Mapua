<template>
    <AppLayout title="Users">
        <template #header>


            <div class="flex justify-between">
                <div class="flex items-center ">
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Users</h1>
                </div>
            </div>
        </template>



        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <input v-model="search" type="text" placeholder=" Search..." class="border rounded-lg px-2">

                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        <tr v-for="user in users.data" :key="user.id">
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
                                                <Link :href="`/users/${user.id}/edit`" class="text-indigo-600 hover:text-indigo-900">
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


                </div>
            </div>
        </div>


    </AppLayout>

</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import pagination from '@/Components/Pagination.vue';
import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue';
import Table from "../../Components/Table";

defineProps({
    users: Object,
})

</script>
<style scoped>
.table {
    border-spacing: 0 15px;
}

i {
    font-size: 1rem !important;
}

.table tr {
    border-radius: 20px;
}

tr td:nth-child(n+5),
tr th:nth-child(n+5) {
    border-radius: 0 .625rem .625rem 0;
}

tr td:nth-child(1),
tr th:nth-child(1) {
    border-radius: .625rem 0 0 .625rem;
}
</style>
