<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    //

    public function get(){

        try {
            //Consulta el modelo
            $data =Person::get();
            //Retorna toda la información de persona y da respuesta código 200 
            return response()->json($data, 200);
        }catch(\Throwable $th){
        //Si ocurre un error retorna mensaje de error y código 500
        return response()->json(['error' => $th->getMessage()], 500);
    };

    }

    // Crear
    public function create(Request $request){
        
        try{
            $data['name'] = $request['name'];
            $data['address']=$request['address'];
            $data['phone']= $request['phone'];
            $res = Person::create($data);
            return response()->json($res,200);
        }catch(\Throwable $th){
            return response()->json(['error'=> 'Error en el servidor'],500);
        }
    }

    //Obtener por id
    public function getById($id){
        try{    
            $data = Person::find($id);
            return response()->json($data,200);
        } catch(\Throwable $th){
            return response()->json(['error'=>'No se encontró a esta persona.'],500);
        }
    }

    //Actualizar

    public function update(Request $request,$id){
        try{
            $data['name'] = $request['name'];
            $data['address']=$request['address'];
            $data['phone']= $request['phone'];
            Person::find($id)->update($data);
            $res = Person::find($id);
            return response()->json($res,200);
        } catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    //Borrar
    public function delete($id) {
        try{
            $res = Person::find($id)->delete();
            return response()->json(["deleted" => $res], 200);
        } catch (\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }


}

