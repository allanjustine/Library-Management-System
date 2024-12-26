<template layout>
    <div class="bg-yellow-700 w-[1250px] p-5 text-white rounded">
        <div class="text-center">
            <h1 class="mb-3">Library Books List</h1>
        </div>
        <hr />
        <Link
            href="/book-lists/create"
            class="btn bg-yellow-500 block w-full text-center hover:bg-yellow-600 float-right mt-5 mb-4"
            >Add Book</Link
        >
        <table class="table mt-5">
            <thead>
                <tr>
                    <th>ID.</th>
                    <th>Book Name</th>
                    <th>Category</th>
                    <th>Book Assign</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="lb in libraryBooks.data" :key="lb.id">
                    <td>{{ lb.id }}</td>
                    <td>{{ lb.name_of_book }}</td>
                    <td>{{ lb.category_of_book }}</td>
                    <td>{{ lb.book_assign }}</td>
                    <td>
                        <Link
                            :href="'/book-lists/edit/' + lb.id"
                            class="btn bg-sky-600 hover:bg-sky-700"
                        >
                            Edit
                        </Link>
                        <Link
                            :href="'/book-lists/delete/' + lb.id"
                            class="ml-1 btn bg-red-700 hover:bg-red-800"
                        >
                            Delete
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-between">
            <div>
                Showing <strong>{{ libraryBooks.data.length }}</strong> entries.
            </div>
            <nav
                class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                aria-label="Pagination"
            >
                <ul class="pagination">
                    <li
                        v-for="page in libraryBooks.links"
                        :key="page.url"
                        :class="{
                            ' relative z-10 inline-flex items-center text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0':
                                !page.active && page.label !== 'Previous',
                            ' relative z-10 inline-flex items-center text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600':
                                page.active,
                            'opacity-50 cursor-not-allowed relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-300':
                                !page.url && page.label === 'Previous',
                        }"
                    >
                        <Link
                            v-if="page.url"
                            :href="page.url"
                            :class="{
                                'cursor-pointer relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0':
                                    !page.active && page.label !== 'Previous',
                                'cursor-pointer relative z-10 inline-flex items-center bg-yellow-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600':
                                    page.active,
                                'opacity-50 cursor-not-allowed relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-300':
                                    !page.url && page.label === 'Previous',
                            }"
                        >
                            <span v-if="page.label.includes('Next')"
                                >Next <i class="fas fa-chevron-right"></i
                            ></span>

                            <span v-else-if="page.label.includes('Previous')">
                                <i class="fas fa-chevron-left"></i> Previous
                            </span>
                            <span v-else class="page-link">{{
                                page.label
                            }}</span>
                        </Link>
                        <span
                            v-else-if="page.label.includes('Previous')"
                            class="cursor-not-allowed px-4 py-2"
                            ><i class="fas fa-chevron-left"></i> Previous</span
                        >
                        <span v-else class="cursor-not-allowed px-4 py-2"
                            >Next <i class="fas fa-chevron-right"></i
                        ></span>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    libraryBooks: Array,
});
</script>
