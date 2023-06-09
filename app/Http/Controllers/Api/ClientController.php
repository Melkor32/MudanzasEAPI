<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ClientResource::collection(Client::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $cliente = Client::create($request->all());

            return response()->json([
                'status' => true,
                'message' => "Cliente creado correctamente",
                'data' => $cliente
            ], 200);
        }catch (Exception $e){
            return response()->json([
                'status' => false,
                'message' => "Error creando el cliente",
                'data' => $cliente
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $cliente)
    {
        return new ClientResource($cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
