<?php

namespace App\Http\Controllers;

use App\Managers;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class OrdersController extends Controller
{
    public function index(){
        $orders = Orders::all();

        return view('site.orders')->with(['orders' => $orders, 'title' => 'Замовлення']);
    }
    public function create()
    {
        $managersid = Managers::select('Manager_pasport_number', 'Surname')->get();
        $managers = [];
        foreach ($managersid as $manager) {
            $managers[$manager->Manager_pasport_number] = $manager->Manager_pasport_number.' '. $manager->Surname ;
        }
        //dd($managers);
        return view('site.content.orders.create')->with([ 'managers'=>$managers,'title' => 'Додати замовлення']);
    }


    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'Order_Date' => 'required',
            'Town' => 'required',
            'Street' => 'required',
            'House' => 'required',
            'Manager_pasport_number' => 'required|numeric'

        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('order/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $order = new Orders();
            $order->Order_id = Input::get('Order_id');
            $order->Order_Date = Input::get('Order_Date');
            $order->Town = Input::get('Town');
            $order->Street = Input::get('Street');
            $order->House = Input::get('House');
            $order->Manager_pasport_number = Input::get('Manager_pasport_number');
            $order->save();

            // redirect
            // Session::flash('message', 'Картина успішно додано!');
            return redirect('order');
        }
    }


    public function show($Order_id)
    {
        $order = Orders::find($Order_id);
//        if(!isset($order)){
//            return redirect('main');
//        }

        return view('site.content.orders.show')
            ->with(['order' => $order, 'title' => 'Інформація про замовлення']);
    }

    public function edit($Order_id)
    {
        // get the nerd
        $order = Orders::find($Order_id);
        $managersid = Managers::select('Manager_pasport_number', 'Surname')->get();
        $managers = [];
        foreach ($managersid as $manager) {
            $managers[$manager->Manager_pasport_number] = $manager->Manager_pasport_number.' '. $manager->Surname ;
        }

        // show the edit form and pass the nerd
        return view('site.content.orders.edit')
            ->with(['order' => $order, 'managers'=>$managers, 'title' => 'Редагувати замовлення']);
    }


    public function update($Order_id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(

            'Town' => 'required',
            'Street' => 'required',
            'House' => 'required',
            'Manager_pasport_number' => 'required|numeric'

        );
        $validator = validator(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('order/' . $Order_id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $order = Orders::find($Order_id);
            $order->Town = Input::get('Town');
            $order->Street = Input::get('Street');
            $order->House = Input::get('House');
            $order->Manager_pasport_number = Input::get('Manager_pasport_number');
            $order->save();

            // redirect
            //Session::flash('message', 'Картину успішно оновлено!');
            return redirect('order');
        }
    }

    public function destroy($Order_id)
    {
        // delete
        $order = Orders::find($Order_id);
        $order->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('order');
    }

}
