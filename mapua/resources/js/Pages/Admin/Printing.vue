<template>
    
    <div id="toPrint" class="m-10 mx-auto w-1/2">
    <div class="shadow rounded-lg">
    <br>
        <h1 class="text-center font-extrabold text-lg">M.I.T RETIREMENT FUND, INC.</h1>
        <h2 class="text-center">Mapúa Institute of Technology
            <br>Muralla Street, Intramuros, 
            <br>Manila</h2>
        <br><br>
        
        <h2 class="text-center font-bold">LOAN APPLICATION</h2>

        <form class>
            <div class="px-2 py-5 sm:p-6">
                <div class="grid grid-cols-6 gap-6">



                    <div class="outline-double outline-4 mx-1 my-2 col-span-6"></div>

                    <div class="flex col-span-3">
                      
                        <p class="font-semibold">Name of Borrower</p>
                        <p class="ml-2 underline">{{info.first_name}} {{info.middle_name}} {{info.last_name}}</p>
                    </div>

                    <div class="flex col-span-2">
                       
                        <p class="font-semibold">Date of Birth</p>
                        <p class="ml-2 underline">{{info.birth_date}}</p>
                    </div>

                    <div class="flex col-span-1">
                       
                        <p class="font-semibold">Age:</p>
                        <p class="ml-2 underline">{{new Date().getUTCFullYear() - new Date(info.birth_date).getUTCFullYear()}}</p>
                    </div>

                    <div class="flex col-span-3">
                        
                        <p class="font-semibold">Date of Employment:</p>
                        <p class="ml-2 underline">{{info.employment}}</p>
                    </div>

                    <div class="flex col-span-3">
                        
                            <p class="font-semibold">Years of Service:</p>
                            <p class="ml-2 underline">{{new Date().getUTCFullYear() - new Date(info.employment).getUTCFullYear()}} Years</p>
                    </div>

                    <div class="flex col-span-6">
                        
                            <p class="font-semibold">Department:</p>
                            <p class="ml-2 underline">{{info.department}}</p>
                    </div>

                   

                    <div class="flex col-span-3">
                        
                        <p class="font-semibold">Amount of Loan</p>
                        <p class="ml-2 underline">Php {{loan.amount.toLocaleString('en-US')}}</p>
                    </div>

                    <div class="flex col-span-3">
                        
                        <p class="font-semibold">Term of Payment &lpar;Months&rpar;</p>
                        <p class="ml-2 underline">{{loan.duration}}</p>
                    </div>

                    <div class="flex col-span-4 mt-8">
                        <p class="text-justify indent-10">I hereby authorize the MITRF to collect and process the above information for legitimate 
                            purposes specifically for evaluation of my loan application and allow authorized personnel
                            to process such information in accordance with the Data Privacy Act of 2012.
                        </p>
                    </div>

                    <div class="col-span-2 mt-8">
                        <br><br>
                        <div class="border-b-2 text-center font-bold">{{info.first_name+' '+info.middle_name+' '+info.last_name}}</div>
                        <p class="text-center italic">&lpar;Signature of Applicant&rpar;</p>
                    </div>

                    <div class="outline-double outline-4 mx-1 my-2 col-span-6"></div>

                    <div class="flex col-span-6">
                        <p class="italic">&lpar;To be filled up by credit committee&rpar;</p>
                    </div>
                    
                    <div class="flex col-span-6">
                        <p class="font-bold">APPROVED,</p>&nbsp;<p>subject to the following terms and conditions:</p>
                    </div>
                    <div class="flex col-span-6 pl-5">
                        <ol>
                            <li class="flex">1. Amount of Loan &lpar;₱<p class="underline">{{loan.amount}}</p>&rpar;</li>
                            <li>2. Balance of Previous Loan &lpar;₱___________&rpar;</li>
                            <li class="flex">3. Net Amount due to Borrower &lpar;₱<p class="underline">{{loan.loan_amount}}</p>&rpar;</li>
                            <li class="flex">4. Monthly Amortization for &lpar;<p class="underline">{{loan.duration}}</p>&rpar; months</li>
                            <li>5. Payment of Amortization to start on the _____ day of _____________, and to end
                                on the _____ day of _____________.
                            </li>
                        </ol>
                    </div>

                    <div class="col-span-3 col-start-4">
                        <p class="font-bold">CREDIT COMMITTEE</p>
                        <p>By:</p><br>

                        <div class="border-b-2 mx-10"></div>
                        <p class="text-center">Chairman</p><br>
                        <div class="border-b-2 mx-10"></div>
                        <p class="text-center">Member</p>
                    </div>

                    <div class="col-span-3">
                        <div class="border-b-2 mx-10"></div>
                        <p class="text-center">Chairman, Board of Directors</p>
                    </div>
                    <div class="col-span-3">
                        <div class="border-b-2 mx-10"></div>
                        <p class="text-center">Member</p>
                    </div><br>

                </div>
            </div>
        </form>
        </div>
    <br>
    <!-- Second Page -->
    <div class="shadow rounded-lg">
        <h1 class="text-center font-bold text-lg">M.I.T RETIREMENT FUND, INC. </h1>
        <h2 class="text-center">Mapúa Institute of Technology
            <br>Muralla Street, Intramuros, 
            <br>Manila</h2>
                
        <form>
            <div class="px-2 py-5 sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-2">
                        <p class="font-bold">NON-NEGOTIABLE</p>
                    </div>
                    
                    <div class="col-span-2 col-start-5 text-right">
                        <p>No. __________</p>
                    </div>

                    <div class="col-span-6">
                        <p class="font-extrabold text-center">PROMISSORY NOTE</p>
                    </div>
                        
                    <div class="col-span-2">
                        <p class="overflow-clip">₱___________</p>
                    </div>
                    
                    <div class="col-span-4 col-start-3 text-right">
                        <p>Date Granted: __________________</p>
                    </div>

                    <div class="col-span-6">
                        <p>Maturity Date: ______________________________</p>
                    </div>

                    <div class="col-span-6">
                        <p class="indent-10 text-justify"><span class="font-semibold"> NOB VALUE RECEIVED, </span>I hereby promise to pay M.I.T. RETIREMENT
                        FUND, INC at its office at Muralla St., Intramuros, Manila, the sum of _____________________________________________ 
                        PESOS &lpar;₱ <span class="italic">{{loan.loan_amount}}</span> &rpar;, Philippine currency, plus interest and service charge at the rate of <span class="italic">{{loan.interest * 100}}</span>% and __________________,
                        respectively in equal semi-monthly installments of __________________ &lpar;₱ <span class="italic">{{loan.amount}}</span> &rpar; commencing on ____________________________,
                        ________ to ____________________, ________ and subject further to the following terms and conditions.</p><br>

                        <p class="indent-10 text-justify italic">The interest charge herein shall be subject in increase or reduction, depending on whatever policy
                        M.I.T. RETIREMENT FUND, INC. may, in the future, adapt conformable to law, decree, or government regulation with regard to any increase or 
                        decrease in Central Bank interest or rediscounting rates. Interest not paid when due shall be added to, and become part of the principal and shall 
                        likewise bear interest at the same rate stipulated herein.</p><br>

                        <p class="indent-10 text-justify italic">I hereby authorize and empower M.I.T. RETIREMENT FUND, INC. to set off, with out notice, what is due 
                        irrespective of the date of maturity and whether or not this obligation is due, from whatever funds I may have with it.</p><br>

                        <p class="indent-10 text-justify italic">M.I.T. RETIREMENT FUND, INC. may accept partial payment, grant extension of time or make any other arrangement 
                        regarding payment of this note which shall not affect my obligation, nor be deemed a waiver or loss of any of its rights herein granted and M.I.T. 
                        RETIREMENT FUND, INC. further reserves the right to recourse against each and endorses hereof, who hereby waived demand, presentment, protest and 
                        shows notice of dishonor.</p><br>

                        <p class="indent-10 text-justify italic mb-1">If this note is placed in the hands of an attorney for collection, I agree to pay the further sum of twenty-five 
                        percent &lpar;25%&rpar; of the amount due as attorney's fees, which shall not be less than ₱500.00, and in case of litigation, I agree to pay the costs 
                        of suit. Any action arising out of this note may be instituted in the proper court of Metro Manila, and in case of execution, I expressly waive the 
                        benefits of Section 12, Rule 39 of the Rules of Court.</p>
                    </div>

                    <div class="col-span-3 col-start-4">
                        <div class="border-b-2 mx-10 text-center font-bold ">{{info.first_name+' '+info.middle_name+' '+info.last_name}}</div>
                        <p class="text-center">&lpar;Borrower&rpar;</p>
                        <p class="text-center">&lpar;Print Name and Sign Above&rpar;</p>
                    </div>

                    <div class="col-span-6 text-center font-bold mb-2">SIGNED IN THE PRESENCE OF:</div>

                    <div class="col-span-3">
                        <div class="border-b-2 mx-10"></div>
                    </div>
                    <div class="col-span-3">
                        <div class="border-b-2 mx-10"></div>
                    </div>
                </div>

            </div>
        </form>
    </div>
<br>
    <!-- Third Page -->
    <div class="shadow rounded-lg"><br>
        <h1 class="text-center font-bold text-lg">M.I.T RETIREMENT FUND, INC. </h1>
        <h2 class="text-center">Mapúa Institute of Technology
            <br>Muralla Street, Intramuros, 
            <br>Manila</h2>
                
        <form>
            <div class="px-2 py-5 sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6">
                        <p class="font-extrabold text-center">ASSIGNMENT</p><br>

                        <p class="indent-10 text-justify ">I, <span class="underline italic  ">{{info.first_name +" "+ info.middle_name+" "+info.last_name}} </span>, ____________________________________________</p>

                        <p class="text-center flex"><span class="mx-24">&lpar;Name&rpar; </span> <span class="mx-40">&lpar;Designation&rpar;</span></p>
                        <p class="text-justify">of _______________________________, a member of M.I.T. RETIREMENT FUND, INC. in the principal amount of PESOS 
                        _______________________________________________________, covered by Promissory Note No. ________________________________ granted on 
                        ________________________, ____________, hereby authorized MAPUA INSTITUTE OF TECHNOLOGY &lpar;MIT&rpar; to deduct from the 
                        monthly compensation or bonuses due me, the periodic amortization due under said promissory note until fully paid. It is 
                        understood that said deductions shall be remitted by MIT or M.I.T. RETIREMENT FUND, INC. in my payment of my above-mentioned loan.</p><br>
                    
                        <p class="indent-10 text-justify">In the event that I fail to pay any or all the amortization due under said note, I further 
                        authorize the Board of Directors of the M.I.T. RETIREMENT FUND, INC. to apply the benefits that may due me or my beneficiary/ies under 
                        said RETIREMENT FUND in such amount as may be necessary to liquidate my outstanding obligation under said promissory note.</p><br><br>
                    </div>

                    <div class="col-span-3 col-start-4">
                        <div class="border-b-2 mx-10 text-center font-bold">{{info.first_name+' '+info.middle_name+' '+info.last_name}}</div>
                        <p class="text-center">&lpar;Borrower&rpar;</p>
                        <p class="text-center">&lpar;Print Name and Sign Above&rpar;</p><br><br>
                    </div>

                    <div class="col-span-3">
                        <p class="font-bold">CONFORME:</p><br>
                        <p class="font-bold">MAPUA INSTITUTE OF TECHNOLOGY</p>
                        <p>By:</p><br><br>

                        <div class="border-b-2 mx-10"></div>
                        <p class="text-center">&lpar;Treasurer&rpar;</p>
                    </div>
              
                    

                </div>
            </div>
        </form>
    </div>


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