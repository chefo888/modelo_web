<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get("contacto/{apellidos}/{nombre?}/",function( $apellidos,$nom = "Nombre"){
	return "<h1>Hola $nom</h1>";
})->name("contacto1");

Route::get("prueba",function(){
	$a = array(1,2,3,4,5);
	return $a;
});

Route::get("hola/{nombre}/{apellidos}/mundo",function($nombre,$apellidos){
//opcion 1	//$datos = array("nombre"=>$nombre,"apellidos"=>$apellidos);
			//return view("vista1",$datos);
// opcion 2
		//return view("vista1",["nombre"=>$nombre,"apellidos"=>$apellidos]);

//opcion 3
	return view("vista1",compact("apellidos","nombre"));
})->name("hola1");

//Route::get("hola2/{nombre}/{apellidos}/mundo","InicioControl@hola")->name("hola2");
Route::get("hola2/{nombre}/{apellidos}/mundo",["as"=>"hola2","uses"=>"InicioControl@hola"]);

*/

Route::get("/","InicioControl@home")->name("inicio.home");
Route::get("lista/personas","InicioControl@lista_personas")->name("inicio.personas");
Route::get("lista-personas-bd/{error?}","InicioControl@lista_personasBD")->name("inicio.personasBD");
Route::get("agregar/persona","InicioControl@form_alta_persona")->name("inicio.agregarPersona");

Route::post("agregar/persona","InicioControl@alta_persona")->name("inicio.add");

Route::get("editar/persona/{id}","InicioControl@form_editar_persona")->name("inicio.frmEditar");

Route::post("editar/persona/{id}","InicioControl@editar_persona")->name("inicio.edit");

Route::get("eliminar/{id}/persona","InicioControl@eliminar_persona")->name("inicio.eliminar");

Route::get("pdf/persona","InicioControl@pdfPersonas")->name("inicio.pdf");
