<template>
    <div class="px-3">
        <h2 class="mb-3 text-2xl font-bold">My Friends</h2>
        <TextInput :model-value="searchKeyword" placeholder="Type to search" />
        <div class="py-8">
            <div v-if="false" class="flex text-center text-gray-400">
                You don't have friends yet
            </div>
            <div v-else>
                <FollowingItem
                    image="https://picsum.photos/100"
                    title="John Doe"
                    description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, accusantium?"
                />
                <FollowingItem
                    image="https://picsum.photos/100"
                    title="Elon Musk"
                    description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, accusantium?"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import TextInput from '../TextInput.vue';
import FollowingItem from './FollowingItem.vue';

const searchKeyword = ref('');
</script>

<style lang="scss" scoped></style>
