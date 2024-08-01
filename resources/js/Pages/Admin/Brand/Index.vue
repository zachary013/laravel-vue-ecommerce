<script setup>
import { Head } from "@inertiajs/vue3";
import AdminLayout from '../Components/AdminLayout.vue'
import BrandList from './BrandList.vue'
defineProps({
    brands: Object,
})
</script>

<template>
    <AdminLayout>
        <Head title="Brand" />
        <BrandList :brands="brands"></BrandList>
    </AdminLayout>
</template>
