<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use App\FAQ;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    public function getAdultFAQ()
    {
        $parameters = [];
        $parameters['name'] = 'Adult FAQ';
        $parameters['faqs'] = $this->getFAQ('Adult');
        return view('content.faq', $parameters);
    }

    public function getJuniorFAQ()
    {
        $parameters = [];
        $parameters['name'] = 'Junior FAQ';
        $parameters['faqs'] = $this->getFAQ('Junior');
        return view('content.faq', $parameters);
    }

    public function addFAQ(Request $request)
    {
        if (Auth::check()) 
        {
            $request->validate([
                'input-age' => 'required',
                'input-question' => 'required',
                'input-answer' => 'required',
                'input-order' => 'required'
            ]);

            FAQ::insert(['age' => $request->input('input-age'), 
            'question' => $request->input('input-question'),
            'answer' => $request->input('input-answer'),
            'order' => $request->input('input-order'),
            'created_at' => Carbon::now()->toDateTimeString(), 
            'updated_at' => Carbon::now()->toDateTimeString()]);
        }

        return redirect()->back();
    }

    public function getFAQ($age)
    {
        return FAQ::where('age', $age)->orderBy('order')->get();
    }

    public function deleteFAQ($id)
    {
        if (Auth::check()) 
        {
            FAQ::where('id', $id)->delete();
        }
        return redirect()->back();
    }

    public function editFAQ(Request $request, $id) 
    {
        if (Auth::check()) 
        {
            $request->validate([
                'edit-age' => 'required',
                'edit-question' => 'required',
                'edit-answer' => 'required',
                'edit-order' => 'required'
            ]);

            FAQ::where('id', $id)->update(['age' => $request->input('edit-age'), 
            'question' => $request->input('edit-question'),
            'answer' => $request->input('edit-answer'),
            'order' => $request->input('edit-order'),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        }

        return redirect()->back();
    }
}