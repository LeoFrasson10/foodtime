<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Pedido;
use \App\Item;
use \App\Itemp;
use DateTime;
use DB;

class carrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $item = \App\Item::find($id);

        $carrinho = session()->get("carrinho");
        
        if(!$carrinho){
            $carrinho = [
                $id => [
                    'id'=> $id,
                    'titulo'=>$item['titulo'],
                    "quantidade"=>1,
                    "descritivo"=>$item['descritivo'],
                    "preco"=>$item['preco']
                ]
            ];
            session()->put("carrinho", $carrinho);
            return view ("carrinho", compact ("carrinho"));
            //return redirect()->back()->with("success", "Produto adicionado ao carrinho com sucesso");
        }
        if(isset($carrinho[$id])){
            $carrinho[$id]["quantidade"]++;

            session()->put("carrinho", $carrinho);
            return view ("carrinho", compact ("carrinho"));
            //return redirect()->back()->with("success", ["Produto adicionado ao carrinho com sucesso"]);
        }
        $carrinho[$id] = [
                'id'=> $id,
                'titulo'=>$item['titulo'],
                "quantidade"=>1,
                "descritivo"=>$item['descritivo'],
                "preco"=>$item['preco']
           
        ];
        
        session()->put("carrinho", $carrinho);
        return view ("carrinho", compact ("carrinho"));
        //return redirect()->back()->with("success", "Produto adicionado ao carrinho com sucesso");        
        //$request->session()->put("carrinho",['id'=> $id,'titulo'=>$item->titulo,"descritivo"=>$item->descritivo,"preco"=>$item->preco]);        
        //$carrinho = $request->session()->all();       
        
       }
    public function salvar(Request $request){
        $dt = new DateTime();
        $carrinho = session()->get("carrinho");

        $pedido = new Pedido();
        $pedido->users_id = auth()->user()->id;
        $pedido->data = $dt->format('Y-m-d');
        $pedido->hora = $dt->format('H:i:s');
        $pedido->status = "Ativo";
        $pedido->save();

        $idped = DB::getPdo()->lastInsertId();

        
        if (is_array($carrinho) || is_object($carrinho))
        {
                 
            foreach ($carrinho as $dado){
                $itempedido = new Itemp();
                $itempedido->pedidos_id = $idped;
                $itempedido->itens_id = $dado["id"];
                $itempedido->quantidade = $dado["quantidade"];
                $itempedido->preco = $dado["preco"]*$dado["quantidade"];
                $itempedido->save();
            }
        }

        $request->session()->forget("carrinho");
        return redirect()->route('welcome');



        //$user = auth()->user()->id;
        
            
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
    public function remover($id)
    {
        $carrinho = session()->get('carrinho');
 
        unset($carrinho->item[$id]);

        session()->forget('carrinho');
 
        session()->put('carrinho', $carrinho);

        return redirect()->back();
    }
}
