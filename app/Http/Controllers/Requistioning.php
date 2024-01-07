<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\assign_head_of_unit;
use App\Models\assign_originator_role;
use App\Models\assign_procurement_requistion_officer;
use App\Models\items_not_planned;
use App\Models\procurement;
use App\Models\purchase_requistion;
use App\Models\suplier_performance_evaluation;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class Requistioning extends Controller
{
    //Loading procurement plan for requistioners

    public function load_procurement_plan(Request $request)
    {
        $originator_name = $request->hidden_originator_name;

        $procurement_unit = DB::table('assign_originator_roles')
            ->where('orignator_name', $originator_name)
            ->value('procurement_division');

        $procurement_plan = DB::table('procurements')
            ->where('requisition_division', $procurement_unit)
            ->get();

        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.loaded_procurement_plan', $data, compact(['procurement_plan']));
    }

    // Proceed with requistioining

    public function proceed_requistioning($id)
    {
        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        $info = DB::table('procurements')
            ->where('id', $id)
            ->get();

        return view('Requistion.purchase_requisition', $data, compact('info'));
    }

    public function purchase_requistion()
    {
        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        $info = procurement::all();

        return view('Requistion.purchase_requisition', $data, compact('info'));
    }

    public function start_requistion()
    {
        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        $info = procurement::all();

        return view('Requistion.start_requistioning', $data, compact('info'));
    }

    public function store_purchase_requistion(Request $request)
    {
        $request->validate([
            'division_unit' => 'required',
            // 'date' => 'required',
            'reason_for_purchase' => 'required',
            'qty' => 'required',
            'item_code' => 'required',
            // 'attach_other' => 'required',
        ]);

        $id = $request->hidden_admin_id;

        $firstname = DB::table('admins')
            ->where('id', $id)
            ->value('firstname');
        $lastname = DB::table('admins')
            ->where('id', $id)
            ->value('lastname');

        $fullname = $firstname . ' ' . $lastname;

        $procurement_data_division = DB::table('assign_originator_roles')
            ->where('orignator_name', $fullname)
            ->value('procurement_division');

        $requistioning_id = $request->hidden_requistioning_id;

        $qty_numb = DB::table('procurements')
            ->where('id', $requistioning_id)
            ->value('qty');

        $quantity_numb = $request->qty;

        if ($quantity_numb > $qty_numb) {
            return response()->json([
                'status' => false,
                'message' => 'Quantity number provided is bigger the planned item',
            ]);
        }

        $currentDate = Carbon::now();

        $post = new purchase_requistion();

        $post->divison = $request->division_unit;
        $post->date = $currentDate;
        $post->reason_for_purchase = $request->reason_for_purchase;
        $post->qty = $request->qty;
        $post->item_code = $request->item_code;
        $post->description = '-';

        if ($request->attach_other == '') {
            $post->Attached_records = '';
        } else {
            $post->Attached_records = $request->attach_other;
        }

        $post->approval_status = 'Pending';
        $post->division_unit = $procurement_data_division;

        $save = $post->save();

        // Access specificied Originator

        $orignator_name = DB::table('assign_originator_roles')
            ->where('procurement_division', $procurement_data_division)
            ->value('orignator_name');

        $send_to = DB::table('admins')
            ->where('user_id', 50241)
            ->value('email');

        $data = [
            'email' => $send_to,
            'username' => $orignator_name,
            'description' => $request->division_unit,
            'qty' => $request->qty,
            'item_code' => $request->item_code,
            'reason_for_purchase' => $request->reason_for_purchase,

            'title' => 'COMESA:E-PROCUREMENT - Requistion Raised by Originator for Approving .',
        ];

        $pdf_data = PDF::loadView('emails.requistion_approvals.originator_to_head_of_unit', $data);

        Mail::send('emails.requistion_approvals.originator_to_head_of_unit', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data['email'], $data['email'])->subject($data['title']);
        });

        if ($save) {
            return response()->json([
                'status' => true,
                'message' => 'Requistion has been intiated successfully',
            ]);
        }
    }

    public function SPV()
    {
        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];
        $info = procurement::all();

        return view('Requistion.SPV', $data, compact(['info']));
    }

    public function SPV_save(Request $request)
    {
        $post = new suplier_performance_evaluation();

        $post->Leader = $request->Leader;
        $post->Partner = $request->Partner;
        $post->From = $request->From;
        $post->To = $request->To;
        $post->achievement_of_contract = $request->achievement_of_contract;
        $post->ability_to_meet_deadlines = $request->ability_to_meet_deadlines;
        $post->quality_of_service = $request->quality_of_service;
        $post->name_key_experts = $request->name_key_experts;
        $post->client_relations = $request->client_relations;
        $post->written_communications = $request->written_communications;
        $post->verbal_communication = $request->verbal_communication;
        $post->drive_and_determination = $request->drive_and_determination;
        $post->personal_effectiveness = $request->personal_effectiveness;
        $post->technical_completence = $request->technical_completence;
        $post->contract_manager_name = $request->contract_manager_name;
        $post->contract_manager_signature = $request->contract_manager_signature;
        $post->contract_manager_date = $request->contract_manager_date;
        $post->overall = $request->overall;

        $post->save();

        return response()->json([
            'status' => true,
            'message' => 'Purchase requstion has been submitted successfully',
        ]);
    }

    public function assign_requistion_role()
    {
        // $role = 'Originator';

        $user_id = 57138;

        $info = DB::table('master_datas')
            ->where('md_master_code_id', '=', 53)
            ->get();

        $originators = Admin::where('user_id', $user_id)->get();

        $distinctValues = procurement::distinct()->pluck('requisition_division');

        // dd($distinctValues);
        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.assign_requistion', $data, compact(['originators', 'info', 'distinctValues']));
    }

    public function assign_procurement_division(Request $request)
    {
        $requistioner_name = $request->requistioner_name;
        $procurement_division = $request->procurement_division;

        $record = DB::table('assign_originator_roles')
            ->where('orignator_name', $requistioner_name)
            ->where('procurement_division', $procurement_division)
            ->first();

        if ($record == null) {
            $post = new assign_originator_role();

            $post->orignator_name = $requistioner_name;
            $post->procurement_division = $procurement_division;

            $save = $post->save();

            if ($save) {
                return response()->json([
                    'status' => true,
                ]);
            }
        } else {
            return response()->json([
                'status' => true,
            ]);
        }
    }

    public function assign_head_unit()
    {
        // Head of project/unit/division

        $Head_of_unit = Admin::where('user_id', 50241)->get();

        $info = DB::table('master_datas')
            ->where('md_master_code_id', '=', 53)
            ->get();

        $distinctValues = procurement::distinct()->pluck('requisition_division');

        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.assign_head_role', $data, compact(['Head_of_unit', 'distinctValues', 'info']));
    }

    public function assign_head_division(Request $request)
    {
        $head_of_unit_name = $request->head_of_unit_name;
        $procurement_division = $request->procurement_division;

        $record = DB::table('assign_head_of_units')
            ->where('head_of_unit_name', $head_of_unit_name)
            ->where('procurement_division', $procurement_division)
            ->first();

        if ($record == null) {
            $post = new assign_head_of_unit();

            $post->head_of_unit_name = $head_of_unit_name;
            $post->procurement_division = $procurement_division;

            $save = $post->save();

            if ($save) {
                return response()->json([
                    'status' => true,
                ]);
            }
        } else {
            return response()->json([
                'status' => true,
            ]);
        }
    }

    public function review_requistioning($id)
    {
        $firstname = DB::table('admins')
            ->where('id', $id)
            ->value('firstname');
        $lastname = DB::table('admins')
            ->where('id', $id)
            ->value('lastname');

        $fullname = $firstname . ' ' . $lastname;

        $procurement_data_division = DB::table('assign_head_of_units')
            ->where('head_of_unit_name', $fullname)
            ->value('procurement_division');

        $values = DB::table('purchase_requistions')
            ->where('division_unit', $procurement_data_division)
            ->where('approval_status', '=', 'Pending')
            ->get();

        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.review_requistion', $data, compact(['values']));
    }

    public function review_requistioning_FA($id)
    {
        $values = DB::table('purchase_requistions')
            ->where('approval_status', '=', 'Head of unit')
            ->get();

        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.review_requistion_FA', $data, compact(['values']));
    }

    public function approve_requistion($id)
    {
        DB::table('purchase_requistions')
            ->where('id', $id)
            ->update(['approval_status' => 'Head of unit']);

        $description = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('divison');
        $qty = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('qty');
        $item_code = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('item_code');
        $reason_for_purchase = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('reason_for_purchase');

        $finance_accountant_email = DB::table('admins')
            ->where('user_id', 50241)
            ->value('email');
        $firstname = DB::table('admins')
            ->where('user_id', 50241)
            ->value('firstname');
        $lastname = DB::table('admins')
            ->where('user_id', 50241)
            ->value('lastname');

        $data = [
            'email' => $finance_accountant_email,
            'username' => $firstname . ' ' . $lastname,
            // requistion data or information required
            'description' => $description,
            'qty' => $qty,
            'item_code' => $item_code,
            'reason_for_purchase' => $reason_for_purchase,

            'title' => 'COMESA:E-PROCUREMENT - Finance Accountant review for Requistion.',
        ];

        $pdf_data = PDF::loadView('emails.requistion_approvals.finance_accountant_approval', $data);

        Mail::send('emails.requistion_approvals.finance_accountant_approval', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data['email'], $data['email'])->subject($data['title']);
        });

        return back()->with('success', 'requistioin has been approved');
    }

    public function reject_requistion($id)
    {
        DB::table('purchase_requistions')
            ->where('id', $id)
            ->update(['approval_status' => 'Rejected']);

        $description = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('divison');
        $qty = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('qty');
        $item_code = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('item_code');
        $reason_for_purchase = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('reason_for_purchase');

        $division_unit = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('division_unit');

        $Head_of_unit_email = DB::table('admins')
            ->where('user_id', 50241)
            ->value('email');

        $username = DB::table('assign_originator_roles')
            ->where('procurement_division', $division_unit)
            ->value('orignator_name');

        $data = [
            'email' => $Head_of_unit_email,
            'username' => $username,
            // requistion data or information required
            'description' => $description,
            'qty' => $qty,
            'item_code' => $item_code,
            'reason_for_purchase' => $reason_for_purchase,

            'title' => 'COMESA:E-PROCUREMENT - Rejection of Raised Requistion to Originator.',
        ];

        $pdf_data = PDF::loadView('emails.requistion_approvals.Head_of_unit_rejection_raised_requistion', $data);

        Mail::send('emails.requistion_approvals.Head_of_unit_rejection_raised_requistion', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data['email'], $data['email'])->subject($data['title']);
        });

        return back()->with('error', 'requistioin has been rejected successfully');
    }

    public function approve_requistion_FA($id)
    {
        DB::table('purchase_requistions')
            ->where('id', $id)
            ->update(['approval_status' => 'Finance Accountant']);

        $description = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('divison');
        $qty = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('qty');
        $item_code = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('item_code');
        $reason_for_purchase = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('reason_for_purchase');

        $Head_of_procurement_email = DB::table('admins')
            ->where('user_id', 93616)
            ->value('email');
        $firstname = DB::table('admins')
            ->where('user_id', 93616)
            ->value('firstname');
        $lastname = DB::table('admins')
            ->where('user_id', 93616)
            ->value('lastname');

        $data = [
            'email' => $Head_of_procurement_email,
            'username' => $firstname . ' ' . $lastname,
            // requistion data or information required
            'description' => $description,
            'qty' => $qty,
            'item_code' => $item_code,
            'reason_for_purchase' => $reason_for_purchase,

            'title' => 'COMESA:E-PROCUREMENT - Head of Procurement review for raised Requistion.',
        ];

        $pdf_data = PDF::loadView('emails.requistion_approvals.Head_of_procurement_notified_approval', $data);

        Mail::send('emails.requistion_approvals.Head_of_procurement_notified_approval', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data['email'], $data['email'])->subject($data['title']);
        });

        return back()->with('success', 'requistioin has been approved');
    }

    public function reject_requistion_FA($id)
    {
        DB::table('purchase_requistions')
            ->where('id', $id)
            ->update(['approval_status' => 'Rejected']);

        $description = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('divison');
        $qty = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('qty');
        $item_code = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('item_code');
        $reason_for_purchase = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('reason_for_purchase');

        $division_unit = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('division_unit');

        $Head_of_unit_email = DB::table('admins')
            ->where('user_id', 50241)
            ->value('email');

        $Head_of_unit_firstname = DB::table('admins')
            ->where('user_id', 50241)
            ->value('firstname');

        $Head_of_unit_lastname = DB::table('admins')
            ->where('user_id', 50241)
            ->value('lastname');

        $data = [
            'email' => $Head_of_unit_email,
            'username' => $Head_of_unit_firstname . '' . $Head_of_unit_lastname,
            // requistion data or information required
            'description' => $description,
            'qty' => $qty,
            'item_code' => $item_code,
            'reason_for_purchase' => $reason_for_purchase,

            'title' => 'COMESA:E-PROCUREMENT - Rejection of Raised Requistion.',
        ];

        $pdf_data = PDF::loadView('emails.requistion_approvals.Head_of_unit_rejection_raised_requistion', $data);

        Mail::send('emails.requistion_approvals.Head_of_unit_rejection_raised_requistion', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data['email'], $data['email'])->subject($data['title']);
        });

        $username_originator = DB::table('assign_originator_roles')
            ->where('procurement_division', $division_unit)
            ->value('orignator_name');

        $originator_email = DB::table('admins')
            ->where('user_id', 57138)
            ->value('email');

        $data = [
            'email' => $originator_email,
            'username' => $username_originator,
            // requistion data or information required
            'description' => $description,
            'qty' => $qty,
            'item_code' => $item_code,
            'reason_for_purchase' => $reason_for_purchase,

            'title' => 'COMESA:E-PROCUREMENT - Rejection of Raised Requistion.',
        ];

        $pdf_data = PDF::loadView('emails.requistion_approvals.Head_of_unit_rejection_raised_requistion', $data);

        Mail::send('emails.requistion_approvals.Head_of_unit_rejection_raised_requistion', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data['email'], $data['email'])->subject($data['title']);
        });

        return back()->with('error', 'requistioin has been rejected successfully');
    }

    public function assign_procurement_officer_view()
    {
        $values = DB::table('purchase_requistions')
            ->where('approval_status', '=', 'Finance Accountant')
            ->get();

        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.assign_procurement_officer_view', $data, compact(['values']));
    }

    public function assign_procurement_link()
    {
        $approval_officer = DB::table('admins')
            ->where('user_id', 10011)
            ->get();

        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.assign_procurement_officer', $data, compact('approval_officer'));
    }

    public function assigning_procurement_officer_requistion($id)
    {
        $requistion_item_id = $id;

        $approval_officer = DB::table('admins')
            ->where('user_id', 22978)
            ->get();

        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.assign_procurement_officer', $data, compact(['approval_officer', 'requistion_item_id']));
    }

    public function store_assigning_procurement_officer_requistion(Request $request)
    {
        $approver_officer_name = $request->approval_officer_assigned;
        $id = $request->requistion_item_id;

        $assigned_procurement_officer_email = DB::table('admins')
            ->where('user_id', 22978)
            ->value('email');

        $division_unit = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('division_unit');
        $approval_status = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('approval_status');

        $check_record = DB::table('assign_procurement_requistion_officers')
            ->where('requistion_id', $division_unit)
            ->where('status', 'Assigned')
            ->where('procurement_officer_name', $approver_officer_name)
            ->where('add_requistion_item_id', $id)
            ->first();

        if ($check_record == '') {
            $post = new assign_procurement_requistion_officer();

            $post->procurement_officer_name = $approver_officer_name;
            $post->requistion_id = $division_unit;
            $post->status = 'Assigned';
            $post->add_requistion_item_id = $id;

            $save = $post->save();

            $data = [
                'email' => $assigned_procurement_officer_email,
                'username' => $approver_officer_name,

                'title' => 'COMESA:E-PROCUREMENT - Procurement Approval Assignment for Requistion.',
            ];

            $pdf_data = PDF::loadView('emails.requistion_approvals.assigning_procurement_officer', $data);

            Mail::send('emails.requistion_approvals.assigning_procurement_officer', $data, function ($message) use ($data, $pdf_data) {
                $message->to($data['email'], $data['email'])->subject($data['title']);
            });

            Alert::success('Success', 'Procurement officer has been assigned successfully');

            DB::table('purchase_requistions')
                ->where('id', $id)
                ->update(['approval_status' => 'Assigned']);

            return back();
        } else {
            Alert::error('Error', 'Procurement Officer has already been assigned');

            return back();
        }
    }

    public function Procurement_officer_assigned_requsitions()
    {
        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        $info = procurement::all();

        return view('Requistion.procurement_officer_assigned_requistions', $data, compact('info'));
    }

    public function load_all_assigned_requsitions(Request $request)
    {
        $admin_id = $request->hidden_id;

        $firstname = DB::table('admins')
            ->where('id', $admin_id)
            ->value('firstname');
        $lastname = DB::table('admins')
            ->where('id', $admin_id)
            ->value('lastname');
        $admin_name = $firstname . ' ' . $lastname;

        $records = DB::table('assign_procurement_requistion_officers')
            ->where('procurement_officer_name', $admin_name)
            ->where('status', 'Assigned')
            ->get();

        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.view_all_assigned_requsitions', $data, compact(['records']));
    }

    public function load_specific_assigned_requsitions($id)
    {
        $requistion_id = $id;

        $values = DB::table('purchase_requistions')
            ->where('id', '=', $id)
            ->get();

        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.load_specific_assigned_requsitions', $data, compact(['values', 'requistion_id']));
    }

    public function assigned_procurement_officer_approve(Request $request)
    {
        $firstname = DB::table('admins')
            ->where('user_id', 93616)
            ->value('firstname');
        $lastname = DB::table('admins')
            ->where('user_id', 93616)
            ->value('lastname');
        $project_unit_division_email = DB::table('admins')
            ->where('user_id', 93616)
            ->value('email');

        $send_to = $project_unit_division_email;
        $firstname = $firstname;
        $lastname = $lastname;

        $description = $request->description;
        $qty = $request->qty;
        $item_code = $request->item_code;
        $reason_for_purchase = $request->reason_for_purchase;

        $data = [
            'email' => $send_to,
            'username' => $firstname . ' ' . $lastname,
            // requistion data or information required
            'description' => $description,
            'qty' => $qty,
            'item_code' => $item_code,
            'reason_for_purchase' => $reason_for_purchase,

            'title' => 'COMESA:E-PROCUREMENT - Recommendation on Approving Requistion.',
        ];

        $pdf_data = PDF::loadView('emails.requistion_approvals.assigned_procurement_approval_recommendation', $data);

        Mail::send('emails.requistion_approvals.assigned_procurement_approval_recommendation', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data['email'], $data['email'])->subject($data['title']);
        });

        $id = $request->requistion_id;

        DB::table('purchase_requistions')
            ->where('id', $id)
            ->update(['approval_status' => 'Recommended']);

        DB::table('assign_procurement_requistion_officers')
            ->where('add_requistion_item_id', $id)
            ->update(['status' => 'done']);

        return response()->json([
            'status' => true,
        ]);
    }

    public function assigned_procurement_officer_reject(Request $request)
    {
        $firstname = DB::table('admins')
            ->where('user_id', 50241)
            ->value('firstname');
        $lastname = DB::table('admins')
            ->where('user_id', 50241)
            ->value('lastname');
        $project_unit_division_email = DB::table('admins')
            ->where('user_id', 50241)
            ->value('email');

        $send_to = $project_unit_division_email;
        $firstname = $firstname;
        $lastname = $lastname;

        $description = $request->description;
        $qty = $request->qty;
        $item_code = $request->item_code;
        $reason_for_purchase = $request->reason_for_purchase;
        $reason = $request->reason;

        $data = [
            'email' => $send_to,
            'username' => $firstname . ' ' . $lastname,
            // requistion data or information required
            'description' => $description,
            'qty' => $qty,
            'item_code' => $item_code,
            'reason_for_purchase' => $reason_for_purchase,
            'reason' => $reason,

            'title' => 'COMESA:E-PROCUREMENT - Recommendation on Rejecting Requistion',
        ];

        $pdf_data = PDF::loadView('emails.requistion_approvals.assigned_procurement_reject_recommendation', $data);

        Mail::send('emails.requistion_approvals.assigned_procurement_reject_recommendation', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data['email'], $data['email'])->subject($data['title']);
        });

        $id = $request->requistion_id;

        DB::table('purchase_requistions')
            ->where('id', $id)
            ->update(['approval_status' => 'Recommended']);

        DB::table('assign_procurement_requistion_officers')
            ->where('add_requistion_item_id', $id)
            ->update(['status' => 'done']);

        return response()->json([
            'status' => true,
        ]);
    }

    public function assigned_procurement_officer_request_info(Request $request)
    {
        $firstname = DB::table('admins')
            ->where('user_id', 50241)
            ->value('firstname');
        $lastname = DB::table('admins')
            ->where('user_id', 50241)
            ->value('lastname');
        $project_unit_division_email = DB::table('admins')
            ->where('user_id', 50241)
            ->value('email');

        $send_to = $project_unit_division_email;
        $firstname = $firstname;
        $lastname = $lastname;

        $description = $request->description;
        $qty = $request->qty;
        $item_code = $request->item_code;
        $reason_for_purchase = $request->reason_for_purchase;
        $reason = $request->reason;

        $data = [
            'email' => $send_to,
            'username' => $firstname . ' ' . $lastname,
            // requistion data or information required
            'description' => $description,
            'qty' => $qty,
            'item_code' => $item_code,
            'reason_for_purchase' => $reason_for_purchase,
            'reason' => $reason,

            'title' => 'COMESA:E-PROCUREMENT - Assigned Procurement Officer Recommendation on Requistion.',
        ];

        $pdf_data = PDF::loadView('emails.requistion_approvals.assigned_procurement_officer_recommendation', $data);

        Mail::send('emails.requistion_approvals.assigned_procurement_officer_recommendation', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data['email'], $data['email'])->subject($data['title']);
        });

        return response()->json([
            'status' => true,
        ]);
    }

    public function recommended_requistions()
    {
        $values = DB::table('purchase_requistions')
            ->where('approval_status', 'Recommended')
            ->get();

        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.load_recommended_requistions', $data, compact(['values']));
    }

    public function approve_recommended_requistions($id)
    {
        $firstname = DB::table('admins')
            ->where('user_id', 50241)
            ->value('firstname');
        $lastname = DB::table('admins')
            ->where('user_id', 50241)
            ->value('lastname');
        $project_unit_division_email = DB::table('admins')
            ->where('user_id', 50241)
            ->value('email');

        $send_to = $project_unit_division_email;
        $firstname = $firstname;
        $lastname = $lastname;

        $description = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('divison');
        $qty = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('qty');
        $item_code = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('item_code');
        $reason_for_purchase = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('reason_for_purchase');

        $data = [
            'email' => $send_to,
            'username' => $firstname . ' ' . $lastname,
            // requistion data or information required
            'description' => $description,
            'qty' => $qty,
            'item_code' => $item_code,
            'reason_for_purchase' => $reason_for_purchase,

            'title' => 'COMESA:E-PROCUREMENT - Approving of Requistion.',
        ];

        $pdf_data = PDF::loadView('emails.requistion_approvals.final_HOP_approval', $data);

        Mail::send('emails.requistion_approvals.final_HOP_approval', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data['email'], $data['email'])->subject($data['title']);
        });

        DB::table('purchase_requistions')
            ->where('id', $id)
            ->update(['approval_status' => 'Approved']);

        Alert::success('Success', 'The requistion has been approved successfully');

        return back();
    }

    public function reject_recommended_requistions($id)
    {
        $firstname = DB::table('admins')
            ->where('user_id', 50241)
            ->value('firstname');
        $lastname = DB::table('admins')
            ->where('user_id', 50241)
            ->value('lastname');
        $project_unit_division_email = DB::table('admins')
            ->where('user_id', 50241)
            ->value('email');

        $send_to = $project_unit_division_email;
        $firstname = $firstname;
        $lastname = $lastname;

        $description = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('divison');
        $qty = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('qty');
        $item_code = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('item_code');
        $reason_for_purchase = DB::table('purchase_requistions')
            ->where('id', $id)
            ->value('reason_for_purchase');

        $data = [
            'email' => $send_to,
            'username' => $firstname . ' ' . $lastname,
            // requistion data or information required
            'description' => $description,
            'qty' => $qty,
            'item_code' => $item_code,
            'reason_for_purchase' => $reason_for_purchase,

            'title' => 'COMESA:E-PROCUREMENT - Rejection of Requistion.',
        ];

        $pdf_data = PDF::loadView('emails.requistion_approvals.final_HOP_reject', $data);

        Mail::send('emails.requistion_approvals.final_HOP_reject', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data['email'], $data['email'])->subject($data['title']);
        });

        DB::table('purchase_requistions')
            ->where('id', $id)
            ->update(['approval_status' => 'Rejected']);

        Alert::success('Success', 'The requistion has been reject successfully');

        return back();
    }

    // 2.Requistion item not planned

    public function load_item_not_planned()
    {
        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.load_item_not_planned', $data);
    }

    public function store_load_item_not_planned(Request $request)
    {
        $id = $request->hidden_admin_id;

        $firstname = DB::table('admins')
            ->where('id', $id)
            ->value('firstname');
        $lastname = DB::table('admins')
            ->where('id', $id)
            ->value('lastname');
        $fullname = $firstname . ' ' . $lastname;

        $procurement_division = DB::table('assign_originator_roles')
            ->where('orignator_name', $fullname)
            ->value('procurement_division');

        $amount_check = $request->amount_needed;

        $post = new items_not_planned();

        $post->description = $request->description;
        $post->date = $request->date;
        $post->reason_for_purchase = $request->reason_for_purchase;
        $post->qty = $request->qty;
        $post->amount_needed = $request->amount_needed;
        $post->Attached_records = $request->Attached_records;
        $post->divison_unit = $procurement_division;

        $save = $post->save();

        if ($save) {
            return response()->json([
                'status' => true,
                'message' => 'Requistion has been subsmitted successfully',
            ]);
        }
    }

    // review_requistion_not planned

    public function review_requistioning_planned($id)
    {
        $firstname = DB::table('admins')
            ->where('id', $id)
            ->value('firstname');
        $lastname = DB::table('admins')
            ->where('id', $id)
            ->value('lastname');

        $fullname = $firstname . ' ' . $lastname;

        $procurement_data_division = DB::table('assign_head_of_units')
            ->where('head_of_unit_name', $fullname)
            ->value('procurement_division');

        // dd($procurement_data_division);

        // $values = DB::table('items_not_planneds')
        //     ->where('division_unit', $procurement_data_division)
        //     ->where('approval_status', '=', 'Pending')->get();

        $values = DB::table('items_not_planneds')
            ->where('status', '=', 'Pending')
            ->get();

        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.review_requistion_planned', $data, compact(['values']));
    }

    public function approve_requistion_not_planned($id)
    {
        $description = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('description');
        $reason_for_purchase = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('reason_for_purchase');
        $qty = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('qty');
        $amount_needed = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('amount_needed');

        $amount_check = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('amount_needed');

        DB::table('items_not_planneds')
            ->where('id', $id)
            ->update(['status' => 'Head of unit']);

        if ($amount_check < 7500) {
            $Director_hr_email = DB::table('admins')
                ->where('user_id', 50398)
                ->value('email');
            $firstname = DB::table('admins')
                ->where('user_id', 50398)
                ->value('firstname');
            $lastname = DB::table('admins')
                ->where('user_id', 50398)
                ->value('lastname');

            $fullname = $firstname . '' . $lastname;

            $data = [
                'email' => $Director_hr_email,
                'username' => $fullname,
                'description' => $description,
                'qty' => $qty,
                'amount_needed' => $amount_needed,
                'reason_for_purchase' => $reason_for_purchase,

                'title' => 'COMESA:E-PROCUREMENT - Director HR Not Planned Requistion Pending Review .',
            ];

            $pdf_data = PDF::loadView('emails.requistion_approvals.director_hr_item_not_planned', $data);

            Mail::send('emails.requistion_approvals.director_hr_item_not_planned', $data, function ($message) use ($data, $pdf_data) {
                $message->to($data['email'], $data['email'])->subject($data['title']);
            });
        } elseif ($amount_check >= 7501 || $amount_check < 20000) {
            $asg_finance_email = DB::table('admins')
                ->where('user_id', 80359)
                ->value('email');
            $firstname = DB::table('admins')
                ->where('user_id', 80359)
                ->value('firstname');
            $lastname = DB::table('admins')
                ->where('user_id', 80359)
                ->value('lastname');

            $fullname = $firstname . '' . $lastname;

            $data = [
                'email' => $asg_finance_email,
                'username' => $fullname,
                'description' => $description,
                'qty' => $qty,
                'amount_needed' => $amount_needed,
                'reason_for_purchase' => $reason_for_purchase,

                'title' => 'COMESA:E-PROCUREMENT - Secretary General Not Planned Requistion Pending Review .',
            ];

            $pdf_data = PDF::loadView('emails.requistion_approvals.director_hr_item_not_planned', $data);

            Mail::send('emails.requistion_approvals.director_hr_item_not_planned', $data, function ($message) use ($data, $pdf_data) {
                $message->to($data['email'], $data['email'])->subject($data['title']);
            });
        } elseif ($amount_check >= 20001 || $amount_check < 30000) {
            $sg_email = DB::table('admins')
                ->where('user_id', 96595)
                ->value('email');
            $firstname = DB::table('admins')
                ->where('user_id', 96595)
                ->value('firstname');
            $lastname = DB::table('admins')
                ->where('user_id', 96595)
                ->value('lastname');

            $fullname = $firstname . '' . $lastname;

            $data = [
                'email' => $sg_email,
                'username' => $fullname,
                'description' => $description,
                'qty' => $qty,
                'amount_needed' => $amount_needed,
                'reason_for_purchase' => $reason_for_purchase,

                'title' => 'COMESA:E-PROCUREMENT - Secretary General Not Planned Requistion Pending Review .',
            ];

            $pdf_data = PDF::loadView('emails.requistion_approvals.director_hr_item_not_planned', $data);

            Mail::send('emails.requistion_approvals.director_hr_item_not_planned', $data, function ($message) use ($data, $pdf_data) {
                $message->to($data['email'], $data['email'])->subject($data['title']);
            });
        }

        return back()->with('success', 'requistioin has been approved');
    }

    public function reject_requistion_not_planned($id)
    {
        $description = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('description');
        $reason_for_purchase = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('reason_for_purchase');
        $qty = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('qty');
        $amount_needed = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('amount_needed');

        DB::table('items_not_planneds')
            ->where('id', $id)
            ->update(['status' => 'Rejected']);

        $sg_email = DB::table('admins')
            ->where('user_id', 57138)
            ->value('email');
        $firstname = DB::table('admins')
            ->where('user_id', 57138)
            ->value('firstname');
        $lastname = DB::table('admins')
            ->where('user_id', 57138)
            ->value('lastname');

        $fullname = $firstname . '' . $lastname;

        $data = [
            'email' => $sg_email,
            'username' => $fullname,
            'description' => $description,
            'qty' => $qty,
            'amount_needed' => $amount_needed,
            'reason_for_purchase' => $reason_for_purchase,

            'title' => 'COMESA:E-PROCUREMENT - Originator Rejecting of the raised Requistion  .',
        ];

        $pdf_data = PDF::loadView('emails.requistion_approvals.director_hr_item_not_planned', $data);

        Mail::send('emails.requistion_approvals.director_hr_item_not_planned', $data, function ($message) use ($data, $pdf_data) {
            $message->to($data['email'], $data['email'])->subject($data['title']);
        });

        return back()->with('error', 'requistioin has been rejected successfully');
    }

    // review_requistion_director HR

    public function review_requistioning_planned_director_hr()
    {
        $values = DB::table('items_not_planneds')
            ->where([['amount_needed', '>', 0], ['amount_needed', '<=', 7500], ['status', '=', 'Head of unit']])
            ->get();

        // dd($values);
        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.review_requistion_director_hr', $data, compact(['values']));
    }

    public function approve_requistion_not_planned_director_hr($id)
    {
        DB::table('items_not_planneds')
            ->where('id', $id)
            ->update(['status' => 'Approved']);

        $description = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('description');
        $reason_for_purchase = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('reason_for_purchase');
        $qty = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('qty');
        $amount_needed = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('amount_needed');
        $date = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('date');
        $Attached_records = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('Attached_records');
        $divison_unit = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('divison_unit');

        // dd($divison_unit);

        DB::table('purchase_requistions')->insert([
            'divison' => $description,
            'date' => $date,
            'reason_for_purchase' => $reason_for_purchase,
            'qty' => $qty,
            'item_code' => '-',
            'description' => '-',
            'Attached_records' => $Attached_records,
            'approval_status' => 'Pending',
            'division_unit' => $divison_unit,
        ]);

        // $fullname = $firstname . '' . $lastname;

        // $data = [
        //     'email' => $Director_hr_email,
        //     'username' => $fullname,
        //     'description' => $description,
        //     'qty' => $qty,
        //     'amount_needed' => $amount_needed,
        //     'reason_for_purchase' => $reason_for_purchase,

        //     'title' => 'COMESA:E-PROCUREMENT - Director HR Not Planned Requistion Pending Review .',
        // ];

        // $pdf_data = PDF::loadView('emails.requistion_approvals.director_hr_item_not_planned', $data);

        // Mail::send('emails.requistion_approvals.director_hr_item_not_planned', $data, function ($message) use ($data, $pdf_data) {
        //     $message->to($data["email"], $data["email"])
        //         ->subject($data["title"]);
        // });

        return back()->with('success', 'requistioin has been approved');
    }

    public function reject_requistion_not_planned_director_hr($id)
    {
        DB::table('items_not_planneds')
            ->where('id', $id)
            ->update(['status' => 'Rejected']);

        return back()->with('error', 'requistioin has been rejected successfully');
    }

    // ASG Finance

    public function review_requistioning_planned_asg_finance()
    {
        $values = DB::table('items_not_planneds')
            ->where([['amount_needed', '>=', 7501], ['amount_needed', '<=', 20000], ['status', '=', 'Head of unit']])
            ->get();

        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.review_requistion_asg_finance', $data, compact(['values']));
    }

    public function approve_requistion_not_planned_asg_finance($id)
    {
        DB::table('items_not_planneds')
            ->where('id', $id)
            ->update(['status' => 'Approved']);

        $description = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('description');
        $reason_for_purchase = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('reason_for_purchase');
        $qty = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('qty');
        $amount_needed = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('amount_needed');
        $date = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('date');
        $Attached_records = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('Attached_records');
        $divison_unit = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('divison_unit');

        // dd($divison_unit);

        DB::table('purchase_requistions')->insert([
            'divison' => $description,
            'date' => $date,
            'reason_for_purchase' => $reason_for_purchase,
            'qty' => $qty,
            'item_code' => '-',
            'description' => '-',
            'Attached_records' => $Attached_records,
            'approval_status' => 'Pending',
            'division_unit' => $divison_unit,
        ]);

        return back()->with('success', 'requistioin has been approved');
    }

    public function reject_requistion_not_planned_asg_finance($id)
    {
        DB::table('items_not_planneds')
            ->where('id', $id)
            ->update(['status' => 'Rejected']);

        return back()->with('error', 'requistioin has been rejected successfully');
    }

    // SG Requistion

    public function review_requistioning_planned_sg()
    {
        $values = DB::table('items_not_planneds')
            ->where([['amount_needed', '>=', 20001], ['amount_needed', '<=', 30000], ['status', '=', 'Head of unit']])
            ->get();

        // dd($values);
        $data = ['LoggedUserAdmin' => Admin::where('id', '=', session('LoggedAdmin'))->first()];

        return view('Requistion.review_requistion_sg', $data, compact(['values']));
    }

    public function approve_requistion_not_planned_sg($id)
    {
        DB::table('items_not_planneds')
            ->where('id', $id)
            ->update(['status' => 'Approved']);

        $description = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('description');
        $reason_for_purchase = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('reason_for_purchase');
        $qty = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('qty');
        $amount_needed = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('amount_needed');
        $date = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('date');
        $Attached_records = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('Attached_records');
        $divison_unit = DB::table('items_not_planneds')
            ->where('id', $id)
            ->value('divison_unit');

        // dd($divison_unit);

        DB::table('purchase_requistions')->insert([
            'divison' => $description,
            'date' => $date,
            'reason_for_purchase' => $reason_for_purchase,
            'qty' => $qty,
            'item_code' => '-',
            'description' => '-',
            'Attached_records' => $Attached_records,
            'approval_status' => 'Pending',
            'division_unit' => $divison_unit,
        ]);

        return back()->with('success', 'requistioin has been approved');
    }

    public function reject_requistion_not_planned_sg($id)
    {
        DB::table('items_not_planneds')
            ->where('id', $id)
            ->update(['status' => 'Rejected']);

        return back()->with('error', 'requistioin has been rejected successfully');
    }

    // Advanced Admin user Rights, Roles and previledges

    public function admin_rights_previledges(Request $request)
    {
        // ROLES AND PREVILEDGES

        // Director HR
        // ASG Finance
        // Originator
        // ASG Finance
        // Head of project/unit/division
        // SG
        // Approval Officer
        // Head of Procurement

        $admin_role = $request->admin_role;

        // dd($admin_role);

        // $role_id = DB::table('user_roles')->where('user_name', $admin_role)->value('user_id');

        // Originator role
        /* -------------------------------------------------- */

        if ($admin_role == 'Originator') {
            $originator = DB::table('user_previledges')
                ->where('previledge_name', 'Originator')
                ->first();

            $originator_status = 'NULL';

            if ($originator != null || $originator != 'NULL') {
                $A = DB::table('user_previledges')
                    ->where('previledge_name', 'Originator')
                    ->value('A');
                $V = DB::table('user_previledges')
                    ->where('previledge_name', 'Originator')
                    ->value('V');
                $E = DB::table('user_previledges')
                    ->where('previledge_name', 'Originator')
                    ->value('E');
                $D = DB::table('user_previledges')
                    ->where('previledge_name', 'Originator')
                    ->value('D');
                $P = DB::table('user_previledges')
                    ->where('previledge_name', 'Originator')
                    ->value('P');
                $I = DB::table('user_previledges')
                    ->where('previledge_name', 'Originator')
                    ->value('I');
                $X = DB::table('user_previledges')
                    ->where('previledge_name', 'Originator')
                    ->value('X');

                if ($A == '✔' && $V == '✔' && $E == '✔' && $D == '✔') {
                    $originator_status = 'display';

                    return response()->json([
                        'status' => true,
                        'admin_role' => $admin_role,
                        'originator_status' => $originator_status,
                    ]);
                } else {
                    $originator_status = 'hide';

                    return response()->json([
                        'status' => true,
                        'admin_role' => $admin_role,
                        'originator_status' => $originator_status,
                    ]);
                }
            } else {
                $originator_status = 'hide';

                return response()->json([
                    'status' => true,
                    'admin_role' => $admin_role,
                    'originator_status' => $originator_status,
                ]);
            }
        }
        // Head of project/unit/division
        /* -------------------------------------------------- */ elseif ($admin_role == 'Head of project/unit/division') {
            $head_of_unit = DB::table('user_previledges')
                ->where('previledge_name', 'Head of project/unit/division')
                ->first();

            $originator_status = 'NULL';

            if ($head_of_unit != null || $head_of_unit != 'NULL') {
                $A = DB::table('user_previledges')
                    ->where('previledge_name', 'Head of project/unit/division')
                    ->value('A');

                $V = DB::table('user_previledges')
                    ->where('previledge_name', 'Head of project/unit/division')
                    ->value('V');

                $E = DB::table('user_previledges')
                    ->where('previledge_name', 'Head of project/unit/division')
                    ->value('E');

                $D = DB::table('user_previledges')
                    ->where('previledge_name', 'Head of project/unit/division')
                    ->value('D');

                $P = DB::table('user_previledges')
                    ->where('previledge_name', 'Head of project/unit/division')
                    ->value('P');

                $I = DB::table('user_previledges')
                    ->where('previledge_name', 'Head of project/unit/division')
                    ->value('I');

                $X = DB::table('user_previledges')
                    ->where('previledge_name', 'Head of project/unit/division')
                    ->value('X');

                if ($A == '✔' && $V == '✔' && $E == '✔' && $D == '✔') {
                    $originator_status = 'display';

                    return response()->json([
                        'status' => true,
                        'admin_role' => $admin_role,
                        'originator_status' => $originator_status,
                    ]);
                } else {
                    $originator_status = 'hide';

                    return response()->json([
                        'status' => true,
                        'admin_role' => $admin_role,
                        'originator_status' => $originator_status,
                    ]);
                }
            } else {
                $originator_status = 'hide';

                return response()->json([
                    'status' => true,
                    'admin_role' => $admin_role,
                    'originator_status' => $originator_status,
                ]);
            }
        }
        // Finance Accountant
        /* -------------------------------------------------- */ elseif ($admin_role == 'Finance Accountant') {
            $head_of_unit = DB::table('user_previledges')
                ->where('previledge_name', 'Finance Accountant')
                ->first();

            $originator_status = 'NULL';

            if ($head_of_unit != null || $head_of_unit != 'NULL') {
                $A = DB::table('user_previledges')
                    ->where('previledge_name', 'Head of project/unit/division')
                    ->value('A');

                $V = DB::table('user_previledges')
                    ->where('previledge_name', 'Head of project/unit/division')
                    ->value('V');

                $E = DB::table('user_previledges')
                    ->where('previledge_name', 'Head of project/unit/division')
                    ->value('E');

                $D = DB::table('user_previledges')
                    ->where('previledge_name', 'Head of project/unit/division')
                    ->value('D');

                $P = DB::table('user_previledges')
                    ->where('previledge_name', 'Head of project/unit/division')
                    ->value('P');

                $I = DB::table('user_previledges')
                    ->where('previledge_name', 'Head of project/unit/division')
                    ->value('I');

                $X = DB::table('user_previledges')
                    ->where('previledge_name', 'Head of project/unit/division')
                    ->value('X');

                if ($A == '✔' && $V == '✔' && $E == '✔' && $D == '✔') {
                    $originator_status = 'display';

                    return response()->json([
                        'status' => true,
                        'admin_role' => $admin_role,
                        'originator_status' => $originator_status,
                    ]);
                } else {
                    $originator_status = 'hide';

                    return response()->json([
                        'status' => true,
                        'admin_role' => $admin_role,
                        'originator_status' => $originator_status,
                    ]);
                }
            } else {
                $originator_status = 'hide';

                return response()->json([
                    'status' => true,
                    'admin_role' => $admin_role,
                    'originator_status' => $originator_status,
                ]);
            }
        }
        // Head of Procurement
        /* -------------------------------------------------- */ elseif ($admin_role == 'Head of Procurement') {
            $admin_user_id = DB::table('user_roles')
                ->where('user_name', $admin_role)
                ->value('user_id');

            $head_of_procurement_previledges = DB::table('user_previledges')
                ->where('user_user_id', $admin_user_id)
                ->pluck('previledge_name');

            $originator_status = 'NULL';

            if ($head_of_procurement_previledges == null) {
                $originator_status = 'hide';

                return response()->json([
                    'status' => true,
                    'admin_role' => $admin_role,
                    'originator_status' => $originator_status,
                ]);
            } else {
                foreach ($head_of_procurement_previledges as $head_of_procurement_previledge) {
                    $A = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('A');

                    $V = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('V');

                    $E = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('E');

                    $D = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('D');

                    $P = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('P');

                    $I = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('I');

                    $X = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('X');

                    if ($A == '✔' && $V == '✔' && $E == '✔' && $D == '✔') {
                        $originator_status = 'display';

                        return response()->json([
                            'status' => true,
                            'admin_role' => $admin_role,
                            'originator_status' => $originator_status,
                        ]);
                    } else {
                        $originator_status = 'hide';

                        return response()->json([
                            'status' => true,
                            'admin_role' => $admin_role,
                            'originator_status' => $originator_status,
                        ]);
                    }
                }
            }
        } elseif ($admin_role == 'Director HR') {
            $admin_user_id = DB::table('user_roles')
                ->where('user_name', $admin_role)
                ->value('user_id');

            $head_of_procurement_previledges = DB::table('user_previledges')
                ->where('user_user_id', $admin_user_id)
                ->pluck('previledge_name');

            $originator_status = 'NULL';

            if ($head_of_procurement_previledges == null) {
                $originator_status = 'hide';

                return response()->json([
                    'status' => true,
                    'admin_role' => $admin_role,
                    'originator_status' => $originator_status,
                ]);
            } else {
                foreach ($head_of_procurement_previledges as $head_of_procurement_previledge) {
                    $A = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('A');

                    $V = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('V');

                    $E = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('E');

                    $D = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('D');

                    $P = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('P');

                    $I = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('I');

                    $X = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('X');

                    if ($A == '✔' && $V == '✔' && $E == '✔' && $D == '✔') {
                        $originator_status = 'display';

                        return response()->json([
                            'status' => true,
                            'admin_role' => $admin_role,
                            'originator_status' => $originator_status,
                        ]);
                    } else {
                        $originator_status = 'hide';

                        return response()->json([
                            'status' => true,
                            'admin_role' => $admin_role,
                            'originator_status' => $originator_status,
                        ]);
                    }
                }
            }
        } elseif ($admin_role == 'ASG Finance') {
            $admin_user_id = DB::table('user_roles')
                ->where('user_name', $admin_role)
                ->value('user_id');

            $head_of_procurement_previledges = DB::table('user_previledges')
                ->where('user_user_id', $admin_user_id)
                ->pluck('previledge_name');

            $originator_status = 'NULL';

            if ($head_of_procurement_previledges == null) {
                $originator_status = 'hide';

                return response()->json([
                    'status' => true,
                    'admin_role' => $admin_role,
                    'originator_status' => $originator_status,
                ]);
            } else {
                foreach ($head_of_procurement_previledges as $head_of_procurement_previledge) {
                    $A = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('A');

                    $V = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('V');

                    $E = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('E');

                    $D = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('D');

                    $P = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('P');

                    $I = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('I');

                    $X = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('X');

                    if ($A == '✔' && $V == '✔' && $E == '✔' && $D == '✔') {
                        $originator_status = 'display';

                        return response()->json([
                            'status' => true,
                            'admin_role' => $admin_role,
                            'originator_status' => $originator_status,
                        ]);
                    } else {
                        $originator_status = 'hide';

                        return response()->json([
                            'status' => true,
                            'admin_role' => $admin_role,
                            'originator_status' => $originator_status,
                        ]);
                    }
                }
            }
        } elseif ($admin_role == 'SG') {
            $admin_user_id = DB::table('user_roles')
                ->where('user_name', $admin_role)
                ->value('user_id');

            $head_of_procurement_previledges = DB::table('user_previledges')
                ->where('user_user_id', $admin_user_id)
                ->pluck('previledge_name');

            // dd($head_of_procurement_previledges);
            $originator_status = 'NULL';

            if ($head_of_procurement_previledges == null) {
                $originator_status = 'hide';

                return response()->json([
                    'status' => true,
                    'admin_role' => $admin_role,
                    'originator_status' => $originator_status,
                ]);
            } else {
                foreach ($head_of_procurement_previledges as $head_of_procurement_previledge) {
                    $A = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('A');

                    $V = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('V');

                    $E = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('E');

                    $D = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('D');

                    $P = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('P');

                    $I = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('I');

                    $X = DB::table('user_previledges')
                        ->where('previledge_name', $head_of_procurement_previledge)
                        ->value('X');

                    if ($A == '✔' && $V == '✔' && $E == '✔' && $D == '✔') {
                        $originator_status = 'display';

                        return response()->json([
                            'status' => true,
                            'admin_role' => $admin_role,
                            'originator_status' => $originator_status,
                        ]);
                    } else {
                        $originator_status = 'hide';

                        return response()->json([
                            'status' => true,
                            'admin_role' => $admin_role,
                            'originator_status' => $originator_status,
                        ]);
                    }
                }
            }
        }
    }
}
