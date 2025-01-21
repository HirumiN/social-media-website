<script setup>
defineProps({
    selected: Boolean,
    text: String,
});
</script>

<template>
    <button
        :class="[
            'px-3 py-2.5 outline-none',
            selected
                ? 'border-b-2 border-blue-500 bg-blue-50 text-blue-700'
                : 'text-gray-700',
        ]"
    >
        {{ text }}
    </button>
</template>
