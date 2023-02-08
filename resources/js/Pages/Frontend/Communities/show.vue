<template>
<GuestLayout>
<div class="flex justify-end m-2 p-2">
    <Link as="button" type="button" :href="route('communities.edit',community.id)" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-sm
        font-medium text-white shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2
        focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto mr-3">Edit Community
    </Link> 
</div>
<h1> community show {{community.name}} page </h1>
</GuestLayout>
</template>


<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue"
import { Head, Link } from '@inertiajs/vue3';
defineProps({
    community:Object()
})
</script>