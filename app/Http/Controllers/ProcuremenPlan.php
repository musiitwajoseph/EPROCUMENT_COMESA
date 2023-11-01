<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcuremenPlan extends Controller
{
    
    public function procuring()
    {

        return view('procurement.procuring');
    }
}
