<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Books" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Books
                </h2>
                <Link
                    class="bg-gray-300 text-gray p-2 rounded hover:bg-gray-100 active:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300"
                    :href="route('books.create')"
                    >Create New Book</Link
                >
            </div>
        </template>
        <div class="py-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table
                    class="min-w-full divide-y divide-gray-200 table-bordered"
                >
                    <thead
                        class="bg-gray-100 text-red text-center align-middle"
                    >
                        <tr>
                            <th
                                scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-black-500 uppercase tracking-wider"
                            >
                                S No
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-black-500 uppercase tracking-wider"
                            >
                                Title
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-black-500 uppercase tracking-wider"
                            >
                                Author
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-black-500 uppercase tracking-wider"
                            >
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody
                        class="bg-white divide-y divide-gray-200 text-center"
                    >
                        <template v-if="books.length > 0">
                            <tr v-for="(book, index) in books" :key="book.id">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ index + 1 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ book.title }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ book.author }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a
                                        :href="
                                            route('books.show', { id: book.id })
                                        "
                                        class="text-indigo-600 hover:text-indigo-900"
                                        >View</a
                                    >
                                </td>
                            </tr>
                        </template>
                        <template v-else>
                            <tr>
                                <td
                                    colspan="3"
                                    class="px-6 py-4 whitespace-nowrap text-center text-gray-500"
                                >
                                    No books added yet.
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    props: {
        books: Array,
    },
};
</script>

<style scoped>
/* Add your custom styles here if needed */
</style>
