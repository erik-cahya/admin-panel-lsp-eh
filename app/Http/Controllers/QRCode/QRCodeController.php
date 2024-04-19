<?php

namespace App\Http\Controllers\QRCode;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Storage;


use Endroid\QrCode\Color\Color;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeEnlarge;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class QRCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data_qr'] = DB::table('qr_code')->get();

        return view('admin.qr-code-generator.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $dataUrl = $request->url;

        $writer = new PngWriter();

        $qrCode = QrCode::create($dataUrl)
            ->setEncoding(new Encoding('UTF-8'))
            ->setSize(500)
            ->setMargin(10)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // $logo = Logo::create(public_path('/img/1.jpg'))->setResizeToWidth(150)->setResizeToHeight(150);

        // Tulis QR code ke dalam sebuah buffer

        $buffer = $writer->write($qrCode)->getString();

        // Simpan buffer ke dalam file gambar di server
        $fileName = 'qr_code_' . time() . '.png';
        file_put_contents(public_path('/img/qr_codes/' . $fileName), $buffer);

        // dd($request->all());
        DB::table('qr_code')->insert([
            'name' => $request->name,
            'url' => $request->url,
            'qr_image' => $fileName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        toast('QR Code Berhasil Dibuat', 'success');
        return redirect('/qr-code');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imageFile = DB::table('qr_code')->where('id', $id)->value('qr_image');
        DB::table('qr_code')->where('id', $id)->delete();
        File::delete(public_path('img/qr_codes/' . $imageFile));
        toast('QR Code Berhasil Dihapus', 'success');
        return Redirect::to('/qr-code');
    }
}
