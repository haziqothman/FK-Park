<?php 

// app/Http/Controllers/QRScannerController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRScannerController extends Controller
{
    public function index()
    {
        return view('qrscanner');
    }
}
