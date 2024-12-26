<template layout="default">
    <div
        class="container bg-yellow-400 w-[800px] text-center shadow p-10 mx-auto mt-5"
    >
        <h1 class="text-2xl font-bold mb-5 text-center">Delete Book</h1>
        <hr />
        <br />
        <i
            ><h1
                ><span class="text-white">Are you sure you want to delete</span>
                <strong
                    ><h1>
                        <strong>Name:</strong>
                        {{ libraryBook.name_of_book }}
                        <br>
                        <strong>Category:</strong>
                        {{ libraryBook.category_of_book }}
                        <br>
                        <strong>Book Assign:</strong>
                        {{ libraryBook.book_assign }}
                    </h1></strong
                >
                <span class="text-white">into Book list?</span></h1
            ></i
        >
        <br />
        <button
            @click="deleteLibraryBook"
            style="width: 100%"
            class="mt-10 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded form-control"
        >
            Yes, delete
        </button>
        <Link
            href="/book-lists"
            class="block w-full bg-gray-500 hover:bg-gray-600 mt-1 text-center text-white font-bold py-2 px-4 rounded"
        >
            Cancel
        </Link>
    </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    libraryBook: Object,
});

const deleteLibraryBook = () => {
    Inertia.post(`/book-lists/${props.libraryBook.id}`, {
        _method: "delete",
    });
};
</script>
