<?php

namespace App\Http\Controllers;

use App\Cheks;
use App\Orders;
use App\Pictures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CheksController extends Controller
{
    public function index(){
        $cheks = Cheks::all();
        return view('site.cheks')->with(['cheks' => $cheks, 'title' => 'Чеки']);
    }

    public function create()
    {
        $ordersid = orders::select('Order_id')->get();
        $orders = [];
        foreach ($ordersid as $order) {
            $orders[$order->Order_id] = $order->Order_id ;
        }
        $picturesid = pictures::select('Picture_id')->get();
        $pictures = [];
        foreach ($picturesid as $picture) {
            $pictures[$picture->Picture_id] = $picture->Picture_id ;
        }
        return view('site.content.cheks.create')->with(['pictures'=>$pictures,'orders'=>$orders, 'title' => 'Додати чек']);
    }


    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'Count' => 'required|numeric',
            'Total_price' => 'required|numeric',
            'Picture_number' => 'required|numeric',
            'Order_number' => 'required|numeric'
        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('chek/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $chek = new Cheks();
            $chek->Count = Input::get('Count');
            $chek->Total_price = Input::get('Total_price');
            $chek->Picture_number = Input::get('Picture_number');
            $chek->Order_number = Input::get('Order_number');
            $chek->save();

            // redirect
            // Session::flash('message', 'Картина успішно додано!');
            return redirect('chek');
        }
    }


    public function show($id)
    {
        $chek = Cheks::find($id);
//        if(!isset($chek)){
//            return redirect('main');
//        }

        return view('site.content.cheks.show')
            ->with(['chek' => $chek, 'title' => 'Інформація про чек']);
    }

    public function edit($id)
    {
        // get the nerd
        $chek = Cheks::find($id);
        $ordersid = orders::select('Order_id')->get();
        $orders = [];
        foreach ($ordersid as $order) {
            $orders[$order->Order_id] = $order->Order_id ;
        }
        $picturesid = pictures::select('Picture_id')->get();
        $pictures = [];
        foreach ($picturesid as $picture) {
            $pictures[$picture->Picture_id] = $picture->Picture_id ;
        }
        // show the edit form and pass the nerd
        return view('site.content.cheks.edit')
            ->with(['chek' => $chek, 'pictures'=>$pictures,'orders'=>$orders, 'title' => 'Редагувати чек']);
    }


    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'Count' => 'required|numeric',
            'Total_price' => 'required|numeric',
            'Picture_number' => 'required|numeric',
            'Order_number' => 'required|numeric'
        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('chek/' .$id. '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $chek = Cheks::find($id);
            $chek->Count = Input::get('Count');
            $chek->Total_price = Input::get('Total_price');
            $chek->Picture_number = Input::get('Picture_number');
            $chek->Order_number = Input::get('Order_number');
            $chek->save();

            // redirect
            //Session::flash('message', 'Картину успішно оновлено!');
            return redirect('chek');
        }
    }

    public function destroy($id)
    {
        // delete
        $chek = Cheks::find($id);
        $chek->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('chek');
    }

}
