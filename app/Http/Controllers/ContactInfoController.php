<?php

namespace App\Http\Controllers;

use App\DataTables\ContactInfoDataTable;
use App\Models\ContactInfo;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    use ImageUploadTrait;

    public function index(ContactInfoDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.contact-info.index');
    }


    public function create()
    {
        return view('admin.pages.contact-info.create');
    }


    public function store(Request $request)
    {
        // Data Validate
        $request->validate([
            'email' => ['required'],
            'phone' => ['required'],
        ]);

        ContactInfo::create([
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'facebook' => $request->input('facebook'),
            'youtube' => $request->input('youtube'),
            'twitter' => $request->input('twitter'),
        ]);

        $notification = array(
            'message' => 'Contact Info Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('contact-info.index')->with($notification);
    }


    public function show(ContactInfo $contactInfo)
    {
        //
    }


    public function edit($id)
    {
        $contactInfo = ContactInfo::findOrFail($id);
        return view('admin.pages.contact-info.edit', compact('contactInfo'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->except(['_token', '_method']);

        $contactInfo = ContactInfo::findOrFail($id);
        ContactInfo::where('id', $id)->update($data);

        $notification = array(
            'message' => 'Contact Info Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('contact-info.index')->with($notification);
    }


    public function destroy($id)
    {
        $contactInfo = ContactInfo::findOrFail($id);
        $contactInfo->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
