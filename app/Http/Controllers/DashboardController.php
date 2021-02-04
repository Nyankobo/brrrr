<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class DashboardController extends Controller
{
    /**
     * Dashboard
     */
    public function index(Request $request)
    {
        //TODO: pre-populate property taxes when they're entered on the form
        $properties = Property::all();
        return view('dashboard')->with([
            'properties' => $properties,
            'header' => "Properties"
        ]);
    }
}
