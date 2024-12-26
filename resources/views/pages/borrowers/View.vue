<template layout="default">
    <div class="container bg-yellow-700 w-[1000px] shadow p-10 mx-auto m-10">
        <h1 class="text-2xl font-bold text-white mb-5 text-center">
            View Borrower: {{ borrower.borrower_lname }},
            {{ borrower.borrower_fname }}
        </h1>
        <hr />
        <div v-if="borrower" class="text-white mt-2">
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
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="borrower">
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
                    </tr>
                </tbody>
            </table>
            <h1 class="text-center mt-5">Other Details</h1>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Category Of the Book</th>
                        <th>Book Assign</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="borrower">
                        <td>{{ borrower.library_book.category_of_book}}</td>
                        <td>{{ borrower.library_book.book_assign }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br />
        <Link
            class="block w-full bg-gray-500 hover:bg-gray-600 mt-1 text-center text-white font-bold py-2 px-4 rounded"
            href="/borrowers"
        >
            Back
        </Link>
    </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    borrower: Array,
    libraryBooks: Array,
});
</script>
