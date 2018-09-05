<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use App\Program;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
    public function getAdultProgram()
    {
        $parameters = [];
        $parameters['name'] = 'Adult Program';
        $parameters['programs'] = $this->getProgram('Adult');
        return view('content.program', $parameters);
    }

    public function getJuniorProgram()
    {
        $parameters = [];
        $parameters['name'] = 'Junior Program';
        $parameters['programs'] = $this->getProgram('Junior');
        return view('content.program', $parameters);
    }

    public function addProgram(Request $request)
    {
        if (Auth::check()) 
        {
            $request->validate([
                'input-age' => 'required',
                'input-header' => 'required',
                'input-content' => 'required',
                'input-order' => 'required'
            ]);

            Program::insert(['age' => $request->input('input-age'), 
            'header' => $request->input('input-header'),
            'content' => $request->input('input-content'),
            'order' => $request->input('input-order'),
            'created_at' => Carbon::now()->toDateTimeString(), 
            'updated_at' => Carbon::now()->toDateTimeString()]);
        }

        return redirect()->back();
    }

    public function getProgram($age)
    {
        return Program::where('age', $age)->orderBy('order')->get();
    }

    public function deleteProgram($id)
    {
        if (Auth::check()) 
        {
            Program::where('id', $id)->delete();
        }
        return redirect()->back();
    }

    public function editProgram(Request $request, $id) 
    {
        if (Auth::check()) 
        {
            $request->validate([
                'edit-age' => 'required',
                'edit-header' => 'required',
                'edit-content' => 'required',
                'edit-order' => 'required'
            ]);

            Program::where('id', $id)->update(['age' => $request->input('edit-age'), 
            'header' => $request->input('edit-header'),
            'content' => $request->input('edit-content'),
            'order' => $request->input('edit-order'),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        }

        return redirect()->back();
    }
}