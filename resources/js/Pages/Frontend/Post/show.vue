<template>
<GuestLayout>
    <template #header>    
        <div class="flex justify-between m-2 p-2">
            <h2 class="font-semibold text-xl text-grey-800 leading-tight">
             {{community.name}}
            </h2>  
        </div>
    </template>

    <section class ="flex md:flex-row m-2 p-2">
        <div class="w-8/12">
            <h1> {{post.title}}</h1>
            Post Details
        
        </div>
        <div class="w-4/12">
            <div class="m-3 p-3 bg-blue-700 text-white mr-6">
                <h2>Latest Communities</h2>
            </div>
        </div>
    </section>
    <h1> community show {{community.name}} page </h1>
</GuestLayout>
</template>


<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue"
import {  Link } from '@inertiajs/vue3'
import PostCard from '@/components/PostCard.vue'
import Pagination from '@/components/Pagination.vue'

defineProps({
    community:Object(),
    post:Object
})
</script>