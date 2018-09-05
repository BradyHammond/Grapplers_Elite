<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use App\Belt;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class BeltsController extends Controller
{
    public function getAdultBelts()
    {
        $parameters = [];
        $parameters['name'] = 'Adult Belt Ranks';
        $parameters['belts'] = $this->getBelts('Adult');
        return view('content.belt_ranks', $parameters);
    }

    public function getJuniorBelts()
    {
        $parameters = [];
        $parameters['name'] = 'Junior Belt Ranks';
        $parameters['belts'] = $this->getBelts('Junior');
        return view('content.belt_ranks', $parameters);
    }

    public function addBelt(Request $request)
    {
        if (Auth::check()) 
        {
            $request->validate([
                'input-age' => 'required',
                'input-header' => 'required',
                'input-overview' => 'required',
                'input-stripes' => 'required',
                'input-order' => 'required'
            ]);
        
            $image = null;
            if($request->file('input-image') != null)
            {
                $image = $request->file('input-image')->store('images');
            }

            Belt::insert(['age' => $request->input('input-age'), 
            'header' => $request->input('input-header'),
            'overview' => $request->input('input-overview'),
            'stripes' => $request->input('input-stripes'),
            'image' => $image,
            'order' => $request->input('input-order'),
            'created_at' => Carbon::now()->toDateTimeString(), 
            'updated_at' => Carbon::now()->toDateTimeString()]);
        }

        return redirect()->back();
    }

    public function getBelts($age)
    {
        return Belt::where('age', $age)->orderBy('order')->get();
    }

    public function deleteBelt($id)
    {
        if (Auth::check()) 
        {
            Belt::where('id', $id)->delete();
        }
        return redirect()->back();
    }

    public function editBelt(Request $request, $id) 
    {
        if (Auth::check()) 
        {
            $request->validate([
                'edit-age' => 'required',
                'edit-header' => 'required',
                'edit-overview' => 'required',
                'edit-stripes' => 'required',
                'edit-order' => 'required'
            ]);

            $image = null;
            if($request->file('edit-image') != null)
            {
                $image = $request->file('edit-image')->store('images');
            }

            if(is_null($image)) {
                Belt::where('id', $id)->update(['age' => $request->input('edit-age'), 
                'header' => $request->input('edit-header'),
                'overview' => $request->input('edit-overview'),
                'stripes' => $request->input('edit-stripes'),
                'order' => $request->input('edit-order'),
                'updated_at' => Carbon::now()->toDateTimeString()]);
            }

            else {
                Belt::where('id', $id)->update(['age' => $request->input('edit-age'), 
                'header' => $request->input('edit-header'),
                'overview' => $request->input('edit-overview'),
                'stripes' => $request->input('edit-stripes'),
                'image' => $image,
                'order' => $request->input('edit-order'),
                'updated_at' => Carbon::now()->toDateTimeString()]);
            }
        }

        return redirect()->back();
    }
}