<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Requests;

use App\Client;
use File;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clients = Client::all();

      return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('clients.create');
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
        return redirect('clients/create')
        ->withErrors($validator)
        ->withInput();
      } else {
        $file = Input::file('photo');
        $client = new Client;
        if ($file)
        {
          $filePath = public_path() . '/img/clients/';
          $fileName = $file->getClientOriginalName();
          File::exists($filePath) or File::makeDirectory($filePath);
          $image = Image::make($file->getRealPath());
          $image->save($filePath . $fileName);
          $request->photo = '/img/clients/' . $fileName;
        } else {
          $request->photo = '/img/clients/client.png';
        }
        $client->name = $request->name;
        $client->telephone = $request->telephone;
        $client->cellphone = $request->cellphone;
        $client->address = $request->address;
        $client->url = $request->url;
        $client->start = $request->start;
        $client->end = $request->end;
        $client->photo = $request->photo;
        $client->save();
        flash('Create Successful!', 'success');
      }
      return redirect('clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $client = Client::findOrFail($id);
      return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $client = Client::findOrFail($id);
      return view('clients.edit', compact('client'));
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
      $client = Client::findOrFail($id);

      $validator = Validator::make($request->all(), $this->rules());
      if ($validator->fails()) {
        flash('Validation Fails!', 'danger');
        return redirect('clients/' . $client->id . '/edit')
          ->withErrors($validator)
          ->withInput();
      } else {
        $request->photo = '/img/clients/client.png';
      }
      $client->name = $request->name;
      $client->telephone = $request->telephone;
      $client->cellphone = $request->cellphone;
      $client->address = $request->address;
      $client->url = $request->url;
      $client->start = $request->start;
      $client->end = $request->end;
      $client->photo = $request->photo;
      $client->save();
      flash('Update Complete!', 'success');
      return redirect('clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Client::findOrFail($id)->delete();
      flash('Delete Complete!', 'success');
      return redirect('clients');
    }

    public function rules()
    {
      return [
        'name' => 'string|required|max:255|unique:clients',
        'photo' => 'image|optional',
        'cellphone' => 'string|required|max:255',
        'telephone' => 'string|required|max:255',
        'address' => 'string|required|max:255',
        'end' => 'date',
        'start' => 'date',
        'url' => 'string',
      ];
    }
}
