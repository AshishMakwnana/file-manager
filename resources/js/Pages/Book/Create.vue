<template>
    <div>
        <h1>Create Book</h1>
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
            <button type="submit">Create</button>
        </form>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia'

export default {
    data() {
        return {
            form: {
                title: '',
                author: '',
                publication_year: ''
            }
        }
    },
    methods: {
        submit() {
            Inertia.post('/books', this.form)
        }
    }
}
</script>
