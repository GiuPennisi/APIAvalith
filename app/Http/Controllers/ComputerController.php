<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Computer;

use App\Client;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computers = Computer::all();

        response()->json(['status'=>'ok','data'=>Clients::all()], 200);
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
        $computer = new Computer();
        $computer->code = $request->code;
        $computer->spect = $request->spect;
        $computer->ip = $request->ip;
        $computer->last_check = $request->last_check;
        $computer->client_id = $request->client_id;

        $computer->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $computer = Computer::find($id);
        if (!$computer){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra ninguna computadora con ese código.'])],404);
        }
        else{
            return response()->json(['status'=>'ok','data'=>$computer],200);
        }
    }

    public function addClientToComputer($id,$idClient){
      $computer=Computer::find($id);
      if (!$computer){
        return response()->json(['errors'=>['code'=>404,'message'=>'No se encuentra ningun monitor con ese codigo']],404);
      }
      else{
        $client = Client::find($id);
        if (!$client){
          return response()->json(['errors'=>['code'=>404,'message'=>'No se encuentra ningun cliente con ese codigo']],404);
        }
        else{
            $computer->client_id=$idClient;
            $computer->save();
            if ($computer->save()){
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $computer = Computer::find($id);
        if (!$computer){
          return response()->json(['errors'=>array('code'=>404,'message'=>'No se encuentra ninguna computadora con ese código.')],404);
        }
        else{
          $computer->code = $request->code;
          $computer->spect = $request->spect;
          $computer->ip = $request->ip;
          $computer->last_check = $request->last_check;
          $computer->client_id = $request->client_id;
          $computer->save();
          return response()->json(['status'=>'ok','data'=>$computer],200);
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
        $computer = Computer::find($id);
        if (!$computer){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra ninguna computadora con ese código.'])],404);
        }
        else{
          $computer->delete();
          return reponse()->json(['status'=>'ok','message'=>'La computadora ha sido borrada exitosamente'],200);
        }

    }
}
