<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Pass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pdfPassController extends Controller
{
    public function generatePDF(Request $request)
    {
        $pass = Pass::find(Auth::user()->pass);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        $html = view('passPDF.passPDF', compact('pass'))->render();

        $dompdf->loadHtml($html);

        $dompdf->render();

        return $dompdf->stream('entrada_festival.pdf');
    }
}
