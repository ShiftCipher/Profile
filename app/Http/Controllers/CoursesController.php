<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Requests;

use App\Course;
use App\Category;
use File;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $courses = Course::all();

      return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::pluck('name', 'id')->sortBy('name');
      return view('courses.create', compact('categories'));
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
        return redirect('courses/create')
        ->withErrors($validator)
        ->withInput();
      } else {
        $file = Input::file('photo');
        if ($file)
        {
          $filePath = public_path() . '/img/courses/';
          $fileName = $file->getClientOriginalName();
          File::exists($filePath) or File::makeDirectory($filePath);
          $image = Image::make($file->getRealPath());
          $image->save($filePath . $fileName);
          $request->photo = '/img/courses/' . $fileName;
        } else {
          $request->photo = '/img/courses/course.png';
        }
        $course = new Course;
        $course->description = $request->description;
        $course->name = $request->name;
        $course->company = $request->company;
        $course->start = $request->start;
        $course->end = $request->end;
        $course->url = $request->url;
        $course->photo = $request->photo;
        $course->category_id = $request->category_id;
        if ($request->complete == true) {
          $course->complete = true;
        } elseif ($request->complete == false) {
          $course->complete = false;
        }
        $course->save();
        Flash('Create Successful!', 'success');
      }
      return redirect('courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $course = Course::findOrFail($id);
      return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $course = Course::findOrFail($id);
      $categories = Category::pluck('name', 'id')->sortBy('name');

      return view('courses.edit', compact('course', 'categories'));
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
      $course = Course::findOrFail($id);

      $validator = Validator::make($request->all(), $this->rules());
      if ($validator->fails()) {
        Flash('Validation Fails!', 'danger');
        return redirect('courses/' . $course->id . '/edit')
          ->withErrors($validator)
          ->withInput();
      } else {
        $request->photo = '/img/courses/course.png';
      }
      $course->name = $request->name;
      $course->company = $request->company;
      $course->start = $request->start;
      $course->end = $request->end;
      $course->url = $request->url;
      $course->description = $request->description;
      $course->photo = $request->photo;
      $course->category_id = $request->category_id;
      if ($request->complete == true) {
        $course->complete = true;
      } elseif ($request->complete == false) {
        $course->complete = false;
      }
      $course->save();
      Flash('Update Complete!', 'success');
      return redirect('courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Course::findOrFail($id)->delete();
      Flash('Delete Complete!', 'success');
      return redirect('courses');
    }

    public function rules()
    {
      return [
        'name' => 'string|required|max:255',
        'company' => 'string|max:255',
        'start' => 'date',
        'end' => 'date',
        'photo' => 'image|optional',
        'url' => 'string',
        'description' => 'string'
      ];
    }

}
