<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\BookDetail;
use App\Models\University;
use Auth;
use Egulias\EmailValidator\Warning\Warning;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Validation\Rule;
class AdminController extends Controller
{
    function show_university_store()
    {
        return view('institution.university');
    }

    function university_store_submit(Request $request)
    {
        $request->validate([
            'university_name' => 'required|unique:universities,university_name'
        ]);

        University::create([
            'user_id' => Auth::id(),
            'university_name' => $request->university_name

        ]);
        return redirect()->route('all.university.names')->with('success', 'University Add');

    }
    function uni_names()
    {
        $universities = University::all();
        $uni_courses = Course::all();
        return view('institution.all-universities', ['pageTitle' => 'Home Page'], compact('universities', 'uni_courses'));
    }

    public function show_course_form($id)
    {
        $universities = University::findOrFail($id);
        return view('institution.course', compact('universities'));
    }
    function course_form_submit(Request $request)
    {
        $request->validate([
            'university_id' => 'required',
            'course_name' => ['required', 'min:2', Rule::unique('courses')->where('university_id', $request->university_id)],
            'course_seats' => 'required|min:1',
        ]);
        $course_seats = $request->course_seats;
        if (empty($request->user_select_count)) {
            $in_roll_student = 0;
            $balance_course_seats = $course_seats;
        } else {
            $in_roll_student = $request->user_select_count;
            $balance_course_seats = $course_seats - $in_roll_student;
        }

        Course::create([
            'university_id' => $request->university_id,
            'course_name' => $request->course_name,
            'course_seats' => $course_seats,
            'in_roll_student' => $in_roll_student,
            'balance_seats' => $balance_course_seats,
        ]);
        return redirect()->route('university.courses', $request->university_id)->with('success', 'Course added successfully.');
    }

    function show_university_courses($id)
    {
        $university = University::findOrFail($id);
        $uni_courses = Course::where('university_id', $id)->get();
        return view('institution.university-courses', compact('university', 'uni_courses'));
    }


    // courses books form

    public function show_course_detail($id)
    {
        $university = University::findOrFail($id);
        $uni_course = Course::where('university_id', $id)->get();

        return view('institution.course-detail', compact('uni_course', 'university'));
    }

    function show_courses_books_form($id)
    {

        $course = Course::findOrFail($id);
        $university = University::findOrFail($course->university_id);
        $course_books = Book::where('course_id', $id)->get();
        return view('institution.courses-books-form', compact('course', 'course_books', 'university'));
    }
    public function submit_courses_books_form(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'book_name' => 'required|string|min:2',
            'book_price' => 'required|numeric|min:0',
            'book_stock' => 'required|integer|min:1',
        ]);
        $book_stock = $request->book_stock;
        $book_sale = 0;
        $available_book = $book_stock;

        Book::create([
            'course_id' => $request->course_id,
            'book_name' => $request->book_name,
            'book_price' => $request->book_price,
            'book_stock' => $book_stock,
            'book_sale' => $book_sale,
            'available_book' => $available_book,
        ]);

        return redirect()->route('course.detail', $request->course_id)->with('success', 'Book added successfully.');
    }

    function university_delete($id)
    {
        $destroy = University::findOrFail($id);
        $destroy_courses = Course::where('university_id', $id)->get();
        foreach ($destroy_courses as $courses) {
            Book::where('course_id', $courses->id)->delete();
        }

        Course::where('University_id', $id)->delete();
        $destroy->delete();

        return redirect()->route('all.university.names')->with('success', 'University Deleted Successfully');
    }
    function course_detail($id)
    {
        $course = Course::findOrFail($id);
        $university = University::findOrFail($course->university_id);
        $course_books = Book::where('course_id', $id)->get();
        return view('institution.course-detail', compact('course', 'course_books', 'university'));
    }

    function add_book_detail($id)
    {
        $book = Book::findOrFail($id);
        $book_detail = BookDetail::where('book_id', $id)->get();
        return view('institution.book-detail', compact('book', 'book_detail'));
    }

    function add_book_detail_submit(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'title' => 'required',
            'author' => 'required',
            'description' => 'required|min:5',
            'cover_image' => 'required|image|mimes:jpeg,jpg,webp,png|max:2048'
        ]);
        $alreadyExist = BookDetail::where('book_id', $request->book_id)->first();
        if ($alreadyExist) {
            return redirect()->route('book.detail.view',$alreadyExist->id)->with('Warning','Please update book detail');
        }
        $data = [
            'book_id' => $request->book_id,
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
        ];
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('cover_image', 'public');
        }
        BookDetail::create($data);

        // return back()->with('error', 'No file uploaded');
        return redirect()->route('book.detail.view')->with('success', 'Book details saved successfully!');
    }

    function book_detail_view($id)
    {
        $book = Book::findOrFail($id);
        $book_detail = BookDetail::where('book_id', $id)->first();
        return view('institution.book-detail-view', compact('book_detail', 'book'));
    }


}
