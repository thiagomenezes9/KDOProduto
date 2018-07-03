<?php

namespace App\Http\Controllers;

use App\Pais;
use App\Publicacao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        return view('welcome');
    }




    public function perfil(){
        $usuario = Auth::user();
        $pais = Pais::all();




        return view('user.perfil',compact('usuario','pais'));
    }


}
