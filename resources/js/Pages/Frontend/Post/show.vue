<template>
    <GuestLayout>
        <section class="flex flex-col md:flex-row m-2 p-2 ">
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
                    <span class="text-sm text-slate-400">posted by {{post.data.username}}</span> <!-- added the post.data.username cause of the resources added to it  -->
                    
                    <div class="flex flex-col md:flex-row" v-if="$page.props.auth.auth_check"> <!-- this is used to check if the user is logged in and post.data.owner is checking if you created the post -->
                        <Link v-if="can_update" class="font-semibold hover:text-blue-400 text-blue-600 mr-3" :href="route('communities.posts.edit',[community.slug, post.data.slug])">
                            Edit  <!-- we are using community.slug, post.data.slug cause these are the 2 that were passed from the url -->
                        </Link>
                        <Link v-if="can_delete" class="font-semibold hover:text-red-600  text-red-600" method="delete" type="button" as="button" :href="route('communities.posts.destroy',[community.slug, post.data.slug])">
                            Delete  
                        </Link>
                    </div>

                    <h1 class="font-semibold text-3xl text-black">{{post.data.title}}</h1>
                    <p class=" m-2 p-2 bg-white text-black">{{post.data.description}}</p>
                    <a :href="post.url" class="font-semibold text-blue-500 text-sm hover:text-blue-300 ">{{post.data.url}}</a>
                    <!-- comment section -->
                    <hr />
                    <div>
                        <ul role="list" class="divide-y divide-gray-200 m-2 p-2">
                            <li v-for="(comment, index) in post.data.comments" :key="index" class="py-4 flex flex-col">
                            <div class="text-sm">Comments by <span class="font-semibold ml-1 text-slate-700">{{comment.username}}</span></div>
                            <div class="text-slate-600 m-2 p-2"> {{comment.content}} </div>
                            </li>
                        </ul>
                    </div>
                    <!-- end of comment section -->
                    
                    <hr />
                    <!-- comment input Section -->

                    <form class="m-2 p-2 max-w-md" @submit.prevent="submit" v-if="$page.props.auth.auth_check">
                        <div class="mt-2">
                            <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your Comment </label>
                            <textarea v-model="form.content" id="comment" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg" />
                        </div>

                        <div class="mt-2">
                            <button class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Comment</button>
                        </div>
                    </form>

                    <!-- End of Comment Section -->

                </div>


            </div>
            <div class="w-full md:w-4/12 p-4">
                <div class="m-2 p-2 mt-2">
                    <PostList :posts="posts.data" :community="community">
                        <template #title>Popular Post </template>
                    </PostList>
                     <!-- added the postlist component -->
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue"
import {  Link, useForm } from '@inertiajs/vue3'
import PostList from "@/components/PostList.vue"


const props= defineProps({
    community:Object(),
    post:Object,
    posts:Object,
    can_delete:Boolean,
    can_update:Boolean,
});



const form = useForm({
    content: '',
});

const submit = () => {
    form.post(route("frontend.post.comments", [props.community.slug, props.post.data.slug]),{
        onSuccess:()=>form.reset('content')
    });
};  
</script>