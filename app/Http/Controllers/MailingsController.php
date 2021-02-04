<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mailing;

class MailingsController extends Controller
{
    /**
     * Dashboard
     */
    public function index(Request $request)
    {
        $mailings = Mailing::all();
        return view('mailings')->with([
            'mailings' => $mailings,
            'header' => "Off-Market Mailings"
        ]);
    }
}
