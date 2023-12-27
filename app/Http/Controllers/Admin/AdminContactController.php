<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index(Request $request){
        $contact = Contact::whereRaw(1);

        if ($request->n)
            $contact->where('name', 'like', '%' . $request->n . '%');

        $contact = $contact->orderByDesc('id')->get();

       
        $viewData =[
            'contact' => $contact,
            'query' => $request->query()
        ];
        return view('admin.pages.contact.index',$viewData);
    }
    public function delete($id)
    {
        Contact::find($id)->delete();
        return redirect()->back();
    }

    public function contactview(Request $request){
        $contact_id = $request->contact_id;
        $contact = Contact::find($contact_id);
        $output['contact_desc'] = $contact->content;
        echo json_encode($output);

    }
}
