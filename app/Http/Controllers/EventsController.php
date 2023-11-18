<?php

namespace App\Http\Controllers;

use App\DataTables\EventsDataTable;
use App\Models\Events;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    use ImageUploadTrait;

    public function index(EventsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.events.index');
    }


    public function create()
    {
        return view('admin.pages.events.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'max:4196', 'image'],
            'name' => ['required', 'max:50'],
            'description' => ['required'],
            'date' => ['required'],
        ]);

        $event = new Events();

        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $event->image = $imagePath;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->save();

        $notification = array(
            'message' => 'Event Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('events.index')->with($notification);
    }


    public function show(Events $events)
    {
        $events = Events::all();
        return view('pages.events', compact('events'));
    }


    public function edit($id)
    {
        $event = Events::findOrFail($id);
        return view('admin.pages.events.edit', compact('event'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable', 'max:4196', 'image'],
            'name' => ['required', 'max:50'],
            'description' => ['required'],
            'date' => ['required'],
        ]);

        $event = Events::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads', $event->image);

        $event->image = empty(!$imagePath) ? $imagePath : $event->image;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->save();

        $notification = array(
            'message' => 'Event Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('events.index')->with($notification);
    }


    public function destroy($id)
    {
        $event = Events::findOrFail($id);
        $this->deleteImage($event->image);
        $event->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
