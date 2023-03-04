<template>
 <AppLayout title="MITRF ADMIN">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

     <div class="py-12">
         <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                 <div>
                     <div class="flex justify-items-center p-6 sm:px-20 bg-white border-b border-gray-200">
                         <div class="">
                             <table class="border-separate border-spacing-2 border border-slate-500 mt-16 bg-gray-100">
                                 <thead class="text-lg">
                                     <tr>
                                         <th class="">MITRF Inc. Officers</th>
    <!--                                     <th class="">NAME</th>-->
                                     </tr>
                                 </thead>
                                 <tbody class="text-sm">
                                     <tr>
                                         <td class="font-bold whitespace-nowrap">Chairman</td>
                                         <td class="">Engr. Ronald Vincent M. Santiago</td>

                                     </tr>
                                     <tr>
                                         <td class="font-bold whitespace-nowrap">Vice Chairman</td>
                                         <td class="">Ms. Regie R. Jennings</td>

                                     </tr>
                                     <tr>
                                         <td class="font-bold whitespace-nowrap">Corporate Secretary</td>
                                         <td class="">Atty. Denise Jordan P. Arenillo</td>

                                     </tr>
                                     <tr>
                                         <td class="font-bold whitespace-nowrap">Treasurer</td>
                                         <td class=" ">Mr. Robert Joseph G. Villa</td>

                                     </tr>
                                     <tr>
                                         <td class="font-bold whitespace-nowrap">Internal Auditor</td>
                                         <td class=" ">Prof. Teresita L. Zapanta</td>

                                     </tr>
                                     <tr>
                                         <td class="font-bold whitespace-nowrap">External Auditor</td>
                                         <td class=" ">RTC & Co.</td>

                                     </tr>
                                     <tr>
                                         <td class="font-bold whitespace-nowrap">MITRF Accountant</td>

                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                         <div class="mx-center">
                             <div class="">
                                 <img alt="mu logo" src="/images/mitrf_logo1.png">
                             </div>
                             <div class="flex p-6">
                                 <p class="mx-auto text-2xl font-bold">
                                     Hi, {{ $page.props.user.name }}!
                                 </p>
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
        notification:Object,
        count:Number,
    }
}
</script>
