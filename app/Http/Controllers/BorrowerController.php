<?php

namespace App\Http\Controllers;

use App\Models\LibraryBook;
use App\Models\Borrower;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowers = Borrower::orderBy('borrower_fname')->with('libraryBook')->paginate(10);

        return inertia('borrowers/Index', compact('borrowers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libraryBooks = LibraryBook::all();
        return inertia('borrowers/Create', [
            'libraryBooks' => $libraryBooks
        ]);
        return inertia('borrowers/Create');
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
            'borrower_id_num' => 'required|unique:borrowers',
            'borrower_fname' => 'required',
            'borrower_lname' => 'required',
            'borrower_phone' => 'required',
            'borrower_email' => 'required',
            'borrower_course_and_year' => 'required',
            'return_date' => 'required',
            'library_book_id' => 'required'
        ]);

        Borrower::create([
            'borrower_id_num' => $request->borrower_id_num,
            'borrower_fname' => $request->borrower_fname,
            'borrower_lname' => $request->borrower_lname,
            'borrower_phone' => $request->borrower_phone,
            'borrower_email' => $request->borrower_email,
            'borrower_course_and_year' => $request->borrower_course_and_year,
            'return_date' => $request->return_date,
            'library_book_id' => $request->library_book_id
        ]);

        return redirect('/borrowers')->with('success', 'A new borrower has been added.');
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
        $borrower = Borrower::with('libraryBook')->findOrFail($id);
        $libraryBooks = LibraryBook::all();

        return Inertia::render('borrowers/Edit', [
            'borrower' => $borrower,
            'libraryBooks' => $libraryBooks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrower $borrower)
    {
        $request->validate([
            'borrower_id_num' => 'required|unique:borrowers,borrower_id_num,' . $borrower->id,
            'borrower_fname' => 'required',
            'borrower_lname' => 'required',
            'borrower_phone' => 'required',
            'borrower_email' => 'required',
            'borrower_course_and_year' => 'required',
            'return_date' => 'required',
            'library_book_id' => 'required'
        ]);

        $borrower->update([
            'borrower_id_num' => $request->input('borrower_id_num'),
            'borrower_fname' => $request->input('borrower_fname'),
            'borrower_lname' => $request->input('borrower_lname'),
            'borrower_email' => $request->input('borrower_email'),
            'borrower_phone' => $request->input('borrower_phone'),
            'return_date' => $request->input('return_date'),
            'borrower_course_and_year' => $request->input('borrower_course_and_year'),
            'library_book_id' => $request->input('library_book_id')

        ]);


        return redirect('/borrowers')->with('success', 'The borrower updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $borrower = Borrower::with('libraryBook')->findOrFail($id);
        $libraryBooks = LibraryBook::all();

        return Inertia::render('borrowers/Delete', [
            'borrower' => $borrower,
            'libraryBooks' => $libraryBooks,
        ]);
    }

    public function destroy($id)
    {
        $borrower = Borrower::findOrFail($id);
        $borrower->delete();

        return redirect('/borrowers')->with('success', 'Borrower deleted successfully');
    }

    public function view($id)
    {
        $borrower = Borrower::with('libraryBook')->findOrFail($id);
        $libraryBooks = LibraryBook::all();

        return Inertia::render('borrowers/View', [
            'borrower' => $borrower,
            'libraryBooks' => $libraryBooks,
        ]);
    }
}
