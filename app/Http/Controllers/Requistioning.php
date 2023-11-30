<?php

namespace App\Http\Controllers;

use App\Models\SupplierLogin; 
use App\Models\procurement;    
use Illuminate\Http\Request;

class Requistioning extends Controller
{
    public function purchase_requistion()
    {

        $data = ['LoggedUserInfo'=>SupplierLogin::where('id','=', session('LoggedSupplier'))->first()];

        $info = procurement::all();

        return view('Requistion.purchase_requisition',$data,compact('info'));
    }
}
