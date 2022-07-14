<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Apply for Personal Loan
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <p class="mb-1 mt-4 text-lg">Purpose of Loan</p>
                        <select
                            class="mb-5 border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 transition ease-in duration-150 rounded-md ">
                            <option value="">Home Improvements/Lot Down Payments</option>
                            <option value="">Car Repair/Purchase</option>
                            <option value="">Travel</option>
                            <option value="">Emergencies</option>
                            <option value="">Others</option>
                        </select>
                        <p class="mb-1 text-lg">Terms (Months)</p>
                        <select
                            class="mb-5 border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 transition ease-in duration-150 rounded-md">
                            <option value="">12</option>
                            <option value="">24</option>
                            <option value="">36</option>
                            <option value="">48</option>
                            <option value="">60</option>
                        </select>
                        <div>
                            <label class="mb-1 text-lg" for="amount">Amount</label><br>
                            <div class="mt-1 relative w-64 rounded-md">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 text-lg">
                                        ₱
                                    </span>
                                </div>
                                <input type="number" placeholder="0.00"
                                    class="focus:ring-indigo-500 border-2 
                                border-opacity-50 border-gray-400 hover:border-indigo-500 text-black block pl-7 pr-12 w-64 mb-5 font-lg rounded-md" />
                            </div>
                        </div>
                        <p class="mb-1 text-lg">Upload Requirements</p>

                        <div class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 w-5/12 rounded-md  mb-10">
                            <input type="file" accept=".png, .jpg, .jpeg, .pdf, .docx"
                                class="block w-full text-[1rem] text-slate-500 file:mr-4 file:py-2 file:px-4
                            file:border-0 file:text-md file:font-semibold file:bg-gray-200   file:text-gray-500 hover:file:bg-gray-300"
                                multiple />
                        </div>
                        <div class="flex justify-center">
                            <button type="button"
                                class=" py-2 px-4 mb-5 bg-indigo-600 hover:bg-indigo-700 focus:ring focus:ring-indigo-300 text-white w-64 
                                transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
export default {
    
    setup() {
        
    },
    components:{
        AppLayout
    }
}
</script>

<style scoped>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>