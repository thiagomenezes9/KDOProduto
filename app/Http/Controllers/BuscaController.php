<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Termo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BuscaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $usuario = Auth::user();

        $termo = new Termo();


        $termo->data = Carbon::now();
        $termo->termo = $request->termo;

        $termo->user()->associate($usuario);


        $termo->save();



        $produtos = Produto::where('descricao','LIKE','%'.$request->termo.'%')->get();





        /*$pesquisa = Produtos::where('erp_status', 'like', '%'.$status.'%')
            ->orWhere('erp_cost','like','%'.$texto.'%')
            ->orWhere('erp_productid','like','%'.$texto.'%')
            ->orWhereHas('descricao', function ($query) use ($texto) {
                $query->where('erp_name', 'like', '%'.$texto.'%');
            })
            ->orderBy('erp_status')*/




        return view('Busca.index',compact('produtos'));



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);

        AcessoController::adicionar($produto);



        return view('Busca.show',compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
