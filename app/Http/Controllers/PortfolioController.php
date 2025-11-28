<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $servicios = Service::select(['id', 'nombre', 'descripcion', 'avatar'])
            ->where('estado', true)
            ->orderBy('nombre')
            ->paginate(12);

        $portfolio = Service::with('portfolios')->get();

        return view('portfolio', compact('servicios','portfolio'));
    }
}
