<template>
    <div class="py-4 mb-3 bg-white border rounded-lg">
        <div @click="postCreate=true"
            class="px-2 py-3 mb-3 text-gray-400 border-2 border-gray-400 rounded"
        >
            Click here to create new post
        </div>
        <div v-if="postCreate" class="flex justify-between gap-2">
            <button
                type="submit"
                class="relative px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm cursor-pointer hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
                Attach Files
                <input type="file" class="absolute inset-0 opacity-0" />
            </button>
            <button
                type="submit"
                class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm cursor-pointer hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
                Submit
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';


const postCreate = ref(false)
</script>
