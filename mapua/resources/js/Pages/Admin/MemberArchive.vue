<template>
    <AppLayout title="User Archive">
        <template #header>
            <div class="flex justify-between">
                <div class="flex items-center">
                    <h1
                        class="font-extrabold text-xl text-gray-800 leading-tight"
                    >
                        Member Archive
                    </h1>
                </div>
            </div>
        </template>

        <!-- Archive table -->

        <div class="mx-12 my-6 shadow-md">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div
                        class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
                    >
                        <div
                            class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
                        >
                            <table class="min-w-full divide-y divide-gray-200">
                                <th class="text-center px-8 bg-gray-100">
                                    Name
                                </th>
                                <th class="text-center px-9 bg-gray-100">
                                    Contact No.
                                </th>
                                <th class="text-center px-16 bg-gray-100">
                                    E-mail
                                </th>
                                <th class="text-center px-16 bg-gray-100">
                                    Department
                                </th>
                                <!-- <th class="text-center px-14 bg-gray-100">
                Last Updated Contribution
            </th> -->

                                <tbody
                                    class="bg-white divide-y divide-gray-200"
                                >
                                    <tr
                                        v-for="user in deletedUsers.data"
                                        v-bind:key="user.id"
                                    >
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="">
                                                <Link
                                                    :href="
                                                        route(
                                                            'userProfile',
                                                            user.id
                                                        )
                                                    "
                                                >
                                                    <div>
                                                        <div
                                                            class="text-sm text-center font-medium text-gray-900"
                                                        >
                                                            {{ user.name }}
                                                        </div>
                                                    </div>
                                                </Link>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="">
                                                <div>
                                                    <div
                                                        class="text-sm text-center font-medium text-gray-900"
                                                    >
                                                        {{
                                                            user.admin_reg
                                                                .mobile_number
                                                        }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="">
                                                <div>
                                                    <div
                                                        class="text-sm text-center font-medium text-gray-900"
                                                    >
                                                        {{ user.email }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="px-20 py-4 whitespace-nowrap"
                                        >
                                            <div class="">
                                                <div>
                                                    <div
                                                        class="text-sm text-center font-medium text-gray-900"
                                                    >
                                                        {{
                                                            user.admin_reg
                                                                .department
                                                        }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <!-- <td class="px-20 py-4 whitespace-nowrap">
                        <div class="">
                            <div>
                                <div
                                    class="text-sm text-center font-medium text-gray-900"
                                >
                                    {{
                                        new Date(
                                            user.user_contribution.updated_at
                                        ).toLocaleDateString() +
                                        " " +
                                        new Date(
                                            user.user_contribution.updated_at
                                        ).toLocaleTimeString()
                                    }}
                                </div>
                            </div>
                        </div>
                    </td> -->
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                        >
                                            <!-- edit user info -->
                                            <div class="inline-flex gap-x-5">
                                                <Link
                                                    :href="
                                                        route(
                                                            'userProfile',
                                                            user.id
                                                        )
                                                    "
                                                    class="text-indigo-600 hover:text-indigo-900"
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="26"
                                                        height="26"
                                                        fill="currentColor"
                                                        class="bi bi-eye"
                                                        viewBox="0 0 16 16"
                                                    >
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"
                                                        />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"
                                                        />
                                                    </svg>
                                                </Link>

                                                <!-- Restore user  -->

                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="green"
                                                    class="w-6 h-6 cursor-pointer"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"
                                                    />
                                                </svg>

                                                <!-- delete user -->

                                                <svg
                                                    class="h-6 w-6 hover:text-red-500 bg-gray-100 text-red-800 cursor-pointer"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    @click="selectedUser(user)"
                                                >
                                                    <path
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>

                                                <!-- Archive User -->

                                                <!-- <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="green"
                                        class="w-6 h-6 "
                                        @click="selectedUser(user)"
                                    >
                                        <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"
                                        />
                                    </svg> -->
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <pagination :links="deletedUsers.links" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <Modal
            :closeable="true"
            :show="showDeleteModal"
            @close="showDeleteModal = !showDeleteModal"
        >
            <div class="p-5">
                <div
                    class="flex justify-between text-xl font-bold text-gray-900 my-3"
                >
                    <span>Update User Table</span>
                    <svg
                        class="h-6 w-6 cursor-pointer"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                        @click="showDeleteModal = !showDeleteModal"
                    >
                        <path
                            d="M6 18L18 6M6 6l12 12"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                        />
                    </svg>
                </div>
                <div
                    class="flex flex-col items-center text-xl font-bold text-gray-900 my-3"
                >
                    <svg
                        class="h-36 w-36 rounded-full text-red-700 opacity-60"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5px"
                        version="1.1"
                        viewBox="0 0 40 40"
                        xml:space="preserve"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                    >
                        <g>
                            <path
                                d="M17.125,0C7.668,0,0,7.667,0,17.125S7.668,34.25,17.125,34.25c9.459,0,17.125-7.667,17.125-17.125S26.584,0,17.125,0z    M23.445,11.422c1.355,0,2.453,1.099,2.453,2.453s-1.098,2.453-2.453,2.453c-1.354,0-2.451-1.099-2.451-2.453   S22.093,11.422,23.445,11.422z M10.806,11.422c1.354,0,2.453,1.099,2.453,2.453s-1.099,2.453-2.453,2.453s-2.453-1.099-2.453-2.453   S9.453,11.422,10.806,11.422z M26.457,25.641c-0.26,0.492-0.77,0.801-1.328,0.801H9.121c-0.559,0-1.067-0.309-1.328-0.801   c-0.26-0.494-0.225-1.09,0.093-1.549c2.098-3.046,5.551-4.865,9.239-4.865c3.689,0,7.146,1.819,9.24,4.866   C26.684,24.55,26.718,25.146,26.457,25.641z"
                            />
                        </g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                    </svg>
                    <span class="text-center"
                        >You are about to delete {{ userToDelete.name }}'s
                        account are you sure you want to proceed?</span
                    >
                </div>
                <div class="flex justify-center">
                    <div
                        class="flex justify-between text-xl font-bold dark:text-gray-200 my-3"
                    >
                        <div
                            class="flex space-x-2 mr-5 px-4 py-1 border text-md text-red-600 dark:text-red-600 dark:border-red-600 border-red-600 uppercase rounded-full dark:hover:text-gray-200 hover:text-white hover:border-none hover:bg-red-500 cursor-pointer"
                            @click="submitDeleteUser"
                        >
                            <svg
                                class="h-6 w-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                />
                            </svg>
                            <span>Yes I'm sure</span>
                        </div>
                    </div>
                    <div class="flex text-xl font-bold dark:text-gray-200 my-3">
                        <div
                            class="flex space-x-2 px-4 py-1 border text-md text-gray-600 dark:text-gray-600 dark:border-gray-600 border-gray-600 uppercase rounded-full dark:hover:text-gray-200 hover:text-white hover:border-none hover:bg-gray-500 cursor-pointer"
                            @click="showDeleteModal = !showDeleteModal"
                        >
                            <svg
                                class="h-6 w-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                />
                            </svg>
                            <span>Nevermind</span>
                        </div>
                    </div>
                </div>
            </div>
        </Modal>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import JetApplicationLogo from "@/Jetstream/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { pickBy, throttle } from "lodash";
import route from "../../../../vendor/tightenco/ziggy/src/js";
import { useForm } from "@inertiajs/inertia-vue3";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import Modal from "@/Jetstream/Modal";

export default {
    components: {
        AppLayout,
        Pagination,
        JetApplicationLogo,
        Link,
        JetValidationErrors,
        Modal,
        // JetInput,
        // JetLabel,
    },
    props: {
        deletedUsers: Object,
    },

    data() {
        return {
            showDeleteModal: false,
            userToDelete: Object,
            deleteForm: this.$inertia.form({
                id: Number,
            }),
        };
    },

    methods: {
        selectedUser(user) {
            this.userToDelete = user;
            this.showDeleteModal = !this.showDeleteModal;
        },

        submitDeleteUser() {
            this.deleteForm.id = this.userToDelete.id;
            this.deleteForm.delete(route("permanentDelete"), {
                onSuccess: () => {
                    this.showDeleteModal = false;
                },
            });
        },
    },
};
</script>
