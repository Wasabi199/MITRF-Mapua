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

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden border-gray-300 shadow-xl sm:rounded-lg">

                    <!-- Name -->
                    <div class="justify-between flex">
                        <div class="flex text-lg">
                            <p class="font-semibold">Name: </p>
                            <p class="ml-2 underline">{{ user.name }}</p>
                        </div>

                        <a href="#">
                            <svg class="h-6 w-6 hover:text-blue-500 text-blue-700 font-semibold" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                    <!-- address -->

                        <div class="flex text-lg">
                            <p class="font-semibold">Address:</p>
                            <p class="ml-2 underline">{{ user.admin_reg.current_address }} {{ user.admin_reg.barangay }}
                                {{ user.admin_reg.municipality }}</p>
                    </div>
                    <!-- contact number -->

                        <div class="flex text-lg">
                            <p class="font-semibold">Contact Number:</p>
                            <p class="ml-2 underline">{{ user.admin_reg.mobile_number }}</p>

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

                        <p class="ml-2 underline">{{user.admin_reg.contribution != null ? user.admin_reg.contribution : 'No Contribution'}}</p>
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="inline-flex">
                                        <tr class="m-2">
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
