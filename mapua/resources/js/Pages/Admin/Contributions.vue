<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contributions
            </h2>
        </template>
    
    <div class="grid grid-cols-1 m-8 gap-8 lg:m-10 lg:grid-cols-2">
        <div class="bg-white p-4 overflow-hidden border-gray-300 shadow-xl rounded-lg lg:m-20 lg:max-w-[60%]">
            <div>
                <!-- Contact -->           
                <div class="flex lg:text-lg">
                    <svg class="h-6 w-6 text-red-900" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                            stroke-linecap="round"
                            stroke-linejoin="round"/>
                    </svg>

                    <p class="pl-2 font-semibold">richie56@example.net</p>
                    <!-- <p class="pl-2 font-semibold">{{ user.email }}</p> -->
                </div>
                <div class="flex lg:text-lg pb-2">
                    <svg class="h-6 w-6 text-red-900" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                            stroke-linecap="round"
                            stroke-linejoin="round"/>
                    </svg>

                    <p class="pl-2 font-semibold">(409) 822-4953</p>
                    <!-- <p class="pl-2 font-semibold">{{ user.admin_reg.mobile_number }}</p> -->
                </div>

                <!-- Name -->
                <div class="justify-between flex">
                    <div class="flex lg:text-lg">
                        <p class="font-semibold">Name: </p>
                        <p class="ml-2 underline">Agnes Considine Hodkiewicz</p>
                    </div>


                    <svg @click="showModal = !showModal" class="h-6 w-6 text-red-900 hover:text-red-700" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                            stroke-linecap="round"
                            troke-linejoin="round"/>
                    </svg>

                </div>

                <!-- Civil status -->
                <div class="flex lg:text-lg">
                    <p class="font-semibold">Civil Status:</p>
                    <p class="ml-2 underline">Single</p>
                </div>

                <!-- birth date -->
                <div class="flex lg:text-lg">
                    <p class="font-semibold">Birthdate:</p>
                    <p class="ml-2 underline">1988-07-18</p>
                </div>

                <!-- place of birth -->
                <div class="flex lg:text-lg">
                    <p class="font-semibold">Place of Birth:</p>
                    <p class="ml-2 underline">East Noel</p>
                </div>

                <!-- department -->
                <div class="flex lg:text-lg">
                    <p class="font-semibold">Department:</p>
                    <p class="ml-2 underline">Department of Arts and Letters</p>

                </div>

                <!-- membership date -->
                <div class="flex lg:text-lg">
                    <p class="font-semibold">Member Since:</p>
                    <p class="ml-2 underline">2001-12-25</p>

                </div>

                <!-- Contribution -->
                <div class="flex lg:text-lg">
                    <p class="font-semibold">Current Contribution:</p>
                    <p class="ml-2 underline">No Contribution</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-xl rounded-lg content-center lg:mr-20 ">
            <img src="" alt="">
        </div>
    </div>

<br>
    <div class="w-full p-0 m-0 flex items-center justify-center gap-20">
            <button type="button" class=" py-2 px-4 mb-5 bg-red-600 hover:bg-red-700 focus:ring focus:ring-red-300 text-white w-64 
                transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg">Reject</button>

            <button type="button" class=" py-2 px-4 mb-5 bg-green-600 hover:bg-green-700 focus:ring focus:ring-green-300 text-white w-64 
                transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg">Accept</button>
    </div>

    </AppLayout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue';
export default {
    components:{
        AppLayout,
    },

    setup() {
        
    },
}
</script>