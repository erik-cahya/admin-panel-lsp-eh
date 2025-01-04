<?php

namespace App\Http\Controllers;

use App\Models\AsesiModel;
use App\Models\AsesorModel;
use App\Models\ManajemenModel;
use App\Models\SkemaModel;
use App\Models\TUKModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data['countManajemen'] = ManajemenModel::count();
        $data['countAsesi'] = AsesiModel::count();
        $data['countAsesor'] = AsesorModel::count();
        $data['countTUK'] = TUKModel::count();
        $data['countSkema'] = SkemaModel::count();
        return view('admin.dashboard.index', $data);
    }
}
