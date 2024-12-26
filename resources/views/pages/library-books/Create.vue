<template layout="default">
    <div class="container bg-yellow-700 w-[800px] shadow p-10 mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-5 text-white text-center">
            Create Book
        </h1>
        <form @submit.prevent="add">
            <div class="flex flex-col mb-4">
                <label class="font-bold text-white mb-2" for="name_of_book"
                    >Name of Book:</label
                >
                <input
                    type="text"
                    id="name_of_book"
                    v-model="form.name_of_book"
                    class="border py-2 px-3 text-grey-darkest"
                />
                <span v-if="form.errors.name_of_book" class="text-red-300">{{
                    form.errors.name_of_book
                }}</span>
            </div>

            <div class="flex flex-col mb-4">
                <label class="font-bold text-white mb-2" for="category_of_book"
                    >Category:</label
                >
                <input
                    v-model="form.category_of_book"
                    type="text"
                    name="category_of_book"
                    id="category_of_book"
                    class="border py-2 px-3 text-grey-darkest"
                />
                <span
                    v-if="form.errors.category_of_book"
                    class="text-red-300"
                    >{{ form.errors.category_of_book }}</span
                >
            </div>

            <div class="flex flex-col mb-4">
                <label class="font-bold text-white mb-2" for="book_assign"
                    >Book Assign:</label
                >
                <input
                    v-model="form.book_assign"
                    type="text"
                    name="book_assign"
                    id="book_assign"
                    class="border py-2 px-3 text-grey-darkest"
                />
                <span v-if="form.errors.book_assign" class="text-red-300">{{
                    form.errors.book_assign
                }}</span>
            </div>

            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    class="bg-yellow-500 w-full hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded"
                >
                    Create Book
                </button>
                <Link
                    href="/book-lists"
                    class="block w-full bg-gray-500 hover:bg-gray-600 mt-1 text-center text-white font-bold py-2 px-4 rounded"
                >
                    Back
                </Link>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

let form = useForm({
    name_of_book: "",
    category_of_book: "",
    book_assign: "",
});

const add = () => {
    form.post("/book-lists");
};
</script>
