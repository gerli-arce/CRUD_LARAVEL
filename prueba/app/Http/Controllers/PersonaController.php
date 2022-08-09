<?php

namespace App\Http\Controllers;

use App\Models\persona;
use Illuminate\Http\Request;


class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('personas.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = [];
        try {
            $persona = new persona();
            $persona -> nombres = $request->nombres;
            $persona -> apellidos = $request->apellidos;
            $persona -> dni = $request->dni;
            $persona -> address = $request->address;
            $persona->save();

            $response['status'] = 200;
            $response['message'] = 'Operacion Correcta';
            $response['data'] = [];
        } catch (\Throwable $th) {
            $response['status'] = 400;
            $response['message'] = 'Fallo en la operacion '.$th->getMessage(). ' response = '.$request->descripcion ;
            $response['data'] = [];
        }finally{
            return response($response, $response['status']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(persona $persona)
    {
        $response = [];
        try {
            $personas = persona::all();
            $response['status'] = 200;
            $response['message'] = 'Operacion Correcta';
            $response['data'] = $personas;
        } catch (\Throwable $th) {
            $response['status'] = 400;
            $response['message'] = 'Fallo en la Operacion ' . $th ->getMessage();
            $response['data'] = [];
        }finally{
            return response($response, $response['status']);
        };
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(persona $persona)
    {
        return view('personas.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $response = [];
        try {
            $persona =  persona::find($request->id);
            $persona -> nombres = $request->nombres;
            $persona -> apellidos = $request->apellidos;
            $persona -> dni = $request->dni;
            $persona -> address = $request->address;
            $persona->save();

            $response['status'] = 200;
            $response['message'] = 'Operacion Correcta';
            $response['data'] = [];
        } catch (\Throwable $th) {
            $response['status'] = 400;
            $response['message'] = 'Fallo en la operacion '.$th->getMessage(). ' response = '.$request->descripcion ;
            $response['data'] = [];
        }finally{
            return response($response, $response['status']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $requestup)
    {
        $request = [];
        try {
            $persona = persona::destroy($requestup ->id);
            $request['status'] = 200;
            $request['message'] = 'Operacion Correcta';
            $request['data'] = [];
        } catch (\Throwable $th) {
            $request['status'] = 400;
            $request['message'] = 'Fallo en la Operacion ' . $th ->getMessage();
            $request['data'] = [];
        }finally{
            return response($request, $request['status']);
        };
    }
}
