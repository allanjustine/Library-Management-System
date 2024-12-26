<template layout>
    <div class="container mx-auto p-4">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">
                Library Home Page! Welcome,
                {{ auth.user ? auth.user.fullname : "Guest" }}!
            </h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white rounded-lg shadow p-4">
                <span>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Total Users
                    </h2>

                    <h1
                        class="float-right bg-gray-500 p-3 rounded-full text-white px-auto"
                    >
                        {{ userCount }}
                    </h1>
                    <p class="text-gray-600">Be part of us.</p>
                    <Link
                        href="/register"
                        v-if="!auth.user"
                        class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600"
                        >Get Started</Link
                    >
                    <Link
                        href="/users"
                        v-if="auth.user"
                        class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600"
                        >View Users</Link
                    >
                </span>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-lg font-semibold text-gray-800">
                    Total Borrowers
                </h2>

                <h1
                    class="float-right bg-gray-500 p-3 rounded-full text-white px-auto"
                >
                    {{ borrowerCount }}
                </h1>
                <p class="text-gray-600">
                    Manage borrowers and their borrowing records.
                </p>
                <Link
                    href="/register"
                    v-if="!auth.user"
                    class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600"
                    >Get Started</Link
                >
                <Link
                    href="/borrowers"
                    v-if="auth.user"
                    class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600"
                    >View Borrowers</Link
                >
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-lg font-semibold text-gray-800">
                    Total of Books
                </h2>
                <h1
                    class="float-right bg-gray-500 p-3 rounded-full text-white px-auto"
                >
                    {{ booksCount }}
                </h1>
                <p class="text-gray-600">Manage books of the library.</p>
                <Link
                    href="/register"
                    v-if="!auth.user"
                    class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600"
                    >Get Started</Link
                >
                <Link
                    href="/book-lists"
                    v-if="auth.user"
                    class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600"
                    >Manage Books</Link
                >
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/inertia-vue3";

const props = defineProps({
    auth: Array,
    userCount: Number,
    borrowerCount: Number,
    booksCount: Number,
});

const user = usePage().props.auth;

console.log(user);
</script>
