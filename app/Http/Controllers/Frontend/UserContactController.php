<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class UserContactController extends Controller
{
    public function index(){
        return view('frontend.pages.contact.index');
    }

    public function store(Request $request){
            $ipaddress = get_client_ip();
            $data = $request->except('_token');
            $data['created_at'] = Carbon::now();
            $data['ip_address'] = $ipaddress;
            $contact = Contact::create($data);
            if($contact)
            {
                Toastr::success('Gửi thành công', 'Thành công');
                return redirect()->back();
            }
    }
}
