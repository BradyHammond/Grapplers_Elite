<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Container\Container;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
    }
}