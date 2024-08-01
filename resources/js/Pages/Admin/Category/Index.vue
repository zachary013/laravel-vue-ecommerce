<script setup>
import {Head} from "@inertiajs/vue3";
import AdminLayout from '../Components/AdminLayout.vue'
import CategoryList from "./CategoryList.vue";
defineProps({
    categories:Object,
})
</script>

<template>
    <AdminLayout>
            <Head title="Category" />
            <CategoryList :categories="categories"></CategoryList>
    </AdminLayout>
</template>