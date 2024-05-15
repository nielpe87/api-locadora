<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::with('fones')->get();

        return response()->json($clientes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $cliente = new Cliente;

            $cliente->nome = $request->nome;
            $cliente->cpf = $request->cpf;
            $cliente->email = $request->email;

            $cliente->save();

            foreach ($request->fones as $fone) {

                $cliente->fones()->create([
                    "numero" => $fone
                ]);
            }

            DB::commit();

            return response()->json($cliente,201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json($th->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return response()->json($cliente,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {

        $cliente->nome = $request->nome;
        if($request->cpf != $request->cpf){
            $cliente->cpf = $request->cpf;
        }
        $cliente->email = $request->email;

        $cliente->update();

        return response()->json($cliente,200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->fones()->delete();
        $cliente->delete();

        return response()->json("excluído com sucesso!", 200);
    }
}
