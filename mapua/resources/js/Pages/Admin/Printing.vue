<template>
    
    <div id="toPrint" class="m-10 shadow rounded-lg mx-auto w-1/2">
    <br>
        <h1 class="text-center font-bold">M.I.T RETIREMENT FUND, INC. </h1>
        <h2 class="text-center">Mapúa Institute of Technology
            <br>Muralla Street, Intramuros, 
            <br>Manila</h2>
        <br><br>
        
        <h2 class="text-center font-semibold">LOAN APPLICATION</h2>

        <form class="shadow rounded-lg">
            <div class="px-2 py-5 bg-white sm:p-6">
                <div  class="grid grid-cols-6 gap-6">
<!-- 
            <div class="col-span-3">
                    <label class="block text-sm font-medium text-gray-700">Application No.</label>
                    <input type="number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
            </div>
            <div class="col-span-3">
                    <label class="block text-sm font-medium text-gray-700">Date and Time Received</label>
                    <input type="date" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
            </div> -->


            <div class="outline-double outline-4 mx-1 my-2 col-span-6"></div>
   
                <div class="flex col-span-6 sm:col-span-3">
                    <!-- <label class="block text-sm font-medium text-gray-700">Name of Borrower</label>
                    <input type="text" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled> -->
                    <p class="font-semibold">Name of Borrower</p>
                    <p class="ml-2 underline">{{info.first_name}} {{info.middle_name}} {{info.last_name}}</p>
                </div>

                <div class="flex col-span-6 sm:col-span-2">
                    <!-- <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled> -->
                    <p class="font-semibold">Date of Birth</p>
                    <p class="ml-2 underline">{{info.birth_date}}</p>
                </div>

                <div class="flex col-span-6 sm:col-span-1">
                    <!-- <label class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled> -->
                    <p class="font-semibold">Age:</p>
                    <p class="ml-2 underline">{{new Date().getUTCFullYear() - new Date(info.birth_date).getUTCFullYear()}}</p>
                </div>

                <div class="flex col-span-6 sm:col-span-3">
                    <!-- <label class="block text-sm font-medium text-gray-700">Date of Employment</label>
                    <input type="date" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled> -->
                    <p class="font-semibold">Date of Employment:</p>
                    <p class="ml-2 underline">{{info.employment}}</p>
               </div>

                <div class="flex col-span-6 sm:col-span-3">
                    <!-- <label class="block text-sm font-medium text-gray-700">Years of Service</label>
                    <input type="number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled> -->
                      <p class="font-semibold">Years of Service:</p>
                     <p class="ml-2 underline">{{new Date().getUTCFullYear() - new Date(info.employment).getUTCFullYear()}} Years</p>
                </div>

                <div class="flex col-span-6 sm:col-span-6">
                    <!-- <label class="block text-sm font-medium text-gray-700">If Administration Employee, state department</label>
                    
                    <input type="text" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled> -->
                     <p class="font-semibold">Department:</p>
                     <p class="ml-2 underline">{{info.department}}</p>
                </div>

                <!-- <div class="col-span-6 sm:col-span-4">
                    <label class="block text-sm font-medium text-gray-700">If Faculty, state school or department</label>
                    <input type="text" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                </div> -->

                <div class="flex col-span-6 sm:col-span-3">
                    <!-- <label class="block text-sm font-medium text-gray-700">Amount of Loan</label>
                    <input type="number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled> -->
                    <p class="font-semibold">Amount of Loan</p>
                    <p class="ml-2 underline">Php {{loan.loan_amount}}</p>
                </div>

                <!-- <div class="col-span-6 sm:col-span-4">
                    <label class="block text-sm font-medium text-gray-700">Purpose of Loan</label>
                    <input type="text" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                </div> -->

                <div class="flex col-span-6 sm:col-span-3">
                    <!-- <label class="block text-sm font-medium text-gray-700">Term of Payment &lpar;Months&rpar;</label>
                    <input type="number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled> -->
                    <p class="font-semibold">Term of Payment &lpar;Months&rpar;</p>
                    <p class="ml-2 underline">{{loan.duration}}</p>
                </div>

                <div class="col-span-4">
                    <p class="text-justify">I hereby authorize the MITRF to collect and process the above information for legitimate 
                        purposes specifically for evaluation of my loan application and allow authorized personnel
                        to process such information in accordance with the Data Privacy Act of 2012.
                    </p>
                </div>

                <div class="col-span-2">
                    <br><br>
                    <div class="border-b-2"></div>
                    <p class="text-center italic">&lpar;Signature of Applicant&rpar;</p>
                </div>

                </div>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    setup() {
      
    },
    props:{
        loan:Object,
        info:Object,
    }
    
}
</script>
<style scoped>
@media print{
    #toPrint{
        width: 90% !important;
        height: 100% !important;
        margin: 5% !important;
        padding: 0% !important;
    }
}
</style>