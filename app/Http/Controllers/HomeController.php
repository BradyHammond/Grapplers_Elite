<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use App\Home;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        return view('home');
    }*/

    public function getHome()
    {
        $parameters = [];
        $parameters['home'] = Home::orderBy('order')->get();
        return view('content.home', $parameters );
    }

    public function addCard(Request $request)
    {
        if (Auth::check())
        {
            $request->validate([
                'input-header' => 'required',
                'input-content' => 'required',
                'input-alignment' => 'required',
                'input-order' => 'required'
            ]);

            Home::insert(['header' => $request->input('input-header'),
                'content' => $request->input('input-content'),
                'alignment' => $request->input('input-alignment'),
                'link' => $request->input('input-link'),
                'link_label' => $request->input('input-link-label'),
                'order' => $request->input('input-order'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()]);
        }
        return redirect()->back();
    }

    public function deleteCard($id)
    {
        if (Auth::check())
        {
            Home::where('id', $id)->delete();
        }
        return redirect()->back();
    }

    public function editCard(Request $request, $id)
    {
        if (Auth::check())
        {
            $request->validate([
                'edit-header' => 'required',
                'edit-content' => 'required',
                'edit-alignment' => 'required',
                'edit-order' => 'required'
            ]);

            Home::where('id', $id)->update(['header' => $request->input('edit-header'),
                'content' => $request->input('edit-content'),
                'alignment' => $request->input('edit-alignment'),
                'link' => $request->input('edit-link'),
                'link_label' => $request->input('edit-link-label'),
                'order' => $request->input('edit-order'),
                'updated_at' => Carbon::now()->toDateTimeString()]);
        }
        return redirect()->back();
    }
}
