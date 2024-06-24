<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendRecomendation;

class SeriesController extends Controller
{
    public function index() {
        return view('series.index');
    }

    public function recomendaciones() {
        $api = env('BUSSINESS_INTELLIGENCE').'/api/prediccion-a/2023';

        try {
            $serie = Http::get($api);

            $messages = [
                ['role' => 'user', 'content' => 'En base a estos datos de donaciones en tiempo, me recomiendas alguna campaña de donacion los proximos meses? '.$serie],
            ];

            $result = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => $messages,
            ]);

            $result = Arr::get($result, 'choices.0.message')['content'] ?? '';
           // dd($result);
            Mail::to("danielmaldonadogutierrez031@gmail.com")->send(new SendRecomendation($result));
            return view('home');
        } catch (\Throwable $th) {
            dd($th->getMessage());
           return view('home');
        }

    }
}
