<template layout="default">
    <div class="container bg-yellow-400 w-[800px] text-center shadow p-10 mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-5 text-center">
            Delete Borrower
        </h1>
        <hr />
        <br />
        <i><span
            >Are you sure you want to delete
            <strong
                ><h1
                    >{{ borrower.borrower_fname }},
                    {{ borrower.borrower_lname }}</h1
                ></strong
            >
            into borrowers list?</span
        ></i>
        <br />
        <button
            @click="deleteBorrower"
            style="width: 100%"
            class="mt-10 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded form-control"
        >
            Yes, delete
        </button>
        <Link
            href="/borrowers"
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
    borrower: Object,
});

const deleteBorrower = () => {
    Inertia.post(`/borrowers/${props.borrower.id}`, {
        _method: "delete",
    });
};
</script>
