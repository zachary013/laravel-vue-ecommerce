<script setup>
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';
import { Plus } from '@element-plus/icons-vue';
import Swal from 'sweetalert2';

defineProps({
    users: Array
});

// State variables
const isAddUser = ref(false);
const editMode = ref(false);
const dialogVisible = ref(false);

// User form data
const id = ref('');
const name = ref('');
const email = ref('');
const password = ref('');
const isAdmin = ref(false);

const resetFormData = () => {
    id.value = '';
    name.value = '';
    email.value = '';
    password.value = '';
    isAdmin.value = false;
};

// Open edit user modal
const openEditModal = (user) => {
    id.value = user.id;
    name.value = user.name;
    email.value = user.email;
    isAdmin.value = user.is_admin;

    editMode.value = true;
    isAddUser.value = false;
    dialogVisible.value = true;
};

// Open add user modal
const openAddModal = () => {
    isAddUser.value = true;
    dialogVisible.value = true;
    editMode.value = false;

    resetFormData();
};

// Add user method
const addUser = async () => {
    const formData = {
        name: name.value,
        email: email.value,
        password: password.value,
        isAdmin: isAdmin.value ? 1 : 0
    };

    try {
        await router.post('users/store', formData, {
            onSuccess: page => {
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    position: 'top-end',
                    showConfirmButton: false,
                    title: page.props.flash.success,
                    timer: 1500,
                    timerProgressBar: true,
                });
                dialogVisible.value = false;
                resetFormData();
            },
        });
    } catch (err) {
        console.error(err);
        Swal.fire({
            toast: true,
            icon: 'error',
            position: 'top-end',
            showConfirmButton: false,
            title: 'Failed to add user',
            timer: 1500,
            timerProgressBar: true,
        });
    }
};

// Update user method
const updateUser = async () => {
    const formData = {
        name: name.value,
        email: email.value,
        isAdmin: isAdmin.value ? 1 : 0,
        _method: 'PUT'
    };

    try {
        await router.post(`users/update/${id.value}`, formData, {
            onSuccess: page => {
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    position: 'top-end',
                    showConfirmButton: false,
                    title: page.props.flash.success,
                    timer: 1500,
                    timerProgressBar: true,
                });
                dialogVisible.value = false;
                resetFormData();
            }
        });
    } catch (err) {
        console.error(err);
        Swal.fire({
            toast: true,
            icon: 'error',
            position: 'top-end',
            showConfirmButton: false,
            title: 'Failed to update user',
            timer: 1500,
            timerProgressBar: true,
        });
    }
};

// Delete user method
const deleteUser = (user) => {
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No',
        confirmButtonText: 'Yes, delete!'
    }).then(async (result) => {
        if (result.isConfirmed) {
            try {
                await router.delete(`users/destroy/${user.id}`, {
                    onSuccess: page => {
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            position: 'top-end',
                            showConfirmButton: false,
                            title: page.props.flash.success,
                            timer: 1500,
                            timerProgressBar: true,
                        });
                    }
                });
            } catch (err) {
                console.error(err);
                Swal.fire({
                    toast: true,
                    icon: 'error',
                    position: 'top-end',
                    showConfirmButton: false,
                    title: 'Failed to delete user',
                    timer: 1500,
                    timerProgressBar: true,
                });
            }
        }
    });
};
</script>

<template>
    <section class="p-3 sm:p-5">
        <el-dialog v-model="dialogVisible" :title="editMode ? 'Edit User' : 'Add User'" width="30%">
            <form @submit.prevent="editMode ? updateUser() : addUser()">
                <div class="relative z-0 w-full mb-6 group">
                    <input v-model="name" type="text" id="floating_name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Name
                    </label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input v-model="email" type="email" id="floating_email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_email"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Email
                    </label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input v-model="password" type="password" id="floating_password"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " :required="!editMode" />
                    <label for="floating_password"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Password
                    </label>
                </div>
                <div>
                    <label for="is_admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is
                        Admin</label>
                    <select id="is_admin" v-model="isAdmin"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option :value="true">Yes</option>
                        <option :value="false">No</option>
                    </select>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>
            </form>
        </el-dialog>

        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-4.35-4.35M17.65 17.65A8.5 8.5 0 1118 10a8.5 8.5 0 01-1.35 7.65z">
                                        </path>
                                    </svg>
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-600 dark:focus:border-cyan-600"
                                    placeholder="Search" required />
                            </div>
                        </form>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button @click="openAddModal" type="button"
                            class="flex items-center justify-center text-white bg-primary-500 hover:bg-primary-500 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-100 focus:outline-none dark:focus:ring-primary-600">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add user
                        </button>
                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                                </svg>
                                Filter
                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Choose filter</h6>
                                <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                    <li class="flex items-center">
                                        <input id="apple" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">id</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="fitbit" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Name</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="razor" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="razor" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Role</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="nikon" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="nikon" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Status</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="benq" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="benq" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Orders</label>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Name</th>
                                <th scope="col" class="px-4 py-3">Email</th>
                                <th scope="col" class="px-4 py-3">Role</th>
                                <th scope="col" class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users" :key="user.id" class="border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ user.name }}
                                </th>
                                <td class="px-4 py-3">{{ user.email }}</td>
                                <td class="px-4 py-3">{{ user.is_admin ? 'Admin' : 'User' }}</td>
                                <td class="px-4 py-3 flex items-center space-x-4">
                                    <button @click="openEditModal(user)" type="button"
                                        class="text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                                    <button @click="deleteUser(user)" type="button"
                                        class="text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 py-4 px-10">
                            <Pagination :data="products"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
