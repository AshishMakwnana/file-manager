<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Book-Add" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Add-Books
                </h2>
                <Link
                    class="bg-gray-300 p-2 hover:bg-gray-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300"
                    :href="route('books.index')"
                    >Books</Link
                >
            </div>
        </template>
        <div class="flex justify-center align-center bg-white shadow mt-2 p-3">
            <form @submit.prevent="submit">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2
                            class="text-base font-semibold leading-7 text-gray-900"
                        >
                            Upload New Book Details
                        </h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">
                            Please fill in the details below to add a new book.
                        </p>

                        <div
                            class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                        >
                            <div class="sm:col-span-4">
                                <label
                                    for="title"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                    >Title:</label
                                >
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                    >
                                        <input
                                            type="text"
                                            name="username"
                                            id="title"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            v-model="form.title"
                                        />
                                    </div>
                                    <p
                                        v-if="errors.title"
                                        class="mt-2 text-sm text-red-600"
                                    >
                                        {{ errors.title }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                        >
                            <div class="sm:col-span-4">
                                <label
                                    for="author"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                    >Author:</label
                                >
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                    >
                                        <input
                                            type="text"
                                            id="author"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            v-model="form.author"
                                        />
                                    </div>
                                </div>
                                <p
                                    class="mt-2 text-sm text-red-600"
                                    v-if="errors.author"
                                >
                                    {{ errors.author }}
                                </p>
                            </div>
                        </div>

                        <div
                            class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                        >
                            <div class="sm:col-span-4">
                                <label
                                    for="publication_year"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                    >Publication Year:</label
                                >
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                    >
                                        <input
                                            type="text"
                                            id="publication_year"
                                            v-model="form.publication_year"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        />
                                    </div>
                                    <p
                                        class="mt-2 text-sm text-red-600"
                                        v-if="errors.publication_year"
                                    >
                                        {{ errors.publication_year }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button
                        type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        Create
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    props: {
        errors: Object,
        success: Object,
    },
    data() {
        return {
            form: {
                title: "",
                author: "",
                publication_year: "",
            },
        };
    },
    methods: {
        submit() {
            router.post(route("books.store"), this.form);
        },
    },
};
</script>
