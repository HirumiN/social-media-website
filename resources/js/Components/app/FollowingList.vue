<script setup>
import FollowingListItems from "@/Components/app/FollowingListItems.vue";
import {Disclosure, DisclosureButton, DisclosurePanel} from "@headlessui/vue";

</script>
<template>
    <div class="h-full px-3 py-3 overflow-hidden bg-white border rounded">
        <div class="block lg:hidden">
            <Disclosure v-slot="{ open }">
                <DisclosureButton class="w-full">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold">My Followings</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6 transition-all"
                             :class="open ? 'rotate-90 transform' : ''">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                        </svg>
                    </div>
                </DisclosureButton>
                <DisclosurePanel>
                    <FollowingListItems/>
                </DisclosurePanel>
            </Disclosure>
        </div>
        <div class="flex-col hidden h-full overflow-hidden lg:flex">
            <h2 class="text-xl font-bold">My Followings</h2>
            <FollowingListItems/>
        </div>
    </div>
</template>
<style scoped>
</style>
