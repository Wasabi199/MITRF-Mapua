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
                class="bg-white p-4 overflow-hidden border-gray-300 shadow-xl rounded-lg"
            >
                <form>
                    <div class="px-2 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label
                                    class="block text-sm font-medium text-gray-700"
                                    >Name of Borrower</label
                                >
                                <input
                                    type="text"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    :value="$props.users.name"
                                    disabled
                                />
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label
                                    class="block text-sm font-medium text-gray-700"
                                    >Date of Membership</label
                                >
                                <input
                                    type="date"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    :value="$props.users.admin_reg.membership"
                                    disabled
                                />
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label
                                    class="block text-sm font-medium text-gray-700"
                                    >Years of Membership</label
                                >
                                <input
                                    type="number"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    :value="
                                        new Date().getUTCFullYear() -
                                        new Date(
                                            $props.users.admin_reg.membership
                                        ).getUTCFullYear()
                                    "
                                    disabled
                                />
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label
                                    class="block text-sm font-medium text-gray-700"
                                    >Principal Amount</label
                                >

                                <input
                                    type="number"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    :value="$props.loans.amount"
                                    disabled
                                />
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label
                                    class="block text-sm font-medium text-gray-700"
                                    >Net Amount Due to Borrower</label
                                >

                                <input
                                    type="number"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    :value="$props.loans.loan_amount"
                                    disabled
                                />
                            </div>
                            <div class="col-span-6 sm:col-span-2">
                                <label
                                    class="block text-sm font-medium text-gray-700"
                                    >Remaining Term of Payments
                                    &lpar;Months&rpar;</label
                                >
                                <input
                                    type="number"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    :value="loan_duration"
                                    disabled
                                />
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label
                                    class="block text-sm font-medium text-gray-700"
                                    >Approval Status</label
                                >
                                <input
                                    type="text"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    :value="$props.loans.approval"
                                    disabled
                                />
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-2 mt-2">
                            <label
                                class="block text-sm font-medium text-gray-700"
                                >Date of Loan Application</label
                            >
                            <input
                                type="text"
                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                :value="new Date($props.loans.created_at)"
                                disabled
                            />
                        </div>
                    </div>
                </form>
            </div>

            <div
                v-if="
                    loans.approval != 'Released' &&
                    loans.approval != 'Denied' &&
                    loans.approval != 'For Release'
                "
                class="row-span-3"
            >
                <div v-if="loans.loan_type == 'Housing Loan'">
                    <p class="font-semibold">
                        Member's Payslip for Validation:
                    </p>
                </div>
                <div v-if="loans.loan_type == 'Educational Loan'">
                    <p class="font-semibold">
                        Member's Payslip for Validation:
                    </p>
                </div>
                <div v-if="loans.loan_type == 'Emergency Loan'">
                    <p class="font-semibold">
                        Member's Payslip for Validation:
                    </p>
                </div>
                <div
                    class="bg-white shadow-xl rounded-lg content-center lg:mr-50"
                >
                    <img
                        :src="
                            loans.attachment1 == null
                                ? ''
                                : '../' + loans.attachment1
                        "
                        class="w-auto h-auto"
                    />
                </div>
                <div v-if="loans.loan_type == 'Housing Loan'">
                    <p class="font-semibold">
                        Photo of you Including the Place to be
                        Improved/Repaired:
                    </p>
                </div>
                <div
                    v-if="
                        loans.loan_type == 'Educational Loan' &&
                        loans.attachment2 != null
                    "
                >
                    <p class="font-semibold">
                        Proof of Relation (Birth Certificate in Case of
                        Relatives):
                    </p>
                </div>
                <div
                    class="bg-white shadow-xl rounded-lg content-center lg:mr-50"
                >
                    <img
                        :src="
                            loans.attachment2 == null
                                ? ''
                                : '../' + loans.attachment2
                        "
                        class="w-auto h-auto"
                    />
                </div>
                <div v-if="loans.loan_type == 'Housing Loan'">
                    <p class="font-semibold">Laborer's Quotation:</p>
                </div>
                <div v-if="loans.loan_type == 'Educational Loan'">
                    <p class="font-semibold">
                        Certificate of Enrollment and Statement of Account from
                        School:
                    </p>
                </div>
                <div
                    class="bg-white shadow-xl rounded-lg content-center lg:mr-50"
                >
                    <img
                        :src="
                            loans.attachment3 == null
                                ? ''
                                : '../' + loans.attachment3
                        "
                        class="w-auto h-auto"
                    />
                </div>
            </div>

            <div
                v-if="loans.approval == 'For Release'"
                class="bg-white shadow-xl rounded-lg content-center lg:mr-50"
            >
                <div class="justify-between flex m-4">
                    <div class="text-lg">
                        <p class="font-bold content-center">Good news!</p>
                        <p>
                            Your Personal Loan application has been processed.
                        </p>
                        <p>
                            A representative will send you an email for updates
                            on the release of your loan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Desktop view loan payment breakdown -->

            <div
                v-if="loans.approval == 'Released'"
                class="w-full bg-white shadow-xl rounded-lg content-center lg:mr-50 hidden md:block"
            >
                <table class="min-w-full divide-y divide-gray-200 mx-auto">
                    <thead class="inline-auto">
                        <tr
                            class="box-content h-10 w-20 p-4 border-10 bg-red-800 text-yellow-400"
                        >
                            <th class="text-center px-8">Loan </th>
                            <th class="text-center px-10">Amount</th>
                            <th class="text-center px-16">Date of Payment</th>
                    </tr>
               </thead>
                   <tbody class="bg-white divide-y divide-gray-200">
                        <tr
                            v-for="contribution in contributions.data"
                            v-bind:key="contribution.id"
                        >
                            <td class="px-6 py-6 whitespace-nowrap">
                                <div class="">
                                    <div>
                                        <div
                                            class="px-8 text-center text-sm font-medium text-gray-900"
                                        >
                                            {{ contribution.id }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="">
                                    <div>
                                        <div
                                            class="px-12 text-center text-sm font-medium text-gray-900"
                                        >
                                        &#8369
                                            {{
                                                contribution.contribution_amount.toLocaleString("en-US")
                                            }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="m-auto">
                                        <div
                                            class="px-2 text-sm font-medium text-gray-900"
                                        >
                                            {{
                                                new Date(
                                                    contribution.updated_at
                                                ).toLocaleString("en-us", {
                                                    month: "short",
                                                    day: "numeric",
                                                    year: "numeric",
                                                })
                                            }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :links="contributions.links"></Pagination>
            </div>


            <!-- mobile view loan loan breakdown -->

            <div
                v-if="loans.approval == 'Released'"
                class="text-xl font-semibold md:hidden"
            >
                Breakdown of Loan Payment
            </div>
            <div
                class="grid grid-cols-1 gap-4 md:hidden"
                v-for="contribution in contributions.data"
                v-bind:key="contribution.id"
            >
                <div class="bg-white p-4 rounded-lg shadow">
                    <div><b>Loan:</b> {{ contribution.id }}</div>
                    <div>
                        <b>Loan Amount:</b>
                        &#8369 {{ contribution.contribution_amount }}
                    </div>
                    <div>
                        <b>Date of Payment:</b>
                        {{ new Date(contribution.updated_at) }}
                    </div>
                </div>
            </div>
            <pagination
                v-if="loans.approval == 'Released'"
                class="md:hidden"
                :links="contributions.links"
            />
            <div
                v-if="loans.approval == 'Denied'"
                class="bg-white p-4 border-gray-300 shadow-xl rounded-lg h-fit m-auto w-full text-center"
            >
                <h1>Rejected Loan Application</h1>
                <div class="font-semibold">{{ loans.reason }}</div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="flex justify-between my-3">
                <div
                    class="flex space-x-2 mr-5 px-4 py-1 border text-md text-red-600 dark:text-red-600 dark:border-red-600 border-red-600 uppercase rounded-full dark:hover:text-gray-200 hover:text-white hover:border-none hover:bg-red-500 cursor-pointer"
                >
                    <Link :href="route('userDashboard')">
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
        contributions: Object,
    },
    data() {
        return {
            loan_duration: this.loans.duration - this.contributions.total,
        };
    },
    setup() {},
};
</script>
