<?php

namespace App\Http\Controllers;

use App\DataTables\HomePageDataTable;
use App\Models\Events;
use App\Models\HomePage;
use App\Models\Team;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $slider = HomePage::all();
        $events = Events::all();
        $instructors = Team::where("role","instructor")->get();
        $students = Team::where("role","student")->get();
        return view("pages.index", compact("slider","events","instructors","students"));
    }
    public function index(HomePageDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.home-page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.home-page.create');
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
            'media' => ['required'  ],
            'mediaType' => ['required'],
            'header' => ['required', 'max:20'],
            'text' => ['required', 'max:50'],
        ]);

        $homePage = new HomePage();

        $imagePath = $this->uploadImage($request, 'media', 'uploads');

        $homePage->media = $imagePath;
        $homePage->mediaType = $request->mediaType;
        $homePage->header = $request->header;
        $homePage->text = $request->text;
        $homePage->save();

        $notification = array(
            'message' => 'Home Page Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('home-page.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function show(HomePage $homePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homePage = HomePage::findOrFail($id);
        return view('admin.pages.home-page.edit', compact('homePage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable', 'max:4196', 'image'],
            'header' => ['required', 'max:20'],
            'text' => ['required', 'max:50'],
        ]);

        $homePage = HomePage::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads', $homePage->image);

        $homePage->image = empty(!$imagePath) ? $imagePath : $homePage->image;
        $homePage->header = $request->header;
        $homePage->text = $request->text;
        $homePage->save();

        $notification = array(
            'message' => 'Home Page Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('home-page.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homePage = HomePage::findOrFail($id);
        $this->deleteImage($homePage->image);
        $homePage->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
