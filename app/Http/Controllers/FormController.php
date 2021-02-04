<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Property;

class FormController extends Controller
{
    public function index(Request $request)
    {
        //TODO: pre-populate property taxes when they're entered on the form
        $properties = Property::all()->sortBy('is_mailing');
        return view('index')->with(['properties' => $properties]);
    }

    /**
     * Get property info
     */
    public function property(Request $request, $id)
    {
        $property = Property::find($id);

        return response()->json($property);
        
    }
}

