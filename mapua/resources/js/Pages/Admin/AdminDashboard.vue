<template>
    <nav>
        <div class="relative flex min-h-screen">
            <!-- sidebar -->
            <div class="bg-red-900 w-64 shadow-md shadow-blue-800 rounded-md">
                <div class="p-2">
                    <a href="#">
                        <div class="inline-flex items-center">
                            <img alt="mu_logo" class="max-h-8 max-w-8" src="/images/mu_logo.png">
                            <span
                                class="font-extrabold text-yellow-500 ml-4 font-montserrat text-2xl">MITRF Admin</span>
                        </div>
                    </a>
                    <!-- navigation -->
                    <nav class="mt-16">
                        <a class="flex py-2 items-center m-6 max-w-screen-xl hover:bg-amber-400 active:bg-amber-500 focus:outline-none focus:ring focus:ring-amber-200 rounded-md pl-7"
                           href="#">
                            <svg class="h-6 w-7 items-baseline" fill="none" stroke="white" stroke-width="2"
                                 viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            </svg>
                            <span class="text-white font-lato text-md font-semibold">Dashboard</span>
                        </a>
                        <a class="flex py-2 items-center m-6 max-w-screen-xl hover:bg-amber-400 active:bg-amber-500 focus:outline-none focus:ring focus:ring-amber-200 rounded-md pl-7"
                           href="#">
                            <svg class="h-6 w-7 items-baseline" fill="none" stroke="white" stroke-width="2"
                                 viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            </svg>
                            <span class="text-white font-lato text-md font-semibold">Members</span>
                        </a>
                        <a class="flex py-2 items-center m-6 max-w-screen-xl hover:bg-amber-400 active:bg-amber-500 focus:outline-none focus:ring focus:ring-amber-200 rounded-md pl-7"
                           href="#">
                            <svg class="h-6 w-7 items-baseline" fill="none" stroke="white" stroke-width="2"
                                 viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                            <span class="text-white font-lato text-md font-semibold">Applications</span>
                        </a>
                        <a class="flex py-2 items-center m-6 max-w-screen-xl hover:bg-amber-400 active:bg-amber-500 focus:outline-none focus:ring focus:ring-amber-200 rounded-md pl-7"
                           href="#">
                            <svg class="h-6 w-7 items-baseline" fill="none" stroke="white" stroke-width="2"
                                 viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            </svg>
                            <span class="text-white font-lato text-md font-semibold">Loans</span>
                        </a>

                    </nav>
                </div>
            </div>
            <!-- Main content -->
            <div class="flex-1">
                <!-- header -->
                <div class="bg-white shadow-lg px-2 py-4">Header</div>
                <!-- content -->
                <div class="p-8 text-cyan-700 font-extrabold">Content</div>
            </div>
        </div>
    </nav>
</template>

<script setup>

</script>

<style scoped>

</style>
