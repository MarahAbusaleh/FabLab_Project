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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminUsersDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'max:4196', 'image'],
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email'],
        ]);

        $user = new User();

        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $user->image = $imagePath;
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
        $admin = User::findOrFail($id);
        return view('admin.pages.admins.edit', compact('admin'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $this->deleteImage($user->image);
        $user->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
