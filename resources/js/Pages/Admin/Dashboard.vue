<script setup>
import { usePage } from '@inertiajs/vue3';
import AdminLayout from './Components/AdminLayout.vue';

const props = defineProps({
    brand: Number,
    category: Number,
    product: Number,
    order: Number
});
</script>

<template>
    <AdminLayout>
        <div class="flex-1 px-4 mt-10">
            <div class="mb-6 grid grid-cols-1 gap-6 text-white sm:grid-cols-2 xl:grid-cols-4">
                <!-- Categories -->
                <div class="bg-gradient-to-r from-cyan-500 to-cyan-400 p-4 rounded-lg">
                    <div class="mt-5 flex justify-center items-center mb-4">
                        <div class="text-3xl font-bold">{{ category }}</div>
                    </div>
                    <div class="flex w-full justify-center items-center flex-col">
                        <div class="text-xl font-semibold">Categories</div>
                    </div>
                </div>

                <!-- Brands -->
                <div class="bg-gradient-to-r from-violet-500 to-violet-400 p-4 rounded-lg">
                    <div class="mt-5 flex justify-center items-center mb-4">
                        <div class="text-3xl font-bold">{{ brand }}</div>
                    </div>
                    <div class="flex w-full justify-center items-center flex-col">
                        <div class="text-xl font-semibold">Brands</div>
                    </div>
                </div>

                <!-- Products -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-400 p-4 rounded-lg">
                    <div class="mt-5 flex justify-center items-center mb-4">
                        <div class="text-3xl font-bold">{{ product }}</div>
                    </div>
                    <div class="flex w-full justify-center items-center flex-col">
                        <div class="text-xl font-semibold">Products</div>
                    </div>
                </div>

                <!-- Orders -->
                <div class="bg-gradient-to-r from-fuchsia-500 to-fuchsia-400 p-4 rounded-lg">
                    <div class="mt-5 flex justify-center items-center mb-4">
                        <div class="text-3xl font-bold">{{ order }}</div>
                    </div>
                    <div class="flex w-full justify-center items-center flex-col">
                        <div class="text-xl font-semibold">Orders</div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
