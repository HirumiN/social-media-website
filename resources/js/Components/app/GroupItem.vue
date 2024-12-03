<template>
    <div class="mb-3 cursor-pointer hover:bg-gray-100">
        <div class="flex items-start gap-1 p-2">
            <img :src="image" class="w-[48px] rounded-full" />
        <div>
            <h3 class="text-lg font-black">{{ title }}</h3>
            <div class="text-sm text-gray-500">
                {{ description }}
            </div>
        </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    image: String,
    title: String,
    description: String,
})
</script>
