<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidaAltaPersona;
use DB;
use Exception;
use Barryvdh\DomPDF\Facade as PDF;

class InicioControl extends Controller
{
    public function hola($nombre,$apellidos){
    	return view("vista1",compact("nombre","apellidos"));
    }

    public function home(){
    	return view("home",["titulo"=>"Home"]);
    }

    public function lista_personas(){
    	$titulo = "Lista personas";
    	$personas = [
    		"<b>Juan Perez</b>",
    		"Pedros Lopez",
    		"Ana Matus"
    	];

    	return view("lista_personas",compact("titulo","personas"));
    }

    public function lista_personasBD($error = -1){
        /*
        $sql = "SELECT * FROM persona,grupo WHERE grupo = idG";
        $personas = DB::select($sql);
        */
        $personas = DB::table("persona")->
        join("grupo","idG","=","grupo")->get();

        return view("lista_personasBD",compact("personas","error"));
    }

    public function form_alta_persona(){
        $grupos = DB::table("grupo")->get();
        $titulo = "Alta persona";
        return view("form_alta_persona",compact("grupos","titulo"));
    }

    public function alta_persona(ValidaAltaPersona $r){
        try{
            DB::table("persona")->insert([
                "nombre" => $r->input("nombre"),
                "telefono" => $r->input("tel"),
                "direccion" => $r->input("dire"),
                "grupo" => $r->input("gpo")
            ]);
            $error = 0;
        }catch(Exception $e){
            $error = 1;
        }

        return redirect(route("inicio.personasBD",$error));

    }

    public function form_editar_persona($id){
        $grupos = DB::table("grupo")->get();
        $titulo = "Editar persona";
        $p = DB::table("persona")->where("idP",$id)->get();
        $p = count($p) > 0 ? $p[0] : null;
        return view("form_editar_persona",compact("grupos","titulo","p"));
    }

    public function editar_persona(ValidaAltaPersona $r,$id){
        try{
            DB::table("persona")->where("idP",$id)->update([
                "nombre" => $r->input("nombre"),
                "telefono" => $r->input("tel"),
                "direccion" => $r->input("dire"),
                "grupo" => $r->input("gpo")
            ]);
            $error = 0;
        }catch(Exception $e){
            $error = 1;
        }

        return $this->lista_personasBD($error);
    }
    public function eliminar_persona($id){
        try{
            DB::table("persona")->where("idP",$id)->delete();
            $error = 0;
        }catch(Exception $e){
            $error = 1;
        }
        return $this->lista_personasBD($error);
    }

    public function pdfPersonas(){
        $personas = DB::table("persona")->
        join("grupo","idG","=","grupo")->get();

        $pdf = PDF::loadView("personasPDF",compact("personas"));
        $pdf->setPaper("letter","portrait");
        return $pdf->stream();

    }
}
