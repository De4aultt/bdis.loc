<?php

namespace App\Http\Controllers;


use App\Managers;
use App\PhoneNumbers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PhonesController extends Controller
{
    public function index(){
        $phones = PhoneNumbers::all();
        return view('site.phones')->with(['phones' => $phones, 'title' => 'Номери телефонів']);
    }
    public function create()
    {
        $managersid = Managers::select('Manager_pasport_number', 'Surname')->get();
        $managers = [];
        foreach ($managersid as $manager) {
            $managers[$manager->Manager_pasport_number] = $manager->Manager_pasport_number.' '. $manager->Surname ;
        }
        return view('site.content.phones.create')->with([  'managers'=>$managers, 'title' => 'Додати номер телефону']);
    }


    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'Mobile' => 'required',
            'Home' => 'required',
            'Manager_pasport_number' => 'required|numeric'

        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('phone/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $phone = new PhoneNumbers();
            $phone->Mobile = Input::get('Mobile');
            $phone->Home = Input::get('Home');
            $phone->Manager_pasport_number = Input::get('Manager_pasport_number');
            $phone->save();

            // redirect
            // Session::flash('message', 'Картина успішно додано!');
            return redirect('phone');
        }
    }


    public function show($Phone_number_id)
    {
        $phone = PhoneNumbers::find($Phone_number_id);
//        if(!isset($phone)){
//            return redirect('main');
//        }

        return view('site.content.phones.show')
            ->with(['phone' => $phone, 'title' => 'Інформація про номер телефону']);
    }

    public function edit($Phone_number_id)
    {
        // get the nerd
        $phone = PhoneNumbers::find($Phone_number_id);
        $managersid = Managers::select('Manager_pasport_number', 'Surname')->get();
        $managers = [];
        foreach ($managersid as $manager) {
            $managers[$manager->Manager_pasport_number] = $manager->Manager_pasport_number.' '. $manager->Surname ;
        }
        // show the edit form and pass the nerd
        return view('site.content.phones.edit')
            ->with(['phone' => $phone, 'managers'=>$managers, 'title' => 'Редагувати номер телефону']);
    }


    public function update($Phone_number_id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'Mobile' => 'required',
            'Home' => 'required',
            'Manager_pasport_number' => 'required|numeric'

        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('phone/' . $Phone_number_id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $phone = PhoneNumbers::find($Phone_number_id);
            $phone->Mobile = Input::get('Mobile');
            $phone->Home = Input::get('Home');
            $phone->Manager_pasport_number = Input::get('Manager_pasport_number');
            $phone->save();

            // redirect
            //Session::flash('message', 'Картину успішно оновлено!');
            return redirect('phone');
        }
    }

    public function destroy($Phone_number_id)
    {
        // delete
        $phone = PhoneNumbers::find($Phone_number_id);
        $phone->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('phone');
    }

}
