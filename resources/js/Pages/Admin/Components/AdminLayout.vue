<template>
  <div class="antialiased bg-gray-50 dark:bg-gray-900 min-h-screen flex flex-col">
    <!-- Navbar -->
    <Navbar />
    <!-- Sidebar -->
    <Sidebar />
    <!-- End -->

    <main class="p-4 md:ml-64 flex-grow pt-20">
      <slot />
    </main>
  </div>
</template>

<script setup>
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import Navbar from "./Navbar.vue";
import Sidebar from "./Sidebar.vue";

// initialize components based on data attribute selectors
onMounted(() => {
  initFlowbite();
});
</script>

<style>
html, body {
  height: 100%;
  margin: 0;
}
</style>
