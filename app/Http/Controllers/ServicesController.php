<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Requests;

use App\Service;
use File;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $services = Service::all();

      return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('services.create');
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
        return redirect('services/create')
        ->withErrors($validator)
        ->withInput();
      }
      $service = new Service;
      $service->name = $request->name;
      $service->url = $request->url;
      $service->icon = $request->icon;
      $service->user = $request->user;
      $service->save();
      Flash('Create Successful!', 'success');
      return redirect('services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $service = Service::findOrFail($id);
      return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $service = Service::findOrFail($id);
      return view('services.edit', compact('service'));
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
      $service = Service::findOrFail($id);

      $validator = Validator::make($request->all(), $this->rules());
      if ($validator->fails()) {
        Flash('Validation Fails!', 'danger');
        return redirect('services/' . $service->id . '/edit')
          ->withErrors($validator)
          ->withInput();
      }
      $service->name = $request->name;
      $service->url = $request->url;
      $service->icon = $request->icon;
      $service->user = $request->user;
      $service->save();

      Flash('Update Complete!', 'success');
      return redirect('services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Service::findOrFail($id)->delete();
      Flash('Delete Complete!', 'success');
      return redirect('services');
    }

    public function rules()
    {
      return [
        'name' => 'string|required|max:255',
        'icon' => 'string|required',
        'url' => 'string|required',
        'user' => 'string|required'
      ];
    }
}
