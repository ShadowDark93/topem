<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return $productos;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $producto = Producto::Find($id);
        if (isset($producto)) {
            return response()->json([
                'message' => 'Producto encontrado!',
                'producto' => $producto,
            ], 201);
        } else {
            return response()->json([
                'error' => 'Error, Producto no encontrado!',
                'error_code' => 400,
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:productos',
            'cantidad' => 'required|integer',
            'precio' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $producto = Producto::create(array_merge(
            $validator->validate()
        ));

        return response()->json([
            'message' => 'Usuario creado exitosamente!',
            'producto' => $producto,
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'cantidad' => 'required|integer',
            'precio' => 'required|integer',
            'estado' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $producto = Producto::update(array_merge(
            $validator->validate()
        ));

        return response()->json([
            'message' => 'Usuario creado exitosamente!',
            'producto' => $producto,
        ], 201);

    }

    /**
     * Activate the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function activate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'estado' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $producto = Producto::Find($id);
        if (isset($producto)) {
            $producto->estado = '1';

            return response()->json([
                'message' => 'Producto desactivado exitosamente!',
                'producto' => $producto,
            ], 201);
        } else {
            return response()->json([
                'error' => 'Error, Producto no encontrado!',
                'error_code' => 400,
            ], 400);
        }

    }

    /**
     * Desactivar the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'estado' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $producto = Producto::Find($id);
        if (isset($producto)) {
            $producto->estado = '0';

            return response()->json([
                'message' => 'Producto desactivado exitosamente!',
                'producto' => $producto,
            ], 201);
        } else {
            return response()->json([
                'error' => 'Error, Producto no encontrado!',
                'error_code' => 400,
            ], 400);
        }

    }
}