<template>
    <AppLayout title="profile">
        <template #header>

            <div class="flex justify-between">
                <div class="flex items-center ">
                    <Link :href="route('users')">
                        <h1 class="font-extrabold text-xl text-gray-800 leading-tight">Users</h1>
                    </Link>
                    <svg class="h-6 w-6" fill="none" stroke="blue" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </svg>
                    <h1 class="font-extrabold text-xl text-gray-800 leading-tight">User's Profile</h1>
                </div>

            </div>
        </template>
        <div class="flex pl-64 mx-auto mt-10">
            <div class="py-12">
                <div class="max-w-7xl sm:px-6 lg:px-8">
                    <div class="bg-white p-4 overflow-hidden border-gray-300 shadow-xl sm:rounded-lg ">

                        <!-- Contact -->
                        <div class="mb-8">

                            <div class="flex text-lg">
                                <svg class="h-6 w-6 text-red-900" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </svg>

                                <p class="pl-2 font-semibold">{{ user.email }}</p>

                            </div>


                            <div class="flex text-lg">
                                <svg class="h-6 w-6 text-red-900" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </svg>

                                <p class="pl-2 font-semibold">{{ user.admin_reg.mobile_number }}</p>

                            </div>
                        </div>

                        <!-- Name -->
                        <div class="justify-between flex">
                            <div class="flex text-lg">
                                <p class="font-semibold">Name: </p>
                                <p class="ml-2 underline">{{ user.name }}</p>
                            </div>

                            <a href="#">
                                <svg class="h-6 w-6 text-red-900 hover:text-red-700" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>

                        <!-- Civil status -->

                        <div class="flex text-lg">
                            <p class="font-semibold">Civil Status:</p>
                            <p class="ml-2 underline">Insert civil status here</p>
                        </div>

                        <!-- address -->

                        <div class="flex text-lg">
                            <p class="font-semibold">Address:</p>
                            <p class="ml-2 underline">{{ user.admin_reg.current_address }} {{ user.admin_reg.barangay }}
                                {{ user.admin_reg.municipality }}</p>
                        </div>

                        <!-- department -->

                        <div class="flex text-lg">
                            <p class="font-semibold">Department:</p>
                            <p class="ml-2 underline">{{ user.admin_reg.department }}</p>

                        </div>
                        <!-- membership date -->

                        <div class="flex text-lg">
                            <p class="font-semibold">Member Since:</p>
                            <p class="ml-2 underline">{{ user.admin_reg.membership }}</p>

                        </div>
                        <!-- Contribution -->
                        <div class="flex text-lg">
                            <p class="font-semibold">Current Contribution:</p>
                            <p class="ml-2 underline">
                                {{
                                    user.admin_reg.contribution != null ? user.admin_reg.contribution : 'No Contribution'
                                }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Past loans -->

            <div class="bg-white shadow-lg">
                <table class="min-w-full divide-y divide-gray-200 table-auto">
                    <thead class="inline-flex">
                    <tr class=" bg-red-800 text-yellow-400">
                        <th class="text-left px-16">Past Loan</th>
                        <th class="text-left px-16">Amount</th>
                        <th class="text-left px-16">Terms</th>
                        <th class="text-left px-16">Date of Completion</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    </tbody>
                </table>
            </div>


        </div>

    </AppLayout>

</template>
<script>

import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link} from '@inertiajs/inertia-vue3';

export default {
    components: {
        JetApplicationLogo,
        AppLayout,
        Link,
    },
    setup() {

    },
    props: {
        user: Object,
        address: Object,
    }
}
</script>
