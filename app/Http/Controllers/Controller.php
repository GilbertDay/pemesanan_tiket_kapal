<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode as SimpleQrCode;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generateQrCode($salesId)
    {
        // Generate QR code
        $qrCode = SimpleQrCode::format('png')->size(300)->generate($salesId);

        // Save QR code to storage
        $uniqueId = md5(uniqid(rand(), true)); // Membuat ID unik menggunakan md5 dan uniqid

        $filePath = 'qrcodes/' . $uniqueId . '.png'; // Menggunakan ID unik sebagai nama file
        Storage::disk('public')->put($filePath, $qrCode);

        // Get the file URL
        $fileUrl = Storage::disk('public')->url($filePath);

        return $filePath;
    }

}
