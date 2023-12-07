<?php

namespace App\Http\Controllers;

use App\DataTables\HomeAboutDataTable;
use App\Models\HomeAbout;
use App\Models\HomeContent;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class HomeAboutController extends Controller
{

    use ImageUploadTrait;

    public function index(HomeAboutDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.home-about.index');
    }



    public function create()
    {
        return view('admin.pages.home-about.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required'],
            'header' => ['required', 'max:20'],
            'description' => ['required'],
        ]);

        $homeAbout = new HomeAbout();

        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $homeAbout->image = $imagePath;
        $homeAbout->header = $request->header;
        $homeAbout->description = $request->description;
        $homeAbout->save();

        $notification = array(
            'message' => 'Home Page About Section Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('home-about.index')->with($notification);
    }


    public function show(HomeAbout $HomeAbout)
    {
        $homeAbout = HomeAbout::latest()->get();
        return view('pages.index', compact('homeAbout'));
    }


    public function edit($id)
    {
        $homeAbout = HomeAbout::findOrFail($id);
        return view('admin.pages.home-about.edit', compact('homeAbout'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable'],
            'header' => ['required', 'max:20'],
            'description' => ['required'],
        ]);

        $homeAbout = HomeAbout::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads', $homeAbout->image);

        $homeAbout->image = empty(!$imagePath) ? $imagePath : $homeAbout->image;

        $homeAbout->header = $request->header;
        $homeAbout->description = $request->description;
        $homeAbout->save();

        $notification = array(
            'message' => 'Home About Section Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('home-about.index')->with($notification);
    }


    public function destroy($id)
    {
        $homeAbout = HomeAbout::findOrFail($id);
        $this->deleteImage($homeAbout->image);
        $homeAbout->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
