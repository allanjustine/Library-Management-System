<template>
    <section class="bg-yellow-700">
        <div class="wrapper flex">
            <div id="brand" class="text-lg text-white font-bold py-5" style="font-family: Arial, Helvetica, sans-serif;">
                Library Management
            </div>
            <nav class="main-nav ml-auto py-2">
                <Link class="main-link" href="/">Home</Link>
                <!-- <Link v-if="user" class="main-link" href="/users"
                    >Users</Link
                > -->
                <Link v-if="user" class="main-link" href="/borrowers"
                    >Borrows</Link
                >
                <Link v-if="user" class="main-link" href="/book-lists"
                    >Book List</Link
                >
            </nav>
            <div class="flex p-2">
                <Link
                    v-if="!user"
                    class="ml-2 py-4 text-white font-semibold bg-yellow-500 hover:bg-yellow-600 text-white font-bold px-4 rounded"
                    href="/login"
                    >Log In</Link
                >
                <Link
                    v-if="user"
                    class="py-4 text-white font-semibold hover:bg-yellow-500 px-2"
                    href="/logout"
                    method="post"
                    as="button"
                    >Log Out</Link
                >
            </div>
        </div>
    </section>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { defineProps } from "vue";

defineProps({
    user: "",
});
</script>
