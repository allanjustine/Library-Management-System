<template layout="default">
    <div class="container bg-yellow-700 w-[800px] shadow p-10 mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-5 text-white text-center">
            Create Borrower
        </h1>
        <form @submit.prevent="add">
            <div class="grid grid-cols-2 sm:grid-cols-2 gap-4">
                <div class="flex flex-col mb-4">
                    <label
                        class="font-bold text-white mb-2"
                        for="borrower_id_num"
                        >Borrower ID No. :</label
                    >
                    <input
                        type="number"
                        id="borrower_id_num"
                        v-model="form.borrower_id_num"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span
                        v-if="form.errors.borrower_id_num"
                        class="text-red-300"
                        >{{ form.errors.borrower_id_num }}</span
                    >
                </div>
                <div class="flex flex-col mb-4">
                    <label
                        class="font-bold text-white mb-2"
                        for="borrower_fname"
                        >First Name:</label
                    >
                    <input
                        type="text"
                        id="borrower_fname"
                        v-model="form.borrower_fname"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span
                        v-if="form.errors.borrower_fname"
                        class="text-red-300"
                        >{{ form.errors.borrower_fname }}</span
                    >
                </div>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-2 gap-4">
                <div class="flex flex-col mb-4">
                    <label
                        class="font-bold text-white mb-2"
                        for="borrower_lname"
                        >Last Name:</label
                    >
                    <input
                        v-model="form.borrower_lname"
                        type="text"
                        name="borrower_lname"
                        id="borrower_lname"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span
                        v-if="form.errors.borrower_lname"
                        class="text-red-300"
                        >{{ form.errors.borrower_lname }}</span
                    >
                </div>

                <div class="flex flex-col mb-4">
                    <label
                        class="font-bold text-white mb-2"
                        for="borrower_phone"
                        >Phone Number:</label
                    >
                    <input
                        v-model="form.borrower_phone"
                        type="text"
                        name="borrower_phone"
                        id="borrower_phone"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span
                        v-if="form.errors.borrower_phone"
                        class="text-red-300"
                        >{{ form.errors.borrower_phone }}</span
                    >
                </div>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-2 gap-4">
                <div class="flex flex-col mb-4">
                    <label
                        class="font-bold text-white mb-2"
                        for="borrower_email"
                        >Email:</label
                    >
                    <input
                        v-model="form.borrower_email"
                        type="borrower_email"
                        name="borrower_email"
                        id="borrower_email"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span
                        v-if="form.errors.borrower_email"
                        class="text-red-300"
                        >{{ form.errors.borrower_email }}</span
                    >
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="return_date"
                        >Return Date:</label
                    >
                    <input
                        v-model="form.return_date"
                        type="date"
                        name="return_date"
                        id="return_date"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.return_date" class="text-red-300">{{
                        form.errors.return_date
                    }}</span>
                </div>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-2 gap-4">
                <div class="flex flex-col mb-4">
                    <label
                        class="font-bold text-white mb-2"
                        for="libraryBook_id"
                        >Select Book:</label
                    >
                    <select
                        v-model="form.library_book_id"
                        name="libraryBook_id"
                        id="libraryBook_id"
                        class="border py-2 px-3 text-grey-darkest"
                    >
                        <option value="" hidden="true">Select Book</option>
                        <option disabled>Select Book</option>
                        <option
                            v-for="lb in libraryBooks"
                            :key="lb.id"
                            :value="lb.id"
                        >
                            {{ lb.name_of_book }}
                        </option>
                    </select>
                    <span
                        v-if="form.errors.library_book_id"
                        class="text-red-300"
                        >{{ form.errors.library_book_id }}</span
                    >
                </div>
                <div class="flex flex-col mb-4">
                    <label
                        class="font-bold text-white mb-2"
                        for="borrower_course_and_year"
                        >Borrower Course:</label
                    >
                    <select
                        v-model="form.borrower_course_and_year"
                        name="borrower_course_and_year"
                        id="borrower_course_and_year"
                        class="border py-2 px-3 text-grey-darkest"
                    >
                        <option value="" hidden="true">Select Book</option>
                        <option disabled>Select Book</option>
                        <option value="BSIT, 1st YEAR">BSIT, 1st YEAR</option>
                        <option value="BSIT, 2nd YEAR">BSIT, 2nd YEAR</option>
                        <option value="BSIT, 3rd YEAR">BSIT, 3rd YEAR</option>
                        <option value="BSIT, 4th YEAR">BSIT, 4th YEAR</option>
                        <option value="BSN, 1st YEAR">BSN, 1st YEAR</option>
                        <option value="BSN, 2nd YEAR">BSN, 2nd YEAR</option>
                        <option value="BSN, 3rd YEAR">BSN, 3rd YEAR</option>
                        <option value="BSN, 4th YEAR">BSN, 4th YEAR</option>
                        <option value="BSBM, 1st YEAR">BSBM, 1st YEAR</option>
                        <option value="BSBM, 2nd YEAR">BSBM, 2nd YEAR</option>
                        <option value="BSBM, 3rd YEAR">BSBM, 3rd YEAR</option>
                        <option value="BSBM, 4th YEAR">BSBM, 4th YEAR</option>
                        <option value="BSCRIM, 1st YEAR">
                            BSCRIM, 1st YEAR
                        </option>
                        <option value="BSCRIM, 2nd YEAR">
                            BSCRIM, 2nd YEAR
                        </option>
                        <option value="BSCRIM, 3rd YEAR">
                            BSCRIM, 3rd YEAR
                        </option>
                        <option value="BSCRIM, 4th YEAR">
                            BSCRIM, 4th YEAR
                        </option>
                        <option value="BSHM, 1st YEAR">BSHM, 1st YEAR</option>
                        <option value="BSHM, 2nd YEAR">BSHM, 2nd YEAR</option>
                        <option value="BSHM, 3rd YEAR">BSHM, 3rd YEAR</option>
                        <option value="BSHM, 4th YEAR">BSHM, 4th YEAR</option>
                        <option value="BSED, 1st YEAR">BSED, 1st YEAR</option>
                        <option value="BSED, 2nd YEAR">BSED, 2nd YEAR</option>
                        <option value="BSED, 3rd YEAR">BSED, 3rd YEAR</option>
                        <option value="BSED, 4th YEAR">BSED, 4th YEAR</option>
                        <option value="BSA, 1st YEAR">BSA, 1st YEAR</option>
                        <option value="BSA, 2nd YEAR">BSA, 2nd YEAR</option>
                        <option value="BSA, 3rd YEAR">BSA, 3rd YEAR</option>
                        <option value="BSA, 4th YEAR">BSA, 4th YEAR</option>
                        <option value=""></option>
                    </select>
                    <span
                        v-if="form.errors.borrower_course_and_year"
                        class="text-red-300"
                        >{{ form.errors.borrower_course_and_year }}</span
                    >
                </div>
            </div>

            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold block w-full py-2 px-4 rounded"
                >
                    Create Borrower
                </button>

                <Link
                    href="/borrowers"
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

const props = defineProps({
    libraryBooks: Object,
});

let form = useForm({
    borrower_id_num: "",
    borrower_fname: "",
    borrower_lname: "",
    borrower_phone: "",
    borrower_email: "",
    borrower_course_and_year: "",
    return_date: "",
    library_book_id: "",
});

const add = () => {
    form.post("/borrowers");
};
</script>
