<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostEditorController extends Controller
{
    /**
     * GET /browser
     */
    public function browser()
    {
        return view('browser');
    }

    /**
     * GET /
     */
    public function index()
    {
        return view('post-editor')->with([
            'charged'      => '',
            'numberPeople' => '',
            'tipsRate'     => '',
            'roundUp'      => '',
            'tips'         => '',
            'total'        => '',
            'tipsPp'       => '',
            'chargedPp'    => '',
            'totalPp'      => '',
        ]);
    }
}
