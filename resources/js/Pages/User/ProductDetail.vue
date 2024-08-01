<script setup>
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

const products = defineProps({
    products: Array
});

const selectedProduct = ref(null);

const addToCart = (product) => {
    console.log(product);
    router.post(route('cart.store', product), {
        onSuccess: (page) => {
            if (page.props.flash.success) {
                Swal.fire({
                    toast: true,
                    icon: "success",
                    position: "top-end",
                    showConfirmButton: false,
                    title: page.props.flash.success
                });
            }
        },
    });
};

const showProductDetails = (product) => {
    selectedProduct.value = product;
    Swal.fire({
        title: product.title,
        html: `
            <img alt="ecommerce" class="w-full object-cover object-center rounded border border-gray-200 mb-4" src="${product.product_images.length > 0 ? `/${product.product_images[0].image}` : 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png'}">
            <h2 class="text-sm title-font text-gray-500 tracking-widest">${product.brand.name}</h2>
            <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">${product.title}</h1>
            <p class="leading-relaxed">${product.description}</p>
            <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                <div class="flex">
                    <span class="mr-3">Color</span>
                    <!-- Add color options here -->
                </div>
                <div class="flex ml-6 items-center">
                    <span class="mr-3">Size</span>
                    <div class="relative">
                        <select class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                            <option>SM</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                        </select>
                        <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                <path d="M6 9l6 6 6-6"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex">
                <span class="title-font font-medium text-2xl text-gray-900">$${product.price}</span>
                <button class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded" @click="addToCart(product)">Add to Cart</button>
            </div>
        `,
        showCloseButton: true,
        showConfirmButton: false,
    });
};
</script>

<template>
    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        <div v-for="product in products" :key="product.id" class="group relative">
            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-primary-200 lg:aspect-none lg:h-80">
                <img v-if="product.product_images.length > 0" :src="`/${product.product_images[0].image}`"
                    :alt="product.imageAlt" class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
                <img v-else
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png"
                    :alt="product.imageAlt" class="h-full w-full object-cover object-center lg:h-full lg:w-full" />

                <!-- add to cart icon -->
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 cursor-pointer">
                    <div class="bg-primary-500 p-2 rounded-full">
                        <a @click="addToCart(product)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        </a>
                    </div>
                    <div class="bg-primary-400 p-2 rounded-full ml-2">
                        <a @click="showProductDetails(product)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- end -->
            </div>
            <div class="mt-4 flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-700">
                        <span aria-hidden="true" class="" />
                        {{ product.title }}
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">{{ product.brand.name }}</p>
                </div>
                <p class="text-sm font-medium text-gray-900">${{ product.price }}</p>
            </div>
        </div>
    </div>
</template>
