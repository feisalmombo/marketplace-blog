<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactInfo;
use App\ActivityLog;
use DB;
use Auth;

class ContactInfosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = DB::table('contact_infos')
        ->latest()
        ->get();

        // return json_encode($contacts);
        return view('ContactInfos.viewcontactinfo')
        ->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ContactInfos.addcontactinfo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_contact')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:contact_infos,email',
            'phone_number' => 'required',
            'message' => 'required|string|max:255',
        ]);

        $contact = new ContactInfo();
        $contact->first_name = $request->firstname;
        $contact->last_name = $request->lastname;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->message = $request->message;

        // return json_encode($contact);
        $st = $contact->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to upload Contact data');
        } else {
            return redirect()->back()->with('message', 'Contact is successfully added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('delete_contact')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $uid = \Auth::id();
        $contact = ContactInfo::findOrFail($id);
        $contact->delete();
        ActivityLog::where('changetype', 'Delete Contact')->update(['user_id' => $uid]);


        $request->session()->flash('message', 'Contact is successfully deleted');
        return back();
    }
}
