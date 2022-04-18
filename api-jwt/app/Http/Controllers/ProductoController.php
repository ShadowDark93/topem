<?php

namespace App\Http\Controllers;

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
        $producto = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'stock' => 'required',
            'precio' => 'required',
            'iva' => 'required'
        ]);
        
        if ($producto->fails()) {
            return response()->json($producto->errors()->toJson(), 400);
        }

        $producto = Producto::create(array_merge(
            $producto->validate()
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'stock' => 'required|integer',
            'iva' => 'required',
            'precio' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $producto = Producto::Find($id);
        if (isset($producto)) {
            $producto->nombre=$request->get('nombre');
            $producto->stock=$request->get('stock');
            $producto->precio=$request->get('precio');
            $producto->iva=$request->get('iva');
            $producto->estado = $request->get('estado');
            $producto->save();
            
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
     * Activate the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        $producto = Producto::Find($id);
        if (isset($producto)) {
            $producto->estado = '1';
            $producto->save();
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
    public function deactivate($id)
    {
        $producto = Producto::Find($id);
        if (isset($producto)) {
            $producto->estado = '0';
            $producto->save();

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