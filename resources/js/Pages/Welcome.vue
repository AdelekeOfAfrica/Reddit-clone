<template>
    <GuestLayout>
        <section class="flex  md:flex-row m-2 p-2">
            <div class="w-8/12">
             <PostCard v-for="post in posts.data" :post="post" :community="post.community_slug" :key="post.id" />
            </div>

            <div class="w-4/12 p-4">
                <div class="m-2 p-2 bg-blue-700 text-white">
                    <h2>Top Communities </h2>
                </div>
                <div>
                 <CommunityList :communities="communities.data" />
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue"
import PostCard from '@/components/PostCard.vue'
import CommunityList from '@/components/CommunityList.vue'


defineProps({
    communities:Object,
    posts:Object
})
</script>