<template>
    <div>
        <h1>{{ book.title }}</h1>
        <p>Author: {{ book.author }}</p>
        <p>Publication Year: {{ book.publication_year }}</p>
        <a :href="`/books/${book.id}/edit`">Edit</a>
        <form @submit.prevent="deleteBook">
            <button type="submit">Delete</button>
        </form>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia'

export default {
    props: {
        book: Object
    },
    methods: {
        deleteBook() {
            if (confirm('Are you sure you want to delete this book?')) {
                Inertia.delete(`/books/${this.book.id}`)
            }
        }
    }
}
</script>
