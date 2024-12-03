<script setup>
import CreatePost from '@/Components/app/CreatePost.vue';
import FollowingList from '@/Components/app/FollowingList.vue';
import GroupList from '@/Components/app/GroupList.vue';
import PostList from '@/Components/app/PostList.vue';
import { Head } from '@inertiajs/vue3';


defineProps({});
</script>

<template>
    <Head title="Social Media" />
    <div class="grid gap-3 lg:grid-cols-12">
        <div class="px-3 py-6 lg:col-span-3">
            <GroupList/>
        </div>
        <div class="lg:col-span-6">
            <CreatePost/>
            <PostList/>
        </div>
        <div class="lg:col-span-3">
            <FollowingList/>
        </div>
    </div>
</template>
