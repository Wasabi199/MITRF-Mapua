<template>
    <AppLayout title="Loan Dashboard">
        Loan Dashboard
    </AppLayout>
</template>

<script>
import JetApplicationLogo from "@/Jetstream/ApplicationLogo.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import JetNavLink from '@/Jetstream/NavLink.vue';

export default {
    components: {
        JetApplicationLogo,
        JetNavLink,
        AppLayout,
    },
    setup() {},
    props: {
        notification: Object,
        count: Number,
    },
};
</script>