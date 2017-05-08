<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Pictures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{

    public function index()
    {
        if (Auth::user()->position == 'Менеджер') {
            $personals = Clients::where('Manager_Pasport_Number', Auth::user()->passport_number)->get();
            $title = 'Мої клієнти';
            $position = 'Менеджер';
        } elseif (Auth::user()->position == 'Дизайнер'){
            $personals = Pictures::where('Designer_Pasport_Number', Auth::user()->passport_number)->get();
            $title = 'Мої картини';
            $position = 'Дизайнер';
            }
        return view('site.personals')->with(['personals' => $personals, 'position'=>$position, 'title' => $title]);
    }

}
