<template>
     
<AppLayout title="Register">
        <template #header>
            <div class="flex justify-between">
                <div class="flex items-center ">
                    <Link :href="route('users')">
                    <h1 class="font-extrabold text-xl text-gray-800 leading-tight">Users</h1>
                    </Link>
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <h1 class="font-extrabold text-xl text-gray-800 leading-tight">User Register</h1>
                </div>

            </div>
        </template>
    <JetAuthenticationCard>
        <template #logo>
            <img src="/images/mu_logo.png" alt="mu logo" class="h-40 w-45">
        </template>

        <JetValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div class="mt-2 text-lg font-extrabold">
                Personal Information
            </div>
            <div>
                <JetLabel for="name" value="Name" />
                <JetInput
                    id="name"
                   
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="name"
                />
            </div>
            <div class="mt-4">
                <JetLabel for="date of birth" value="Date of Birth" />
                <JetInput
                    id="date of birth"
                    
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div class="mt-4">
                <JetLabel for="date of employment" value="Date of Employment" />
                <JetInput
                    id="date of employment"
                   
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
            </div>


            <div class="mt-4">
                <JetLabel for="date of membership" value="Date of Membership" />
                <JetInput
                    id="date of membership"
                   
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
            </div>
            <div class="mt-4">
                <JetLabel for="number" value="Mobile Number" />
                <JetInput
                    id="number"
                    
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
            </div>
            <div class="mt-2 text-lg font-extrabold">
                Address Information
            </div>

            <div class="mt-4">
                <JetLabel for="region" value="Region" />
                <JetInput
                    id="region"
                   
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div class="mt-4">
                <JetLabel for="province" value="Province" />
                <JetInput
                    id="province"
                    
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div class="mt-4">
                <JetLabel for="municipality" value="Municipality" />
                <JetInput
                    id="municipality"
                    
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div class="mt-4">
                <JetLabel for="barangay" value="Barangay" />
                <JetInput
                    id="barangay"
                  
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div class="mt-2 text-lg font-extrabold">
                Account Information
            </div>

            <div class="mt-4">
                <JetLabel for="email" value="Email" />
                <JetInput
                    id="email"
                    
                    type="email"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div class="mt-4">
                <JetLabel for="password" value="Password" />
                <JetInput
                    id="password"
                  
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="mt-4">
                <JetLabel for="password_confirmation" value="Confirm Password" />
                <JetInput
                    id="password_confirmation"
                    
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="mt-4">
                <JetLabel for="role" value="Role" />
                <JetInput
                    id="role"
                   
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <JetLabel for="terms">
                    <div class="flex items-center">
                        <JetCheckbox id="terms"  name="terms" />

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                        </div>
                    </div>
                </JetLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <JetButton class="ml-4" >
                    Register
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard>
</AppLayout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';
import { data } from 'browserslist';

export default {
    setup() {
        
    },
    components:{
        AppLayout,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors,
        Link,
        data,
    },
    data(){
        return{
            form:this.$inertia.form({

            })
        }
    }
}
</script>