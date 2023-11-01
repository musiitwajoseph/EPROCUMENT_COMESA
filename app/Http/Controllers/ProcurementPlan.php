<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class ProcurementPlan extends Controller
{

    public function procuring()
    {
        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];
        return view('procurement.procuring',$data);
    }



    public function upload_procurement_plan(Request $request){

        $data = $request->all();

        if($data){
            return response()->json([
                "success"=>"Procurement Plan has been uploaded",
            ]);
        }
    }


}
