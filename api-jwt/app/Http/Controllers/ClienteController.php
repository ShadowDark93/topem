<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return $clientes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = Validator::make($request->all(), [
            'tipo_documento' => 'required|string',
            'documento' => 'required|integer|unique:clientes',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'correo' => 'required|email',
            'telefono' => 'required|integer',
        ]);

        if ($cliente->fails()) {
            return response()->json([
                'error' => $cliente->errors()->toJson(),
                'error_code' => 400,
            ], 400);
        }

        $cliente = Cliente::create(array_merge(
            $cliente->validate()
        ));

        return response()->json([
            'message' => 'Usuario creado exitosamente!',
            'cliente' => $cliente,
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::Find($id);
        if (isset($cliente)) {
            return response()->json([
                'message' => 'Cliente encontrado!',
                'cliente' => $cliente,
            ], 201);
        } else {
            return response()->json([
                'error' => 'Error, Producto no encontrado!',
                'error_code' => 400,
            ], 400);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClienteRequest  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tipo_documento' => 'required|string',
            'documento' => 'required|integer',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'correo' => 'required|email',
            'telefono' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $cliente = Cliente::Find($id);
        if (isset($cliente)) {
            $cliente->tipo_documento = $request->get('tipo_documento');
            $cliente->documento = $request->get('documento');
            $cliente->nombres = $request->get('nombres');
            $cliente->apellidos = $request->get('apellidos');
            $cliente->correo = $request->get('correo');
            $cliente->telefono = $request->get('telefono');
            $cliente->estado = $request->get('estado');
            $cliente->save();

            return response()->json([
                'message' => 'Producto desactivado exitosamente!',
                'cliente' => $cliente,
            ], 201);
        } else {
            return response()->json([
                'error' => 'Error, Producto no encontrado!',
                'error_code' => 400,
            ], 400);
        }

    }

}