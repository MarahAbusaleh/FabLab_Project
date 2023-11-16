<?php

namespace App\Http\Controllers;

use App\DataTables\ComponentsDataTable;
use App\Models\Components;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ComponentsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.components.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.components.create');
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
            'description' => ['required'],
        ]);

        $component = new Components();

        $imagePath = $this->uploadImage($request, 'image', 'uploads');
        $component->image = $imagePath;
        $component->name = $request->name;
        $component->description = $request->description;
        $component->save();

        $notification = array(
            'message' => 'Component Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('components.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Components  $components
     * @return \Illuminate\Http\Response
     */
    public function show(Components $components)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Components  $components
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $component = Components::findOrFail($id);
        return view('admin.pages.components.edit', compact('component'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Components  $components
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable', 'max:4196', 'image'],
            'name' => ['required', 'max:50'],
            'description' => ['required'],
        ]);

        $component = Components::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads', $component->image);

        $component->image = empty(!$imagePath) ? $imagePath : $component->image;
        $component->name = $request->name;
        $component->description = $request->description;
        $component->save();

        $notification = array(
            'message' => 'Component Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('components.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Components  $components
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $component = Components::findOrFail($id);
        $this->deleteImage($component->image);
        $component->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
