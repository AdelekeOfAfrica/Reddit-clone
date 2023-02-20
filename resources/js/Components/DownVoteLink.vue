<template>
    <Link method="post" type="button" as="button"  :href="route('posts.downvote',slug)"  class="text-gray-400 hover:text-red-500 preserve-scroll">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
    </Link>
</template>

<script setup>
import {Link} from '@inertiajs/vue3';

defineProps({
    slug:String,
});
</script>