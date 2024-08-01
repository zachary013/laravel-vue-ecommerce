<script setup>
import { Head } from "@inertiajs/vue3";
import AdminLayout from '../Components/AdminLayout.vue';
import UserList from "./UserList.vue";

defineProps({
    users: Object,
});
</script>

<template>
    <AdminLayout>
        <Head title="User" />
        <UserList :users="users" />
    </AdminLayout>
</template>
