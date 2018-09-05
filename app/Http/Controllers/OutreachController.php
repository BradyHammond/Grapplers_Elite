<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use App\Outreach;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class OutreachController extends Controller
{
    public function getOutreach()
    {
        $parameters = [];
        $parameters['name'] = 'Grapplers Outreach';
        $parameters['outreach'] = Outreach::first();
        return view('content.outreach', $parameters);
    }

    public function editOutreach(Request $request, $id)
    {
        if (Auth::check())
        {
            $request->validate([
                'edit-content' => 'required'
            ]);

            Outreach::where('id', $id)->update(['content' => $request->input('edit-content'),
                'updated_at' => Carbon::now()->toDateTimeString()]);
        }

        return redirect()->back();
    }
}