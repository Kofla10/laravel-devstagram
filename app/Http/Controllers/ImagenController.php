<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function store(Request $data){
        
        // $input = $data->all();
        $imagen  = $data->file('file');

        // transfomamos la respuesta que nos trae la data en un json
        return response()->json(['imagen' => $imagen->extension()]);
        
    }
}
