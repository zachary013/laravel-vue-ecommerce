<script setup>
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';
import UserLayouts from './Layouts/UserLayouts.vue';
import { XMarkIcon } from '@heroicons/vue/24/outline';
import { ChevronDownIcon, FunnelIcon, MinusIcon, PlusIcon, Squares2X2Icon } from '@heroicons/vue/20/solid';
import { Dialog, DialogPanel, Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems, TransitionChild, TransitionRoot } from '@headlessui/vue';

const props = defineProps({
    brands: Array,
});

const sortOptions = [
    { name: 'Most Popular', href: '#', current: true },
    { name: 'Best Rating', href: '#', current: false },
    { name: 'Newest', href: '#', current: false },
    { name: 'Price: Low to High', href: '#', current: false },
    { name: 'Price: High to Low', href: '#', current: false },
];

const mobileFiltersOpen = ref(false);
const searchQuery = ref('');

watch(searchQuery, () => {
    updateFilteredBrands();
});

function updateFilteredBrands() {
    router.get('/brands', {
        search: searchQuery.value
    }, {
        preserveState: true,
        replace: true
    });
}
</script>


<template>
    <UserLayouts>
        <div class="bg-primary-200">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900">Brands</h1>
                    <div class="flex items-center">
                        <Menu as="div" class="relative inline-block text-left">
                            <div>
                                <MenuButton class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900">
                                    Sort
                                    <ChevronDownIcon class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
                                </MenuButton>
                            </div>
                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <MenuItems class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <div class="py-1">
                                        <MenuItem v-for="option in sortOptions" :key="option.name" v-slot="{ active }">
                                            <a :href="option.href" :class="[option.current ? 'font-medium text-gray-900' : 'text-gray-500', active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm']">{{ option.name }}</a>
                                        </MenuItem>
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                        <button type="button" class="-m-2 ml-5 p-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                            <span class="sr-only">View grid</span>
                            <Squares2X2Icon class="h-5 w-5" aria-hidden="true" />
                        </button>
                        <button type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden" @click="mobileFiltersOpen = true">
                            <span class="sr-only">Filters</span>
                            <FunnelIcon class="h-5 w-5" aria-hidden="true" />
                        </button>
                    </div>
                </div>

                <div class="mt-6 flex space-x-4">
                    <input v-model="searchQuery" type="text" placeholder="Search brands..." class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" />
                </div>

                <section aria-labelledby="brands-heading" class="pb-24 pt-6">
                    <h2 id="brands-heading" class="sr-only">Brands</h2>
                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                        <div v-for="brand in brands" :key="brand.id" class="border p-4 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900">{{ brand.name }}</h3>
                            <img :src="brand.image" alt="" class="mt-4 w-full h-32 object-cover">
                            <a :href="`/brands/${brand.slug}`" class="mt-2 block text-primary-600 hover:text-primary-100">View Products</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </UserLayouts>
</template>
