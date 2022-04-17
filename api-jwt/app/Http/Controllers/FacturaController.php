<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = DB::table('facturas')
            ->join('clientes', 'clientes.id', '=', 'facturas.cliente_id')
            ->join('empresas', 'empresas.id', '=', 'facturas.empresa_id')
            ->select('facturas.id', 'empresas.nit', 'empresas.nombre', 'clientes.tipo_documento', 'clientes.documento', 'facturas.total_factura', 'facturas.created_at', 'facturas.updated_at')
            ->get();

        return $facturas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFacturaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factura = Validator::make($request->all(), [
            'empresa_id' => 'required|integer',
            'cliente_id' => 'required|integer',
            'total_factura' => 'required|numeric',
        ]);

        if ($factura->fails()) {
            return response()->json([
                'error' => $factura->errors()->toJson(),
                'error_code' => 400,
            ], 400);
        }

        $factura = Factura::create(array_merge(
            $factura->validate()
        ));

        return response()->json([
            'message' => 'Factura creada exitosamente!',
            'factura' => $factura,
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factura = DB::table('facturas')
            ->join('clientes', 'clientes.id', '=', 'facturas.cliente_id')
            ->join('empresas', 'empresas.id', '=', 'facturas.empresa_id')
            ->select('facturas.id', 'empresas.nit', 'empresas.nombre', 'clientes.tipo_documento', 'clientes.documento', 'facturas.total_factura', 'facturas.created_at', 'facturas.updated_at')
            ->where('facturas.id', '=', $id)
            ->first();

        if ($factura) {
            return response()->json([
                'message' => 'Factura encontrada!',
                'factura' => $factura,
            ], 201);
        } else {
            return response()->json([
                'error' => 'Error, Factura no encontrada!',
                'error_code' => 400,
            ], 400);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFacturaRequest  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'cliente_id' => 'required|string',
            'total_factura' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $factura = Factura::Find($id);
        if (isset($factura)) {
            $factura->cliente_id = $request->get('cliente_id');
            $factura->total_factura = $request->get('total_factura');
            $factura->save();

            return response()->json([
                'message' => 'Factura modificada exitosamente!',
                'factura' => $factura,
            ], 201);
        } else {
            return response()->json([
                'error' => 'Error, Factura no encontrado!',
                'error_code' => 400,
            ], 400);
        }

    }

}
