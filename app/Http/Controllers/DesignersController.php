<?php

namespace App\Http\Controllers;

use App\Designers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DesignersController extends Controller
{
    public function index(){
        $designers = Designers::all();
        return view('site.designres')->with(['designers' => $designers, 'title' => 'Дизайнери']);
    }
    public function create()
    {


        return view('site.content.designers.create')->with([ 'title' => 'Додати дизайнера']);
    }


    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'Designer_pasport_number' => 'required|numeric|unique:designers',
            'Surname' => 'required',
            'Name' => 'required',
            'Father_name' => 'required',
            'Salary' => 'required|numeric',
            'Gender' => 'required',
            'Email' => 'required'

        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('designer/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $designer = new Designers();
            $designer->Designer_pasport_number = Input::get('Designer_pasport_number');
            $designer->Surname = Input::get('Surname');
            $designer->Name = Input::get('Name');
            $designer->Father_name = Input::get('Father_name');
            $designer->Salary = Input::get('Salary');
            $designer->Gender = Input::get('Gender');
            $designer->Email = Input::get('Email');
            $designer->save();


            $user = new User();
            $user->passport_number = Input::get('Designer_pasport_number');
            $user->position = 'Дизайнер';
            $user->password = bcrypt('root');
            $user->surname = Input::get('Surname');
            $user->name = Input::get('Name');
            $user->save();

            // redirect
            // Session::flash('message', 'Картина успішно додано!');
            return redirect('designer');
        }
    }


    public function show($Designer_pasport_number)
    {
        $designer = Designers::find($Designer_pasport_number);
//        if(!isset($designer)){
//            return redirect('main');
//        }

        return view('site.content.designers.show')
            ->with(['designer' => $designer, 'title' => 'Інформація про дизайнера']);
    }

    public function edit($Designer_pasport_number)
    {
        // get the nerd
        $designer = Designers::find($Designer_pasport_number);

        // show the edit form and pass the nerd
        return view('site.content.designers.edit')
            ->with(['designer' => $designer, 'title' => 'Редагувати дизайнера']);
    }


    public function update($Designer_pasport_number)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'Designer_pasport_number' => 'required|numeric',
            'Surname' => 'required',
            'Name' => 'required',
            'Father_name' => 'required',
            'Salary' => 'required|numeric',
            'Gender' => 'required',
            'Email' => 'required'
        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('designer/' . $Designer_pasport_number . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $designer = Designers::find($Designer_pasport_number);
            $designer->Designer_pasport_number = Input::get('Designer_pasport_number');
            $designer->Surname = Input::get('Surname');
            $designer->Name = Input::get('Name');
            $designer->Father_name = Input::get('Father_name');
            $designer->Salary = Input::get('Salary');
            $designer->Gender = Input::get('Gender');
            $designer->Email = Input::get('Email');
            $designer->save();

            // redirect
            //Session::flash('message', 'Картину успішно оновлено!');
            return redirect('designer');
        }
    }

    public function destroy($Designer_pasport_number)
    {
        // delete
        $designer = Designers::find($Designer_pasport_number);
        $user = User::where('passport_number',$Designer_pasport_number);
        $user->delete();
        $designer->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('designer');
    }

}
