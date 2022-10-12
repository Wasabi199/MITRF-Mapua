<template>
  <AppLayout>
    <div class="flex justify-between bg-white shadow">
      <div
        class="flex items-center max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8"
      >
        <h2 class="font-extrabold text-xl text-gray-800 leading-tight">
          Loans
        </h2>

        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M9 5l7 7-7 7"
          />
        </svg>

        <h1 class="ont-extrabold text-xl text-gray-800 leading-tight">
          {{ users.name }}
        </h1>
      </div>
    </div>

    <div class="grid grid-cols-1 m-8 gap-8 lg:m-10 lg:grid-cols-2">
      <div
        class="
          bg-white
          p-4
          overflow-hidden
          border-gray-300
          shadow-xl
          rounded-lg
        "
      >
        <form>
          <div class="px-2 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label class="block text-sm font-medium text-gray-700"
                  >Name of Borrower</label
                >
                <input
                  type="text"
                  class="
                    mt-1
                    block
                    w-full
                    shadow-sm
                    sm:text-sm
                    border-gray-300
                    rounded-md
                  "
                  :value="$props.users.name"
                  disabled
                />
              </div>

              <div class="col-span-6 sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700"
                  >Date of Employment</label
                >
                <input
                  type="date"
                  class="
                    mt-1
                    block
                    w-full
                    shadow-sm
                    sm:text-sm
                    border-gray-300
                    rounded-md
                  "
                  :value="$props.users.admin_reg.employment"
                  disabled
                />
              </div>

              <div class="col-span-6 sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700"
                  >Years of Service</label
                >
                <input
                  type="date"
                  class="
                    mt-1
                    block
                    w-full
                    shadow-sm
                    sm:text-sm
                    border-gray-300
                    rounded-md
                  "
                  :value="$props.users.admin_reg.membership"
                  disabled
                />
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label class="block text-sm font-medium text-gray-700"
                  >Amount of Loan</label
                >

                <input
                  type="number"
                  class="
                    mt-1
                    block
                    w-full
                    shadow-sm
                    sm:text-sm
                    border-gray-300
                    rounded-md
                  "
                  :value="$props.loans.amount"
                  disabled
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label class="block text-sm font-medium text-gray-700"
                  >Amount of Loan</label
                >

                <input
                  type="number"
                  class="
                    mt-1
                    block
                    w-full
                    shadow-sm
                    sm:text-sm
                    border-gray-300
                    rounded-md
                  "
                  :value="$props.loans.loan_amount"
                  disabled
                />
              </div>
              <div class="col-span-6 sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700"
                  >Remaining Term of Payments &lpar;Months&rpar;</label
                >
                <input
                  type="number"
                  class="
                    mt-1
                    block
                    w-full
                    shadow-sm
                    sm:text-sm
                    border-gray-300
                    rounded-md
                  "
                  :value="loan_duration"
                  disabled
                />
              </div>

              <div class="col-span-6 sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700"
                  >Approval Status</label
                >
                <input
                  type="text"
                  class="
                    mt-1
                    block
                    w-full
                    shadow-sm
                    sm:text-sm
                    border-gray-300
                    rounded-md
                  "
                  :value="$props.loans.approval"
                  disabled
                />
              </div>
            </div>
          </div>
        </form>
      </div>

      <div v-if="loans.approval != 'Released' && loans.approval != 'Denied'" class="row-span-3">
        <div class="bg-white shadow-xl rounded-lg content-center lg:mr-50">
          <img
            :src="loans.attachment1 == null ? '' : '../' + loans.attachment1"
            class="w-auto h-auto"
          />
        </div>
        <div class="bg-white shadow-xl rounded-lg content-center lg:mr-50">
          <img
            :src="loans.attachment2 == null ? '' : '../' + loans.attachment2"
            class="w-auto h-auto"
          />
        </div>
        <div class="bg-white shadow-xl rounded-lg content-center lg:mr-50">
          <img
            :src="loans.attachment3 == null ? '' : '../' + loans.attachment3"
            class="w-auto h-auto"
          />
        </div>
      </div>
      <div
        v-if="loans.approval == 'Released'"
        class="w-full bg-white shadow-xl rounded-lg content-center lg:mr-50 hidden md:block"
      >
        <table class="min-w-full divide-y divide-gray-200 mt-5 mx-auto">
          <thead class="inline-auto">
            <tr
              class="
                box-content
                h-10
                w-20
                p-4
                border-10
                bg-red-800
                text-yellow-400
              "
            >
              <th class="text-left px-16">ID</th>
              <th class="text-left px-16">Amount</th>
              <th class="text-left px-16">Date of Creation</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr
              v-for="contribution in contributions.data"
              v-bind:key="contribution.id"
            >
              <td class="px-6 py-6 whitespace-nowrap">
                <div class="flex items-center">
                  <div>
                    <div class="px-12 text-sm font-medium text-gray-900">
                      {{ contribution.id }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div>
                    <div class="px-10 text-sm font-medium text-gray-900">
                      PHP {{ contribution.contribution_amount }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="m-auto">
                    <div class="px-5 text-sm font-medium text-gray-900 ">
                      {{ new Date(contribution.created_at).toLocaleString('en-us',{month:'short',day:'numeric', year:'numeric'}) }}
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <Pagination :links="contributions.links"></Pagination>
      </div>
      <div v-if="loans.approval == 'Released'" class="text-xl font-semibold md:hidden">Breakdown of Loan Payment</div>
      <div
        class="grid grid-cols-1 gap-4 md:hidden"
        v-for="contribution in contributions.data"
        v-bind:key="contribution.id"
      >
        <div class="bg-white p-4 rounded-lg shadow">
          <div><b>Reference ID:</b> {{ contribution.id }}</div>
          <div><b>Loan Amount:</b> {{ contribution.contribution_amount }} PHP</div>
          <div><b>Date of Payment:</b> {{ new Date(contribution.created_at) }}</div>
         
        </div>
        
      </div>
      <pagination v-if="loans.approval == 'Released'" class="md:hidden" :links="contributions.links" />
      <div
      v-if="loans.approval == 'Denied'"
      class="
        bg-white
        p-4
        border-gray-300
        shadow-xl
        rounded-lg
        h-fit
        m-auto  
        w-full
        text-center
      "
    >
      <h1>Rejected Loan Application</h1>
    </div>
    </div>
    <div class="flex justify-center">
      <div class="flex justify-between my-3">
        <div
          class="
            flex
            space-x-2
            mr-5
            px-4
            py-1
            border
            text-md text-red-600
            dark:text-red-600 dark:border-red-600
            border-red-600
            uppercase
            rounded-full
            dark:hover:text-gray-200
            hover:text-white hover:border-none hover:bg-red-500
            cursor-pointer
          "
        >
          <Link :href="route('dashboard')">
            <button>BACK TO HOME</button>
          </Link>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";

import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";
import { pickBy, throttle } from "lodash";
import Modal from "@/Jetstream/Modal";
export default {
  components: {
    AppLayout,
    Link,
    Pagination,
    Modal,
  },
  props: {
    users: Object,
    loans: Object,
    notification: Object,
    info: Object,
    contributions:Object
    
  },
  data(){
    return{
      loan_duration:this.loans.duration - this.contributions.total
    }
  },
  setup() {},
};
</script>