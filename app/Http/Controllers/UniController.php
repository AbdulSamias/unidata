<?php

namespace App\Http\Controllers;

use App\Models\UniversityDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UniController extends Controller
{
    // Show form
    public function showuni()
    {
        return view('institution.add-uni-data');
    }

    // Handle form submission
    public function uni(Request $request )
    {
        // Validation
        $request->validate([
            'uni_name' => 'required',
            'course' => 'required',
            'semester' => 'required',
            'books' => 'required'
        ]);

        // Save data to database
        UniversityDetail::create([
            'user_id' => Auth::user()->id,
            'uni_name' => $request->uni_name,
            'course' => $request->course,
            'semester' => $request->semester,
            'books' => $request->books
        ]);

        // Redirect with success message
        return redirect('/all-data-university-details')->with('success', 'University Detail Saved Successfully');
    }
    function show_alluni_data()
    {
        $user = Auth::user()->id;
        $institutions = UniversityDetail::where('user_id', $user)->get();
        return view('institution.add-uni-detail-show', compact('institutions'));
    }

    function showcard()
    {
        $user = Auth::user()->id;
        $institutions = UniversityDetail::where('user_id', $user)->get();
        return view('institution.add-uni-detail-show', compact('institutions'));
    }
    function showUpdateCard()
    {
        $user = Auth::user();
        $update = UniversityDetail::where('user_id', $user->id)->first();
        return view('institution.update-card', compact('update'));
    }
    function updatedcard(Request $request, $id)
    {
        $request->validate([
            'uni_name' => 'required',
            'course' => 'required',
            'semester' => 'required',
            'books' => 'required'
        ]);
        $update = UniversityDetail::find($id);
        if (!$update) {
            return redirect()->back()->withErrors('Error', 'Not found user id');
        }
        $update->uni_name = $request->uni_name;
        $update->course = $request->course;
        $update->semester = $request->semester;
        $update->books = $request->books;
        $update->save();
        return redirect()->route('show.all.uni.data')->with('success','University Detail Saved');
    }
    function card_delete($id)
    {
        $destroy = UniversityDetail::findOrFail($id);
        $destroy->delete();

        return redirect('/all-data-university-details');
    }
}
