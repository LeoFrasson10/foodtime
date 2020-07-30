<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\categoria;

class itemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->User()->tipo == "admin"){
            $itens = \App\Item::all();
            $categorias = \App\Categoria::all();
            return view("Admin.itens.index", compact("itens",'categorias'));
        }
        
        
    }

    public function create()
    {
        if(Auth()->User()->tipo == "admin"){
            $categorias = \App\Categoria::all('id','descritivo','status');
 
            return view("Admin.itens.create",compact("categorias"));
        }
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function item(Request $request)
    {
        //
        $data = $request->all();
        $item = new \App\Item();
        $categoria = \App\Categoria::find($data['categorias']); 
   
        $item = $categoria->Item()->create($data);  
        
        return redirect()->route('admin.itens.index');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
  
    public function edit($id)
    {
        if(Auth()->User()->tipo == "admin"){
            $categorias = \App\Categoria::all(["id", "descritivo","status"]);
            $item = \App\Item::find($id);
            //dd($curso);
            return view('Admin.itens.edit', compact('categorias', 'item'));
        }
        
        
    }
    public function update(Request $request, $id)
    {
        //
        $dados = $request->all();
        $item = \App\Item::find($id);
        $item->update($dados);

        return redirect()->route('admin.itens.index');
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
    
    public function desativar(Request $request, $id)
    {
        if(Auth()->User()->tipo == "admin"){
            $data = $request->all();
            $item = \App\item::find($id);
            if($item->status == "A"){
                $item->status = "I";
                $item->save();
                return redirect()->route("admin.itens.index");
            }
            else if ($item->status == "I"){
                $item->status = "A";
                $item->save();
                return redirect()->route("admin.itens.index");
            }
        }
        
        
    }
}
