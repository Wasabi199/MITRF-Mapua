<template>
    <h1>{{users.name}}</h1>
</template>
<script>
export default {
    setup() {
        
    },
    props:{
        users:Object,
        loans:Object,
    }
}
</script>