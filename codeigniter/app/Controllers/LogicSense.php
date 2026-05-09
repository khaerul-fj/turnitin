<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use GuzzleHttp\Client;
use Smalot\PdfParser\Parser;

class LogicSense extends Controller
{
    
    private $pythonUrl = "http://127.0.0.1:8000/get_similarity";

    public function index()
    {
        return view('v_upload_plagiasi');
    }

    public function prosesCek()
    {
        $file = $this->request->getFile('dokumen');
        
        if (!$file->isValid()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'File tidak valid']);
        }

        $parser = new Parser();
        $pdf    = $parser->parseFile($file->getTempName());
        $textInput = $pdf->getText();

        $teksDatabase = "Algoritma pemrograman adalah langkah logis memecahkan masalah.";

        try {
            $client = new Client();
            $response = $client->post($this->pythonUrl, [
                'json' => [
                    'teks1' => $textInput,
                    'teks2' => $teksDatabase
                ]
            ]);

            $hasilAI = json_decode($response->getBody());
            
            return $this->response->setJSON([
                'status'     => 'Sukses',
                'akurasi'    => round($hasilAI->persentase, 2) . '%',
                'keterangan' => $hasilAI->persentase > 50 ? 'Indikasi Plagiasi Tinggi' : 'Dokumen Original'
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal konek ke Python Service: ' . $e->getMessage()]);
        }
    }
}