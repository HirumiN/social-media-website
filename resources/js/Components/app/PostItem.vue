<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';

defineProps({
    post: Object,
});

function isImage(attachment) {
    const mime = attachment.mime.split('/');
    return mime[0].toLowerCase() == 'image';
}
</script>

<template>
    <div class="p-4 mb-3 bg-white border rounded shadow">
        <div class="flex items-center gap-2 mb-3">
            <a href="javascript:void(0)">
                <img
                    :src="post.user.avatar"
                    class="w-[40px] rounded-full border-2 transition-all hover:border-blue-400"
                />
            </a>
            <div>
                <h4 class="font-bold">
                    <a href="javascript:void(0)" class="hover:underline">
                        {{ post.user.name }}
                    </a>
                    <template v-if="post.group">
                        >
                        <a href="javascript:void(0)" class="hover:underline">
                            {{ post.user.name }}
                        </a>
                    </template>
                </h4>
                <small class="text-gray-400">{{ post.created_at }}</small>
            </div>
        </div>
        <div class="mb-3">
            <Disclosure>
                <div v-if="!open" v-html="post.body.substring(0, 200)" />
                <DisclosurePanel>
                    <div v-html="post.body" />
                </DisclosurePanel>
                <div class="flex justify-end">
                    <DisclosureButton class="text-blue-500 hover:underline">
                        {{ open ? 'Read less' : 'Read more' }}
                    </DisclosureButton>
                </div>
            </Disclosure>
        </div>
        <div class="grid grid-cols-2 gap-3 mb-3 lg:grid-cols-3">
            <div
                v-for="attachment of post.attachments"
                v-bind:key="attachment.id"
            >
                <div
                    class="relative flex flex-col items-center justify-center text-gray-500 bg-blue-100 aspect-square group"
                >
                <!-- Download -->
                    <button
                        class="absolute flex items-center justify-center text-gray-100 transition-all bg-gray-600 rounded opacity-0 cursor-pointer right-2 top-2 size-8 hover:bg-gray-800 group-hover:opacity-100"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"
                            />
                        </svg>
                    </button>
                    <img
                        :src="attachment.url"
                        v-if="isImage(attachment)"
                        class="object-cover aspect-squareo"
                    />
                    <template v-else>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-16"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                            />
                        </svg>
                        <small>

                            {{ attachment.name }}
                        </small>
                    </template>
                </div>
            </div>
        </div>
        <div class="flex gap-2">
            <button class="flex items-center justify-center flex-1 gap-1 px-4 py-2 text-gray-800 bg-gray-100 rounded-lg  hover:bg-gray-200">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="size-6"
                >
                    <path
                        d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z"
                    />
                </svg>
                Like
            </button>
            <button class="flex items-center justify-center flex-1 gap-1 px-4 py-2 text-gray-800 bg-gray-100 rounded-lg hover:bg-gray-200">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="size-6"
                >
                    <path
                        d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 0 0-1.032-.211 50.89 50.89 0 0 0-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 0 0 2.433 3.984L7.28 21.53A.75.75 0 0 1 6 21v-4.03a48.527 48.527 0 0 1-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979Z"
                    />
                    <path
                        d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 0 0 1.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0 0 15.75 7.5Z"
                    />
                </svg>
                Comment
            </button>
        </div>
    </div>
</template>
