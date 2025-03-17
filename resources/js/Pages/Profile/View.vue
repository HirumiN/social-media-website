<template>
    <AuthenticatedLayout>
        <div class="mx-auto h-full w-[768px] overflow-auto">
            <div class="relative bg-white">
                <pre>{{ user }}</pre>
                <div class="group">
                    <img
                        :src="
                            coverImageSrc || user.cover_url || '/img/default.jpeg'
                        "
                        class="h-[200px] w-full object-cover"
                    />

                    <div class="absolute right-2 top-2">
                        <button
                            class="flex items-center gap-2 px-2 py-1 text-xs text-gray-800 opacity-0 bg-green-50 hover:bg-gray-100 group-hover:opacity-100"
                            @click="openModal"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-4"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z"
                                />
                            </svg>

                            Update Cover Image
                            <!-- <input type="file" name="" id="" class="absolute top-0 bottom-0 right-0 opacity-0 cursor-pointer lef-0" @change="updateCoverImage"> -->
                        </button>
                    </div>

                    <!-- Modal Edit Cover -->
                    <div
                        v-if="isModalOpen"
                        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
                        @click.self="closeModal"
                    >
                        <div class="p-6 bg-white rounded-lg shadow-lg w-96">
                            <h2 class="mb-4 text-lg font-bold">
                                Edit Cover Image
                            </h2>
                            <input
                                type="file"
                                @change="onFileChange"
                                accept="image/*"
                                class="mb-4"
                            />

                            <div
                                v-if="imageUrl"
                                class="w-full overflow-hidden h-60"
                            >
                                <Cropper
                                    ref="cropper"
                                    :src="imageUrl"
                                    class="cropper"
                                    :stencil-props="{ aspectRatio: 16 / 9 }"
                                    @touchstart.passive="() => {}"
                                />
                            </div>

                            <div class="flex justify-end gap-2 mt-4">
                                <button
                                    @click="closeModal"
                                    class="px-3 py-1 text-white bg-gray-500 rounded"
                                >
                                    Cancel
                                </button>
                                <button
                                    @click="cropImage"
                                    class="px-3 py-1 text-white bg-blue-500 rounded"
                                >
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <img
                        src="https://cdn.iconscout.com/icon/free/png-256/free-avatar-370-456322.png?f=webp"
                        class="-mt-[64px] ml-[48px] h-[128px] w-[128px]"
                    />
                    <div class="flex items-center justify-between flex-1 p-4">
                        <h2 class="text-lg font-bold">{{ user.name }}</h2>
                        <PrimaryButton v-if="isMyProfile">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-4 h-4 mr-2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                />
                            </svg>
                            Edit Profile
                        </PrimaryButton>
                    </div>
                </div>
            </div>
            <div class="border-t">
                <TabGroup>
                    <TabList class="flex bg-white">
                        <Tab
                            v-if="isMyProfile"
                            v-slot="{ selected }"
                            as="template"
                        >
                            <TabItem text="About" :selected="selected" />
                        </Tab>
                        <Tab v-slot="{ selected }" as="template">
                            <TabItem text="Posts" :selected="selected" />
                        </Tab>
                        <Tab v-slot="{ selected }" as="template">
                            <TabItem text="Followers" :selected="selected" />
                        </Tab>
                        <Tab v-slot="{ selected }" as="template">
                            <TabItem text="Followings" :selected="selected" />
                        </Tab>
                        <Tab v-slot="{ selected }" as="template">
                            <TabItem text="Photos" :selected="selected" />
                        </Tab>
                    </TabList>
                    <TabPanels class="mt-2">
                        <TabPanel v-if="isMyProfile">
                            <Edit
                                :must-verify-email="mustVerifyEmail"
                                :status="status"
                            />
                        </TabPanel>
                        <TabPanel class="p-3 bg-white shadow"> Posts </TabPanel>
                        <TabPanel class="p-3 bg-white shadow">
                            Followers
                        </TabPanel>
                        <TabPanel class="p-3 bg-white shadow">
                            Followings
                        </TabPanel>
                        <TabPanel class="p-3 bg-white shadow">
                            Photos
                        </TabPanel>
                    </TabPanels>
                </TabGroup>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import { computed, ref } from 'vue';
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue';
import { usePage, router } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TabItem from '@/Pages/Profile/Partials/TabItem.vue';
import Edit from '@/Pages/Profile/Edit.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Cropper } from 'vue-advanced-cropper';
import 'vue-advanced-cropper/dist/style.css';

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
    user: Object,
});

const authUser = usePage().props.auth?.user || null;
const isMyProfile = computed(() => authUser && authUser.id === props.user.id);

const isModalOpen = ref(false);
const cropper = ref(null);
const imageUrl = ref(null);
const isUploading = ref(false);
let imageFile = null; // Simpan file asli sebelum dikirim

// Perbaiki cover image agar selalu update
const coverImageSrc = computed(() =>
    imageUrl.value ||
    (props.user.cover_path
        ? route('storage', { path: props.user.cover_path })
        : '/img/default.jpeg')
);

const openModal = () => {
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
};

const onFileChange = (event) => {
    const file = event.target.files[0];

    if (file) {
        imageFile = file;
        const reader = new FileReader();
        reader.onload = (e) => {
            imageUrl.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};

const cropImage = () => {
    if (cropper.value) {
        const { canvas } = cropper.value.getResult();
        if (canvas) {
            canvas.toBlob((blob) => {
                imageFile = new File([blob], 'cover.jpg', { type: 'image/jpeg' });
                sendToBackend();
            }, 'image/jpeg');
        }
    }
};

const sendToBackend = () => {
    if (!imageFile) return;

    const formData = new FormData();
    formData.append('cover', imageFile);

    isUploading.value = true; // Tampilkan loading state

    router.post(route('profile.updateCover', { user: props.user.id }), formData, {
        forceFormData: true,
        onSuccess: () => {
            setTimeout(() => location.reload(), 1000);
        },
        onError: (errors) => {
            console.error('Error uploading:', errors);
        },
        onFinish: () => {
            isUploading.value = false;
            closeModal();
        },
    });
};
</script>


<style scoped></style>
