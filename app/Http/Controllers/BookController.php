<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->get();
        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        $file_size = round(filesize(storage_path('app/public/' . $book->book_path)) / (1024 * 1024), 2);
        $page_count = 0; // You might want to implement actual page counting logic

        return view('books.show', compact('book', 'file_size', 'page_count'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function store(BookRequest $request) {
        try {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $originalName = $request->file('thumbnail')->getClientOriginalName();
                $uniqueName = time() . '_' . $originalName;
                $photoPath = $request->file('thumbnail')->storeAs('Books/Thumbnail', $uniqueName, 'public');
            }

            if ($request->hasFile('book_path')) {
                $bookOriginalName = $request->file('book_path')->getClientOriginalName();
                $bookUniqueName = time() . '_' . $bookOriginalName;
                $bookFilePath = $request->file('book_path')->storeAs('Books/Data', $bookUniqueName, 'public');
            }

            $book = Book::create([
                'title' => $validated['title'],
                'category_id' => $validated['category_id'],
                'thumbnail' => $photoPath ?? null,
                'author' => $validated['author'],
                'publish_date' => $validated['publish_date'],
                'description' => $validated['description'],
                'book_path' => $bookFilePath ?? null
            ]);

            return redirect()->route('books')->with('success', 'Book added successfully!');

        } catch (\Exception $e) {
            \Log::error('Failed to create book: ' . $e->getMessage());
            return redirect()->route('books')->with('error', 'Failed to add the book. Please try again.');
        }
    }

    public function update(BookRequest $request, Book $book) {
        try {
            $validated = $request->validated();

            $updateData = [
                'title' => $validated['title'],
                'category_id' => $validated['category_id'],
                'author' => $validated['author'],
                'publish_date' => $validated['publish_date'],
                'description' => $validated['description'],
            ];

            if ($request->hasFile('thumbnail')) {
                if ($book->thumbnail && file_exists(storage_path('app/public/'.$book->thumbnail))) {
                    unlink(storage_path('app/public/'.$book->thumbnail));
                }

                $originalName = $request->file('thumbnail')->getClientOriginalName();
                $uniqueName = time() . '_' . $originalName;
                $photoPath = $request->file('thumbnail')->storeAs('Books/Thumbnail', $uniqueName, 'public');
                $updateData['thumbnail'] = $photoPath;
            }

            if ($request->hasFile('book_path')) {
                if ($book->book_path && file_exists(storage_path('app/public/'.$book->book_path))) {
                    unlink(storage_path('app/public/'.$book->book_path));
                }

                $bookOriginalName = $request->file('book_path')->getClientOriginalName();
                $bookUniqueName = time() . '_' . $bookOriginalName;
                $bookFilePath = $request->file('book_path')->storeAs('Books/Data', $bookUniqueName, 'public');
                $updateData['book_path'] = $bookFilePath;
            }

            $book->update($updateData);

            return redirect()->route('books')->with('success', 'Book updated successfully!');

        } catch (\Exception $e) {
            \Log::error('Failed to update book: ' . $e->getMessage());
            return redirect()->route('books')->with('error', 'Failed to update the book. Please try again.');
        }
    }

    public function destroy(Book $book) {
        try {
            // Delete associated files first
            if ($book->thumbnail && file_exists(storage_path('app/public/'.$book->thumbnail))) {
                unlink(storage_path('app/public/'.$book->thumbnail));
            }

            if ($book->book_path && file_exists(storage_path('app/public/'.$book->book_path))) {
                unlink(storage_path('app/public/'.$book->book_path));
            }

            // Delete the book record
            $book->delete();

            return redirect()->route('books')->with('success', 'Book deleted successfully!');

        } catch (\Exception $e) {
            \Log::error('Failed to delete book: ' . $e->getMessage());
            return redirect()->route('books')->with('error', 'Failed to delete the book. Please try again.');
        }
    }

    public function download(Book $book)
    {
        $filePath = storage_path('app/public/' . $book->book_path);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return response()->json(['error' => 'File not found.'], 404);
        }
    }
}
