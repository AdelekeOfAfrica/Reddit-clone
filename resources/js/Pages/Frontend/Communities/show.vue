<template>
    <GuestLayout>
        <template #header>
            <div class="flex justify-between m-2 p-2">
                <h2 class="font-semibold text-xl text-grey-800 leading-tight">
                {{community.name}}
                </h2> 
                <Link  v-if="$page.props.auth.auth_check" as="button" type="button" :href="route('communities.posts.create',community.slug)" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-700 px-3 py-2 text-sm
                    font-medium text-white shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2
                    focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto mr-3">Create Post
                </Link> 
            </div>
        </template>

        <section class="flex  md:flex-row m-2 p-2">
            <div class="w-full md:w-8/12">
             <PostCard v-for="post in posts.data" :post="post" :community="community.slug" :key="post.id" />
              <div class="mt-4 p-2">
                 <Pagination :links="posts.meta.links" />
              </div>
            </div>

            <div class="w-full md:w-4/12 p-4">
                <div>
                    <h2 class="font-semibold text-lg p-6 bg-blue-600 text-white rounded-lg"> About {{community.name}} </h2>
                    <p class=" bg-white p-4 rounded-b-lg">{{community.description}}</p>
                </div>
                <CommunityList class="mt-4" :communities="communities.data">
                <template #title>Latest Communities </template>
                </CommunityList>
            </div>
        </section>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue"
import {  Link } from '@inertiajs/vue3'
import PostCard from '@/components/PostCard.vue'
import Pagination from '@/components/Pagination.vue'
import CommunityList from '@/components/CommunityList.vue'

defineProps({
    community:Object(),
    posts:Object,
    communities:Object,
})
</script>