<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use App\Policy;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class PolicyController extends Controller
{
    public function getPolicy()
    {
        $parameters = [];
        $parameters['name'] = 'Academy Policies';
        $parameters['policies'] = Policy::orderBy('order')->get();
        return view('content.policies', $parameters);
    }

    public function addPolicy(Request $request)
    {
        if (Auth::check())
        {
            $request->validate([
                'input-header' => 'required',
                'input-content' => 'required',
                'input-order' => 'required'
            ]);

            Policy::insert(['header' => $request->input('input-header'),
                'content' => $request->input('input-content'),
                'order' => $request->input('input-order'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()]);
        }

        return redirect()->back();
    }

    public function deletePolicy($id)
    {
        if (Auth::check())
        {
            Policy::where('id', $id)->delete();
        }
        return redirect()->back();
    }

    public function editPolicy(Request $request, $id)
    {
        if (Auth::check())
        {
            $request->validate([
                'edit-header' => 'required',
                'edit-content' => 'required',
                'edit-order' => 'required'
            ]);

            Policy::where('id', $id)->update(['header' => $request->input('edit-header'),
                'content' => $request->input('edit-content'),
                'order' => $request->input('edit-order'),
                'updated_at' => Carbon::now()->toDateTimeString()]);
        }

        return redirect()->back();
    }
}