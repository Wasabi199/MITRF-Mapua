<template>
    <AppLayout>
        <template #header>
              <div class="flex items-center ">

                    <Link :href="route('medicalView')" class="hover:underline">
                        <h1 class="font-extrabold text-xl text-gray-800 leading-tight">Medical Reimbursment</h1>
                    </Link>
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <h1 class="font-extrabold text-xl text-gray-800 leading-tight">Create Medical Reimbursment</h1>
                </div>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- <div class="text-rose-600">
                        <ul>
                            <li v-for="error in $page.props.errors" v-bind:key="error">{{error}}</li>
                        </ul>
                    </div> -->
                    <JetValidationErrors class="mb-4" />
                    <div class="ml-6 lg:ml-20 mt-10">
                        <p class="mb-1 mt-4 text-lg">Purpose of Imbursment</p>
                        <select v-model="form.reimbursment_type"
                            class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 transition ease-in duration-150 rounded-md mb-10">
                            <option value="placeholder" disabled>Select Loan Type</option>
                            <option  v-for="type in reimbursment" v-bind:key="type" :value="type">{{type}}</option>
                        </select>
                    </div>

                    
                    <form  @submit.prevent="submit" class="p-6 sm:px-20 bg-white border-b border-gray-200 mt-[-40px]" enctype="multipart/form-data">
                        
                        <div>
                            <label class="mb-1 text-lg text-gray-700" for="amount">Amount</label><br>
                         
                                <div class="mt-1 relative w-64 rounded-md">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 text-lg">
                                            ₱
                                        </span>
                                    </div>
                                    <input v-model="form.amount" type="number" placeholder="0.00"
                                        class="focus:ring-indigo-500 border-2 
                                    border-opacity-50 border-gray-400 hover:border-indigo-500 text-black block pl-7 pr-12 w-64 mb-5 font-lg rounded-md" />
                                
                                </div>
                              
                        </div>
                        <p class="mb-1 text-lg">Upload Requirements</p>
                        <div v-if="this.form.reimbursment_type =='Dental Checkup' || this.form.reimbursment_type =='Eye Checkup'||this.form.reimbursment_type =='Medicines'">
                            <p class="font-bold">Official Receipt</p>
                            <div  class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 w-6/12 rounded-md  mb-5">
                            <input @change="onChange1"  type="file" accept=".png, .jpg, .jpeg, .pdf, .docx"
                                class="block w-full text-[0.8rem] text-slate-500 file:mr-2 file:py-2 file:px-1
                            file:border-0 file:text-md file:font-semibold file:bg-gray-200   file:text-gray-500 hover:file:bg-gray-300"
                                multiple />
                            </div>
                            <p class="font-bold">Medical Certificate/Doctor's Prescription</p>
                            <div class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 w-6/12 rounded-md  mb-5">
                                <input @change="onChange2"  type="file" accept=".png, .jpg, .jpeg, .pdf, .docx"
                                    class="block w-full text-[0.8rem] text-slate-500 file:mr-2 file:py-2 file:px-1
                                file:border-0 file:text-md file:font-semibold file:bg-gray-200   file:text-gray-500 hover:file:bg-gray-300"
                                    multiple />
                            </div>
                        </div>
                        <div v-if="this.form.reimbursment_type =='Hospital'">
                            <p class="font-bold">Official Receipt</p>
                            <div  class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 w-6/12 rounded-md  mb-5">
                            <input @change="onChange1"  type="file" accept=".png, .jpg, .jpeg, .pdf, .docx"
                                class="block w-full text-[0.8rem] text-slate-500 file:mr-2 file:py-2 file:px-1
                            file:border-0 file:text-md file:font-semibold file:bg-gray-200   file:text-gray-500 hover:file:bg-gray-300"
                                multiple />
                            </div>
                            <p class="font-bold">Medical Certificate/Doctor's Prescription</p>
                            <div class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 w-6/12 rounded-md  mb-5">
                                <input @change="onChange2"  type="file" accept=".png, .jpg, .jpeg, .pdf, .docx"
                                    class="block w-full text-[0.8rem] text-slate-500 file:mr-2 file:py-2 file:px-1
                                file:border-0 file:text-md file:font-semibold file:bg-gray-200   file:text-gray-500 hover:file:bg-gray-300"
                                    multiple />
                            </div>
                            <p class="font-bold">Statement of Account</p>
                            <div  class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 w-6/12 rounded-md  mb-5">
                                    <input @change="onChange3"  type="file" accept=".png, .jpg, .jpeg, .pdf, .docx"
                                        class="block w-full text-[0.8rem] text-slate-500 file:mr-2 file:py-2 file:px-1
                                    file:border-0 file:text-md file:font-semibold file:bg-gray-200   file:text-gray-500 hover:file:bg-gray-300"
                                        multiple />
                                </div>
                        </div>
                                <div v-if="this.form.reimbursment_type =='Health Checkup' ">
                                    <p class="font-bold">Official Receipt</p>
                                    <div  class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 w-6/12 rounded-md  mb-5">
                                    <input @change="onChange1"  type="file" accept=".png, .jpg, .jpeg, .pdf, .docx"
                                        class="block w-full text-[0.8rem] text-slate-500 file:mr-2 file:py-2 file:px-1
                                    file:border-0 file:text-md file:font-semibold file:bg-gray-200   file:text-gray-500 hover:file:bg-gray-300"
                                        multiple />
                                    </div>
                                    <p class="font-bold">Medical Certificate/Doctor's Prescription</p>
                                    <div class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 w-6/12 rounded-md  mb-5">
                                        <input @change="onChange2"  type="file" accept=".png, .jpg, .jpeg, .pdf, .docx"
                                            class="block w-full text-[0.8rem] text-slate-500 file:mr-2 file:py-2 file:px-1
                                        file:border-0 file:text-md file:font-semibold file:bg-gray-200   file:text-gray-500 hover:file:bg-gray-300"
                                            multiple />
                                    </div>
                                    <p class="font-bold">Doctor's Endorsement</p>
                                    <div  class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 w-6/12 rounded-md  mb-5">
                                    <input @change="onChange3"  type="file" accept=".png, .jpg, .jpeg, .pdf, .docx"
                                        class="block w-full text-[0.8rem] text-slate-500 file:mr-2 file:py-2 file:px-1
                                    file:border-0 file:text-md file:font-semibold file:bg-gray-200   file:text-gray-500 hover:file:bg-gray-300"
                                        multiple />
                                </div>
                                <p class="font-bold">Lab Results</p>
                                <div class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 w-6/12 rounded-md  mb-5">
                                    <input @change="onChange4"  type="file" accept=".png, .jpg, .jpeg, .pdf, .docx"
                                        class="block w-full text-[0.8rem] text-slate-500 file:mr-2 file:py-2 file:px-1
                                    file:border-0 file:text-md file:font-semibold file:bg-gray-200   file:text-gray-500 hover:file:bg-gray-300"
                                        multiple />
                                </div>
                            </div>

                        <div class="flex justify-center">
                            <button type="button"  @click="submit"
                                class=" py-2 px-4 mb-5 bg-indigo-600 hover:bg-indigo-700 focus:ring focus:ring-indigo-300 text-white w-64 
                                transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg">Submit</button>
                        </div>
                    </form>
                 <Modal  :show="showModal" :closeable="true" >
                    <div class="p-5">
                        <div class="flex justify-center text-xl font-bold text-gray-900 my-3 mb-12">
                            <span>Guideline : Medical Reimburstment</span>
                        
                        </div>
                        <div class="flex justify-left text-l font-bold text-gray-900 my-3 mb-12">
                            <span><u>MITRF LOAN TERMS AND CONDITIONS</u></span>
                        </div>
                        <div class="flex justify-left text-m font-bold text-gray-900 my-3">
                            <span>Note: In-patient and out-patient medical benefits of MITRF members are subject to the conditions found in the attached Appendix.</span>
                        </div>
                        <div class="flex justify-left text-s text-gray-900 mb-9">
                            <ol>
                                <li class="mb-3">1. This benefit is available to all members of the MITRF only. No contestability period is required to avail of the benefit.</li>
                                <li class="my-3">2. Membership starts upon submission of the MITRF Office of the duly accomplished Information Sheet of Members.</li>
                                <li class="my-3">3. A member who was confined for at least one day is entitled to hospitalization benefit equivalent to the actual expenses incurred but should not exceed Php 12,000.00 per year. The member is required to submit any document from the hospital or doctor which shows or proves actual hospitalization subject to the requirements under Section 8 and 9.</li>
                                <li class="my-3">4. In case of procedures or treatment which does not require hospitalization but which entitle the member to claim SSS or Philheath in-patient medical benefits, the member is also entitled to claim the in-patient benefit provided the member submits documents showing that he has undergone such procedure or treatment (i.e hospital or clinical records, doctor's records, reports or request, billings or receipts).</li>
                                <li class="my-3">5. A member can be considered as an in-patient if treated for all kinds of sickness and he/she had undergone any surgery except aesthetic surgery.</li>
                                <li class="my-3">6. A member can also avail of the medical reimbursement for out-patient medical, vision correction, dental procedures (doctor's fee, prescription contact lens and eyeglass, prophylaxis, extraction, filling, laboratory fees, drugs and medicines including P500 worth of vitamins and food supplements) up to the maximum amount of Php 7,000.00 per year. This amount is deductible from the total hospitalization benefit due to members upon presentation of OR of doctor's fee, laboratory request, doctor's prescription and OR of all the medicines and laboratory procedures.</li>
                                <li class="my-3">7. A member is required to present the original official receipt and submit photocopy of the original receipt duly signed by the MITRF Office Manager.</li>
                                <li class="my-3">8. Members who have HMO cards should present a duly certified billing statement from the hospital/clinic.</li>
                                <li class="my-3">9. Request for reimbursement must be made within (3) months from the date the expenses were incurred. Submission beyond the three-month period shall no longer be reimbursed.</li>
                            </ol>
                        </div>
                        <div class="flex justify-left text-m font-bold text-gray-900 italic my-3 mb-3">
                            <span>Appendix:</span>
                        </div>
                        <div class="flex justify-left text-m font-bold text-gray-900 underline my-3 mb-5">
                            <span>A. Computation of Medical benefits for 2021 Members of MITRF</span>
                        </div>

                        <table class="table-auto m-auto bg-white shadow rounded-lg lg:w-5/6">
                            <thead class="bg-blue-100">
                                <tr>
                                    <th>Membership Year</th>
                                    <th>Medical Benefits</th>                   
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>1 year &le; x &#60; 2 years</td>
                                    <td>10%</td>
                                </tr>
                                <tr>
                                    <td>2 years &le; x &#60; 3 years</td>
                                    <td>20%</td>
                                </tr>
                                <tr>
                                    <td>3 years &le; x &#60; 4 years</td>
                                    <td>30%</td>
                                </tr>
                                <tr>
                                    <td>4 years &le; x &#60; 5 years</td>
                                    <td>40%</td>
                                </tr>
                                <tr>
                                    <td>5 years &le; x &#60; 6 years</td>
                                    <td>50%</td>
                                </tr>
                                <tr>
                                    <td>6 years &le; x &#60; 7 years</td>
                                    <td>60%</td>
                                </tr>
                                <tr>
                                    <td>7 years &le; x &#60; 8 years</td>
                                    <td>70%</td>
                                </tr>
                                <tr>
                                    <td>8 years &le; x &#60; 9 years</td>
                                    <td>80%</td>
                                </tr>
                                <tr>
                                    <td>9 years &le; x &#60; 10 years</td>
                                    <td>90%</td>
                                </tr>
                                <tr>
                                    <td>x &ge; 10 years</td>
                                    <td>100%</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="text-m text-gray-900 italic my-3 mb-10">
                            <span class="float-right pr-12 underline">Where x = years as member of MITRF</span><br>
                        </div>

                        <div class="flex justify-left text-m font-bold text-gray-900 underline my-3 mb-5">
                            <span>B. Computation of Medical benefits prior to 2021</span>
                        </div>

                        <table class="table-auto m-auto bg-white rounded-lg shadow min-w-[100%] lg:w-5/6">
                            <thead class="bg-blue-100">
                                <tr>
                                    <th>Membership Year</th>
                                    <th>Medical Benefits</th>                   
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>1 year &le; x &#60; 3 years</td>
                                    <td>50%</td>
                                </tr>
                                <tr>
                                    <td>3 year &le; x &#60; 5 years</td>
                                    <td>70%</td>
                                </tr>
                                <tr>
                                    <td>x &ge; 5 years</td>
                                    <td>100%</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="text-m text-gray-900 italic my-3 mb-16 lg:mb-10">
                            <span class="float-right pr-12 underline">Where x = years as member of MITRF</span><br>
                        </div>

                        <div class="text-m text-gray-900 italic my-3 mb-10">
                            <span class="pr-12 underline">*The MITRF Board reserves the right to review outpatient medical benefits annually, as deemed relevant by the Board.</span><br>
                        </div>
                        <div class="flex justify-center text-xl font-bold dark:text-gray-200 my-3 space-x-40">
                        
                            <!-- Accept Button -->
                            <div @click="showModal = !showModal" class="flex space-x-2 px-4 py-1 border text-sm leading-snug font-semibold text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:bg-green-500 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                    <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                    <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                                </svg>
                                <span>Accept</span>
                            </div>
                        </div>
                    </div>
                </Modal>
                 <Modal  :show="submitModal" :closeable="true" @close="submitModal = !submitModal">
                    <div  class="p-5">
                        <div class="flex justify-between text-xl font-bold text-gray-900 my-3 " >
                            <span>Agreement</span>
                        <svg @click="submitModal = !submitModal" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                        </div>
                        <div class="text-center">
                            <span>I hereby agree to submit my documents and to allow MITRFI and its authorized personnel to process my documents and personal information for specifically for purposes of <span class="font-bold">{{this.form.reimbursment_type}} Reimbursement</span>, in compliance with the Data Privacy Act of 2012 and MITRFI policies.  Acceptance of the document/s does not automatically guarantee approval as the application shall be subject to the evaluation and approval of the MITFRI based on its loan policies.</span>
                        </div>
                        <div class="flex justify-end text-xl font-bold dark:text-gray-200 my-3">
                        
                            <div @click="proceed" class="flex space-x-2 px-4 py-1 border text-sm leading-snug font-semibold text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:bg-green-500 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                    <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                    <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                                </svg>
                                <span>Submit</span>
                            </div>
                        
                        </div>
                    </div>
                    </Modal>
                </div>
            </div>
        </div>

    </AppLayout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link} from '@inertiajs/inertia-vue3';
import Modal from '@/Jetstream/Modal';
import route from '../../../../vendor/tightenco/ziggy/src/js';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';
export default {
    components:{
        AppLayout,
        Modal,
        Link,
        JetValidationErrors,
    },
    props:{
        info:Object,
        notification:Object,
        count:Number,
    },
    setup() {
        
    },
    data(){
        return{
            showModal:true,
            submitModal:false,
            isSubmiting:false,
            computationAmount:'',
            // membership: this.props.info.membership,
            form: this.$inertia.form({
                reimbursment_type:'',
                amount:'',
                medical_benifit:'',
                medical_record1:'',
                medical_record2:'',
                medical_record3:'',
                medical_record4:'',
            }),
            reimbursment:[
                'Hospital',
                'Health Checkup',
                'Dental Checkup',
                'Medicines',
                'Eye Checkup',
            ],
        }
    },
    methods:{
        onChange1(e){
            console.log("Selected File", e.target.files[0])
            this.form.medical_record1 = e.target.files[0]
        },
        onChange2(e){
            console.log("Selected File", e.target.files[0])
            this.form.medical_record2 = e.target.files[0]
        },
        onChange3(e){
            console.log("Selected File", e.target.files[0])
            this.form.medical_record3 = e.target.files[0]
        },
        onChange4(e){
            console.log("Selected File", e.target.files[0])
            this.form.medical_record4 = e.target.files[0]
        },
        submit(){
            console.log(this.$props.info.membership);
            if( 2021 > new Date(this.$props.info.membership).getUTCFullYear()){
                let date = new Date().getFullYear() - new Date(this.$props.info.membership).getUTCFullYear();
                
                if(date >= 1 && date <=3 ){
                    this.form.medical_benifit = '50%';
                    this.computationAmount = this.form.reimbursment_type == 'Hospital'? 12000*0.50 : 7000*0.50;
                }else if(date >= 3 && date <=5 ){
                    this.form.medical_benifit = '70%';
                    this.computationAmount = this.form.reimbursment_type == 'Hospital'? 12000*0.70 : 7000*0.70;
                }else if(date >= 5){
                    this.form.medical_benifit = '100%';
                    this.computationAmount = this.form.reimbursment_type == 'Hospital'? 12000 : 7000;
                }

            }else{

                if(date >= 1 && date <=2 ){
                    this.form.medical_benifit = '10%';
                    this.computationAmount = this.form.reimbursment_type == 'Hospital'? 12000*0.10 : 7000*0.10;
                }else if(date >= 2 && date <=3 ){
                    this.form.medical_benifit = '20%';
                    this.computationAmount = this.form.reimbursment_type == 'Hospital'? 12000*0.20 : 7000*0.20;
                }else if(date >= 3 && date <= 4 ){
                    this.form.medical_benifit = '30%';
                    this.computationAmount = this.form.reimbursment_type == 'Hospital'? 12000*0.30 : 7000*0.30;
                }else if(date >= 4 && date <= 5 ){
                    this.form.medical_benifit = '40%';
                    this.computationAmount = this.form.reimbursment_type == 'Hospital'? 12000*0.40 : 7000*0.40;
                }else if(date >= 5 && date <=6 ){
                    this.form.medical_benifit = '50%';
                    this.computationAmount = this.form.reimbursment_type == 'Hospital'? 12000*0.50 : 7000*0.50;
                }else if(date >= 6 && date <=7 ){
                    this.form.medical_benifit = '60%';
                    this.computationAmount = this.form.reimbursment_type == 'Hospital'? 12000*0.60 : 7000*0.60;
                }else if(date >= 7 && date <=8 ){
                    this.form.medical_benifit = '70%';
                    this.computationAmount = this.form.reimbursment_type == 'Hospital'? 12000*0.70 : 7000*0.70;
                }else if(date >= 8 && date <=9 ){
                    this.form.medical_benifit = '80%';
                    this.computationAmount = this.form.reimbursment_type == 'Hospital'? 12000*0.80 : 7000*0.80;
                }else if(date >= 9 && date <=10 ){
                    this.form.medical_benifit = '90%';
                    this.computationAmount = this.form.reimbursment_type == 'Hospital'? 12000*0.90 : 7000*0.90;
                }else if(date >= 10){
                    this.form.medical_benifit = '100%';
                    this.computationAmount = this.form.reimbursment_type == 'Hospital'? 12000 : 7000;
                }
                
            }
            
            this.submitModal = true;
        },
        proceed(){
            if(this.form.reimbursment_type == 'Hospital'){
                if(this.computationAmount <= this.form.amount){
                    this.form.amount = this.computationAmount 
                }
            }else{
                 if(this.computationAmount <= this.form.amount){
                    this.form.amount = this.computationAmount 
                }
            }
            // this.form.medical_record3 == ''?null:this.form.medical_record3
            // this.form.medical_record4 == ''?null:this.form.medical_record4
            this.form.post(route('ReimburstmentSubmit'),{
                 onStart:(visit)=>{
                        this.isSubmiting == true
                    },
                    onFinish: visit =>{
                        this.isSubmiting == false
                    }
            });
            this.submitModal = false;
            console.log('Clicked');
        }
    }
}
</script>