<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User Profile
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden border-gray-300 shadow-xl sm:rounded-lg">

                    <!-- Name -->
                    <div class="flex text-lg">
                        <p class="font-semibold">Name: </p>
                        <p class="ml-2 underline">{{user.name}}</p>
                    </div>
                    <!-- address -->

                    <div class="flex text-lg">
                        <p class="font-semibold">Address:</p>
                        <p class="ml-2 underline"></p>
                    </div>
                        <!-- contact number -->
                    <div class="flex text-lg">
                        <p class="font-semibold">Contact Number:</p>
                        <p class="ml-2 underline"></p>
                    </div>
                        <!-- department -->
                    <div class="flex text-lg">
                        <p class="font-semibold">Department:</p>
                        <p class="ml-2 underline"></p>
                    </div>
                        <!-- membership date -->
                    <div class="flex text-lg">
                        <p class="font-semibold">Member Since:</p>
                        <p class="ml-2 underline"></p>
                    </div>
                        <!-- Contribution -->
                    <div class="flex text-lg">
                        <p class="font-semibold">Current Contribution:</p>
                        <p class="ml-2 underline"></p>
                    </div>
                        <!-- current loan -->
                    <div class="flex text-lg">
                        <p class="font-semibold">Current loan:</p>
                        <p class="ml-2 underline"></p>
                    </div>
                        <!-- past loans -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
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
                </div>
            </div>
        </div>


    </AppLayout>

</template>
<script>

import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
    components:{
        JetApplicationLogo,
        AppLayout,
    },
    setup() {

    },
    props:{
        user:Object,
        address:Object,
    }
}
</script>
