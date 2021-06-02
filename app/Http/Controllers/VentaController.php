<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use Illuminate\Support\Facades\Artisan;

class VentaController extends Controller
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
        $ventas = Venta::all(); 
        return view('venta.index')->with('ventas', $ventas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('venta.create');
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
        $ventas = new Venta();
        $ventas->cliente_id = $request->get('cliente_id');
        $ventas->empleado_id = $request->get('empleado_id');
        $ventas->fechventa = $request->get('fechventa');
        $ventas->montotal = $request->get('montotal');
        $ventas->save();

        return redirect('/ventas');

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
        $venta = Venta::find($id);
        return view('venta.edit')->with('venta',$venta);
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
        $venta = Venta::find($id);

        $venta->cliente_id = $request->get('cliente_id');
        $venta->empleado_id = $request->get('empleado_id');
        $venta->fechventa = $request->get('fechventa');
        $venta->montotal = $request->get('montotal');
        $venta->save();

        return redirect('/ventas');
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
        $venta = Venta::find($id);
        $venta->delete();

        return redirect('/ventas');
    }
}
