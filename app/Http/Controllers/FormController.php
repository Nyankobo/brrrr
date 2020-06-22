<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class FormController extends Controller
{
    public function index(Request $request, $id = null)
    {
        //TODO: pre-populate property taxes when they're entered on the form
        $report = null;
        if ($id) {
            $report = Report::find($id);
        }
        return view('index')->with(['report' => $report]);
    }
}
