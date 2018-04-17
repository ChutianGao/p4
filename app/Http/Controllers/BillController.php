<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * GET /
     */
    public function index()
    {
        return view('calculator')->with([
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

    /**
     * POST /
     */
    public function calculate(Request $request)
    {

        $charged      = $request->input('charged', null);
        $numberPeople = $request->input('numberPeople', null);
        $tipsRate     = $request->input('tipsRate', '');
        $roundUp      = $request->has('roundUp');    

        $this->validate($request, [
            'charged'      => 'required|numeric',
            'numberPeople' => 'required|numeric',
            'tipsRate'     => 'required',
        ]);

        //------------------------------
        # Calculate
        $tipsRateFloat    = floatval($tipsRate) / 100;
        $tips             = $charged * $tipsRateFloat;
        $tipsPp           = $tips / $numberPeople;
        $total            = $charged + $tips;
        $chargedPp        = $charged / $numberPeople;
        $totalPp          = $total / $numberPeople;

        // Format Numbers
        $charged   = number_format($charged, 2, '.', '');
        $tips      = number_format($tips, 2, '.', '');
        $tipsPp    = number_format($tipsPp, 2, '.', '');
        $total     = number_format($total, 2, '.', '');
        $chargedPp = number_format($chargedPp, 2, '.', '');
        $totalPp   = number_format($totalPp, 2, '.', '');

        if ($roundUp) {
            $totalPp = round($totalPp);
        }
    
        //----------------

        return view('calculator')->with([
            'charged'      => $charged,
            'numberPeople' => $numberPeople,
            'tipsRate'     => $tipsRate,
            'roundUp'      => $roundUp,
            'tips'         => $tips,
            'total'        => $total,
            'tipsPp'       => $tipsPp,
            'chargedPp'    => $chargedPp,
            'totalPp'      => $totalPp,
        ]);
    }
}
