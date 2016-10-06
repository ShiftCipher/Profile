<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Requests;

use App\Project;
use App\Category;
use File;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $projects = Project::all();

      return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::pluck('name', 'id')->sortBy('name');
      return view('projects.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), $this->rules());

      if ($validator->fails()) {
        flash('Validation Fail!', 'danger');
        return redirect('projects/create')
        ->withErrors($validator)
        ->withInput();
      } else {
        $file = Input::file('photo');
        if ($file)
        {
          $filePath = public_path() . '/img/projects/';
          $fileName = $file->getClientOriginalName();
          File::exists($filePath) or File::makeDirectory($filePath);
          $image = Image::make($file->getRealPath());
          $image->save($filePath . $fileName);
          $request->photo = '/img/projects/' . $fileName;
        } else {
          $request->photo = '/img/projects/project.png';
        }
        $project = new Project;
        if ($request->complete == true) {
          $project->complete = true;
        } elseif ($request->complete == false) {
          $project->complete = false;
        }
        $project->name = $request->name;
        $project->start = $request->start;
        $project->end = $request->end;
        $project->url = $request->url;
        $project->company = $request->company;
        $project->photo = $request->photo;
        $project->category_id = $request->category_id;
        $project->save();
        flash('Create Successful!', 'success');
      }
      return redirect('projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $project = Project::findOrFail($id);
      return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $project = Project::findOrFail($id);
      $categories = Category::pluck('name', 'id')->sortBy('name');

      return view('projects.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $project = Project::findOrFail($id);

      $validator = Validator::make($request->all(), $this->rules());
      if ($validator->fails()) {
        flash('Validation Fails!', 'danger');
        return redirect('projects/' . $project->id . '/edit')
          ->withErrors($validator)
          ->withInput();
      } else {
        $file = Input::file('photo');
        if ($file)
        {
          $filePath = public_path() . '/img/projects/';
          $fileName = $file->getClientOriginalName();
          File::exists($filePath) or File::makeDirectory($filePath);
          $image = Image::make($file->getRealPath());
          $image->save($filePath . $fileName);
          $request->photo = '/img/projects/' . $fileName;
        } else {
          $request->photo = '/img/projects/project.png';
        }
      }
      $project->name = $request->name;
      $project->company = $request->company;
      $project->start = $request->start;
      $project->end = $request->end;
      $project->url = $request->url;
      $project->photo = $request->photo;
      $project->category_id = $request->category_id;

      if ($request->complete == true) {
        $project->complete = true;
      } elseif ($request->complete == false) {
        $project->complete = false;
      }

      $project->save();
      flash('Update Complete!', 'success');
      return redirect('projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Project::findOrFail($id)->delete();
      flash('Delete Complete!', 'success');
      return redirect('projects');
    }

    public function rules()
    {
      return [
        'name' => 'string|required|max:255',
        'company' => 'string|max:255',
        'start' => 'date',
        'end' => 'date',
        'company' => 'string',
        'photo' => 'image',
        'url' => 'string',
      ];
    }
}
