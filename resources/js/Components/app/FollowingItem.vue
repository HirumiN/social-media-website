<template>
    <div class="mb-3 cursor-pointer hover:bg-gray-100">
        <div class="flex items-center gap-2 p-2">
            <img :src="image" class="w-[48px] rounded-full" />
        <div>
            <h3 class="font-black">{{ title }}</h3>
        </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    image: String,
    title: String,
})
</script>
