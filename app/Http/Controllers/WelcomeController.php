<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Header;
use App\Models\Menu;
use App\Models\Skill;
use App\Models\Social;
use App\Models\Work;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $menu = Menu::all();
        $header = Header::all();
        $about = About::all();
        $skill = Skill::all();
        $work = Work::all();
        $contact = Contact::all();
        $social = Social::all();
        return view('welcome', compact('menu', 'header', 'about', 'skill', 'work', 'contact', 'social'));
    }
}
