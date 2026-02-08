<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index()
    {
        $settings = [
            'company_name' => Setting::get('company_name', 'Kanal Las Baja'),
            'company_tagline' => Setting::get('company_tagline', 'Bengkel Las Profesional & Terpercaya'),
            'phone' => Setting::get('phone', '+6256 9337 8749'),
            'whatsapp' => Setting::get('whatsapp', '+6256 9337 8749'),
            'email' => Setting::get('email', 'benpri@gmail.com'),
            'address' => Setting::get('address', 'Jl. Asam, RT.12/RW.3, Pulo Gebang, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13950'),
            'google_maps_embed' => Setting::get('google_maps_embed', ''),
            'instagram' => Setting::get('instagram', ''),
            'facebook' => Setting::get('facebook', ''),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update the settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_tagline' => 'nullable|string|max:500',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'google_maps_embed' => 'nullable|string',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
        ]);

        foreach ($validated as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->back()->with('success', 'Pengaturan berhasil disimpan!');
    }
}
