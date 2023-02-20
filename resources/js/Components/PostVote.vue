<template>
    <div class="w-12 flex flex-col m-2 p-2 bg-slate-200">
        <UpVoteLink :slug=post.slug :class="{'text-blue-600':post.postVotes[0] && post.postVotes[0].vote==1}" />
        <div class="m-2 font-bold" :class="{'text-blue-600':post.postVotes[0] && post.postVotes[0].vote==1,'text-red-600':post.postVotes[0] && post.postVotes[0].vote==-1}">{{post.votes}}</div>
        <DownVoteLink :slug=post.slug :class="{'text-red-600':post.postVotes[0] && post.postVotes[0].vote==-1}"/>
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