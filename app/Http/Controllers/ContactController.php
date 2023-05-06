<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;
class ContactController extends Controller
{
    // Get all Contacts

    public function index(){
        $contacts = Contact::all();

        return view('contact.list',['contacts'=>$contacts]);
    }

   // Add a contact

    public function create(){
        return view('contact.create');

    }

    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'phone_number'=>'required|numeric'
        ]);
        if ($validator->passes()){
            $contact = new Contact();
            $contact->first_name = $request->first_name;
            $contact->last_name = $request->last_name;
            $contact->email = $request->email;
            $contact->phone_number = $request->phone_number;
            $contact->save();
            $request->session()->flash('success','Contact created successfully!');

            return redirect()->route('contacts.index');



        } else{
           // return with errors
           return redirect()->route('contacts.create')->withErrors($validator)->withInput();
        }
    }

    //Edit a specific contact

    public function edit($id){
        $contact = Contact::findOrFail($id);
        return view('contact.edit',['contact' => $contact]);
    }

    public function update($id,Request $request)
    {      
        $validator=Validator::make($request->all(),[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'phone_number'=>'required|numeric'
        ]);
        if ($validator->passes()){
            $contact =Contact::find($id);
            $contact->first_name = $request->first_name;
            $contact->last_name = $request->last_name;
            $contact->email = $request->email;
            $contact->phone_number = $request->phone_number;
            $contact->save();
            $request->session()->flash('success','Contact updated successfully!');

            return redirect()->route('contacts.index');



        } else{
           // return with errors
           return redirect()->route('contacts.edit',$id)->withErrors($validator)->withInput();
        } 
    }


     // Delete a specific contact
     
     public function destroy($id,Request $request )
     {
        $contact= Contact::findOrFail($id);
        $contact->delete();
        $request->session()->flash('success','Contact deleted successfully!');
        return redirect()->route('contacts.index');
     }
}
