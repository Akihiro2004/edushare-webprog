<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Video;
use App\Models\Category;
use Smalot\PdfParser\Parser;

class PageController extends Controller
{
    public function welcome() {
        $latestVideos = Video::orderBy('publish_date', 'desc')->take(3)->get();
        $latestBooks = Book::orderBy('publish_date', 'desc')->take(3)->get();

        return view('welcome', compact('latestVideos', 'latestBooks'));
    }

    public function about() {
        return view('about');
    }

    public function books($category_id=0) {

        $search = request()->query('search', '');

        if ($category_id!=0){
            $books = Book::where('category_id', $category_id)->paginate(8);
        }
        else if ($search != ""){
            $books = Book::whereLike('title', '%'.$search.'%')
                    ->orWhereLike('author', '%'.$search.'%')
                    ->paginate(8)
                    ->appends(['search'=>$search]);
        }
        else{
            $books = Book::paginate(8);
        }
        $categories = Category::all();

        $active_category = $category_id;

        return view('book', ['books'=>$books, 'categories'=>$categories, 'active_category'=>$active_category]);
    }

    public function videos($category_id=0) {

        $search = request()->query('search', '');

        if ($category_id!=0){
            $videos = Video::where('category_id', $category_id)->paginate(6);
        }
        else if ($search != ""){
            $videos = Video::whereLike('title', '%'.$search.'%')
                    ->orWhereLike('creator', '%'.$search.'%')
                    ->paginate(6)
                    ->appends(['search'=>$search]);
        }
        else{
            $videos = Video::paginate(6);
        }
        $categories = Category::all();

        $active_category = $category_id;

        return view('video', ['videos'=>$videos, 'categories'=>$categories, 'active_category'=>$active_category]);
    }

    public function bookDetail(Book $book) {
        $fileSize = filesize(public_path('storage/' . $book->book_path));
        $fileSizeInMB = number_format($fileSize / (1024 * 1024), 2);

        try {
            $parser = new Parser();
            $pdf = $parser->parseFile(public_path('storage/' . $book->book_path));
            $pages = $pdf->getPages();
            $pageCount = is_array($pages) ? count($pages) : 1;
        } catch (\Exception $e) {
            $pageCount = '...';
        }

        return view('bookDetail', [
            'book' => $book,
            'file_size' => $fileSizeInMB,
            'page_count' => $pageCount
        ]);
    }

    public function videoDetail(Video $video) {
        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $video->url, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $video->url, $matches)) {
            $videoId = $matches[1];
        }

        if (isset($videoId)) {
            $video->embed_url = "https://www.youtube.com/embed/" . $videoId;
        }

        return view('videoDetail', ['video' => $video]);
    }

    public function addBook() {
        $categories = Category::all();

        return view('addBook', ['categories'=>$categories]);
    }

    public function editBook(Book $book)
    {
        $categories = Category::all();
        return view('editBook', compact('book', 'categories'));
    }

    public function addVideo() {
        $categories = Category::all();

        return view('addVideo', ['categories'=>$categories]);
    }

    public function editVideo(Video $video)
    {
        $categories = Category::all();
        return view('editVideo', compact('video', 'categories'));
    }
}
