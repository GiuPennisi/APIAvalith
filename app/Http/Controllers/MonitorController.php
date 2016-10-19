<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Monitor;
use App\Client;

class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitors = Monitor::all();
        return response()->json(['status'=>'ok','data'=>Monitor::all()], 200);
        //devuelve un json con todo el contenido cargado en la variable
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
        $monitor = new Monitor();
        $monitor->size= $request->size;
        $monitor->outputs=$request->outputs;
        $monitor->code=$request->code;

        $monitor->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $monitor=Monitor::find($id);
        if (!$monitor){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra ningún monitor con ese código.'])],404);
        }
        else{
            return response()->json(['status'=>'ok','data'=>$monitor],200);
        }
    }


    public function addMonitorToClient($id,$idClient){
      $monitor=Monitor::find($id);
      if (!$monitor){
        return response()->json(['errors'=>['code'=>404,'message'=>'No se encuentra ningun monitor con ese codigo']],404);
      }
      else{
        $client = Client::find($id);
        if (!$client){
          return response()->json(['errors'=>['code'=>404,'message'=>'No se encuentra ningun cliente con ese codigo']],404);
        }
        else{
            $monitor->client_id=$idClient;
            $monitor->save();
            if ($monitor->save()){
              return response()->json(['status'=>'ok'],200);
            }
            else{
              return response()->json(['status'=>'Not ok'],209);
            }
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
        $monitor=Monitor::find($id);
        $monitor->size= $request->size;
        $monitor->outputs=$request->outputs;
        $monitor->code=$request->code;

        $monitor->save();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $monitor=Monitor::find($id);
        if ($monitor){
            $monitor->delete();
            return response()->json(['status'=>'ok','data'=>$monitor],200);
        }
        else{
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra ningún monitor con ese código.'])],404);
        }
    }
}
