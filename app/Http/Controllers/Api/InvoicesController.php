<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InvoicesResource;
use App\Models\Invoices;
use Exception;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return InvoicesResource::collection(Invoices::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $factura = Invoices::create($request->all());

            return response()->json([
                'status' => true,
                'message' => "Factura creada correctamente",
                'data' => $factura
            ], 200);
        }catch (Exception $e){
            return response()->json([
                'status' => false,
                'message' => "Error creando la factura",
                'data' => $factura
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoices $factura)
    {
        return new InvoicesResource($factura);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoices $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoices $invoices)
    {
        //
    }
}
