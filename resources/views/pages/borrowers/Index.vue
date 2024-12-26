<template layout>
    <div class="bg-yellow-700 w-[1250px] p-5 text-white rounded">
        <div class="text-center">
            <h1 class="mb-2">Borrower List</h1>
        </div>
        <hr />
        <Link
            href="/borrowers/create"
            class="btn bg-yellow-500 hover:bg-yellow-600 float-left block w-full text-center mt-5 mb-4"
            >Add Borrower</Link
        >
        <div class="py-4">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Borrower ID No.</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Course & Year</th>
                        <th>Date Borrowed</th>
                        <th>Return Date</th>
                        <th>Book Borrowed</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="borrower of borrowers.data" :key="borrower.id">
                        <td>{{ borrower.borrower_id_num }}</td>
                        <td>{{ borrower.borrower_lname }}</td>
                        <td>{{ borrower.borrower_fname }}</td>
                        <td>{{ borrower.borrower_phone }}</td>
                        <td>{{ borrower.borrower_email }}</td>
                        <td>{{ borrower.borrower_course_and_year }}</td>
                        <td>
                            {{
                                new Date(
                                    borrower.created_at
                                ).toLocaleDateString("en-US")
                            }}
                        </td>
                        <td>
                            {{
                                new Date(
                                    borrower.return_date
                                ).toLocaleDateString("en-US")
                            }}
                        </td>
                        <td>{{ borrower.library_book.name_of_book }}</td>
                        <td>
                            <span class="flex">
                                <Link
                                    :href="'/borrowers/edit/' + borrower.id"
                                    class="btn bg-sky-600 hover:bg-sky-700"
                                >
                                    Edit
                                </Link>
                                <Link
                                    :href="'/borrowers/delete/' + borrower.id"
                                    class="ml-1 btn bg-red-700 hover:bg-red-800"
                                >
                                    Delete
                                </Link>
                                <Link
                                    :href="'/borrowers/view/' + borrower.id"
                                    class="ml-1 btn bg-yellow-700 hover:bg-yellow-800"
                                >
                                    View
                                </Link>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-between">
            <div>
                Showing <strong>{{ borrowers.data.length }}</strong> entries.
            </div>
            <nav
                class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                aria-label="Pagination"
            >
                <ul class="pagination">
                    <li
                        v-for="page in borrowers.links"
                        :key="page.url"
                        :class="{
                            ' relative z-10 inline-flex items-center text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0':
                                !page.active && page.label !== 'Previous',
                            ' relative z-10 inline-flex items-center text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600':
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
                                'cursor-pointer relative z-10 inline-flex items-center bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600':
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
    borrowers: Array,
});
</script>
