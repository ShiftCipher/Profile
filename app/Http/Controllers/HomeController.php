<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Certificate;
use App\Client;
use App\Course;
use App\Language;
use App\Photo;
use App\Project;
use App\Service;
use App\Skill;
use App\Study;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $certificates = Certificate::all()->sortBy('date');
      $clients = Client::all()->sortBy('name');
      $courses = Course::all()->sortBy('date');
      $languages = Language::all()->sortBy('name');
      $photos = Photo::all()->sortBy('create_at');
      $projects = Project::all()->sortBy('end');
      $services = Service::all()->sortBy('id');
      $skills = Skill::all()->sortBy('name');
      $studies = Study::all()->sortBy('end');
      $user = Auth::user();

      return view('home', compact(
      'certificates', 'clients', 'courses', 'languages',
      'photos', 'projects', 'services', 'skills',
      'studies', 'user'
      ));
    }
}
