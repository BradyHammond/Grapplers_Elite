<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use App\About;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function getAbout()
    {
        $parameters = [];
        $parameters['name'] = 'About Grapplers Elite';
        $parameters['about'] = About::first();
        return view('content.about', $parameters);
    }

    public function editAbout(Request $request, $id) 
    {
        if (Auth::check()) 
        {
            $request->validate([
                'edit-content' => 'required'
            ]);

            About::where('id', $id)->update(['content' => $request->input('edit-content'),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        }

        return redirect()->back();
    }
}