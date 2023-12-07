<?php

namespace App\Http\Controllers;

use App\DataTables\TeamsDataTable;
use App\Models\ContactInfo;
use App\Models\Team;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    use ImageUploadTrait;


    public function index(TeamsDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.teams.index');
    }


    public function create()
    {
        return view('admin.pages.teams.create');
    }


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


    public function show(Team $team)
    {
        $instructors = Team::where('role', 'instructor')->get();
        $students = Team::where('role', 'student')->get();
        $ContactInfo = ContactInfo::first();
        return view('pages.team', compact('instructors', 'students', 'ContactInfo'));
    }


    public function showDevelopers(Team $team)
    {
        $ContactInfo = ContactInfo::first();
        return view('pages.developers', compact('ContactInfo'));
    }


    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.pages.teams.edit', compact('team'));
    }


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


    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $this->deleteImage($team->image);
        $team->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
