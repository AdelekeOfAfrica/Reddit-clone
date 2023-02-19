<template>
    <div class="w-12 flex flex-col m-2 p-2 bg-slate-200">
        <UpVoteLink :slug=post.slug />
        <div class="m-2">{{post.votes}}</div>
        <DownVoteLink :slug=post.slug />
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3';
import UpVoteLink from './UpVoteLink.vue';
import DownVoteLink from './DownVoteLink.vue';

defineProps({
    post:Object,
})
</script>