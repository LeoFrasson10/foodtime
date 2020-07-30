<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB; 

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth()->User()->tipo == "admin"){
            $categorias = \App\categoria::all();
            return view("Admin.categorias.index", compact("categorias"));
        }
        
    }

    public function create()
    {
        if(Auth()->User()->tipo == "admin"){
            return view("Admin.categorias.create");
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function categoria(Request $request)
    {
        //
        $data = $request->all('descritivo','status');
        $categoria = new \App\categoria();
        $ret = $categoria->create($data);
        
        return redirect()->route("admin.categorias.index");
    }

    public function edit($id){
        if(Auth()->User()->tipo == "admin"){
            $categoria = \App\categoria::find($id);

            return view("Admin.categorias.edit", compact("categoria"));
        }
        
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
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $categoria = \App\categoria::find($id);
        $categoria->update($data);

        
        return redirect()->route("admin.categorias.index");
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
        if(Auth()->User()->tipo == "admin"){
            $categoria = \App\categoria::find($id);
            $categoria->delete();
            
            return redirect()->route("admin.categorias.index");
        }
        
    }
    public function desativar(Request $request, $id){
        if(Auth()->User()->tipo == "admin"){
            $data = $request->all();
            $categoria = \App\categoria::find($id);
            if($categoria->status == "A"){
                $categoria->status = "I";
                $categoria->save();
                return redirect()->route("admin.categorias.index");
            }
            else if ($categoria->status == "I"){
                $categoria->status = "A";
                $categoria->save();
                return redirect()->route("admin.categorias.index");
            }
        }
        
             
        
    }
}
