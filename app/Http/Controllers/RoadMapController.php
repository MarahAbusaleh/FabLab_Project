<?php

namespace App\Http\Controllers;

use App\DataTables\RoadMapDataTable;
use App\Models\RoadMap;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class RoadMapController extends Controller
{

    use ImageUploadTrait;

    public function index(RoadMapDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.roadmap.index');
    }


    public function create()
    {
        return view('admin.pages.roadmap.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'max:4196', 'image'],
        ]);

        $roadmap = new RoadMap();

        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $roadmap->image = $imagePath;
        $roadmap->save();

        $notification = array(
            'message' => 'Road Map Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('roadmap.index')->with($notification);
    }


    public function show(RoadMap $roadMap)
    {
        //
    }


    public function edit(RoadMap $RoadMap, $id)
    {
        $roadmap = RoadMap::findOrFail($id);
        return view('admin.pages.roadmap.edit', compact('roadmap'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable', 'max:4196', 'image'],
        ]);

        $roadmap = RoadMap::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads', $roadmap->image);

        $roadmap->image = empty(!$imagePath) ? $imagePath : $roadmap->image;
        $roadmap->save();

        $notification = array(
            'message' => 'Road Map Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('roadmap.index')->with($notification);
    }


    public function destroy($id)
    {
        $roadmap = RoadMap::findOrFail($id);
        $this->deleteImage($roadmap->image);
        $roadmap->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
