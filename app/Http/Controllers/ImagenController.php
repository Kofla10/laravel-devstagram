<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $data){

        
        // $input = $data->all();
        $imagen  = $data->file('file');

        // forma de general un unique id para crear el nombre de la imagen
        $nameImg = Str::uuid().".".$imagen->extension();

        //con la clase image de intervation image, es para procesar la imagen y podrla guardar en el servidor
        $imgServer = Image::make($imagen);

        //para especificar el alto y ancho maximo, tambien se puede especificar si la imagen pasa los 1000px desde de donde se corta
        $imgServer->fit(1000, 1000, null);

        //creamos la ruta en donde se guardaron las imagenes
        $imgPath = public_path('uploads').'/'.$nameImg;

        //guardamos la imagene en el servidor
        $imgServer->save($imgPath);
        // transfomamos la respuesta que nos trae la data en un json
        return response()->json(['imagen' => $nameImg]);

    }
}