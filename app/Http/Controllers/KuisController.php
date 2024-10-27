<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Kuis;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use App\Models\User; // Pastikan ini ada di bagian atas


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
        session()->forget(['score', 'depression', 'substanceAbuse', 'psychoticDisorder', 'ptsd', 'title', 'tanggalWaktu']);
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

        if (isset($responses["question21"]) && $responses["question21"] === 'ya') {
            $substanceAbuse = true;
        }

        for ($i = 22; $i <= 24; $i++) {
            if (isset($responses["question$i"]) && $responses["question$i"] === 'ya') {
                $psychoticDisorder = true;
                break;
            }
        }

        for ($i = 25; $i <= 29; $i++) {
            if (isset($responses["question$i"]) && $responses["question$i"] === 'ya') {
                $ptsd = true;
                break;
            }
        }

        session([
            'score' => $score,
            'depression' => $depression,
            'substanceAbuse' => $substanceAbuse,
            'psychoticDisorder' => $psychoticDisorder,
            'ptsd' => $ptsd,
            'title' => 'Hasil Test',
            'tanggalWaktu' => $tanggal
        ]);

        $user = User::find(Auth::user()->id);  //Auth::user();
        $user->mengisi_srq = 1;
        $user->save();

        return view('result', [
            'score' => $score,
            'depression' => $depression,
            'substanceAbuse' => $substanceAbuse,
            'psychoticDisorder' => $psychoticDisorder,
            'ptsd' => $ptsd,
            'title' => 'Hasil Test',
            'tanggalWaktu' => $tanggal,
            'user' => $user
        ]);

    }

    public function printPDF()
    {
        $nama =  Auth::user()->name;
        $pdf = Pdf::loadView('pdf');
        return $pdf->download("hasilSRQ-29-{$nama}.pdf");

    }

}
