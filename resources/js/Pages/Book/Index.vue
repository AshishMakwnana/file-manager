<template>
    <div>
        <h1>Books</h1>
        <h1>this all book view</h1>
        <ul>
            <li v-for="book in books" :key="book.id">
                <a :href="`/books/${book.id}`">{{ book.title }}</a>
            </li>
        </ul>
        <a href="/books/create">Create New Book</a>
    </div>
</template>

<script>
export default {
    props: {
        books: Array
    }
}
</script>
