<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UniController;
use App\Http\Middleware\LogNot;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(ValidUser::class)->group(function () {

    Route::get('/register', [AuthController::class, 'showSignupForm'])->name('show.sign.form');
    Route::post('/register', [AuthController::class, 'signup'])->name('signup.submit');

    Route::get('/login', [AuthController::class, 'showloginform'])->name('show.login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::middleware(LogNot::class)->group(function () {
    Route::get('/change-password', [AuthController::class, 'change_password_form'])->name('change_password.show_form');
    Route::post('/change-password', [AuthController::class, 'change_password'])->name('change_password_submit_form');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/send-email', [MailController::class, 'showemail'])->name('show.mail');
    Route::post('/send-email', [MailController::class, 'sendEmail'])->name('email.submit');

    Route::get('/university-details', [UniController::class, 'showuni'])->name('show.uni.form');
    Route::post('/university-details', [UniController::class, 'uni'])->name('uni.store');

    Route::get('/all-data-university-details', [UniController::class, 'show_alluni_data'])->name('show.all.uni.data');

    Route::get('/update-detail-card', [UniController::class, 'showcard']);

    Route::get('/need-update-card', [UniController::class, 'showUpdateCard'])->name('need.update.card');
    Route::put('/university/update/{id}', [UniController::class, 'updatedcard'])->name('update.submited.card');


    Route::delete('/UniversityDetail/{id}', [UniController::class, 'card_delete'])->name('UniversityDetail.destroy');

    Route::get('/admin-university-store', [AdminController::class, 'show_university_store'])->name('university.store');
    Route::post('/admin-university-store', [AdminController::class, 'university_store_submit'])->name('submit.university.store');

    Route::get('/universities-names', [AdminController::class, 'uni_names'])->name('all.university.names');

    Route::delete('/University/{id}', [AdminController::class, 'university_delete'])->name('university.store.destroy');

    Route::get('/admin/courses/submit/{id}', [AdminController::class, 'show_course_form'])->name('show.courses');
    Route::post('/admin/courses/submit', [AdminController::class, 'course_form_submit'])->name('courses.submit');

    Route::get('/university-courses/{id}', [AdminController::class, 'show_university_courses'])->name('university.courses');

    // Show book form for selected university
    Route::get('/admin/courses/add-book/{id}', [AdminController::class, 'show_courses_books_form'])
        ->name('show.courses.books.form');

    // Handle book form submission
    Route::post('/admin/courses/add-book', [AdminController::class, 'submit_courses_books_form'])->name('submit.courses.books.form.store');

    Route::get('/course-detail/{id}', [AdminController::class, 'course_detail'])->name('course.detail');

    Route::get('/add-book-detail/{id}', [AdminController::class, 'add_book_detail'])->name('add.book.detail');
    Route::post('/add-book-detail', [AdminController::class, 'add_book_detail_submit'])->name('add.book.detail.submit');
    Route::get('/book-detail-view/{id}',[AdminController::class,'book_detail_view'])->name('book.detail.view');




});