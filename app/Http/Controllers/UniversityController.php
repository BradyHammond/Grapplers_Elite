<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use App\University;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class UniversityController extends Controller
{
    public function getUniversity()
    {
        $parameters = [];
        $parameters['name'] = 'University Classes';
        $parameters['classes'] = University::orderBy('order')->get();
        return view('content.university', $parameters);
    }

    public function addUniversity(Request $request)
    {
        if (Auth::check())
        {
            $request->validate([
                'input-header' => 'required',
                'input-content' => 'required',
                'input-order' => 'required'
            ]);

            University::insert(['header' => $request->input('input-header'),
                'content' => $request->input('input-content'),
                'link' => $request->input('input-link'),
                'link_label' => $request->input('input-link-label'),
                'order' => $request->input('input-order'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()]);
        }

        return redirect()->back();
    }

    public function deleteUniversity($id)
    {
        if (Auth::check())
        {
            University::where('id', $id)->delete();
        }
        return redirect()->back();
    }

    public function editUniversity(Request $request, $id)
    {
        if (Auth::check())
        {
            $request->validate([
                'edit-header' => 'required',
                'edit-content' => 'required',
                'edit-order' => 'required'
            ]);

            University::where('id', $id)->update(['header' => $request->input('edit-header'),
                'content' => $request->input('edit-content'),
                'link' => $request->input('edit-link'),
                'link_label' => $request->input('edit-link-label'),
                'order' => $request->input('edit-order'),
                'updated_at' => Carbon::now()->toDateTimeString()]);
        }

        return redirect()->back();
    }
}