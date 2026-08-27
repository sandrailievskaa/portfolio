<?php

namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolio = require base_path('resources/data/portfolio.php');

        return view('portfolio.index', compact('portfolio'));
    }
}
