<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Imports\ProcurementImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class ProcurementPlan extends Controller
{

    public function procuring()
    {
        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];
        return view('procurement.procuring',$data);
    }



    public function upload_procurement_plan(Request $request){


            // $file=$request->file;
            // $filename=date('YmdHi').'.'.$file->getClientOriginalExtension();
		    // $file->move('All_Documents',$filename);
            // $post->Book_pdf=$filename;


            $data = \Excel::import(new ProcurementImport, $filename);

            return response()->json([
                "success"=>"Procurement Plan has been uploaded",
            ]);
      
    }


}
