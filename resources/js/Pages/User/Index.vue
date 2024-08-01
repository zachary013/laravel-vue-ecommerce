<script setup>
import { Link, router } from "@inertiajs/vue3";
import UserLayouts from "./Layouts/UserLayouts.vue";
import Hero from "./Layouts/Hero.vue";
import Products from "../User/Components/Products.vue";

// products list
defineProps({
  products: Array,
});
</script>

<template>
  <UserLayouts>
    <!-- Hero section -->
    <Hero></Hero>
    <!-- End Hero section -->

    <div class="bg-primary-200">
      <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Latest products</h2>

        <!-- Product list component -->
        <Products :products="products"></Products>
        <!-- End product list component -->

        <div class="flex justify-center mt-5">
          <Link :href="route('admin.products.index')"
            class="text-white bg-primary-600 hover:bg-primary-400 focus:ring-4 focus:outline-none focus:ring-primary-200 dark:focus:ring-primary-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
          View All Products</Link>
        </div>
      </div>

      <section class="bg-primary-700 dark:bg-gray-900">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
          <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Discover a World of
              Brands at Cloé</h2>
            <p class="mb-4">At Cloé, we're more than just a clothing store. We're curators of top fashion brands,
              offering a diverse range of styles and trends to suit every taste. Our platform brings together renowned
              labels and emerging designers, providing a shopping experience that's as unique as you are. From everyday
              essentials to high-end couture, we have something for everyone.</p>
            <p>Explore our extensive collection and find your new favorite brands. At Cloé, fashion meets convenience,
              making it easier for you to stay stylish and on-trend.</p>
          </div>
          <div class="grid grid-cols-2 gap-4 mt-8">
            <img class="w-full rounded-lg"
              src="https://i.pinimg.com/474x/d1/9a/e5/d19ae51a92f2b56137d1c65e2d87a935.jpg"
              alt="Fashion Brands 1">
            <img class="mt-4 w-full lg:mt-10 rounded-lg"
              src="https://i.pinimg.com/474x/de/3d/96/de3d968e32eb2c5fa8ad738196f0c9c8.jpg"
              alt="Fashion Brands 2">
          </div>
        </div>
      </section>

      <section class="bg-primary-200 dark:bg-gray-900">
  <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
    <div class="grid grid-cols-2 gap-4 mt-8">
      <img class="w-full rounded-lg" src="https://i.pinimg.com/474x/2c/6f/97/2c6f97cd25ecf6e52bd781bb16607b49.jpg" alt="Fashion Brands 1">
      <img class="mt-4 w-full lg:mt-10 rounded-lg" src="https://i.pinimg.com/474x/29/d3/02/29d302bb57e77273ed85e237f0e5141d.jpg" alt="Fashion Brands 2">
    </div>
    <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Experience Personalized Fashion at Cloé</h2>
      <p class="mb-4">At Cloé, we believe in offering a personalized shopping experience that caters to your unique style and preferences. Our curated collections are designed to reflect the latest fashion trends while allowing you to express your individuality. With an easy-to-navigate platform, you can explore a diverse range of clothing and accessories that fit your lifestyle.</p>
      <p>Discover exclusive pieces from both well-known designers and up-and-coming talent. Cloé is dedicated to providing high-quality fashion that suits every occasion, from casual wear to special events. Join our community of fashion enthusiasts and elevate your wardrobe with our handpicked selections.</p>
    </div>
  </div>
</section>

<section class="bg-primary-700 dark:bg-gray-900">
  <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
    <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Explore Our Exclusive Collection at Cloé</h2>
      <p class="mb-4">At Cloé, we are passionate about delivering a distinctive fashion experience. Our selection includes a curated mix of prestigious brands and innovative designers, ensuring you find the perfect pieces to match your personal style. From classic staples to bold statement pieces, we cater to all tastes and preferences.</p>
      <p>Browse our diverse assortment and discover your next wardrobe essential. Cloé combines elegance with ease, allowing you to effortlessly stay fashionable and ahead of trends.</p>
    </div>
    <div class="grid grid-cols-2 gap-4 mt-8">
      <img class="w-full rounded-lg"
        src="https://i.pinimg.com/474x/a0/87/6f/a0876f3154a4a38b195b764289ceccc7.jpg"
        alt="Fashion Brands 1">
      <img class="mt-4 w-full lg:mt-10 rounded-lg"
        src="https://i.pinimg.com/474x/ec/a1/98/eca198943fc14e8187e161d2c8e925ab.jpg"
        alt="Fashion Brands 2">
    </div>
  </div>
</section>

<section class="bg-primary-200 dark:bg-gray-900">
  <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
    <div class="grid grid-cols-2 gap-4 mt-8">
      <img class="w-full rounded-lg" src="https://i.pinimg.com/474x/db/be/f7/dbbef74e0b13286b198bf2b05384a165.jpg" alt="Fashion Brands 1">
      <img class="mt-4 w-full lg:mt-10 rounded-lg" src="https://i.pinimg.com/474x/4a/f1/8b/4af18ba6a971f555d3f897f11be23a9e.jpg" alt="Fashion Brands 2">
    </div>
    <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Unveil Unique Styles with Cloé</h2>
      <p class="mb-4">At Cloé, we are committed to offering a tailored shopping experience that highlights your individual style. Our exclusive range of fashion items is carefully selected to feature the latest trends and timeless classics. Navigate through our platform with ease and find clothing and accessories that align with your lifestyle.</p>
      <p>Discover unique and high-quality pieces from both established names and emerging designers. Cloé is here to enhance your wardrobe with exceptional fashion choices suitable for every occasion, from everyday wear to special moments. Join our fashion-forward community and refine your style with Cloé.</p>
    </div>
  </div>
</section>


      <section class="bg-primary-200 dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
          <div class="mx-auto max-w-screen-md sm:text-center">
            <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl dark:text-white">Sign up
              for our newsletter</h2>
            <p class="mx-auto mb-8 max-w-2xl text-gray-500 md:mb-12 sm:text-xl dark:text-gray-400">Stay up to date with
              the roadmap progress, announcements and exclusive discounts feel free to sign up with your email.</p>
            <form action="#">
              <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                <div class="relative w-full">
                  <label for="email" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email
                    address</label>
                  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                      <path
                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                      <path
                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                    </svg>
                  </div>
                  <input
                    class="block p-3 pl-9 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Enter your email" type="email" id="email" required="">
                </div>
                <div>
                  <button type="submit"
                    class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-600 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-400 focus:ring-4 focus:ring-primary-300 dark:bg-primary-500 dark:hover:bg-primary-400 dark:focus:ring-primary-800">Subscribe</button>
                </div>
              </div>
              <div
                class="mx-auto max-w-screen-sm text-sm text-left text-gray-500 newsletter-form-footer dark:text-gray-100">
                We care about the protection of your data. <a href="#"
                  class="font-medium text-primary-400 dark:text-primary-500 hover:underline">Read our Privacy
                  Policy</a>.</div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </UserLayouts>
</template>
