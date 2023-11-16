<?php

namespace App\Http\Controllers;

use App\DataTables\FeaturesDataTable;
use App\Models\FeaturesPage;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class FeaturesPageController extends Controller
{
    use ImageUploadTrait;

    public function index(FeaturesDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.features.index');
    }


    public function create()
    {
        return view('admin.pages.features.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'mainImage' => ['required', 'max:4196', 'image'],
        ]);

        $features = new FeaturesPage();

        $imagePath = $this->uploadImage($request, 'mainImage', 'uploads');

        $features->mainImage = $imagePath;
        $features->save();

        $notification = array(
            'message' => 'Features Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('features.index')->with($notification);
    }


    public function show(FeaturesPage $featuresPage)
    {
        //
    }


    public function edit(FeaturesPage $featuresPage, $id)
    {
        $features = FeaturesPage::findOrFail($id);
        return view('admin.pages.features.edit', compact('features'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'mainImage' => ['nullable', 'max:4196', 'image'],
        ]);

        $features = FeaturesPage::findOrFail($id);

        $imagePath = $this->updateImage($request, 'mainImage', 'uploads', $features->image);

        $features->mainImage = empty(!$imagePath) ? $imagePath : $features->mainImage;
        $features->save();

        $notification = array(
            'message' => 'Features Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('features.index')->with($notification);
    }


    public function destroy($id)
    {
        $features = FeaturesPage::findOrFail($id);
        $this->deleteImage($features->mainImage);
        $features->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
