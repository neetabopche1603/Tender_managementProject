<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __index(){
        $data['users'] = User::count();
        $data['alltender'] = Tender::count();
        $data['tender_fee'] = Tender::sum('tender_fee');
        $data['total_emd'] = Tender::sum('emd_fee');
        // $data['total_po'] = Tender::sum('emd_fee');

        return view('dashboard',$data);
    }
}
