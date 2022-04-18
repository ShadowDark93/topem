<?php

namespace App\Http\Controllers;

use App\Models\DetalleFactura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class DetalleFacturaController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleFactura  $detalleFactura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalle = DB::table('detalle_facturas')
                    ->join('productos','productos.id','=','detalle_facturas.producto_id')
                    ->select('detalle_facturas.factura_id','detalle_facturas.producto_id','productos.nombre','productos.precio','productos.stock','productos.iva','detalle_facturas.valor_unitario','detalle_facturas.valor_total')
                    ->where('factura_id','=',$id)
                    ->get();
        if ($detalle->count()>0) {
            return response()->json([
                'message' => 'Detalle de Factura encontrado!',
                'factura' => $detalle,
            ], 200);
        } else {
            return response()->json([
                'error' => 'Error, Factura no encontrada!',
                'error_code' => 400,
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetalleFacturaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalle = Validator::make($request->all(), [
            'factura_id' => 'required|integer',
            'producto_id' => 'required|integer',
            'cantidad' => 'required|integer',
            'valor_unitario' => 'required',
            'valor_total' => 'required',
        ]);

        if ($detalle->fails()) {
            return response()->json([
                'error' => $detalle->errors()->toJson(),
                'error_code' => 400,
            ], 400);
        }

        $detalle = DetalleFactura::create(array_merge(
            $detalle->validate()
        ));

        return response()->json([
            'message' => 'Detalle de Factura creado exitosamente!',
            'detalle' => $detalle,
        ], 201);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetalleFacturaRequest  $request
     * @param  \App\Models\DetalleFactura  $detalleFactura
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetalleFacturaRequest $request, DetalleFactura $detalleFactura)
    {
        //
    }

}
