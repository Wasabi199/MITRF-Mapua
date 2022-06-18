<template>
 <AppLayout title="Users">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>
        
    </AppLayout>
    
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import pagination from '@/Components/Pagination.vue';

export default {
    components:{
        AppLayout,
        pagination,

    },
  
    setup() {
        
    },
    data(){
        return{
            showDeleteModal: false,
        }
    }
}
</script>
<style scoped>
    .table {
        border-spacing: 0 15px;
    }

    i {
        font-size: 1rem !important;
    }

    .table tr {
        border-radius: 20px;
    }

    tr td:nth-child(n+5),
    tr th:nth-child(n+5) {
        border-radius: 0 .625rem .625rem 0;
    }

    tr td:nth-child(1),
    tr th:nth-child(1) {
        border-radius: .625rem 0 0 .625rem;
    }
</style>