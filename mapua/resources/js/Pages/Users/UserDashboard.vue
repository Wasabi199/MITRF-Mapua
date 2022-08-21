<template>
    <AppLayout title="Dashboard">
        <!-- <div class="mx-6 shadow-xl rounded-lg bg-white my-10 text-center"> -->
        <div class="text-center grid">
            <JetNavLink :href="route('loansView')" :active="route().current('loansView')" class="w-fit block mx-auto my-4 mt-16">
                <button
                    class="bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 mx-auto inline-flex h-16 p-0 rounded-[5px] overflow-hidden text-lg font-semibold">
                    <p class="inline-flex py-0 px-8 text-white text-xl my-auto items-center h-full">Contributions</p>
                    <div id="add" class="inline-flex py-0 h-full">
                        <img class="h-1/2 my-auto mx-6" src="/images/contribution.png"/>
                    </div>
                </button>
            </JetNavLink>

            <JetNavLink :href="route('userLoan')" :active="route().current('userLoan')" class="w-fit block mx-auto my-4">
                <button
                    class="bg-fuchsia-500 hover:bg-fuchsia-600 active:bg-fuchsia-700 mx-auto inline-flex h-16 p-0 rounded-[5px] overflow-hidden text-lg font-semibold">
                    <p class="inline-flex py-0 px-8 text-white text-xl my-auto items-center h-full">Apply For Loan</p>
                    <div id="add" class="inline-flex py-0 h-full">
                        <img class="h-1/2 my-auto mx-6" src="/images/apply.png"/>
                    </div>
                </button>  
            </JetNavLink>

            <JetNavLink :href="route('medicalView')" :active="route().current('medicalView')" class="w-fit block mx-auto my-4">
                <button
                    class="bg-sky-500 hover:bg-sky-600 active:bg-sky-700 mx-auto inline-flex h-16 p-0 rounded-[5px] overflow-hidden text-lg font-semibold">
                    <p class="inline-flex py-0 px-8 text-white text-xl my-auto items-center h-full">Medical Loan</p>
                    <div id="add" class="inline-flex py-0 h-full">
                        <img class="h-1/2 my-auto mx-6" src="/images/medical.png"/>
                    </div>
                </button>
            </JetNavLink>

            

        </div>
        <!-- </div> -->
    </AppLayout>
</template>

<script>
import JetApplicationLogo from "@/Jetstream/ApplicationLogo.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import JetNavLink from '@/Jetstream/NavLink.vue';

export default {
    components: {
        JetApplicationLogo,
        JetNavLink,
        AppLayout,
    },
    setup() {},
    props: {
        notification: Object,
        count: Number,
    },
};
</script>

<style scoped>
    #add {
        background: rgba(0,0,0,0.08);
    }
</style>
;