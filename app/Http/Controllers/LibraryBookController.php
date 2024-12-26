<?php

namespace App\Http\Controllers;

use App\Models\LibraryBook;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LibraryBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libraryBooks = LibraryBook::orderBy('name_of_book')->with('borrowers')->paginate(5);

        return inertia('library-books/Index', compact('libraryBooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('library-books/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_of_book' => 'required|unique:library_books',
            'category_of_book' => 'required',
            'book_assign' => 'required'
        ]);

        LibraryBook::create([
            'name_of_book' => $request->name_of_book,
            'category_of_book' => $request->category_of_book,
            'book_assign' => $request->book_assign
        ]);

        return redirect('/book-lists')->with('success', 'A new book has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libraryBook = LibraryBook::findOrFail($id);

        return Inertia::render('library-books/Edit', [
            'libraryBook' => $libraryBook,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LibraryBook $libraryBook)
    {
        $libraryBook->update([
            'name_of_book' => $request->input('name_of_book'),
            'category_of_book' => $request->input('category_of_book'),
            'book_assign' => $request->input('book_assign')

        ]);


        return redirect('/book-lists')->with('success', 'The Library Book updated successfully.');
    }

    public function delete($id)
    {
        $libraryBook = LibraryBook::findOrFail($id);

        return Inertia::render('library-books/Delete', [
            'libraryBook' => $libraryBook,
        ]);
    }

    public function destroy($id)
    {
        $libraryBook = LibraryBook::findOrFail($id);
        $libraryBook->delete();

        return redirect('/book-lists')->with('success', 'Library Book deleted successfully');
    }
}
