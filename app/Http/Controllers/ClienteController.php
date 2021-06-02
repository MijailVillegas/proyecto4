<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Barryvdh\DomPDF\Facade as PDF;

class ClienteController extends Controller
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
    public function exportPDF()
    {
        $clientes = Cliente::all();
        $pdf = PDF::loadView('export\clientes', compact('clientes'));

        return $pdf->stream('clientes-report' . date("Y-m-d") . '.pdf');
    }

    public function index()
    {
        //
        $clientes = Cliente::all(); 
        return view('cliente.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cliente.create');
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
        $clientes = new Cliente();
        $clientes->nomcliente = $request->get('nomcliente');
        $clientes->apcliente= $request->get('apcliente');
        $clientes->telcliente= $request->get('telcliente');
        $clientes->emailcliente= $request->get('emailcliente');
        $clientes->fechnaccliente= $request->get('fechnaccliente');
        $clientes->dniclient= $request->get('dniclient');
        $clientes->save();

        return redirect('/clientes');
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
        $cliente = Cliente::find($id);
        return view('cliente.edit')->with('cliente',$cliente);
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
        $clientes = Cliente::find($id);

        $clientes->nomcliente = $request->get('nomcliente');
        $clientes->apcliente= $request->get('apcliente');
        $clientes->telcliente= $request->get('telcliente');
        $clientes->emailcliente= $request->get('emailcliente');
        $clientes->fechnaccliente= $request->get('fechnaccliente');
        $clientes->dniclient= $request->get('dniclient');
        $clientes->save();

        return redirect('/clientes');
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
        $cliente = Cliente::find($id);
        $cliente->delete();

        return redirect('/clientes');
    }
}
