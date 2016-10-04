<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Requests;

use App\Certificate;
use File;

class CertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $certificates = Certificate::all();

      return view('certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('certificates.create');
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
        return redirect('certificates/create')
        ->withErrors($validator)
        ->withInput();
      } else {
        $file = Input::file('photo');
        $certificate = new Certificate;
        if ($file)
        {
          $filePath = public_path() . '/img/certificates/';
          $fileName = $file->getClientOriginalName();
          File::exists($filePath) or File::makeDirectory($filePath);
          $image = Image::make($file->getRealPath());
          $image->save($filePath . $fileName);
          $request->photo = '/img/certificates/' . $fileName;
        } else {
          $request->photo = '/img/certificates/certificate.png';
        }
        $certificate->url = $request->url;
        $certificate->name = $request->name;
        $certificate->date = $request->date;
        $certificate->code = $request->code;
        $certificate->company = $request->company;
        $certificate->photo = $request->photo;
        $certificate->save();
        flash('Create Successful!', 'success');
      }
      return redirect('certificates');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $certificate = Certificate::findOrFail($id);
      return view('certificates.show', compact('certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $certificate = Certificate::findOrFail($id);
      return view('certificates.edit', compact('certificate'));
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
      $certificate = Certificate::findOrFail($id);

      $validator = Validator::make($request->all(), $this->rules());
      if ($validator->fails()) {
        flash('Validation Fails!', 'danger');
        return redirect('certificates/' . $certificate->id . '/edit')
          ->withErrors($validator)
          ->withInput();
      } else {
        $request->photo = '/img/certificates/certificate.png';
      }
      $certificate->url = $request->url;
      $certificate->name = $request->name;
      $certificate->date = $request->date;
      $certificate->code = $request->code;
      $certificate->company = $request->company;
      $certificate->photo = $request->photo;
      $certificate->save();
      flash('Update Complete!', 'success');
      return redirect('certificates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Certificate::findOrFail($id)->delete();
      flash('Delete Complete!', 'success');
      return redirect('certificates');
    }


    public function rules()
    {
      return [
        'name' => 'string|required|max:255|unique:certificates',
        'photo' => 'image|optional',
        'company' => 'string|required|max:255',
        'code' => 'string|max:255',
        'date' => 'date',
        'url' => 'string',
      ];
    }
}
