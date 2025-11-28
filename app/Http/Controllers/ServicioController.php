<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Service::select(['id','nombre', 'descripcion', 'imagen'])
            ->where('estado', true)
            ->orderBy('nombre')
            ->paginate(12);

        return view('servicios', compact('servicios'));
    }
}
