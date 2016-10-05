<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Requests;

use App\Language;
use File;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $languages = Language::all();

      return view('languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('languages.create');
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

        return redirect('languages/create')
        ->withErrors($validator)
        ->withInput();
      } else {
        $file = Input::file('photo');
        if ($file)
        {
          $filePath = public_path() . '/img/languages/';
          $fileName = $file->getClientOriginalName();
          File::exists($filePath) or File::makeDirectory($filePath);
          $image = Image::make($file->getRealPath());
          $image->save($filePath . $fileName);
          $request->photo = '/img/languages/' . $fileName;
        } else {
          $request->photo = '/img/languages/language.png';
        }

        $language = new Language;
        $language->name = $request->name;
        $language->level = $request->level;
        $language->photo = $request->photo;
        $language->save();

        Flash('Create Successful!', 'success');
      }
      return redirect('languages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $language = Language::findOrFail($id);
      return view('languages.show', compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $language = Language::findOrFail($id);
      return view('languages.edit', compact('language'));
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
      $language = Language::findOrFail($id);

      $validator = Validator::make($request->all(), $this->rules());
      if ($validator->fails()) {
        flash('Validation Fails!', 'danger');
        return redirect('languages/' . $language->id . '/edit')
          ->withErrors($validator)
          ->withInput();
      } else {
        $request->photo = '/img/languages/language.png';
      }
      $language->name = $request->name;
      $language->photo = $request->photo;
      $language->level = $request->level;
      $language->save();
      flash('Update Complete!', 'success');
      return redirect('languages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Language::findOrFail($id)->delete();
      flash('Delete Complete!', 'success');
      return redirect('languages');
    }

    public function rules()
    {
      return [
        'name' => 'string|required|max:255',
        'photo' => 'image|optional',
        'level' => 'integer',
      ];
    }
}
