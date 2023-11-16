<?php

namespace App\Http\Controllers;

use App\DataTables\EventsDataTable;
use App\Models\Events;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EventsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.events.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.events.create');
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

        $event = new Events();

        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $event->image = $imagePath;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->save();

        $notification = array(
            'message' => 'Event Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('events.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function show(Events $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Events::findOrFail($id);
        return view('admin.pages.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable', 'max:4196', 'image'],
            'name' => ['required', 'max:50'],
            'description' => ['required'],
        ]);

        $event = Events::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads', $event->image);

        $event->image = empty(!$imagePath) ? $imagePath : $event->image;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->save();

        $notification = array(
            'message' => 'Event Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('events.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Events::findOrFail($id);
        $this->deleteImage($event->image);
        $event->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
