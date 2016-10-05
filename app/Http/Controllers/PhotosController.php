<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Requests;

use App\Photo;
use App\Project;
use File;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $photos = Photo::all()->sortBy('project_id');
      $projects = Project::pluck('name', 'id')->sortBy('name');
      return view('photos.index', compact('photos', 'projects'));
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

        return redirect('photos')
        ->withErrors($validator)
        ->withInput();
      } else {
        $file = Input::file('photo');
        if ($file)
        {
          $filePath = public_path() . '/img/photos/';
          $fileName = $file->getClientOriginalName();
          File::exists($filePath) or File::makeDirectory($filePath);
          $image = Image::make($file->getRealPath());
          $image->save($filePath . $fileName);
          $request->photo = '/img/photos/' . $fileName;
        } else {
          $request->photo = '/img/photos/photo.png';
        }
        $photo = new Photo;
        $photo->project_id = $request->project_id;
        $photo->photo = $request->photo;
        $photo->save();

        Flash('Create Successful!', 'success');
      }
      return redirect('photos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Photo::findOrFail($id)->delete();
      flash('Delete Complete!', 'success');
      return redirect('photos');
    }

    public function rules()
    {
      return [
        'photo' => 'image|required',
      ];
    }
}
