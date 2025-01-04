<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogController extends Controller
{
    public function index(){

        // dd(Carbon::now()->setTimezone('Asia/Makassar')->format('d-M-Y H:i:s'));
        // get json log files
        $logFiles = Storage::get('logs/admin_LSP_log.json');

        $data["logData"] = json_decode($logFiles, true);
        // dd($data["logData"]);

        return view('admin.log.index', $data);
    }
}
