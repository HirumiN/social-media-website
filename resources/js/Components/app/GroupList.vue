<template>
    <div class="px-3">

        <h2 class="mb-3 text-2xl font-bold">My Groups</h2>
                <TextInput :model-value="searchKeyword" placeholder="Type to search"/>
                <div class="py-8">
                    <div v-if="false" class="flex text-center text-gray-400">
                        You are not joining a group
                    </div>
                    <div v-else>
                        <GroupItem
                            image="https://picsum.photos/100"
                            title="Laravel Dev"
                            description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, accusantium?"
                        />
                        <GroupItem
                            image="https://picsum.photos/100"
                            title="Vue Dev"
                            description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, accusantium?"
                        />
                    </div>
                </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import TextInput from '../TextInput.vue';
import GroupItem from './GroupItem.vue';

const searchKeyword = ref('')
</script>

<style lang="scss" scoped>


</style>
