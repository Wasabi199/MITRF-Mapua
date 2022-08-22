<template>
 <AppLayout>
 
 <div class="flex justify-between bg-white shadow">
    <div class="flex items-center max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8 ">
       
            <h2 class="font-extrabold text-xl text-gray-800 leading-tight">Loans</h2>
      
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg> 

    <h1 class="ont-extrabold text-xl text-gray-800 leading-tight">{{users.name}}</h1>
    </div>
</div>

<div class="grid grid-cols-1 m-8 gap-8 lg:m-10 lg:grid-cols-2">

       

 <div class="bg-white p-4 overflow-hidden border-gray-300 shadow-xl rounded-lg"> 
     <form>
            <div class="px-2 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Name of Borrower</label>
                            <input type="text" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="$props.users.name" disabled>
                    </div>

                    <!-- <div class="col-span-6 sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                            <input type="date" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="birthday" disabled>
                    </div> -->

                    <!-- <div class="col-span-6 sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Age</label>
                            <input type="number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="age" disabled>
                    </div> -->

                    <div class="col-span-6 sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Date of Employment</label>
                            <input type="date" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="$props.users.admin_reg.employment" disabled>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Years of Service</label>
                            <input type="date" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="$props.users.admin_reg.membership" disabled>
                    </div>

                    <!-- <div class="col-span-6 sm:col-span-4">
                            <label class="block text-sm font-medium text-gray-700">If Administration Employee, state department</label>
                            <input type="text" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="department" disabled>
                    </div> -->

                    <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Amount of Loan</label>
<!-- <<<<<<< HEAD -->
                            <!-- <input type="number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="$props.loans.loan_amount" disabled> -->
<!-- ======= -->
                            <input type="number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="$props.loans.amount" disabled>
<!-- >>>>>>> parent of 022d80a (Revert "Merge branch 'main' of https://github.com/Wasabi199/MITRF-Mapua") -->
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Term of Payment &lpar;Months&rpar;</label>
                            <input type="number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="$props.loans.duration"  disabled> 
                    </div>

                     <div class="col-span-6 sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Approval Status</label>
                            <input type="text" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" :value="$props.loans.loan_status"  disabled> 
                    </div>
                    </div>
                    </div>
           
    </form>




                    
</div>
<div class="row-span-3">
<div class="bg-white shadow-xl rounded-lg content-center lg:mr-50">
<img src="http://3.bp.blogspot.com/_R-G_62JmanY/SCAB4RHj0_I/AAAAAAAAANQ/EGLQOelOyqo/s1600/Mapua_logo.jpg" class="w-auto h-auto">
</div>
<div class="bg-white shadow-xl rounded-lg content-center lg:mr-50">
<img src="http://3.bp.blogspot.com/_R-G_62JmanY/SCAB4RHj0_I/AAAAAAAAANQ/EGLQOelOyqo/s1600/Mapua_logo.jpg" class="w-auto h-auto">
</div>
<div class="bg-white shadow-xl rounded-lg content-center lg:mr-50">
<img src="http://3.bp.blogspot.com/_R-G_62JmanY/SCAB4RHj0_I/AAAAAAAAANQ/EGLQOelOyqo/s1600/Mapua_logo.jpg" class="w-auto h-auto">
</div>
</div>
</div>
<div class="flex justify-center">
        <div class="flex justify-between my-3">
                <div class="flex space-x-2 mr-5 px-4 py-1 border text-md text-red-600 dark:text-red-600 dark:border-red-600 border-red-600 uppercase rounded-full dark:hover:text-gray-200 hover:text-white hover:border-none hover:bg-red-500 cursor-pointer">
                        <Link :href="route('dashboard')">
                                <button>BACK TO HOME</button>
                        </Link>
                </div>
        </div>
</div>

</AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';

import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';
import {pickBy, throttle} from 'lodash';
import Modal from '@/Jetstream/Modal';
export default {
     components:{
        AppLayout,
        Link,
        Pagination,
        Modal,
    },
    props:{
        users:Object,
        loans:Object,
        notification:Object,
            info:Object,
    },
    setup() {
        
    },

    
    
    
}
</script>