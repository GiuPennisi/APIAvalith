<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Client;
use App\Monitor;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::All();
        return response()->json(['status'=>'ok','data'=>$clients], 200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->name = $request->name;
        $client->lname = $request->lname;
        $client->sector = $request->sector;
        $client->email = $request->email;

        $client->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $client = Client::find($id);
        if (!$client){
            return response()->json(['errors'=>['code'=>404,'message'=>'No se encuentra ningún cliente con ese código.']],404);
        }
        else{
            return response()->json(['status'=>'ok','data'=>$client],200);
        }
    }

    /**
     * Muestra los Clientes que tienen asignada una computadora
     *
     * @param  int  $id int $idComputer
     * @return \Illuminate\Http\Response
     */

    public function showClientComputer($id){
        $client=Client::find($id);
        if (!$client){
            return response()->json(['errors'=>['code'=>404,'message'=>'No se encuentra ningún cliente con ese código.']],400);
        }
        else{
            $computers=$client->computers;
            if ($computers->isEmpty()){
              return response()->json(['errors'=>['code'=>404,'message'=>'El cliente no posee ninguna computadora asignada']], 404);
            }
            else{
              return response()->json($computers);
            }
          }
    }

    /**
     * Muestra los Clientes que tienen asignado un monitor
     *
     * @param  int  $id int $idMonitor
     * @return \Illuminate\Http\Response
     */
    public function showClientMonitor($id){
      $client=Client::find($id);
      if (!$client){
          return response()->json(['errors'=>['code'=>404,'message'=>'No se encuentra ningún cliente con ese código.']],404);
      }
      else{
          $monitors=$client->monitors;
          if ($monitors->isEmpty()){
            return response()->json(['errors'=>['code'=>404,'message'=>'El cliente no posee ningun monitor asignado']],404);
          }
          else{
            return response()->json($monitors);
          }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $client = Client::find($id);
        if (!$client){
          return response()->json(['errors'=>['code'=>404,'message'=>'No se encuentra ningún cliente con ese código.']],404);
        }
        else{
          $client->name = $request->name;
          $client->lname = $request->lname;
          $client->sector = $request->sector;
          $client->email = $request->email;

          $client->save();
          return response()->json(['status'=>'ok'],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        if ($client){
            $client->delete();
            return response()->json(['status'=>'ok','data'=>$client],200);
        }
        else{
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra ningún cliente con ese código.'])],404);
        }

    }
}
