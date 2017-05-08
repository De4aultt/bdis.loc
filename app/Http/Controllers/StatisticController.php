<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Orders;
use App\Pictures;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function Index(){

        $query = Pictures::select('Style')->distinct()->get();
        $styles = [];
        foreach ($query as $type) {
            $styles[$type->Style] = Pictures::where('Style', $type->Style)->count();
        }

        $query = Orders::select('Town')->distinct()->get();
        $towns = [];
        foreach ($query as $type) {
            $towns[$type->Town] = Orders::where('Town', $type->Town)->count();
        }
        $clients = [
            '-20' => 0,
            '20-40' => 0,
            '40-60' => 0,
            '60-80' => 0,
            '80+' => 0,
        ];


        $query = Clients::all();

        foreach ($query as $client) {
            $age = Carbon::parse($client->Birthday)->age;
            if($age < 20){
                $clients['-20']=$clients['-20'] + 1;
            }elseif ($age < 40){
                $clients['20-40']=$clients['20-40'] + 1;
            }elseif ($age < 60){
                $clients['40-60']=$clients['40-60'] + 1;
            }elseif ($age < 80) {
                $clients['60-80'] = $clients['60-80'] + 1;
            }else{
                $clients['80+'] = $clients['80+'] + 1;
            }
        }



        return view('site.statistic')->with(['styles'=> $styles, 'towns' => $towns, 'clients' => $clients,  'title' => 'Статистика']);
    }
}
