<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
</script>
<template>
    <Head title="Book-view" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Book View
            </h2>
        </template>
        <div class="container m-auto rounded w-100 mt-4 bg-white p-5 shadow">
            <h2>Book Details</h2>
            <div class=" flex justify-center align-center ">
                <div class="border container p-2">
                    <h1 class="bg-white shadow mb-3 p-3">Book Name: <span class="text-black-600 font-bold">{{ book.title }}</span> </h1>
                    <p class="bg-white shadow mb-3 p-3">Author: <span class="text-black-600 font-bold">{{ book.author }}</span></p>
                    <p class="bg-white shadow mb-3 p-3">Publication Year: <span class="text-black-600 font-bold"> {{book.publication_year }}</span></p>
                    <div class="flex justify-start gap-4 align-center">
                        <a class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" :href="route('books.edit',{id:book.id})">Edit</a>
                        <form @submit.prevent="deleteBook">
                            <button class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    props: {
        book: Object,
    },
    methods: {
        deleteBook() {
            if (confirm("Are you sure you want to delete this book?")) {
                router.delete(route('books.destroy',{id:this.book.id}));
            }
        },
    },
};
</script>
