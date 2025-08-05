<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class PlanController extends Controller
{

    public function index()
    {

        $path = storage_path('app/data/planos.json');

        if (!File::exists($path)) {

            abort(404, "Arquivo JSON de planos não foi encontrado.");
        }

        $json_data = File::get($path);
        $planos = json_decode($json_data, true);

        
        return view('planos', ['planos' => $planos]);
    }
}
