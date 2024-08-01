<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <!-- Login title -->
        <div class="text-center text-4xl font-bold mb-6">
            Login
        </div>

        <!-- Social login buttons -->
        <div class="flex justify-center mb-4 space-x-4">
            <a href="#" class="text-blue-600 text-2xl">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="text-pink-500 text-2xl">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="text-blue-400 text-2xl">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-red-600 text-2xl">
                <i class="fab fa-google"></i>
            </a>
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus
                    autocomplete="username" />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                    autocomplete="current-password" />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-4">
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    LOGIN
                </PrimaryButton>
            </div>

            <div class="flex flex-col items-center mt-4 space-y-2">
                <div>
                    <Link :href="route('register')" class="text-primary-400 font-bold">
                        Don't have an account? Sign up.
                    </Link>
                </div>

                <div>
                    <Link v-if="canResetPassword" :href="route('password.request')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Recover Password
                    </Link>
                </div>
            </div>
        </form>
    </GuestLayout>
</template>
