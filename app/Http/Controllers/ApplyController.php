<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $apply=new Apply();
        $this->table= $apply->getTable();
    }

    public function register(Request $request){

        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'street'=>'required',
            'house_num'=>'required',
            'post_num'=>'required',
            'post_city'=>'required',
            'iban'=>'required',
        ]);

        $name=$request->name;
        $surname=$request->surname;
        $street=$request->street;
        $house_num=$request->house_num;
        $post_num=$request->post_num;
        $post_city=$request->post_city;
        $iban=$request->iban;

        //todo mozno dodati več validacije itd..


        DB::table($this->table)->insert([
            'registrator_id'=>Auth::user()->id,
            'name'=>$name,
            'surname'=>$surname,
            'street'=>$street,
            'house_number'=>$house_num,
            'post_number'=>$post_num,
            'post_city'=>$post_city,
            'iban'=>$iban,
            'date'=>date('d-m-Y'),
        ]);
        return redirect()->route('home')->with(['message'=> 'Application successful!!']);
    }
}
