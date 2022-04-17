<?php

namespace App\Http\Controllers;

use App\Models\DetalleFactura;
use App\Http\Requests\StoreDetalleFacturaRequest;
use App\Http\Requests\UpdateDetalleFacturaRequest;

class DetalleFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetalleFacturaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetalleFacturaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleFactura  $detalleFactura
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleFactura $detalleFactura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleFactura  $detalleFactura
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleFactura $detalleFactura)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleFactura  $detalleFactura
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalleFactura $detalleFactura)
    {
        //
    }
}
