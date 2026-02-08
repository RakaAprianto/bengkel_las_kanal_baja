<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Company Information
            'company_name' => 'Kanal Las Baja',
            'company_tagline' => 'Ahli Las & Konstruksi Baja Profesional',
            'company_description' => 'Bengkel las profesional dengan pengalaman lebih dari 5 tahun melayani berbagai kebutuhan konstruksi baja, pagar, kanopi, railing, dan berbagai produk custom lainnya. Kami mengutamakan kualitas, ketepatan waktu, dan kepuasan pelanggan.',
            'company_address' => 'Jl. Asam, RT.12/RW.3, Pulo Gebang, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13950',

            // Contact Information
            'phone' => '0856-9337-8749',
            'whatsapp' => env('WHATSAPP_NUMBER', '6285693378749'),
            'email' => 'benpri79@gmail.com',

            // Social Media
            'facebook' => 'https://facebook.com/kanallasbaja',
            'instagram' => 'https://instagram.com/kanallasbaja',
            'youtube' => 'https://youtube.com/@kanallasbaja',

            // Operating Hours
            'operating_hours' => 'Senin - Sabtu: 08:00 - 17:00',

            // Google Maps
            'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1234567890123!2d107.12345678901234!3d-6.123456789012345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMjAnMjAuMCJTIDEwN8KwMjAnMjAuMCJF!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid',

            // Meta
            'meta_title' => 'Kanal Las Baja - Ahli Las & Konstruksi Baja Jakarta',
            'meta_description' => 'Bengkel las profesional di Jakarta. Melayani pembuatan pagar, kanopi, railing, konstruksi baja, dan berbagai produk custom. Kualitas terjamin, harga bersaing.',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
