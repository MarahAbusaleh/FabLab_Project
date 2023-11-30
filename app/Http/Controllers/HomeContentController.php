<?php

namespace App\Http\Controllers;

use App\DataTables\HomeContentDataTable;
use App\Models\HomeContent;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class HomeContentController extends Controller
{

    use ImageUploadTrait;

    public function index(HomeContentDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.home-content.index');
    }



    public function create()
    {
        return view('admin.pages.home-content.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image1' => ['required'],
            'image2' => ['required'],
            'image3' => ['required'],
            'header' => ['required', 'max:20'],
            'description' => ['required'],
        ]);

        $homeContent = new HomeContent();

        $imagePath1 = $this->uploadImage($request, 'image1', 'uploads');
        $imagePath2 = $this->uploadImage($request, 'image2', 'uploads');
        $imagePath3 = $this->uploadImage($request, 'image3', 'uploads');

        $homeContent->image1 = $imagePath1;
        $homeContent->image2 = $imagePath2;
        $homeContent->image3 = $imagePath3;
        $homeContent->header = $request->header;
        $homeContent->description = $request->description;
        $homeContent->save();

        $notification = array(
            'message' => 'Home Page Content Section Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('home-content.index')->with($notification);
    }


    public function show(HomeContent $homeContent)
    {
        $HomeContent = HomeContent::latest()->get();
        return view('pages.index', compact('HomeContent'));
    }


    public function edit($id)
    {
        $homeContent = HomeContent::findOrFail($id);
        return view('admin.pages.home-content.edit', compact('homeContent'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'image1' => ['nullable'],
            'image2' => ['nullable'],
            'image3' => ['nullable'],
            'header' => ['required', 'max:20'],
            'description' => ['required'],
        ]);

        $homeContent = homeContent::findOrFail($id);

        $imagePath1 = $this->updateImage($request, 'image1', 'uploads', $homeContent->image1);
        $imagePath2 = $this->updateImage($request, 'image2', 'uploads', $homeContent->image2);
        $imagePath3 = $this->updateImage($request, 'image3', 'uploads', $homeContent->image3);

        $homeContent->image1 = empty(!$imagePath1) ? $imagePath1 : $homeContent->image1;
        $homeContent->image2 = empty(!$imagePath2) ? $imagePath2 : $homeContent->image2;
        $homeContent->image3 = empty(!$imagePath3) ? $imagePath3 : $homeContent->image3;

        $homeContent->header = $request->header;
        $homeContent->description = $request->description;
        $homeContent->save();

        $notification = array(
            'message' => 'Home  Content Section Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('home-content.index')->with($notification);
    }


    public function destroy($id)
    {
        $homeContent = HomeContent::findOrFail($id);
        $this->deleteImage($homeContent->image1);
        $this->deleteImage($homeContent->image2);
        $this->deleteImage($homeContent->image3);
        $homeContent->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
