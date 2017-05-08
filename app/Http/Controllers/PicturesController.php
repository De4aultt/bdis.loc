<?php

namespace App\Http\Controllers;

use App\Designers;
use App\Managers;
use App\Pictures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PicturesController extends Controller
{

    public function index(){
        $pictures = Pictures::all();
        return view('site.pictures')->with(['pictures' => $pictures, 'title' => 'Картини']);
    }


    public function create()
    {

        $designersid = Designers::select('Designer_pasport_number', 'Surname')->get();
        $designers = [];
        foreach ($designersid as $designer) {
            $designers[$designer->Designer_pasport_number] = $designer->Designer_pasport_number.' '. $designer->Surname ;
        }
        return view('site.content.pictures.create')->with([ 'designers' => $designers, 'title' => 'Додати картину']);
    }


    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'Date_made' => 'required',
            'File' => 'required',
            'Style' => 'required',
            'Designer_pasport_number' => 'required|numeric',
            'Price' => 'required|numeric'

        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('picture/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $picture = new Pictures();
            $picture->Date_made = Input::get('Date_made');
            $picture->File = Input::get('File');
            $picture->Style = Input::get('Style');
            $picture->Designer_pasport_number = Input::get('Designer_pasport_number');
            $picture->Price = Input::get('Price');
            $picture->save();

            // redirect
           // Session::flash('message', 'Картина успішно додано!');
            return redirect('picture');
        }
    }


    public function show($Picture_id)
    {
        $picture = Pictures::find($Picture_id);
//        if(!isset($picture)){
//            return redirect('main');
//        }

        return view('site.content.pictures.show')
            ->with(['picture' => $picture, 'title' => 'Інформація про картину']);
    }

    public function edit($Picture_id)
    {
        // get the nerd
        $picture = Pictures::find($Picture_id);
        $designersid = Designers::select('Designer_pasport_number', 'Surname')->get();
        $designers = [];
        foreach ($designersid as $designer) {
            $designers[$designer->Designer_pasport_number] = $designer->Designer_pasport_number.' '. $designer->Surname ;
        }
        return view('site.content.pictures.edit')
            ->with(['picture' => $picture, 'designers' => $designers, 'title' => 'Редагувати картину']);
    }


    public function update($Picture_id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'File' => 'required',
            'Style' => 'required',
            'Designer_pasport_number' => 'required|numeric',
            'Price' => 'required|numeric'
        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('picture/' . $Picture_id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $picture = Pictures::find($Picture_id);
            $picture->File = Input::get('File');
            $picture->Style = Input::get('Style');
            $picture->Designer_pasport_number = Input::get('Designer_pasport_number');
            $picture->Price = Input::get('Price');
            $picture->save();

            // redirect
            //Session::flash('message', 'Картину успішно оновлено!');
            return redirect('picture');
        }
    }

    public function destroy($Picture_id)
    {
        // delete
        $picture = Pictures::find($Picture_id);
        $picture->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('picture');
    }


}
