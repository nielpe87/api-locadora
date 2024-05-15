<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filmes = Filme::with('categorias')->get();

        return response()->json($filmes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $filme = new Filme;

        $filme->titulo = $request->titulo;
        $filme->classificacao = $request->classificacao;

        $filme->save();

        $filme->categorias()->attach($request->categorias);

        return response()->json($filme, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Filme $filme)
    {
        $filme = Filme::with("categorias")->find($filme->id);
        return response()->json($filme);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filme $filme)
    {
        $filme->titulo = $request->titulo;
        $filme->classificacao = $request->classificacao;
        $filme->update();

        $filme->categorias()->sync($request->categorias);

        return response()->json($filme, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filme $filme)
    {
        $filme->delete();

        return response()->json("Excluido com sucesso!");
    }
}
