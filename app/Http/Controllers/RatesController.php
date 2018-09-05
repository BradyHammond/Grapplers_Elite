<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;
use App\Rate;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class RatesController extends Controller
{
    public function getAdultRates()
    {
        $parameters = [];
        $parameters['name'] = 'Adult Rates';
        $parameters['rates'] = $this->getRates('Adult');
        return view('content.rates', $parameters);
    }

    public function getJuniorRates()
    {
        $parameters = [];
        $parameters['name'] = 'Junior Rates';
        $parameters['rates'] = $this->getRates('Junior');
        return view('content.rates', $parameters);
    }

    public function getRates($age)
    {
        return Rate::where('age', $age)->first();
    }

    public function editRates(Request $request, $id) 
    {
        if (Auth::check()) 
        {
            $request->validate([
                'edit-content' => 'required'
            ]);

            Rate::where('id', $id)->update(['content' => $request->input('edit-content'),
            'updated_at' => Carbon::now()->toDateTimeString()]);
        }

        return redirect()->back();
    }
}