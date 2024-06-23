<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Book;
use PhpParser\Node\Expr\FuncCall;

class BookFeaturesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_book_page_view_or_not(): void
    {
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->get('/books');

        $response->assertOk();
    }

    public function test_book_create_page_view(): void
    {
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->get('/books/create');

        $response->assertOk();
    }

    public function test_book_create()
    {
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->post(route('books.store'), [
                'title' => 'test',
                'author' => 'test',
                'publication_year' => '2024'
            ]);

        // Assert the response status (if the controller redirects after storing the book)
        $response->assertRedirect();

        // Assert that the book exists in the database
        $this->assertDatabaseHas('books', [
            'title' => 'test',
            'author' => 'test',
            'publication_year' => '2024'
        ]);

        // Assert that a success message is in the session
        $response->assertSessionHas([
            'message' => [
                'type' => 'success',
                'message' => 'New Book Added successfully'
            ]
        ]);
    }

    public function test_book_edit_page_view(): void
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get(route('books.edit', $book->id));

        // Assert the response status is OK (200)
        $response->assertOk();

        // Assert that the response contains the book's data
        $response->assertSee($book->title);
        $response->assertSee($book->author);
        $response->assertSee($book->publication_year);
    }

    public function test_book_update(): void
    {
        // Create a user
        $user = User::factory()->create();

        // Create a book using the factory
        $book = Book::factory()->create([
            'title' => 'Old Title',
            'author' => 'Old Author',
            'publication_year' => '2000'
        ]);

        // Define the new data
        $updatedData = [
            'title' => 'test',
            'author' => 'test',
            'publication_year' => '2024'
        ];

        // Act as the created user and update the book
        $response = $this
            ->actingAs($user)
            ->put(route('books.update', $book->id), $updatedData);

        // Assert the response status (if the controller redirects after updating the book)
        $response->assertRedirect();

        // Assert that the book was updated in the database
        $this->assertDatabaseHas('books', $updatedData);
    }

    public function test_book_delete(): void
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete(route('books.destroy', $book->id));

        $response->assertRedirect();

        // Assert that the book does not exist in the database anymore
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }
}
