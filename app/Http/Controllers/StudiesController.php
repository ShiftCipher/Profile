<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

use App\Study;
use App\Category;
use File;

class StudiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $studies = Study::all();

      return view('studies.index', compact('studies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::pluck('name', 'id')->sortBy('name');
      return view('studies.create', compact('categories'));
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
        Flash('Validation Fail!', 'danger');
        return redirect('studies/create')
        ->withErrors($validator)
        ->withInput();
      } else {
        $file = Input::file('photo');
        if ($file)
        {
          $filePath = public_path() . '/img/studies/';
          $fileName = $file->getClientOriginalName();
          File::exists($filePath) or File::makeDirectory($filePath);
          $image = Image::make($file->getRealPath());
          $image->save($filePath . $fileName);
          $request->photo = '/img/studies/' . $fileName;
        } else {
          $request->photo = '/img/studies/study.png';
        }

        $study = new Study;
        $study->name = $request->name;
        $study->company = $request->company;
        $study->description = $request->description;
        $study->start = $request->start;
        $study->end = $request->end;
        $study->url = $request->url;
        $study->photo = $request->photo;
        $study->category_id = $request->category_id;

        if ($request->complete == true) {
          $study->complete = true;
        } elseif ($request->complete == false) {
          $study->complete = false;
        }

        $study->save();
        Flash('Create Successful!', 'success');
      }
      return redirect('studies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $study = Study::findOrFail($id);
      return view('studies.show', compact('study'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $study = Study::findOrFail($id);
      $categories = Category::pluck('name', 'id')->sortBy('name');

      return view('studies.edit', compact('study', 'categories'));
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
      $study = Study::findOrFail($id);

      $validator = Validator::make($request->all(), $this->rules());
      if ($validator->fails()) {
        Flash('Validation Fails!', 'danger');
        return redirect('studies/' . $study->id . '/edit')
          ->withErrors($validator)
          ->withInput();
      } else {
        $request->photo = '/img/studies/study.png';
      }

      $study->name = $request->name;
      $study->company = $request->company;
      $study->description = $request->description;
      $study->start = $request->start;
      $study->end = $request->end;
      $study->url = $request->url;
      $study->photo = $request->photo;
      $study->category_id = $request->category_id;

      if ($request->complete == true) {
        $study->complete = true;
      } elseif ($request->complete == false) {
        $study->complete = false;
      }

      $study->save();
      Flash('Update Complete!', 'success');
      return redirect('studies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Study::findOrFail($id)->delete();
      Flash('Delete Complete!', 'success');
      return redirect('studies');
    }

    public function rules()
    {
      return [
        'name' => 'string|required|max:255',
        'photo' => 'image|optional',
        'company' => 'string|required',
        'complete' => 'boolean',
        'end' => 'date',
        'start' => 'date',
        'url' => 'string',
        'description' => 'string'
      ];
    }
}
