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
                    <div class="ml-20 mt-10">
                        <p class="mb-1 mt-4 text-lg">Purpose of Loan</p>
                        <select
                            v-model="form.loan_type" 
                            @change="showModal = !showModal"
                            class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 transition ease-in duration-150 rounded-md mb-10">
                            <option value="placeholder" disabled>Select Loan Type</option>
                            <option  v-for="type in loanTypes" v-bind:key="type" :value="type">{{type}}</option>

                        </select>
                    </div>

                    <!-- Loan For Home -->
                    <form v-if="form.loan_type == 'Housing Loan'" @submit.prevent="submit" class="p-6 sm:px-20 bg-white border-b border-gray-200 mt-[-40px]" enctype="multipart/form-data">
                        
                        <p class="mb-1 text-lg">Terms (Months)</p>
                        <select v-model="form.duration"
                            class="mb-5 border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 transition ease-in duration-150 rounded-md">
                            <option value="12">12</option>
                            <option value="24">24</option>
                            <option value="36">36</option>
                            <option value="48">48</option>
                            <option value="60">60</option>
                        </select>
                        <div>
                            <label class="mb-1 text-lg text-gray-700" for="amount">Amount</label><br>
                         
                                <div class="mt-1 relative w-64 rounded-md">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 text-lg">
                                            ₱
                                        </span>
                                    </div>
                                    <input v-model="amount" type="number" placeholder="0.00"
                                        class="focus:ring-indigo-500 border-2 
                                    border-opacity-50 border-gray-400 hover:border-indigo-500 text-black block pl-7 pr-12 w-64 mb-5 font-lg rounded-md" />
                                
                                </div>
                              
                        </div>
                        <p class="mb-1 text-lg">Upload Requirements</p>

                        <div class="border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 w-5/12 rounded-md  mb-10">
                            <input @change="onChange"  type="file" accept=".png, .jpg, .jpeg, .pdf, .docx"
                                class="block w-full text-[1rem] text-slate-500 file:mr-4 file:py-2 file:px-4
                            file:border-0 file:text-md file:font-semibold file:bg-gray-200   file:text-gray-500 hover:file:bg-gray-300"
                                multiple />
                        </div>
                        <div class="flex justify-center">
                            <button type="button"  @click="submit"
                                class=" py-2 px-4 mb-5 bg-indigo-600 hover:bg-indigo-700 focus:ring focus:ring-indigo-300 text-white w-64 
                                transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg">Submit</button>
                        </div>
                    </form>

                    <!-- Loan For Educational -->
                     <form v-if="form.loan_type == 'Educational Loan'" class="p-6 sm:px-20 bg-white border-b border-gray-200 mt-[-40px]">
                        
                        
                        <p class="mb-1 text-lg">Terms (Months)</p>
                        <select
                            class="mb-5 border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 transition ease-in duration-150 rounded-md">
                            <option value="12">12</option>
                            <option value="24">24</option>
                            <option value="36">36</option>
                            <option value="48">48</option>
                            <option value="60">60</option>
                        </select>
                        <div>
                            <label class="mb-1 text-lg text-gray-700" for="amount">Amount</label><br>
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
                            <button type="button" @click="submitModal = !submitModal"
                                class=" py-2 px-4 mb-5 bg-indigo-600 hover:bg-indigo-700 focus:ring focus:ring-indigo-300 text-white w-64 
                                transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg">Submit</button>
                        </div>
                    </form>

                    <!-- Loan For Medical -->
                     <form v-if="form.loan_type == 'Medical Reimbursement'" class="p-6 sm:px-20 bg-white border-b border-gray-200 mt-[-40px]">
                        <p class="mb-1 text-lg">Terms (Months)</p>
                        <select
                            class="mb-5 border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 transition ease-in duration-150 rounded-md">
                            <option value="12">12</option>
                            <option value="24">24</option>
                            <option value="36">36</option>
                            <option value="48">48</option>
                            <option value="60">60</option>
                        </select>
                        <div>
                            <label class="mb-1 text-lg text-gray-700" for="amount">Amount</label><br>
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
                            <button type="button" @click="submitModal = !submitModal"
                                class=" py-2 px-4 mb-5 bg-indigo-600 hover:bg-indigo-700 focus:ring focus:ring-indigo-300 text-white w-64 
                                transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg">Submit</button>
                        </div>
                    </form>

                    <!-- Loan For Emergencies -->
                     <form v-if="form.loan_type == 'Emergency Loan'" class="p-6 sm:px-20 bg-white borsder-b border-gray-200 mt-[-40px]">
                        <p class="mb-1 text-lg">Terms (Months)</p>
                        <select
                            class="mb-5 border-2 border-gray-400 border-opacity-50 hover:border-indigo-500 transition ease-in duration-150 rounded-md">
                            <option value="12">12</option>
                            <option value="24">24</option>
                            <option value="36">36</option>
                            <option value="48">48</option>
                            <option value="60">60</option>
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
                            <button type="button" @click="submitModal = !submitModal"
                                class=" py-2 px-4 mb-5 bg-indigo-600 hover:bg-indigo-700 focus:ring focus:ring-indigo-300 text-white w-64 
                                transition ease-in duration-150 text-lg text-center font-semibold shadow-md rounded-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Guidelines -->
        <Modal  :show="showModal" :closeable="true" >
        <!-- Housing Loan Guidelines -->
        <div v-if="form.loan_type == 'Housing Loan'" class="p-5">
            <div class="flex justify-center text-xl font-bold text-gray-900 my-3">
                <span>Guideline : {{form.loan_type}}</span>
             
            </div>
            <br>
            <div class="flex justify-left text-l font-bold text-gray-900 my-3">
                <span><u>MITRF LOAN TERMS AND CONDITIONS</u>
                </span>
            </div>
            <br>
            <div class="flex justify-left text-m font-bold text-gray-900 my-3">
                <span>Eligibility Requirements
                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>1. Member-borrower must be a regular employee of the institute and contributing 5% of his monthly basic salary to MITRF.
                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>2. Member-borrower must maintain at least 45% net take home pay after deducting all his obligations including the MITRF amortization.
                </span>
            </div>
            <br>
            <div class="flex justify-left text-m font-bold text-gray-900 my-3">
                <span>Loan Amount
                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>1. The maximum amount shall be the total member-follower's fund contribution and earnings.
                </span>
            </div>
            <br>
            <div class="flex justify-left text-m font-bold text-gray-900 my-3">
                <span>Housing Assistance
                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>For housing, Loan requirements are the following: (30,000 - 100,000 maximum, 1-2 years term)
                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>1. Application Form
                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>2. Photo of you including the place to be improved/repaired.
                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>3. Laborer's quotation.
                </span>
            </div>
            <br>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span><u><i>This loan have a 9% interest per annum and a 2% service fee</i></u>
                </span>
            </div>
            <div class="flex justify-left text-s font-bold text-gray-900 my-3">
                <span><u>Note: It cannot be loaned at the same time with Education Loan.</u>
                </span>
            </div>


            <div>

            </div>
            <div class="flex justify-center text-xl font-bold dark:text-gray-200 my-3 space-x-40">
             
                <!-- Accept Button -->
                <div @click="accept" class="flex space-x-2 px-4 py-1 border text-sm leading-snug font-semibold text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:bg-green-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                    </svg>
                    <span>Accept</span>
                </div>
            </div>
        </div>

        <!-- Educational Loan Guidelines -->
        <div v-if="form.loan_type == 'Educational Loan'" class="p-5">
            <div class="flex justify-center text-xl font-bold text-gray-900 my-3">
                <span>Guideline : {{form.loan_type}}</span>
            
            </div>
            <br>
            <div class="flex justify-left text-l font-bold text-gray-900 my-3">
                <span><u>MITRF LOAN TERMS AND CONDITIONS</u>
                </span>
            </div>
            <br>
            <div class="flex justify-left text-m font-bold text-gray-900 my-3">
                <span>Eligibility Requirements
                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>1. Member-borrower must be a regular employee of the institute and contributing 5% of his monthly basic salary to MITRF.
                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>2. Member-borrower must maintain at least 45% net take home pay after deducting all his obligations including the MITRF amortization.
                </span>
            </div>

               <br> 
            <div class="flex justify-left text-m font-bold text-gray-900 my-3">
                <span>Loan Amount
                </span>
            </div>

            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>1. The maximum amount shall be the total member-follower's fund contribution and earnings.
                </span>
            </div>

             <br>
            <div class="flex justify-left text-m font-bold text-gray-900 my-3">
                <span>Education  Assistance
                </span>
            </div>

            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>For Education, Loan requirements are the following: (30,000 maximum, 1 year term)

                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>1. Application Form
                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>2. Proof of relation (Birth certificate in case of relatives).
                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>3. Certificate of Enrollment and Statement of Account from school.

                </span>
            </div>
            <br>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span><u><i>This loan have a 9% interest per annum and a 2% service fee</i></u>
                </span>
            </div>
            <div class="flex justify-left text-s font-bold text-gray-900 my-3">
                <span><u>Note: It cannot be loaned at the same time with Housing Loan.</u>
                </span>
            </div>
            <div  class="flex justify-center text-xl font-bold dark:text-gray-200 my-3">
                <div @click="accept" class="flex space-x-2 px-4 py-1 border text-sm leading-snug font-semibold text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:bg-green-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                    </svg>
                    <span>Accept</span>
                </div>
            </div>
        </div>

          <!-- Medical Reimbursement Loan Guidelines -->
        <div v-if="form.loan_type == 'Medical Reimbursement'" class="p-5">
            <div class="flex justify-center text-xl font-bold text-gray-900 my-3 mb-12">
                <span>Guideline : {{form.loan_type}}</span>
              
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

            <table class="table-auto m-auto bg-white shadow rounded-lg w-5/6">
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

            <table class="table-auto m-auto bg-white rounded-lg  shadow w-5/6">
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

            <div class="text-m text-gray-900 italic my-3 mb-10">
                <span class="float-right pr-12 underline">Where x = years as member of MITRF</span><br>
            </div>

            <div class="text-m text-gray-900 italic my-3 mb-10">
                <span class="pr-12 underline">*The MITRF Board reserves the right to review outpatient medical benefits annually, as deemed relevant by the Board.</span><br>
            </div>
            <div class="flex justify-center text-xl font-bold dark:text-gray-200 my-3 space-x-40">
              
                <!-- Accept Button -->
                <div @click="accept" class="flex space-x-2 px-4 py-1 border text-sm leading-snug font-semibold text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:bg-green-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                    </svg>
                    <span>Accept</span>
                </div>
            </div>
        </div>
         <!-- Emergency Loan Guidelines -->
        <div v-if="form.loan_type == 'Emergency Loan'" class="p-5">
            <div class="flex justify-center text-xl font-bold text-gray-900 my-3">
                <span>Guideline : {{form.loan_type}}</span>
              
            </div>
            <br>
            <div class="flex justify-left text-l font-bold text-gray-900 my-3">
                <span><u>MITRF LOAN TERMS AND CONDITIONS</u>
                </span>
            </div>
            <br>
            <div class="flex justify-left text-m font-bold text-gray-900 my-3">
                <span>Eligibility Requirements
                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>1. Member-borrower must be a regular employee of the institute and contributing 5% of his monthly basic salary to MITRF.
                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>2. Member-borrower must maintain at least 45% net take home pay after deducting all his obligations including the MITRF amortization.
                </span>
            </div>

               <br> 
            <div class="flex justify-left text-m font-bold text-gray-900 my-3">
                <span>Loan Amount
                </span>
            </div>

            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>1. The maximum amount shall be the total member-follower's fund contribution and earnings.
                </span>
            </div>

             <br>
            <div class="flex justify-left text-m font-bold text-gray-900 my-3">
                <span>Emergency Assistance
                </span>
            </div>

            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>For emergency, Loan requirements are the following: (30,000 maximum, 1-2 years term)

                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>1. Application Form
                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>2. 4.5% interest for a 2-year term.
                </span>
            </div>
            <div class="flex justify-left text-s text-gray-900 my-3">
                <span>3. 2.25% interest for a 1-year term.

                </span>
            </div>
	    <div class="flex justify-left text-s text-gray-900 my-3">
                <span>4. 45% threshold of net pay is not applicable but must not be zero or negative.

                </span>
            </div>
            
            <div class="flex justify-center text-xl font-bold dark:text-gray-200 my-3 space-x-40">
              
                <!-- Accept Button -->
                <div @click="accept" class="flex space-x-2 px-4 py-1 border text-sm leading-snug font-semibold text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:bg-green-500 cursor-pointer">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                    </svg>
                    <span>Accept</span>
                </div>
            </div>
        </div>


        <!-- Submit modal -->
        
    </Modal>
    <Modal  :show="submitModal" :closeable="true" >
    <div  class="p-5">
            <div class="flex justify-center text-xl font-bold text-gray-900 my-3">
                <span>Agreement</span>
              
            </div>
            <div>

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
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Modal from '@/Jetstream/Modal';


export default {
    
    components:{
        AppLayout,
        Modal,
        
    },
    setup() {
        
    },
    
    data(){
        return {
            isSubmiting: false,
            showModal: false,
            submitModal: false,
            amount:'',
            total_amount:0,
            
            // image:null,
            loanTypes:[
                'Housing Loan',
                'Educational Loan',
                'Medical Reimbursement',
                'Emergency Loan',
            ],
            form: this.$inertia.form({
                user_loan: this.$attrs.user.id,
                loan_type:'',
                loan_amount:'',
                duration:'',
                interest:'',
                attactment_path:'',

                
            }),
          
        }
        
    },
    methods:{
        accept(){
            console.log('clicked_accept')
            this.showModal = false
        },
        onChange(e){
            console.log("Selected File", e.target.files[0])
            this.form.attactment_path = e.target.files[0]
        },
        submit(){
            // console.log(this.$attrs.user.id);
            this.submitModal = true;
             if(this.form.loan_type == 'Housing Loan'){
                this.form.interest ='5%';
                this.total_amount = parseFloat(this.amount) * 0.05;
                this.form.loan_amount = this.amount + this.total_amount;
             }
            if(this.form.loan_type == 'Educational Loan'){
                this.form.interest ='5%';
                this.total_amount = parseFloat(this.amount) * 0.05;
                this.form.loan_amount = this.amount + this.total_amount;
             }
            if(this.form.loan_type == 'Medical Reimbursement'){
                this.form.interest ='5%';
                this.total_amount = parseFloat(this.amount) * 0.05;
                this.form.loan_amount = this.amount + this.total_amount;
             }
            if(this.form.loan_type == 'Emergency Loan'){
                this.form.interest ='5%';
                this.total_amount = parseFloat(this.amount) * 0.05;
                this.form.loan_amount = this.amount + this.total_amount;
             }
        },

        proceed(){
           
                this.form.post(route('createLoans'),{
                    onStart:(visit)=>{
                        this.isSubmiting == true
                    },
                    onFinish: visit =>{
                        this.isSubmiting == false
                    }
                });
           
            console.log('clicked')
            this.submitModal = false
        }
    },
  
    
}
</script>

<style scoped>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>