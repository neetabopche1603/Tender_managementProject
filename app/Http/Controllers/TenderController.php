<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TenderController extends Controller
{
    public function __index(){
        $tenders = Tender::all();
        return view('tender.index',compact('tenders'));
    }

    public function __tenderForm(){
        return view('tender.add');
    }

    public function __store(Request $request)
    {

       $request->validate(
            [
                'tender_no' => 'required|max:255',
                'tender_publish_date' => 'required|',
                'tender_type' => 'required',
                'client_name' => 'required',
                'client_address' => 'required',
                'bid_submitted_date' => 'required',
                'bid_opening_date' => 'required',
                'tender_fee' => 'required',
                'emd_fee' => 'required',
                'tender_status' => 'required',
                'quoted_value' => 'required',
                'work_details' => 'required',
                'remark' => 'required',
            ],
            [
                'tender_no.required' => 'Please Type Valid tender_no',
            ]
        );


        //insert Query
        $tender = new Tender();
        $getqutId = Tender::latest('id')->first();
        if ($tender->quotation_no == NULL && $getqutId == '') {
            $tender->quotation_no = 'MSGQT2122001';
        } else {
            $getLastid = explode('MSGQT', $getqutId->quotation_no);
            $tender->quotation_no = 'MSGQT' . $getLastid[1] + 1;
        }

        $tender->tender_no = strtoupper($request->tender_no);
        $tender->tender_publish_date = $request->tender_publish_date;
        $tender->tender_type = $request->tender_type;
        $tender->client_name = $request->client_name;
        $tender->client_address = $request->client_address;
        $tender->bid_submitted_date = $request->bid_submitted_date;
        $tender->bid_opening_date = $request->bid_opening_date;
        $tender->tender_fee = $request->tender_fee;
        $tender->emd_fee = $request->emd_fee;
        $tender->tender_status = $request->tender_status;
        $tender->quoted_value = $request->quoted_value;
        $tender->work_details = $request->work_details;
        $tender->remark = $request->remark;
        

        $tender->save();
        return redirect('tender')->with('success', strtoupper($request->client_name) . ' Tender Successfully Saved.');
    }

    public function __deleteTender($tid){
        $deleteTender = Tender::find($tid)->delete();
        return redirect('tender')->with('success', ' Tender Successfully Deleted.....');
    }
}
