<template>
    <AppLayout title="profile">
        <template #header>

            <div class="flex justify-between">
                <div class="flex items-center ">
                    <Link :href="route('users')" class="hover:underline">
                        <h1 class="font-extrabold text-xl text-gray-800 leading-tight">Users</h1>
                    </Link>
                    <svg class="h-6 w-6" fill="none" stroke="blue" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </svg>
                    <h1 class="font-extrabold text-xl text-gray-800 leading-tight">{{users.name}}'s Profile</h1>
                </div>

            </div>
        </template>
        <div class="flex pl-44 sm:mx-auto mt-10">
            <div class="py-12">
                <div class="max-w-7xl sm:px-6 lg:px-8">
                    <div class="bg-white p-4 overflow-hidden border-gray-300 shadow-xl sm:rounded-lg ">

                        <!-- Contact -->
                        <div class="mb-8">

                            <div class="flex text-lg">
                                <svg class="h-6 w-6 text-red-900" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </svg>

                                <p class="pl-2 font-semibold">{{ users.email }}</p>

                            </div>


                            <div class="flex text-lg">
                                <svg class="h-6 w-6 text-red-900" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </svg>

                                <p class="pl-2 font-semibold">{{ users.admin_reg.mobile_number }}</p>

                            </div>
                        </div>

                        <!-- Name -->
                        <div class="justify-between flex">
                            <div class="flex text-lg">
                                <p class="font-semibold">Name: </p>
                                <p class="ml-2 underline">{{ users.name }}</p>
                            </div>


                            <svg @click="showModal = !showModal" class="h-6 w-6 text-red-900 hover:text-red-700" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                                    stroke-linecap="round"
                                    troke-linejoin="round"/>
                            </svg>

                        </div>

                        <!-- Civil status -->

                        <div class="flex text-lg">
                            <p class="font-semibold">Civil Status:</p>
                            <p class="ml-2 underline">{{users.admin_reg.civil_status}}</p>
                        </div>

                        <!-- birth date -->

                        <div class="flex text-lg">
                            <p class="font-semibold">Birthdate:</p>
                            <p class="ml-2 underline">{{users.admin_reg.birth_date}}</p>
                        </div>

                        <!-- place of birth -->
                        <div class="flex text-lg">
                            <p class="font-semibold">Place of Birth:</p>
                            <p class="ml-2 underline">{{users.admin_reg.birth_place}}</p>
                        </div>
                        <!-- address -->

                        <!-- <div class="flex text-lg">
                            <p class="font-semibold">Address:</p>
                            <p class="ml-2 underline">{{ user.admin_reg.current_address }} {{ user.admin_reg.barangay }}
                                {{ user.admin_reg.municipality }}</p>
                        </div> -->

                        <!-- department -->

                        <div class="flex text-lg">
                            <p class="font-semibold">Department:</p>
                            <p class="ml-2 underline">{{ users.admin_reg.department }}</p>

                        </div>
                        <!-- membership date -->

                        <div class="flex text-lg">
                            <p class="font-semibold">Member Since:</p>
                            <p class="ml-2 underline">{{ users.admin_reg.membership }}</p>

                        </div>
                        <!-- Contribution -->
                        <div class="flex text-lg">
                            <p class="font-semibold">Current Contribution:</p>
                            <p class="ml-2 underline">
                                {{
                                    users.admin_reg.toal_contribution = null ? 'No Contribution' : 'Php '+users.admin_reg.total_contribution
                                }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Past loans -->

            <div class="bg-white shadow-lg mr-20">
                <table class="min-w-full divide-y divide-gray-200 table-auto">
                    <thead>
                    <tr class=" bg-red-800 text-yellow-400">
                        <th class="text-left px-16">Past Loan</th>
                        <th class="text-left px-16">Amount</th>
                        <th class="text-left px-16">Terms</th>
                        <th class="text-left px-16">Date of Completion</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="loan in loans" v-bind:key="loan.id">
                            <td class="px-6 py-6 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div>
                                        <div class="px-5 text-sm font-medium text-gray-900">
                                            {{ loan.id}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div>
                                        <div class="px-5 text-sm font-medium text-gray-900">
                                            {{ loan.loan_amount}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div>
                                        <div class="px-5 text-sm font-medium text-gray-900">
                                            {{ loan.duration}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                             <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div>
                                        <div class="px-5 text-sm font-medium text-gray-900">
                                            {{ loan.loan_status}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <pagination :links="loans.links"/>
    <Modal :show="showModal" :closeable="true" @close="showModal = !showModal">
        <div class="p-5">
            <div class="flex justify-between text-xl font-bold text-gray-900 my-3">
                <span>Update User Information</span>
                <svg @click="showModal = !showModal" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="grid grid-cols-2 p-5 gap-5">
                            <div class="flex flex-col col-span-2">
                    <span class="text-sm leading-snug font-bold  text-gray-900">Update Personal Information</span>

                </div>
                <!-- First Name -->
                <div class="flex flex-col">
                    <span class="text-sm leading-snug font-semibold text-gray-900 ">First Name</span>
                    <jet-input v-model="form.first_name" :placeholder="users.admin_reg.first_name" class="px-3 py-1 mt-2 text-lg text-gray-900 font-bold" />
                </div>
                <!-- Middle Name -->
                <div class="flex flex-col">
                    <span class="text-sm leading-snug font-semibold text-gray-900 ">Middle Name</span>
                    <jet-input v-model="form.middle_name" :placeholder="users.admin_reg.middle_name" class="px-3 py-1 mt-2 text-lg text-gray-900 font-bold" />
                </div>
                <!-- Last Name -->
                <div class="flex flex-col">
                    <span class="text-sm leading-snug font-semibold text-gray-900 ">Last Name</span>
                    <jet-input v-model="form.last_name" :placeholder="users.admin_reg.last_name" class="px-3 py-1 mt-2 text-lg text-gray-900 font-bold" />
                </div>
                   <!-- Mobile Number -->
                <div class="flex flex-col">
                    <span class="text-sm leading-snug font-semibold text-gray-900 ">Mobile Number</span>
                    <jet-input v-model="form.mobile_number" :placeholder="users.admin_reg.mobile_number" class="px-3 py-1 mt-2 text-lg text-gray-900 font-bold" />
                </div>
                <!-- Birth Date -->
                 <div class="flex flex-col ">
                    <span class="text-sm leading-snug font-semibold text-gray-900 ">Date of Birth</span>
                    <jet-input v-model="form.birth_date" :placeholder="users.admin_reg.birth_date" class="px-3 py-1 mt-2 text-lg text-gray-900 font-bold" type="text" onfocus="(this.type='date')"/>
                </div>
                <!-- Civil Status -->
                 <div class="flex flex-col ">
                    <span class="text-sm leading-snug font-semibold text-gray-900 ">Civil Status</span>
                    <select v-model="form.civil_status" :placeholder="users.admin_reg.civil_status"
                                     class="mt-1 block w-full dark  text-gray-900 border-gray-300   focus:ring-opacity-50 rounded-md shadow-sm"
                                     required>
                                 <option disabled value="placeholder">Select Status</option>
                                 <option v-for="status in civil_status" v-bind:key="status" :value="status">{{ status }}</option>
                             </select>
                </div>
                <!-- <div class="flex flex-col col-span-2">
                    <span class="text-sm leading-snug font-bold  text-gray-900">Update Address Information</span>

                </div>
                    Region
                <div class="flex flex-col">
                    <span class="text-sm leading-snug font-semibold text-gray-900 ">Region</span>
                    <jet-input  v-model="form.region" :placeholder="user.admin_reg.region" class="px-3 py-1 mt-2 text-lg text-gray-900 font-bold" />
                </div>
                Province
                <div class="flex flex-col">
                    <span class="text-sm leading-snug font-semibold text-gray-900 ">Province</span>
                    <jet-input v-model="form.province" :placeholder="user.admin_reg.province" class="px-3 py-1 mt-2 text-lg text-gray-900 font-bold" />
                </div>
                Municipality
                <div class="flex flex-col">
                    <span class="text-sm leading-snug font-semibold text-gray-900 ">Municipality</span>
                    <jet-input v-model="form.municipality" :placeholder="user.admin_reg.municipality" class="px-3 py-1 mt-2 text-lg text-gray-900 font-bold" />
                </div>
                Barangay
                <div class="flex flex-col">
                    <span class="text-sm leading-snug font-semibold text-gray-900 ">Barangay</span>
                    <jet-input v-model="form.barangay" :placeholder="user.admin_reg.barangay" class="px-3 py-1 mt-2 text-lg text-gray-900 font-bold" />
                </div>
                Current Address
                <div class="flex flex-col col-span-2">
                    <span class="text-sm leading-snug font-semibold text-gray-900 ">Current Address</span>
                    <jet-input v-model="form.current_address" :placeholder="user.admin_reg.current_address" class="px-3 py-1 mt-2 text-lg text-gray-900 font-bold" />
                </div> -->

                  <!-- <div class="flex flex-col col-span-2">
                    <span class="text-sm leading-snug font-bold  text-gray-900">Update Loan Information</span>

                </div> -->
                      <!-- Department -->
                <div class="flex flex-col col-span-2">
                    <span class="text-sm leading-snug font-semibold text-gray-900 ">Department</span>
                    <select v-model="form.department" :placeholder="users.admin_reg.department"
                                     class="mt-1 block w-full dark  text-gray-900 border-gray-300   focus:ring-opacity-50 rounded-md shadow-sm"
                                     required>
                                 <option disabled value="placeholder">Select Department</option>
                                 <option v-for="department in departments" v-bind:key="department" :value="department">{{ department }}</option>
                             </select>
                </div>
                <!-- Employment -->
                <div class="flex flex-col">
                    <span class="text-sm leading-snug font-semibold text-gray-900 ">Date of Employment</span>
                    <jet-input v-model="form.employment" :placeholder="users.admin_reg.employment" type="text" onfocus="(this.type='date')" class="px-3 py-1 mt-2 text-lg text-gray-900 font-bold" />
                </div>
                <!-- Membership -->
                <div class="flex flex-col">
                    <span class="text-sm leading-snug font-semibold text-gray-900 ">Date of Membership</span>
                    <jet-input v-model="form.membership" :placeholder="users.admin_reg.membership" type="text" onfocus="(this.type='date')" class="px-3 py-1 mt-2 text-lg text-gray-900 font-bold" />
                </div>
                <!-- Total Contribution -->
                <!-- <div class="flex flex-col col-span-2">
                    <span class="text-sm leading-snug font-semibold text-gray-900 ">Total Contribution</span>
                    <jet-input v-model="form.total_contribution" :placeholder="users.admin_reg.total_contribution != null ? users.admin_reg.total_contribution:'No Contribution'" class="px-3 py-1 mt-2 text-lg text-gray-900 font-bold" />
                </div> -->

            </div>
            <div class="flex justify-end text-xl font-bold dark:text-gray-200 my-3">
                <div @click="submit" class="flex space-x-2 px-4 py-1 border text-sm leading-snug font-semibold text-green-600 dark:text-green-600 dark:border-green-600 border-green-600 uppercase rounded-full dark:hover:text-gray-200 hover:bg-green-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                    </svg>
                    <span>Update</span>
                </div>
            </div>
        </div>
    </Modal>
            </div>


        </div>

    </AppLayout>


</template>
<script>

import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link} from '@inertiajs/inertia-vue3';
import Modal from '@/Jetstream/Modal'
import JetInput from '@/Jetstream/Input'
import route from '../../../../vendor/tightenco/ziggy/src/js';
import Pagination from '@/Components/Pagination.vue';

export default {
    components: {
        JetApplicationLogo,
        AppLayout,
        Link,
        Modal,
        JetInput,
        Pagination
    },
    setup() {

    },

    data(){
        return{
        showModal: false,
        form: this.$inertia.form({
            id:Number,
            first_name:'',
            middle_name:'',
            last_name:'',
            mobile_number:'',
            birth_date:'',
            civil_status:'',

            // region:'',
            // province:'',
            // municipality:'',
            // barangay:'',
            // current_address:'',

            department:'',
            employment:'',
            membership:'',
            total_contribution:'',
        }),
         departments:[
                "School of Architecture, Industrial Design, and the Built Environment",

                "School of Chemical, Biological, and Materials Engineering and Sciences",

                "School of Civil, Environmental, and Geological Engineering",

                "School of Electrical, Electronics, and Computer Engineering",

                "School of Industrial Engineering and Engineering Management",

                "School of Mechanical and Manufacturing Engineering",

                "School of Media Studies",

                "School of Social Sciences and Education",

                "Department of Arts and Letters",

                "Department of Mathematics",

                "Department of Physics",

                "School of Information Technology",

                "E.T. Yuchengo School of Business in collaboration with Arizona State University",

                "Admin office(Treasury, Registrar, Admission)",

                "Maintenance",

            ],
            civil_status:[
                'Single',
                'Maried',
                'Widowed',
                'Divorced',
            ],
        }
    },
    props: {
        users: Object,
        loans:Object,
        notification:Object,
        count:Number,

    },
    methods: {
        submit(){
            console.log('submitting..')
            // Personal Information
            this.form.id = this.users.id

            this.form.first_name ==''? this.form.first_name = this.users.admin_reg.first_name : this.form.first_name
            this.form.middle_name == ''? this.form.middle_name = this.users.admin_reg.middle_name : this.form.middle_name
            this.form.last_name == ''? this.form.last_name = this.users.admin_reg.last_name : this.form.last_name
            this.form.mobile_number == ''? this.form.mobile_number = this.users.admin_reg.mobile_number : this.form.mobile_number
            this.form.birth_date == ''? this.form.birth_date = this.users.admin_reg.birth_date : this.form.birth_date
            this.form.civil_status == ''? this.form.civil_status = this.users.admin_reg.civil_status : this.form.civil_status
            // Address Information
            // this.form.region == ''? this.form.region = this.users.admin_reg.region : this.form.region
            // this.form.province == ''? this.form.province = this.users.admin_reg.province : this.form.province
            // this.form.municipality == ''? this.form.municipality = this.users.admin_reg.municipality : this.form.municipality
            // this.form.barangay == ''? this.form.barangay = this.users.admin_reg.barangay : this.form.barangay
            // this.form.current_address == ''? this.form.current_address = this.users.admin_reg.current_address : this.form.current_address
            // loan information
            this.form.department == ''? this.form.department = this.users.admin_reg.department : this.form.department
            this.form.employment == ''? this.form.employment = this.users.admin_reg.employment : this.form.employment
            this.form.membership == ''? this.form.membership = this.users.admin_reg.membership : this.form.membership
            // this.form.total_contribution == ''? this.form.total_contribution = 'No Contribution' : this.form.total_contribution

            this.form.post(route('userUpdate'),{
                onSuccess:()=>{
                     console.log('success..')
                    this.form.reset()
                    this.showModal = false
                }
            })
        }
    }
}
</script>
