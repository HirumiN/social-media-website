
<script setup>
import CreatePost from '@/Components/app/CreatePost.vue';
import FollowingList from '@/Components/app/FollowingList.vue';
import GroupList from '@/Components/app/GroupList.vue';
import PostList from '@/Components/app/PostList.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

/**
 * Define the component props.
 */
defineProps({
  // Add props here if needed
});

/**
 * Define the component emits.
 */
defineEmits({
  // Add emits here if needed
});
</script>

<template>
  <!-- Set the page title -->
  <Head title="Social Media" />

  <!-- Use the AuthenticatedLayout component -->
  <AuthenticatedLayout>
    <!-- Create a grid container -->
    <div class="grid h-full gap-3 p-4 lg:grid-cols-12">
      <!-- Group List column -->
      <div class="h-full overflow-hidden lg:col-span-3 lg:order-1">
        <GroupList />
      </div>

      <!-- Following List column -->
      <div class="h-full overflow-auto lg:col-span-3 lg:order-3">
        <FollowingList />
      </div>

      <!-- Post List column -->
      <div class="flex flex-col h-full overflow-hidden lg:col-span-6 lg:order-2">
        <!-- Create Post component -->
        <CreatePost />

        <!-- Post List component -->
        <PostList class="flex-1" />
      </div>
    </div>
  </AuthenticatedLayout>
</template>
