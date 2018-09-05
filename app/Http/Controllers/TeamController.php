<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use App\Team;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{    
    public function getTeam()
    {
        $parameters = [];
        $parameters['name'] = 'Our Team';
        $parameters['team'] = Team::orderBy('order')->get();
        return view('content.team', $parameters);
    }

    public function addTeamMember(Request $request)
    {
        if (Auth::check()) 
        {
            $request->validate([
                'input-first-name' => 'required',
                'input-last-name' => 'required',
                'input-captain' => 'required',
                'input-belt' => 'required',
                'input-order' => 'required'
            ]);
        
            $image = null;
            if($request->file('input-image') != null)
            {
                $image = $request->file('input-image')->store('images');
            }

            Team::insert(['first_name' => $request->input('input-first-name'),
            'last_name' => $request->input('input-last-name'),
            'captain' => ($request->input('input-captain') === 'True'), 
            'belt' => $request->input('input-belt'),
            'bio' => $request->input('input-bio'),
            'awards' => $request->input('input-awards'),
            'image' => $image,
            'order' => $request->input('input-order'),
            'created_at' => Carbon::now()->toDateTimeString(), 
            'updated_at' => Carbon::now()->toDateTimeString()]);
        }
        return redirect()->back();
    }

    public function deleteTeamMember($id)
    {
        if (Auth::check()) 
        {
            Team::where('id', $id)->delete();
        }
        return redirect()->back();
    }

    public function editTeamMember(Request $request, $id) 
    {
        if (Auth::check()) 
        {
            $request->validate([
                'edit-first-name' => 'required',
                'edit-last-name' => 'required',
                'edit-captain' => 'required',
                'edit-belt' => 'required',
                'edit-order' => 'required'
            ]);

            $image = null;
            if($request->file('edit-image') != null)
            {
                $image = $request->file('edit-image')->store('images');
            }

            if(is_null($image)) {
                Team::where('id', $id)->update(['first_name' => $request->input('edit-first-name'),
                'last_name' => $request->input('edit-last-name'),
                'captain' => $request->input('edit-captain'), 
                'belt' => $request->input('edit-belt'),
                'bio' => $request->input('edit-bio'),
                'awards' => $request->input('edit-awards'),
                'order' => $request->input('edit-order'),
                'updated_at' => Carbon::now()->toDateTimeString()]);
            }

            else {
                Team::where('id', $id)->update(['first_name' => $request->input('edit-first-name'),
                'last_name' => $request->input('edit-last-name'),
                'captain' => $request->input('edit-captain'), 
                'belt' => $request->input('edit-belt'),
                'bio' => $request->input('edit-bio'),
                'awards' => $request->input('edit-awards'),
                'image' => $image,
                'order' => $request->input('edit-order'),
                'updated_at' => Carbon::now()->toDateTimeString()]);
            }
        }
        return redirect()->back();
    }
}