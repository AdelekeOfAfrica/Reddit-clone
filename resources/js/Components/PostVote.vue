<template>
    <div class="w-12 flex flex-col m-2 p-2 bg-slate-200">
        <Link method="post" type="button" as="button" :href="route('posts.upvote',post)" class="text-gray-400 hover:text-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
            </svg>
            
        </Link>
        <div>4k</div>
        <Link method="post" type="button" as="button"  :href="route('posts.downvote',post)"  class="text-gray-400 hover:text-red-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
        </Link>
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3';

defineProps({
    post:String,
})
</script>