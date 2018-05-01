<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use App\Tournament;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class TournamentController extends Controller
{
    public function addTournament(Request $request)
    {
        if (Auth::check()) 
        {
            $request->validate([
                'input-name' => 'required',
                'input-url' => 'required',
                'input-date' => 'required|date',
                'input-type' => 'nullable',
                'input-age' => 'nullable',
                'input-gender' => 'nullable',
                'input-price' => 'nullable',
                'input-location' => 'nullable',
                'input-notes' => 'nullable'
            ]);

            $url = "";
            if (strpos($request->input('edit-url'), "https://") !== FALSE)
            {
                $url = $request->input('edit-url');
            }

            elseif (strpos($request->input('edit-url'), "http://") !== FALSE)
            {
                $url = "https://" + substr($request->input('edit-url'), 7);
            }

            else
            {
                $url = ("https://" . $request->input('edit-url'));
            }

            Tournament::insert(['name' => $request->input('input-name'), 'url' => $url,
            'date' => $request->input('input-date'), 'type' => $request->input('input-type'), 'age' => $request->input('input-age'),
            'gender' => $request->input('input-gender'), 'pricing' => $request->input('input-price'), 
            'location' => $request->input('input-location'), 'notes' => $request->input('input-notes'), 
            'created_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()->toDateTimeString()]);
        }

        return redirect()->back();
    }

    public function getTournament()
    {
        $tournaments = Tournament::all();
        
        foreach ($tournaments as $tournament) 
        {
            if (Carbon::parse($tournament->date)->lt(Carbon::now()->subDays(2))) 
            {
                Tournament::where('id', $tournament->id)->delete();
            }
        }

        return Tournament::all();
    }

    public function deleteTournament($id)
    {
        Tournament::where('id', $id)->delete();
        return redirect()->back();
    }

    public function editTournament(Request $request, $id) 
    {
        if (Auth::check()) 
        {
            $request->validate([
                'edit-name' => 'required',
                'edit-url' => 'required',
                'edit-date' => 'required|date',
                'edit-type' => 'nullable',
                'edit-age' => 'nullable',
                'edit-gender' => 'nullable',
                'edit-price' => 'nullable',
                'edit-location' => 'nullable',
                'edit-notes' => 'nullable'
            ]);

            $url = "";
            if (strpos($request->input('edit-url'), "https://") !== FALSE)
            {
                $url = $request->input('edit-url');
            }

            elseif (strpos($request->input('edit-url'), "http://") !== FALSE)
            {
                $url = "https://" . substr($request->input('edit-url'), 7);
            }

            else
            {
                $url = ("https://" . $request->input('edit-url'));
            }

            Tournament::where('id', $id)->update(['name' => $request->input('edit-name'), 'url' => $url,
            'date' => $request->input('edit-date'), 'type' => $request->input('edit-type'), 'age' => $request->input('edit-age'),
            'gender' => $request->input('edit-gender'), 'pricing' => $request->input('edit-price'), 
            'location' => $request->input('edit-location'), 'notes' => $request->input('edit-notes'), 
            'updated_at' => Carbon::now()->toDateTimeString()]);
        }

        return redirect()->back();
    }
    
}