<?php

namespace App\Http\Controllers;


use App\Cheks;
use App\Clients;
use App\Designers;
use App\Managers;
use App\Orders;
use App\PhoneNumbers;
use App\Pictures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class MainController extends Controller
{
    public function Index(){

        $orders = Orders::all()->count();
        $pictures = Pictures::all()->count();
        $designers = Designers::all()->count();
        $managers = Managers::all()->count();
        $clients = Clients::all()->count();
        $cheks = Cheks::all()->count();
        $phones = PhoneNumbers::all()->count();
        $counts = [
            'orders' => $orders,
            'pictures' => $pictures,
            'designers' => $designers,
            'managers' => $managers,
            'clients' => $clients,
            'cheks' => $cheks,
            'phones' => $phones
        ];

        return view('site.main')->with(['counts' => $counts, 'title' => 'Майстерня картин']);
    }


    public function Noaccess(){
        //logout
        return view('site.noaccess')->with([ 'title' => 'Немає доступу']);
    }


    public function password(){

        $user = Auth::user();
        return view('site.password')->with(['user' => $user, 'title' => 'Змінити пароль']);

    }


    public function update()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'password' => 'required',
        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('password/')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            Auth::user()->password = bcrypt(Input::get('password'));
            Auth::user()->save();

            // redirect
            //Session::flash('message', 'Картину успішно оновлено!');
            return redirect('/');
        }
    }

}
