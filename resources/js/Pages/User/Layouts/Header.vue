<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue'
const canLogin = usePage().props.canLogin;
const canRegister = usePage().props.canRegister;
const auth = usePage().props.auth;
const cart = computed(() => usePage().props.cart);
</script>
<template>
    <nav class="bg-primary-200 border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <Link :href="route('home')" class="flex items-center justify-between mr-4">
            <img src="/images/logo1.png" class="mr-3 h-8" alt="Cloe Logo" />
            </Link>

            <div v-if="canLogin" class="flex items-center md:order-2">
                <div class="mr-4">

                    <Link :href="route('cart.view')"
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-primary-100 rounded-lg group bg-gradient-to-br from-primary-400 to-primary-500 group-hover:from-primary-500 group-hover:to-primary-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-primary-200 dark:focus:ring-primary-800"
                        style="width: auto;">
                    <span
                        class="relative flex items-center justify-center p-2 transition-all ease-in duration-75 bg-primary-200 dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                        </svg>
                        <span class="sr-only">cart</span>
                        <div
                            class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-primary-500 border-2 border-primary-200 rounded-full -top-2 -right-2 dark:border-gray-900">
                            {{ cart.data.count }}
                        </div>
                    </span>
                    </Link>



                </div>
                <button v-if="auth.user" type="button"
                    class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-primary-400 rounded-lg group bg-gradient-to-br from-primary-400 to-primary-500 group-hover:from-primary-400 group-hover:to-primary-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-primary-200 dark:focus:ring-primary-100"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span
                        class="relative flex items-center justify-center p-2 transition-all ease-in duration-75 bg-primary-200 dark:bg-primary-100 rounded-md group-hover:bg-opacity-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            class="w-6 h-6" stroke="currentColor">
                            <path stroke="currentColor" stroke-width="2"
                                d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span class="sr-only">user menu</span>
                    </span>
                </button>

                <div v-else>
                    <Link :href="route('login')" v-if="canRegister" type="button"
                        class="shadow-[inset_0_0_0_2px_#9A1750] text-black bg-transparent px-8 py-3 rounded-full tracking-widest uppercase font-bold hover:bg-[#9A1750] hover:text-white dark:text-neutral-200 transition duration-200 me-2 mb-2">
                    Login
                    </Link>

                    <Link :href="route('register')" v-if="canRegister" type="button"
                        class="shadow-[inset_0_0_0_2px_#9A1750] text-black bg-transparent px-8 py-3 rounded-full tracking-widest uppercase font-bold hover:bg-[#9A1750] hover:text-white dark:text-neutral-200 transition duration-200 me-2 mb-2">
                    Register
                    </Link>

                </div>



                <!-- Dropdown menu -->
                <div v-if="auth.user"
                    class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ auth.user.name }}</span>
                        <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth.user.email
                            }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <Link :href="route(auth.user.isAdmin ? 'admin.dashboard' : 'dashboard')"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Dashboard</Link>
                        </li>


                        <li>
                            <Link :href="route('logout')" method="post"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Sign
                            out</Link>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <Link :href="route('home')"
                            class="block py-2 pl-3 pr-4 text-lg text-white bg-primary-400 rounded md:bg-transparent md:text-primary-400 md:p-0 md:dark:text-primary-500"
                            aria-current="page">Home</Link>
                    </li>
                    <li>
                        <Link :href="route('products.index')"
                            class="block py-2 pl-3 pr-4 text-lg text-primary-100 rounded hover:bg-primary-300 md:hover:bg-transparent md:hover:text-primary-400 md:p-0 dark:text-primary-500 md:dark:hover:text-primary-400 dark:hover:bg-primary-100 dark:hover:text-primary-100 md:dark:hover:bg-transparent dark:border-primary-300">
                        Products</Link>
                    </li>
                    <li>
                        <Link :href="route('brands.index')"
                            class="block py-2 pl-3 pr-4 text-lg text-primary-100 rounded hover:bg-primary-300 md:hover:bg-transparent md:hover:text-primary-400 md:p-0 dark:text-primary-500 md:dark:hover:text-primary-400 dark:hover:bg-primary-100 dark:hover:text-primary-100 md:dark:hover:bg-transparent dark:border-primary-300">
                        Brands</Link>
                    </li>
                    <li>
                        <Link :href="route('categories.index')"
                            class="block py-2 pl-3 pr-4 text-lg text-primary-100 rounded hover:bg-primary-300 md:hover:bg-transparent md:hover:text-primary-400 md:p-0 dark:text-primary-500 md:dark:hover:text-primary-400 dark:hover:bg-primary-100 dark:hover:text-primary-100 md:dark:hover:bg-transparent dark:border-primary-300">
                        Categories</Link>
                    </li>
                    <li>
                        <Link :href="route('about')"
                            class="block py-2 pl-3 pr-4 text-lg text-primary-100 rounded hover:bg-primary-300 md:hover:bg-transparent md:hover:text-primary-400 md:p-0 dark:text-primary-500 md:dark:hover:text-primary-400 dark:hover:bg-primary-100 dark:hover:text-primary-100 md:dark:hover:bg-transparent dark:border-primary-300">
                        About</Link>
                    </li>
                    <li>
                        <Link :href="route('contact')"
                            class="block py-2 pl-3 pr-4 text-lg text-primary-100 rounded hover:bg-primary-300 md:hover:bg-transparent md:hover:text-primary-400 md:p-0 dark:text-primary-500 md:dark:hover:text-primary-400 dark:hover:bg-primary-100 dark:hover:text-primary-100 md:dark:hover:bg-transparent dark:border-primary-300">
                        Contact</Link>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</template>