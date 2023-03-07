<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Redis;
class HelperController extends Controller
{
    public function viaCepApi($cep)
    {

        Cache::put('chave', 'valor',10);

        $valor = Cache::get('chave');
        return $valor;
        $address = Http::get("https://viacep.com.br/ws/$cep/json/");

        return $address;
    }
}
