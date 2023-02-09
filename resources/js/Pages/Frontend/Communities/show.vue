<template>
<GuestLayout>
    <template #header>
       <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            {{community.name}}
       </h2> 

        <div class="flex justify-end m-2 p-2">
            <Link  v-if="$page.props.auth.auth_check" as="button" type="button" :href="route('communities.posts.create',community.slug)" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-sm
                font-medium text-white shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2
                focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto mr-3">Create Post
            </Link> 
        </div>
    </template>

    <section class ="m-2 p-2">
        <PostCard v-for="post in posts.data" :key="post.id" />
    </section>
    <h1> community show {{community.name}} page </h1>
</GuestLayout>
</template>


<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue"
import {  Link } from '@inertiajs/vue3'
import PostCard from '@/components/PostCard.vue'

defineProps({
    community:Object(),
    posts:Object
})
</script>