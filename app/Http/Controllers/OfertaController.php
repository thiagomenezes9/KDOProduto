<?php

namespace App\Http\Controllers;

use App\Oferta;
use App\Produto;
use App\Supermercado;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user();

        $ofertas = Oferta::all()->where('dt_fim','>=',Carbon::now());

        if($usuario->tipo == 'LOJA'){
            $ofertas = Oferta::all()->where('supermercado_id','=',$usuario->supermercado_id)
                ->where('dt_fim','>=',Carbon::now());


            /*$ofertas = DB::table('ofertas')->where([
                ['supermercado_id', '=', '$usuario->supermercado_id'],
                ['dt_fim', '>=', Carbon::now()]
                ])
                ->get();*/


        }

        return view('Oferta.index',compact('ofertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = Produto::all();
        $supermercados = Supermercado::all();
        return view('Oferta.create',compact('produtos','supermercados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'valor' => 'required',
            'produto' => 'required',
            'supermercado' =>'required',
            'dt_ini' =>'required|date',
            'dt_fim' =>'required|date|after:'.Carbon::now()

        ]);


        $produto = Produto::where('descricao',$request->produto)->get();
        $supermercado = Supermercado::find($request->supermercado);

        $oferta = new Oferta();


        $oferta->valor = $request->valor;
        $oferta->dt_ini = $request->dt_ini;
        $oferta->dt_fim = $request->dt_fim;
        $oferta->ativo = $request->ativo;
        $oferta->supermercado()->associate($supermercado);
        $oferta->produto()->associate($produto[0]);



        $oferta->save();

        return redirect('ofertas');

        /**
         *
         Apos cadastrar oferta enviar e-mail para todos que tem interresse no mesmo produto.
         */


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function show(Oferta $oferta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oferta = Oferta::find($id);

        return view('Oferta.edit',compact('oferta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'valor' => 'required',
            'produto' => 'required',
            'supermercado' =>'required',
            'dt_ini' =>'required|date|after:'.Carbon::now(),
            'dt_fim' =>'required|date|after:'.Carbon::now()

        ]);

        $oferta = Oferta::find($id);



        $produto = Produto::find($oferta->produto_id);
        $supermercado = Supermercado::find($request->supermercado);




        $oferta->valor = $request->valor;

        $oferta->supermercado()->associate($supermercado);
        $oferta->produto()->associate($produto);

        $oferta->dt_ini = $request->dt_ini;
        $oferta->dt_fim = $request->dt_fim;

        $oferta->ativo = $request->ativo;


        $oferta->save();

        return redirect('ofertas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oferta = Oferta::find($id);

        $oferta->delete();

        return redirect('ofertas');
    }
}
