<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    href: String,
    as: String,
});
</script>

<template>
    <div>
        <button v-if="as == 'button'" type="submit" class="block w-full px-4 py-2 text-sm leading-5 text-red-700 text-left hover:bg-red-100 focus:outline-none focus:bg-red-100 transition">
            <slot />
        </button>

        <a v-else-if="as =='a'" :href="href" class="block px-4 py-2 text-sm leading-5 text-red-700 hover:bg-red-100 focus:outline-none focus:bg-red-100 transition">
            <slot />
        </a>

        <Link v-else :href="href" class="block px-4 py-2 text-sm leading-5 text-red-700 hover:bg-red-100 focus:outline-none focus:bg-red-100 transition">
            <slot />
        </Link>
    </div>
</template>
