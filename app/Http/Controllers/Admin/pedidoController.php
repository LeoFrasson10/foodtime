<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->User()->tipo == "admin"){
            $pedidos = \App\Pedido::all();
            $users = \App\User::all();
            return view("Admin.pedidos.index", compact("pedidos", "users"));
        }
       
        
    }

    public function aceitar(Request $request, $id){
        if(Auth()->User()->tipo == "admin"){
            $data = $request->all();
            $pedido = \App\Pedido::find($id);
            if($pedido->status == "Ativo"){
                $pedido->status = "Pendente";
                $pedido->save();
                return redirect()->route("admin.pedidos.index");
            } 
        }
        
        
    }

    public function entregar(Request $request, $id){
        if(Auth()->User()->tipo == "admin"){
            $data = $request->all();
            $pedido = \App\Pedido::find($id);
            if($pedido->status == "Pendente"){
                $pedido->status = "Entregue";
                $pedido->save();
                return redirect()->route("admin.pedidos.index");
            }
        }
            
        
        
    }

    public function cancelar(Request $request, $id){
        if(Auth()->User()->tipo == "admin"){
            $data = $request->all();
            $pedido = \App\Pedido::find($id);
            if($pedido->status == "Ativo"){
                $pedido->status = "Cancelado";
                $pedido->save();
            }

            if($pedido->status == "Pendente"){
                $pedido->status = "Cancelado";
                $pedido->save();
            }

            return redirect()->route("admin.pedidos.index");
        }
        
        
    }

    public function detalhes(Request $request,$id,$idp)
    {
        if(Auth()->User()->tipo == "admin"){
            $users = \App\User::find($id);
              
            $pedidos = \App\Pedido::all()->where('users_id',$id);        
            
            $itemp = \App\Itemp::all()->where('pedidos_id',$idp);
        
            $itens = \App\Item::all();
            
            return view("admin.pedidos.detalhes", compact("users", "pedidos", "itens","itemp"));
        }
        
        
    }

    public function meuspedidos(Request $request, $id)
    {
        $pedidos = \App\Pedido::all()->where('users_id', $id);
        return view("meuspedidos", compact("pedidos"));
    }

    public function meuspedidosdetalhes(Request $request,$id,$idp)
    {
        $users = \App\User::find($id);
              
        $pedidos = \App\Pedido::all()->where('users_id',$id);        
        
        $itemp = \App\Itemp::all()->where('pedidos_id',$idp);
    
        $itens = \App\Item::all();
        
        return view("meuspedidosdetalhes", compact("users", "pedidos", "itens","itemp"));
    }
}
