<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Head } from '@inertiajs/inertia-vue3';
import Banner from '@/Components/Banner.vue';
import Sidebar from "../Components/Sidebar.vue";
import Header from "../Components/Header.vue";
import NavMenu from "../Components/NavMenu.vue";

defineProps({
    title: String,
});

const logout = () => {
    Inertia.post(route('logout'));
};
</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="flex h-screen bg-gray-200 font-roboto">
            <Sidebar />
            <div class="flex-1 flex flex-col overflow-hidden">
                <Header />
                <NavMenu />

                <!-- Page Heading -->
                <header v-if="$slots.header" class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <slot name="header" />
                    </div>
                </header>

                <!-- Page Content -->
                <main>
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
