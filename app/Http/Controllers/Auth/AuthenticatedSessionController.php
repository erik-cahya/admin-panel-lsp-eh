<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $request->authenticate();

        $request->session()->regenerate();

        // Log Handler
        $logApiResponse = Http::get('http://ip-api.com/json/' . $request->ip() . '?fields=status,country,regionName,city,isp')->json();

        $logData = [
            'ip_address' => $request->ip(),
            'country' => isset($logApiResponse['country']) ? $logApiResponse['country'] : NULL,
            'regionName' => isset($logApiResponse['regionName']) ? $logApiResponse['regionName'] : NULL,
            'city' => isset($logApiResponse['city']) ? $logApiResponse['city'] : NULL,
            'isp' => isset($logApiResponse['isp']) ? $logApiResponse['isp'] : NULL,
            'id_user' => Auth::user()->id,
            'name' => Auth::user()->name,
            'timestamps' => Carbon::now()->setTimezone('Asia/Makassar')->format('d-M-Y H:i:s')
        ];

        $logFilePath = 'logs/admin_LSP_log.json';

        if (Storage::exists($logFilePath)) {
            $currentLogs = json_decode(Storage::get($logFilePath), true);
        } else {
            $currentLogs = [];
        }
        $currentLogs[] = $logData;
        Storage::put($logFilePath, json_encode($currentLogs, JSON_PRETTY_PRINT));
        // ./ Log Handler

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
