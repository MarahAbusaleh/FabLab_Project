<?php

namespace App\Http\Controllers;

use App\DataTables\ComponentsDataTable;
use App\Models\Components;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    use ImageUploadTrait;

    public function index(ComponentsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.components.index');
    }


    public function create()
    {
        return view('admin.pages.components.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'max:4196', 'image'],
            'name' => ['required', 'max:50'],
            'description' => ['required'],
            'type' => ['required'],
        ]);

        $component = new Components();

        $imagePath = $this->uploadImage($request, 'image', 'uploads');
        $component->image = $imagePath;
        $component->name = $request->name;
        $component->type = $request->type;
        $component->description = $request->description;
        $component->save();

        $notification = array(
            'message' => 'Component Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('components.index')->with($notification);
    }


    public function show(Components $components, $id)
    {
        $component = Components::findOrFail($id);
        return view('pages.components', compact('component'));
    }


    public function edit($id)
    {
        $component = Components::findOrFail($id);
        return view('admin.pages.components.edit', compact('component'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable', 'max:4196', 'image'],
            'name' => ['required', 'max:50'],
            'description' => ['required'],
            'type' => ['nullable'],
        ]);

        $component = Components::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads', $component->image);

        $component->image = empty(!$imagePath) ? $imagePath : $component->image;
        $component->name = $request->name;
        $component->type = $request->type;
        $component->description = $request->description;
        $component->save();

        $notification = array(
            'message' => 'Component Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('components.index')->with($notification);
    }


    public function destroy($id)
    {
        $component = Components::findOrFail($id);
        $this->deleteImage($component->image);
        $component->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
