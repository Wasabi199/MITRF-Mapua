import AppLayout from '../../Layouts/AppLayout.vue';

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

        <table class="min-w-full divide-y divide-gray-200">
            <th class="text-center px-8 bg-gray-100">Name</th>
            <th class="text-center px-9 bg-gray-100">Contact No.</th>
            <th class="text-center px-16 bg-gray-100">E-mail</th>
            <th class="text-center px-16 bg-gray-100">Department</th>
            <th class="text-center px-14 bg-gray-100">
                Last Updated Contribution
            </th>

            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="user in users.data" v-bind:key="user.id">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="">
                            <Link :href="route('userProfile', user.id)">
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
                                    {{ user.admin_reg.mobile_number }}
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
                    <td class="px-20 py-4 whitespace-nowrap">
                        <div class="">
                            <div>
                                <div
                                    class="text-sm text-center font-medium text-gray-900"
                                >
                                    {{ user.admin_reg.z }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-20 py-4 whitespace-nowrap">
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
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                        <!-- edit user info -->
                        <div class="inline-flex gap-x-5">
                            <Link
                                :href="route('userProfile', user.id)"
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

                            <!-- delete user -->

                            <!-- <svg
                          class="
                            h-6
                            w-6
                            hover:text-red-500
                            bg-gray-100
                            text-red-800
                          "
                          fill="none"
                          stroke="currentColor"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                          @click="deleteUser(user)"
                        >
                          <path
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg> -->

                            <!-- Archive User -->

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="green"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"
                                />
                            </svg>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <pagination :links="users.links" />
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

export default {
    components: {
        AppLayout,
        Pagination,
        JetApplicationLogo,
        Link,
        JetValidationErrors,
        // JetInput,
        // JetLabel,
    },
};
</script>
