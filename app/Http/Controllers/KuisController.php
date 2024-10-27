<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Kuis;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class KuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('srq29', [
            "title" => "Kuis SRQ 29",
        ]);
    }

    public function show()
    {
        $questions = config('srq.kuis');
        return view('kuis', [
            "title" => "SRQ 29",
            "kuis" => $questions
        ]);
    }

    public function submit(Request $request)
    {
        //H:i:s
        $tanggalWaktu = new DateTime();
        $tanggal = $tanggalWaktu->format('j F Y');
        $score = 0;
        foreach ($request->all() as $key => $value) {
            if ($value === 'ya') {
                $score++;
            }
        }
        $depression = false;
        $substanceAbuse = false;
        $psychoticDisorder = false;
        $ptsd = false;

        $responses = $request->all();

        $count1to20 = 0;
        for ($i = 1; $i <= 20; $i++) {
            if (isset($responses["question$i"]) && $responses["question$i"] === 'ya') {
                $count1to20++;
            }
        }
        if ($count1to20 >= 5) {
            $depression = true;
        }

        // Check for substance abuse (question 21)
        if (isset($responses["question21"]) && $responses["question21"] === 'ya') {
            $substanceAbuse = true;
        }

        // Check for psychotic disorder (questions 22-24)
        for ($i = 22; $i <= 24; $i++) {
            if (isset($responses["question$i"]) && $responses["question$i"] === 'ya') {
                $psychoticDisorder = true;
                break;
            }
        }

        // Check for PTSD (questions 25-29)
        for ($i = 25; $i <= 29; $i++) {
            if (isset($responses["question$i"]) && $responses["question$i"] === 'ya') {
                $ptsd = true;
                break;
            }
        }

        return view('result', [
            'score' => $score,
            'depression' => $depression,
            'substanceAbuse' => $substanceAbuse,
            'psychoticDisorder' => $psychoticDisorder,
            'ptsd' => $ptsd,
            'title' => 'Hasil Test',
            'tanggalWaktu' => $tanggal
        ]);


    }
}
