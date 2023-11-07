<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procurement_plan extends Model
{
    use HasFactory;


    protected $fillable = [
            'CrtNo',
            'Description_of_Goods|Works_and_Services',
            'Category_of_Procurement',
            'Qty',
            'Unit_of_Measure',
            'Procurement_Method',
            'Type_of_Contract',
            'Allocated_Amount',
            'Currency',
            'Source_of_funding',
            'Procuring_Unit',
            'Requisition_Unit',
            'End_user_Requisition_Date',
            'Technical_Requirements_Receipt_of_Final_Technical_Requirements_Date',
            'Technical_Requirements_Preparation_of_Tender_Document|RFP|RFQ|BOQs|REOI',
            'Publication_of_Tender_Documents_Publication_Date',
            'Publication_of_Tender_Documents_Closing_Date',
            'Tender_Openning',
            'Tender_Evaluation|Shortlisting_Report_start_date',
            'Tender_Evaluation|Shortlisting_Report_end_date',
            'Short_List_Notice_Publication',
            'Invitation_to_Shortlisted_Firms_to_Submit_Proposals_Invitation_Date',
            'Invitation_to_Shortlisted_Firms_to_Submit_Proposals_Closing_Date',
            'Evaluation_of_Bids_under_Shortlist_Method_Start_Date',
            'Evaluation_of_Bids_under_Shortlist_Method_End_Date',
            'Purchase|Contracts_Committee_Approval',
            'Secretary_General_Approval_of_PC|CC_Reports_Submission_Date',
            'Secretary_General_Approval_of_PC|CC_Reports_Approval_Date',
            'Contract_Vetting_Submission_Date',
            'Contract_Vetting_Approval_Date',
            'Contract_Amount',
            'SG|ASG(A&F)|_DHRA_Approval',
            'Contract_Signing_Date',
            'Contract_Duration_Date',
            'Contract_End_Date',
    ];

}
