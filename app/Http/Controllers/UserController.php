<?php

namespace App\Http\Controllers;

use App\DataTables\AdminUsersDataTable;
use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ImageUploadTrait;

    public function index(AdminUsersDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.admins.index');
    }


    public function create()
    {
        return view('admin.pages.admins.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => ['nullable', 'max:4196', 'image'],
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email'],
        ]);

        $user = new User();

        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $user->image = empty(!$imagePath) ? $imagePath : url('no-admin-image.png');

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('password');
        $user->save();

        $notification = array(
            'message' => 'Admin Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin-users.index')->with($notification);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.pages.admins.edit', compact('admin'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable', 'max:4196', 'image'],
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email'],
        ]);

        $user = User::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads', $user->image);

        $user->image = empty(!$imagePath) ? $imagePath : $user->image;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('password');
        $user->save();

        $notification = array(
            'message' => 'Admin Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin-users.index')->with($notification);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $this->deleteImage($user->image);
        $user->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
