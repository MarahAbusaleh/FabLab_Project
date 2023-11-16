<?php

namespace App\Http\Controllers;

use App\DataTables\TeamsDataTable;
use App\Models\Team;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TeamsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.teams.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.teams.create');
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
            'image' => ['nullable', 'max:4196', 'image'],
            'name' => ['required', 'max:50'],
            'description' => ['required'],
            'email' => ['required', 'email'],
            'role' => ['required', 'in:instructor,student'],
        ]);

        $team = new Team();

        if ($request->hasFile('image')) {

            $imagePath = $this->uploadImage($request, 'image', 'uploads');
            $team->image = $imagePath;
        } else {
            $defaultImagePath = 'img/defult-team.jpg';
            $team->image = empty($imagePath) ? $defaultImagePath : $imagePath;
        }
        $team->name = $request->name;
        $team->email = $request->email;
        $team->role = $request->role;
        $team->description = $request->description;
        $team->save();

        $notification = array(
            'message' => 'New Team Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('teams.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.pages.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable', 'max:4196', 'image'],
            'name' => ['required', 'max:50'],
            'description' => ['required'],
            'email' => ['required', 'email'],
            'role' => ['required', 'in:instructor,student'],
        ]);

        $team = Team::findOrFail($id);


        $imagePath = $this->updateImage($request, 'image', 'uploads', $team->image);
        $team->image = empty(!$imagePath) ? $imagePath : $team->image;


        
        $team->name = $request->name;
        $team->email = $request->email;
        $team->role = $request->role;
        $team->description = $request->description;
        $team->save();

        $notification = array(
            'message' => 'Team Memeber Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('teams.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $this->deleteImage($team->image);
        $team->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
