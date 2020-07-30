<?php

Route::get('/', 'welcomeController@index')->name("welcome"); 

Route::get('/carrinho/{id}', 'carrinhoController@show')->name("carrinho");

Route::get('/meuspedidos/{id}', 'Admin\pedidoController@meuspedidos')->name("meuspedidos");
Route::get('/meuspedidosdetalhes/{id}/{idp}', 'Admin\pedidoController@meuspedidosdetalhes')->name("meuspedidosdetalhes");

Route::get('/remover/{id}', 'carrinhoController@remover');

Route::group(['middleware'=>['auth']], function(){
    Route::get('/salvar', 'carrinhoController@salvar')->name("salvar");
    Route::prefix("Admin")->namespace("Admin")->name("admin.")->group(function(){

        Route::prefix("categorias")->name("categorias.")->group(function(){
            Route::get('/', 'categoriaController@index')->name("index");
            Route::get('/create', 'categoriaController@create')->name("create");
            Route::post('/categoria', 'categoriaController@categoria')->name("categoria");

            Route::get('/edit/{id}', 'categoriaController@edit')->name("edit");
            Route::post('/update/{id}', 'categoriaController@update')->name("update");
            Route::get('/destroy/{id}', 'categoriaController@destroy')->name("destroy");
            Route::get('/desativar/{id}', 'categoriaController@desativar')->name("desativar");
        });
        Route::prefix("itens")->name("itens.")->group(function(){
            Route::get("/","itemController@index")->name("index");
            Route::get('/create', 'itemController@create')->name("create");
            Route::post('/item', 'itemController@item')->name("item");

            Route::get('/edit/{id}', 'itemController@edit')->name("edit");
            Route::post('/update/{id}', 'itemController@update')->name("update");
            Route::get('/destroy/{id}', 'itemController@destroy')->name("destroy");
            Route::get('/desativar/{id}', 'itemController@desativar')->name("desativar");
        });

        Route::prefix("pedidos")->name("pedidos.")->group(function(){
            Route::get("/","pedidoController@index")->name("index");
            Route::post('/pedidos', 'pedidoController@pedido')->name("pedido");
            Route::get('/aceitar/{id}', 'pedidoController@aceitar')->name("aceitar");
            Route::get('/entregar/{id}', 'pedidoController@entregar')->name("entregar");
            Route::get('/cancelar/{id}', 'pedidoController@cancelar')->name("cancelar");
            Route::get('/detalhes/{id}/{idp}', 'pedidoController@detalhes')->name("detalhes");
        });
    });
});

Auth::routes();
