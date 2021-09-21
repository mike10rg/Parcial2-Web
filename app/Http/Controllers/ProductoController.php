<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $productos=DB::table('productos')->select('Id','Nombre','Precio_Unitario','Existencia','Categoria')
                                         ->where('Nombre','LIKE','%'.$texto.'%')
                                         ->orderBy('Precio_Unitario','asc')
                                         ->paginate(10);
        return view('producto.index',compact('productos','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->Nombre=$request->input('Nombre');
        $producto->Precio_Unitario=$request->input('Precio_Unitario');
        $producto->Existencia=$request->input('Existencia');
        $producto->Categoria=$request->input('Categoria');
        $producto->save();
        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        return view('producto.editar',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto=Producto::findOrFail($id);
        $producto->Nombre=$request->input('Nombre');
        $producto->Precio_Unitario=$request->input('Precio_Unitario');
        $producto->Existencia=$request->input('Existencia');
        $producto->Categoria=$request->input('Categoria');
        $producto->save();
        return redirect()->route('producto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
