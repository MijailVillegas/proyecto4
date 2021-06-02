<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalle_Venta;
use Illuminate\Support\Facades\Artisan;

class Detalle_VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $detalle_ventas = Detalle_Venta::all(); 
        return view('detalle_venta.index')->with('detalle_ventas', $detalle_ventas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('detalle_venta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $detalle_ventas = new Detalle_Venta();
        $detalle_ventas->venta_id = $request->get('venta_id');
        $detalle_ventas->articulo_id = $request->get('articulo_id');
        $detalle_ventas->cantventa = $request->get('cantventa');
        $detalle_ventas->precioventa = $request->get('precioventa');
        $detalle_ventas->save();

        return redirect('/detalle_ventas');

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
        //
        $detalle_venta = detalle_venta::find($id);
        return view('detalle_venta.edit')->with('detalle_venta',$detalle_venta);
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
        //
        $detalle_venta = detalle_venta::find($id);

        $detalle_venta->venta_id = $request->get('venta_id');
        $detalle_venta->articulo_id = $request->get('articulo_id');
        $detalle_venta->cantventa = $request->get('cantventa');
        $detalle_venta->precioventa = $request->get('precioventa');
        $detalle_venta->save();

        return redirect('/detalle_ventas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $detalle_venta = detalle_venta::find($id);
        $detalle_venta->delete();

        return redirect('/detalle_ventas');
    }
}
