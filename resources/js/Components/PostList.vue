<template>

<div class="w-full bg-white shadow-md border roundede-lg">
<h2 class="font-semibold text-lg p-6 bg-blue-600 text-white rounded-lg">
  <slot name="title" />
</h2>
<ul role="list" class="divide-y divide-slate-300 dark:divide-slate-700 p-4">
    <li v-for="post in posts" :key="post.id" class="py-3 sm:py-4">
        <div class="flex items-center space-x-4 text-align: center">
            <Link type="button" as="button" :href ="route('frontend.communities.post.show',[community.slug,post.slug])" class="text-slate-800 dark:text-slate-400 font-semibold truncate text-sm">

            {{post.title}}
            </Link>

            <div>
                Votes({{post.votes}})
            </div>
        </div>
    </li>
</ul>
</div>

</template>


<script setup>
  import {  Link } from '@inertiajs/vue3';

  defineProps({
    community:Object,
    posts:Object
  })
</script>