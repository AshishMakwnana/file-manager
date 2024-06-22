<template>
    <div>
        <h1>Edit Book</h1>
        <form @submit.prevent="submit">
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" v-model="form.title">
            </div>
            <div>
                <label for="author">Author:</label>
                <input type="text" id="author" v-model="form.author">
            </div>
            <div>
                <label for="publication_year">Publication Year:</label>
                <input type="text" id="publication_year" v-model="form.publication_year">
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia'

export default {
    props: {
        book: Object
    },
    data() {
        return {
            form: {
                title: this.book.title,
                author: this.book.author,
                publication_year: this.book.publication_year
            }
        }
    },
    methods: {
        submit() {
            Inertia.put(`/books/${this.book.id}`, this.form)
        }
    }
}
</script>
