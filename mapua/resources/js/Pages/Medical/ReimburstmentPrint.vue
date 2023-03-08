<template>
  <div class="p-10">
    <div class="border-b-4 border-solid border-black">
      <p>Date:__________________</p>
      <p class="font-bold mt-5">TO : MIT RETIREMENT FUND, INC.</p>
      <p>
        I underwent medical examination/treatment and spent a total of PHP
        <span class="underline">{{medical.amount}}</span> at the
      </p>
      <p><span class="underline">{{medical.clinic_name}}</span> (hospital/clinic) on <span class="underline ">{{medical.appointment_date}}</span></p>
      <p>
        Diagnosis:______________________________________________________________
      </p>
      <p>Attached herewith are the following:</p>
      <div class="flex gap-x-14">
        <p><input type="checkbox" checked>Official Reciepts</p>
        <p><input type="checkbox" checked>Hospital Bill/Statement of Account</p>
      </div>
      <div class="flex gap-x-10">
        <!-- <p><input type="checkbox" :checked="medical.hospital == true">Medical Certificate</p> -->
        <p><input type="checkbox"  :checked="medical.health == true">Doctor's Prescription/Medical Certificate</p>
        <p><input type="checkbox" :checked="medical.health == true">Laboratory Exam Results</p>
      </div>
      <div class="flex gap-x-6">
        <p><input type="checkbox">Others</p>
      </div>
      <div class="mt-5 flex gap-x-52">
        <p>Respectfully yours,</p>
        <p>Verified by,</p>
      </div>
      <div class="mt-5 flex gap-x-48">
        <p>{{(info.first_name+" "+info.middle_name+" "+info.last_name)}}</p>
        <p>_________________________</p>
      </div>
      <div class="flex gap-x-16 mb-5">
        <p>Member Signature-Over Printed Name</p>
        <p>MIT School Physician</p>
      </div>
    </div>
    <div class="mt-5">
      <div>To be filled-out by RF Accountant:</div>
      <div class="m-auto px-20 ">
        <table class="table-fixed border-2 w-full ">
          <thead>
            <tr>
              <th class="border bg-gray-400">Date</th>
              <th class="border bg-gray-400">Amount(In-Patient)</th>
              <th class="border bg-gray-400">Date</th>
              <th class="border bg-gray-400">Date</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td class="border py-5"></td>
                <td class="border"></td>
                <td class="border"></td>
                <td class="border"></td>
            </tr>
            <tr>
                <td class="border py-5"></td>
                <td class="border"></td>
                <td class="border"></td>
                <td class="border"></td>
            </tr>
            <tr>
                <td class="border py-5"></td>
                <td class="border"></td>
                <td class="border"></td>
                <td class="border"></td>
            </tr>
            <tr>
                <td class="border py-5"></td>
                <td class="border"></td>
                <td class="border"></td>
                <td class="border"></td>
            </tr>
          </tbody>
        </table>
       
      </div>
      <div class="mt-5">Remarks (if any)___________________________________________________________</div>
      <div class="mt-14 flex gap-x-52">
        <p>Respectfully yours,</p>
        <p>Verified by,</p>
      </div>
      <div class="mt-5 flex gap-x-44">
        <p class="font-semibold">{{this.board.treasurrer}}</p>
        <p class="font-semibold">{{this.board.chairman}}</p>
      </div>
      <div class="flex gap-x-44 mb-5">
        <p>Accounting Assistant</p>
        <p>Chairman of the Board - MITRF</p>
      </div>
    
    </div>
  </div>
</template>
<script>
import Table from "../../Components/Table.vue";
export default {
  setup() {
    Table;
  },
  props: {
    medical: Object,
    info: Object,
    board:Object,
  },
};
</script>