<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        // Mengambil baris pertama data pengaturan dari database
        $setting = Setting::first();
        $title = 'Setting';

        return view('setting.index', compact('setting', 'title'));
    }

    public function update(Request $request)
    {
        // 1. Validasi input dari form
        $request->validate([
            'company_name' => 'required|string|max:255',
            'app_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB
            'address' => 'nullable|string',
        ]);

        // 2. Ambil data setting saat ini
        $setting = Setting::first();

        // 3. Proses jika ada gambar logo baru yang di-upload
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada, agar memori storage tidak penuh
            if ($setting->logo_path) {
                Storage::disk('public')->delete($setting->logo_path);
            }

            // Simpan file logo baru ke folder storage/app/public/logos
            $path = $request->file('logo')->store('logos', 'public');
            $setting->logo_path = $path;
        }

        // 4. Update data teks
        $setting->company_name = $request->company_name;
        $setting->app_name = $request->app_name;
        $setting->address = $request->address;
        $setting->save();

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
