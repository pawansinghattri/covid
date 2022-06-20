<?php

namespace App\Http\Controllers;

use App\Models\Covid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CovidController extends Controller
{
    public function index(Request $request){
        $response=Http::get('https://api.covid19api.com/summary');
        $record=$response->json();
        if(Covid::exists()){
        }else{
            foreach($record['Countries'] as $rec){
                $covid=Covid::create([
                    'Country'=> $rec['Country'],
                    'CountryCode'=> $rec['CountryCode'],
                    'Slug'=> $rec['Slug'],
                    'TotalConfirmed'=> $rec['TotalConfirmed'],
                ]);
            }
        }
        $data=Covid::Paginate(10);
        if ($request->isMethod('post')) {
            $search=Covid::get()->where('Country', $request->input('search')) ;
        return view('search', ['search'=>$search]);

        }
        $data->appends(['sort' => 'Country']);
        return view('welcome', ['data'=>$data]);

    }
}
