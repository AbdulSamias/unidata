<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\BookDetail;
use App\Models\University;
use Auth;
use App\ModelS\User;
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
            'university_name' => 'required|unique:universities,university_name|min:1'
        ]);

        University::create([
            'user_id' => Auth::id(),
            'university_name' => $request->university_name

        ]);
        return redirect()->route('all.university.names')->with('success', 'University Add');

    }
    function uni_names()
    {
        $uni_count = University::whereNotNull('university_name')->count();
        $universities = University::orderBy('id', 'desc')->get();
        $uni_courses = Course::whereNotNull('course_name')->count();
        $course_count = course::with('university')->selectRaw('university_id, COUNT(*) as total_courses')->whereNotNull('university_id')->groupBy('university_id')->pluck('total_courses', 'university_id');
        return view('institution.all-universities', compact('universities', 'course_count', 'uni_courses', 'uni_count'));
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

        // Fetch courses in descending order of ID
        $uni_courses = Course::where('university_id', $id)->orderBy('id', 'desc')->get();
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
        $available_book = $book_stock - $book_sale;

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
        $course_books = Book::with('bookDetail')->where('course_id', $id)->orderBy('id', 'desc')->get();
        return view('institution.course-detail', compact('course', 'course_books', 'university'));
    }


    function add_book_detail($id)
    {
        $book = Book::findOrFail($id);
        $book_detail = BookDetail::where('book_id', $id)->first();
        if ($book_detail) {
            return redirect()->route('book.detail.view', $book_detail->id)
                ->with('warning', 'Book detail already exists. You can update it.');
        }
        return view('institution.book-detail', compact('book'));
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
            return redirect()->route('book.detail.view', $alreadyExist->id)
                ->with('warning', 'Please update book detail');
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

        $book_detail = BookDetail::create($data);

        return redirect()->route('book.detail.view', $book_detail->id)
            ->with('success', 'Book details saved successfully!');
    }


    function book_detail_view($book_id)
    {
        $book = Book::findOrFail($book_id);
        $book_detail = BookDetail::where('book_id', $book_id)->first();
        if (!$book_detail) {
            return redirect()->route('add.book.detail', $book_id)->with('warning', 'Book detail not Found');
        }

        return view('institution.book-detail-view', compact('book_detail', 'book'));
    }

    function uni_name_update_form($id)
    {
        $university = University::findOrFail($id);
        return view('institution.uni-name-update-form', compact('university'));
    }

    function uni_name_update_form_submit(Request $request, $id)
    {
        $request->validate([
            'university_name' => [
                'required',
                'min:1',
                Rule::unique('universities')->where(function ($query) use ($request, $id) {
                    return $query->whereRaw('LOWER(university_name) = ?', [strtolower($request->university_name)])->where('id', '!=', $id);
                })
            ]
        ]);
        $updateUniName = University::findOrFail($id);
        $updateUniName->university_name = $request->university_name;
        $updateUniName->save();
        return redirect()->route('all.university.names')->with('success', 'University Update Successfully');
    }
    function update_course_name_form($id)
    {
        $course = Course::findOrFail($id);
        $university = University::findOrFail($course->university_id);
        return view('institution.update-course-name', compact('university', 'course'));
    }
    public function update_course_name_form_submit(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $request->validate([
            'course_name' => [
                'required',
                'string',
                Rule::unique('courses', 'course_name')
                    ->where(function ($query) use ($request) {
                        return $query->where('university_id', $request->university_id);
                    })
                    ->ignore($id), // <-- this ignores the current row by ID
            ],
            'course_seats' => 'required|integer|min:1',
        ]);
        $course_seats = $request->course_seats;
        $in_roll_student = (int) ($request->user_select_count ?? 0);
        $balance_course_seats = $course_seats - $in_roll_student;
        if ($balance_course_seats < 0) {
            return back()->withErrors(['user_select_count', 'Enrolled students cannot exceed total seats.']);
        }
        $course->university_id = $request->university_id;
        $course->course_name = $request->course_name;
        $course->course_seats = $request->course_seats;
        $course->in_roll_student = $in_roll_student;
        $course->balance_seats = $balance_course_seats;
        $course->save();

        return redirect()
            ->route('university.courses', $request->university_id)
            ->with('success', 'Course updated successfully.');
    }

    public function update_course_book_form($id)
    {
        $book = Book::findOrFail($id);
        $course = $book->course;
        $university = $course->university;
        return view('institution.update-course-book-form', compact('book', 'course', 'university'));

    }

    function update_course_book_form_submit(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'book_name' => 'required|string|min:2',
            'book_price' => 'required|numeric|min:0',
            'book_stock' => 'required|integer|min:1',
        ]);
        $book_stock = $request->book_stock;
        $book_sale = (int) ($request_book_sale_count ?? 0);
        $available_book = $book_stock - $book_sale;
        if ($available_book < 0) {
            return back()->withErrors(['available_book', 'Book not available in Our Stock']);
        }
        $book = Book::findOrFail($id);
        $book->course_id = $request->course_id;
        $book->book_name = $request->book_name;
        $book->book_price = $request->book_price;
        $book->book_stock = $book_stock;
        $book->book_sale = $book_sale;
        $book->available_book = $available_book;
        $book->save();
        return redirect()->route('course.detail', $request->course_id)->with('success', 'Book is Updated');

    }

    function update_book_detail($id)
    {
        $book = Book::findOrFail($id);
        $book_detail = BookDetail::where('book_id', $id)->first();
        return view('institution.update-book-detail', compact('book', 'book_detail'));
    }
    function update_book_detail_submit(Request $request, $id)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'title' => 'required',
            'author' => 'required',
            'description' => 'required|min:5',
            'cover_image' => 'nullable|image|mimes:jpeg,jpg,webp,png|max:2048',
        ]);

        $data = BookDetail::findOrFail($id);
        $data->book_id = $request->book_id;
        $data->title = $request->title;
        $data->author = $request->author;
        $data->description = $request->description;
        if ($request->hasFile('cover_image')) {
            $data->cover_image = $request->file('cover_image')->store('cover_image', 'public');
        }
        $data->save();
        return redirect()->route('book.detail.view', $data->book_id)->with('success', 'Book details saved successfully!');
    }

    function admin_dashboard(Request $request)
    {
        $total_university = University::whereNotNull('university_name')->count();
        $search = $request->input('search');
        $universities = University::when($search, function ($query, $search) {
            return $query->where('university_name', 'like', "%{$search}%");
        })->orderBy('id', 'desc')->get();
        $total_course = Course::whereNotNull('course_name')->count();
        $uni_course_count = Course::with('university')->selectRaw('university_id , COUNT(*) as total_courses')->whereNotNull('university_id')->groupBy('university_id')->pluck('total_courses', 'university_id');
        $student_count = User::where('role', 'student')->count();
        return view('institution.admin-dashboard', compact('student_count', 'universities', 'total_university', 'total_course', 'uni_course_count'));
    }
function university_roles(){
    return view('institution.university-roles');
}
function role_form(){
    return view('institution.roles-form');
}
function role_form_submit(Request $request){
$request->vaildate([
'role_title'=>'required | min:2',
'role_desc'=>'min:5'
]);



}

}
