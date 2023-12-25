<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Admin;
use App\Models\procurement;    
use App\Models\suplier_performance_evaluation;
use App\Models\purchase_requistion;
use Illuminate\Http\Request;

class Requistioning extends Controller
{
    public function purchase_requistion()
    {

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        $info = procurement::all();

        return view('Requistion.purchase_requisition',$data,compact('info'));
    }


    public function start_requistion()
    {

        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        $info = procurement::all();

        return view('Requistion.start_requistioning',$data,compact('info'));
    }


    public function store_purchase_requistion(Request $request){

        $request->validate([
            'division_unit' => 'required',
            'date' => 'required',
            'reason_for_purchase' => 'required',
            'qty' => 'required',
            'item_code' => 'required',
            'description' => 'required',
            'attach_other' => 'required',
        ]);

        $post = new purchase_requistion;

        $post->divison = $request->division_unit;
        $post->date = $request->date;
        $post->reason_for_purchase = $request->reason_for_purchase;
        $post->qty = $request->qty;
        $post->item_code = $request->item_code;
        $post->description = $request->description;
        $post->Attached_records = $request->attach_other;

        $save = $post->save();

        if($save)
        {
            return response()->json([
                "status" => True,
                "message"=>"Purchase requstion has been submitted successfully",
            ]);
        }
    }

    public function SPV()
    {
        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];
        $info = procurement::all();

        return view('Requistion.SPV',$data,compact(['info']));
    }


    public function SPV_save(Request $request){

        $post = new suplier_performance_evaluation;

        $post->Leader = $request->Leader;
        $post->Partner = $request->Partner;
        $post->From = $request->From;
        $post->To = $request->To;
        $post->achievement_of_contract = $request->achievement_of_contract;
        $post->ability_to_meet_deadlines = $request->ability_to_meet_deadlines;
        $post->quality_of_service = $request->quality_of_service;
        $post->name_key_experts= $request->name_key_experts;
        $post->client_relations = $request->client_relations;
        $post->written_communications = $request->written_communications;
        $post->verbal_communication = $request->verbal_communication;
        $post->drive_and_determination = $request->drive_and_determination;
        $post->personal_effectiveness = $request->personal_effectiveness;
        $post->technical_completence = $request->technical_completence;
        $post->contract_manager_name= $request->contract_manager_name;
        $post->contract_manager_signature = $request->contract_manager_signature;
        $post->contract_manager_date = $request->contract_manager_date;
        $post->overall = $request->overall;

        $post->save();

        return response()->json([
            "status" => True,
            "message"=>"Purchase requstion has been submitted successfully",
        ]);
    }

    public function assign_requistion_role()
    {

        $role = "Originator";
        $originators =  Admin::where('user_role', $role)->get();


        $data = ['LoggedUserAdmin'=>Admin::where('id','=', session('LoggedAdmin'))->first()];

        $info = procurement::all();

        $distinctValues = procurement::distinct()->pluck('requisition_division');

        // $values = master_data::where('md_master_code_id', 53)->get();

        // foreach ($distinctValues as $item) {
        //     foreach ($values as $value) {
        //         if($item == $value->md_id)
        //         {
        //             $post = new procurement_approval;

        //             $post->All_sections = $value->md_name;
        //             $post->HOP = 'Pending';
        //             $post->director_hr = 'Pending';
        //             $post->ASG_Finance = 'Pending';
        //             $post->SG = 'Pending';      
        //             $post->save();

        //         }
        //     }
        // }

        dd($distinctValues);

        return view('Requistion.assign_requistion',$data,compact(['originators','info']));
    }

}
