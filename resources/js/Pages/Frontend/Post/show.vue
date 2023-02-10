<template>
    <GuestLayout>
        <section class="flex flex-col md:flex-row m-2 p-2">
            <div class="w-full md:w-8/12">
                <div class="m-2 p-2 bg-white">
                    <h2 class="font-semibold text-2xl text-grey-800 ">
                        <Link  v-if="$page.props.auth.auth_check" as="button" type="button" :href="route('frontend.communities.show',community.slug)" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-700 px-3 py-2 text-sm
                            font-medium text-white shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2
                            focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto mr-3">{{community.name}}
                        </Link>
                     </h2>
                </div>
                <div class="m-2 p-2 bg-white">
                    <span class="text-sm text-slate-400">posted by someone </span>
                    <h1 class="font-semibold text-3xl text-black">{{post.title}}</h1>
                    <p class="m-2 p-2 bg-white text-black">{{post.description}}</p>
                    <a :href="post.url" class="font-semibold text-blue-500 text-sm hover:text-blue-300 ">{{post.url}}</a>
                </div>
            </div>
            <div class="w-full md:w-4/12 p-4">
                <div class="m-2 p-2 bg-blue-700 text-white">
                    <h2>Latest Communities </h2>
                </div>
            </div>
        </section>
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