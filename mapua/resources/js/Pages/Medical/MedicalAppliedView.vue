<template>
<AppLayout>
        <template #header>
            <div class="flex justify-between">
                <div class="flex items-center ">
                    <h1 class="font-extrabold text-xl text-gray-800 leading-tight">Current Loans</h1>
                </div>
            </div>
        </template>

    <div class="grid grid-cols-1 m-8 gap-8 lg:m-10 lg:grid-cols-2">
        <div class="bg-white p-4 overflow-hidden border-gray-300 shadow-xl rounded-lg">            
            <!-- <div v-if="loan.approval === 'Pending'"> -->
                <form>
                    <div class="px-2 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Name of Borrower</label>
                            <input type="text" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                            <input type="date" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                        </div>

                        <div class="col-span-6 sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700">Age</label>
                            <input type="number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Date of Employment</label>
                            <input type="date" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Years of Service</label>
                            <input type="number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label class="block text-sm font-medium text-gray-700">If Administration Employee, state department</label>
                            <input type="text" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label class="block text-sm font-medium text-gray-700">If Faculty, state school or department</label>
                            <input type="text" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Amount of Loan</label>
                            <input type="number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label class="block text-sm font-medium text-gray-700">Purpose of Loan</label>
                            <input type="text" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Term of Payment &lpar;Months&rpar;</label>
                            <input type="number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                        </div>
                        </div>
                    </div>
                </form>
            <!-- </div> -->
        </div>
    </div>
    <h1>{{userProfile.name}}</h1>


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
        userProfile:Object,
        // userMedical:Object
    }
}
</script>