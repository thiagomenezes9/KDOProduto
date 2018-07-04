<?php

namespace App\Http\Controllers;

use App\Preco;
use App\Produto;
use App\Supermercado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user();

        $precos = Preco::all()->where('ativo','=','1');

        if($usuario->tipo == 'LOJA'){
            $precos = Preco::all()->where('supermercado_id','=',$usuario->supermercado_id)
                                    ->where('ativo','=','1');
        }

        return view('Precos.index',compact('precos'));

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
        return view('Precos.create',compact('produtos','supermercados'));
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

        ]);


        $produto = Produto::where('descricao',$request->produto)->get();
        $supermercado = Supermercado::find($request->supermercado);

        $preco = new Preco();


        $preco->valor = $request->valor;
        $preco->ativo = $request->ativo;
        $preco->supermercado()->associate($supermercado);
        $preco->produto()->associate($produto[0]);

        $preco->save();

        return redirect('precos');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Preco  $preco
     * @return \Illuminate\Http\Response
     */
    public function show(Preco $preco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Preco  $preco
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preco = Preco::find($id);

        return view('Preco.edit',compact('preco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Preco  $preco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'valor' => 'required',
            'produto' => 'required',
            'supermercado' =>'required',

        ]);

        $precoOld = Preco::find($id);

        $precoOld->ativo = '0';

        $precoOld->save();




        $produto = Produto::find($precoOld->produto_id);
        $supermercado = Supermercado::find($request->supermercado);

        $preco = new Preco();


        $preco->valor = $request->valor;
        $preco->ativo = $request->ativo;
        $preco->supermercado()->associate($supermercado);
        $preco->produto()->associate($produto);

        $preco->save();

        return redirect('precos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Preco  $preco
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preco = Preco::find($id);

        $preco->ativo = '0';

        $preco->save();
        return redirect('precos');
    }
}
