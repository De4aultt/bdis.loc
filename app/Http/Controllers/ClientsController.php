<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Managers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ClientsController extends Controller
{
    public function index(){
        $clients = Clients::all();
        return view('site.clients')->with(['clients' => $clients, 'title' => 'Клієнти']);
    }
    public function create()
    {

        $managersid = Managers::select('Manager_pasport_number', 'Surname')->get();
        $managers = [];
        foreach ($managersid as $manager) {
            $managers[$manager->Manager_pasport_number] = $manager->Manager_pasport_number.' '. $manager->Surname ;
        }
        return view('site.content.clients.create')->with([ 'managers'=>$managers,'title' => 'Додати клієнта']);
    }


    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'Surname' => 'required',
            'Name' => 'required',
            'Father_name' => 'required',
            'Birthday' => 'required',
            'Gender' => 'required',
            'Manager_Pasport_Number' => 'required|numeric'

        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('client/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $client = new clients();
            $client->Client_Number = Input::get('Client_Number');
            $client->Surname = Input::get('Surname');
            $client->Name = Input::get('Name');
            $client->Father_name = Input::get('Father_name');
            $client->Birthday = Input::get('Birthday');
            $client->Gender = Input::get('Gender');
            $client->Manager_Pasport_Number = Input::get('Manager_Pasport_Number');
            $client->save();

            // redirect
            // Session::flash('message', 'Картина успішно додано!');
            return redirect('client');
        }
    }


    public function show($Client_Number)
    {
        $client = Clients::find($Client_Number);
//        if(!isset($client)){
//            return redirect('main');
//        }

        return view('site.content.clients.show')
            ->with(['client' => $client, 'title' => 'Інформація про клієнта']);
    }

    public function edit($Client_Number)
    {
        // get the nerd
        $client = Clients::find($Client_Number);
        $managersid = Managers::select('Manager_pasport_number', 'Surname')->get();
        $managers = [];
        foreach ($managersid as $manager) {
            $managers[$manager->Manager_pasport_number] = $manager->Manager_pasport_number.' '. $manager->Surname ;
        }
        // show the edit form and pass the nerd
        return view('site.content.clients.edit')
            ->with(['client' => $client, 'managers'=>$managers, 'title' => 'Редагувати клієнта']);
    }


    public function update($Client_Number)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'Surname' => 'required',
            'Name' => 'required',
            'Father_name' => 'required',
            'Birthday' => 'required',
            'Gender' => 'required',
            'Manager_Pasport_Number' => 'required|numeric'

        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('client/' . $Client_Number . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $client = Clients::find($Client_Number);
            $client->Surname = Input::get('Surname');
            $client->Name = Input::get('Name');
            $client->Father_name = Input::get('Father_name');
            $client->Birthday = Input::get('Birthday');
            $client->Gender = Input::get('Gender');
            $client->Manager_Pasport_Number = Input::get('Manager_Pasport_Number');
            $client->save();

            // redirect
            //Session::flash('message', 'Картину успішно оновлено!');
            return redirect('client');
        }
    }

    public function destroy($Client_Number)
    {
        // delete
        $client = Clients::find($Client_Number);
        $client->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('client');
    }

}
