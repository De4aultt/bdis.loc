<?php

namespace App\Http\Controllers;

use App\Managers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ManagersController extends Controller
{
    public function index(){
        $managers = Managers::all();
        return view('site.managers')->with(['managers' => $managers, 'title' => 'Менеджери']);
    }


    public function create()
    {


        return view('site.content.managers.create')->with([ 'title' => 'Додати менеджера']);
    }


    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'Manager_pasport_number' => 'required|numeric',
            'Surname' => 'required',
            'Name' => 'required',
            'Father_name' => 'required',
            'Salary' => 'required|numeric',
            'Birthday' => 'required'
        );

        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('manager/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $manager = new Managers();
            $manager->Manager_pasport_number = Input::get('Manager_pasport_number');
            $manager->Surname = Input::get('Surname');
            $manager->Name = Input::get('Name');
            $manager->Father_name = Input::get('Father_name');
            $manager->Salary = Input::get('Salary');
            $manager->Birthday = Input::get('Birthday');
            $manager->save();

            $user = new User();
            $user->passport_number = Input::get('Manager_pasport_number');
            $user->position = 'Менеджер';
            $user->password = bcrypt('root');
            $user->surname = Input::get('Surname');
            $user->name = Input::get('Name');
            $user->save();


            // redirect
            // Session::flash('message', 'Картина успішно додано!');
            return redirect('manager');
        }
    }


    public function show($Manager_pasport_number)
    {
        $manager = Managers::find($Manager_pasport_number);
//        if(!isset($manager)){
//            return redirect('main');
//        }

        return view('site.content.managers.show')
            ->with(['manager' => $manager, 'title' => 'Інформація про менеджера']);
    }

    public function edit($Manager_pasport_number)
    {
        // get the nerd
        $manager = Managers::find($Manager_pasport_number);

        // show the edit form and pass the nerd
        return view('site.content.managers.edit')
            ->with(['manager' => $manager, 'title' => 'Редагувати менеджера']);
    }


    public function update($Manager_pasport_number)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'Manager_pasport_number' => 'required|numeric',
            'Surname' => 'required',
            'Name' => 'required',
            'Father_name' => 'required',
            'Salary' => 'required|numeric',
            'Birthday' => 'required'
        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('manager/' . $Manager_pasport_number . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $manager = Managers::find($Manager_pasport_number);
            $manager->Manager_pasport_number = Input::get('Manager_pasport_number');
            $manager->Surname = Input::get('Surname');
            $manager->Name = Input::get('Name');
            $manager->Father_name = Input::get('Father_name');
            $manager->Salary = Input::get('Salary');
            $manager->Birthday = Input::get('Birthday');
            $manager->save();

            // redirect
            //Session::flash('message', 'Картину успішно оновлено!');
            return redirect('manager');
        }
    }

    public function destroy($Manager_pasport_number)
    {
        // delete
        $manager = Managers::find($Manager_pasport_number);
        $manager->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('manager');
    }

}
