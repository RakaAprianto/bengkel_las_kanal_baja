<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            [
                'title' => 'Pagar Minimalis Rumah Mewah Dago',
                'category' => 'pagar',
                'location' => 'Dago, Bandung',
                'material' => 'Hollow Galvanis 4x6cm, Besi Strip',
                'finishing' => 'Powder Coating Hitam Doff',
                'description' => 'Pagar minimalis dengan desain modern untuk rumah mewah di kawasan Dago. Menggunakan material berkualitas tinggi dengan finishing powder coating yang tahan lama dan anti karat.',
                'challenge' => 'Tantangan utama adalah menyesuaikan desain dengan kontur tanah yang tidak rata dan memastikan keamanan tanpa mengorbankan estetika.',
                'completion_year' => 2024,
                'price' => 25000000,
                'status' => 'published',
                'is_featured' => true,
            ],
            [
                'title' => 'Kanopi Carport Minimalis',
                'category' => 'kanopi',
                'location' => 'Cimahi, Bandung',
                'material' => 'Hollow Galvanis 4x8cm, Atap Alderon',
                'finishing' => 'Cat Duco Hitam',
                'description' => 'Kanopi carport dengan desain minimalis modern yang dapat melindungi 2 mobil. Struktur kuat dengan atap alderon yang tahan panas dan hujan.',
                'challenge' => 'Memastikan kekuatan struktur untuk menahan beban atap dan angin tanpa menggunakan tiang tengah agar tidak mengganggu parkir.',
                'completion_year' => 2024,
                'price' => 18500000,
                'status' => 'published',
                'is_featured' => true,
            ],
            [
                'title' => 'Railing Tangga Kaca Tempered',
                'category' => 'railing',
                'location' => 'Setiabudi, Bandung',
                'material' => 'Stainless Steel 304, Kaca Tempered 12mm',
                'finishing' => 'Stainless Hairline',
                'description' => 'Railing tangga dengan kombinasi stainless steel dan kaca tempered untuk rumah modern. Memberikan kesan mewah dan luas pada area tangga.',
                'challenge' => 'Presisi pengukuran untuk panel kaca tempered yang harus custom sesuai bentuk tangga spiral.',
                'completion_year' => 2024,
                'price' => 35000000,
                'status' => 'published',
                'is_featured' => true,
            ],
            [
                'title' => 'Atap Baja Ringan Gudang Industri',
                'category' => 'atap-besi',
                'location' => 'Rancaekek, Bandung',
                'material' => 'Baja Ringan C75, Spandek 0.45mm',
                'finishing' => 'Galvanis Coating',
                'description' => 'Konstruksi atap baja ringan untuk gudang industri dengan bentang 20 meter. Struktur ringan namun kuat dengan daya tahan tinggi.',
                'challenge' => 'Bentang yang lebar membutuhkan perhitungan struktur yang akurat untuk memastikan kekuatan dan keamanan.',
                'completion_year' => 2023,
                'price' => 85000000,
                'status' => 'published',
                'is_featured' => false,
            ],
            [
                'title' => 'Struktur Baja Bangunan 3 Lantai',
                'category' => 'struktur',
                'location' => 'Buah Batu, Bandung',
                'material' => 'WF 200x100, Plat Besi 10mm',
                'finishing' => 'Cat Zinc Chromate + Cat Besi',
                'description' => 'Struktur baja untuk bangunan ruko 3 lantai. Konstruksi yang kokoh dan tahan gempa dengan metode sambungan baut high tension.',
                'challenge' => 'Koordinasi dengan kontraktor sipil untuk memastikan presisi pondasi dan keselarasan struktur.',
                'completion_year' => 2023,
                'price' => 250000000,
                'status' => 'published',
                'is_featured' => true,
            ],
            [
                'title' => 'Tangga Putar Elegan',
                'category' => 'tangga-putar',
                'location' => 'Pasir Kaliki, Bandung',
                'material' => 'Plat Bordes 4.5mm, Pipa Galvanis',
                'finishing' => 'Powder Coating Cream',
                'description' => 'Tangga putar dengan desain klasik elegan untuk villa. Kombinasi bordes dan railing ornamen memberikan nuansa mewah.',
                'challenge' => 'Perhitungan sudut putar dan tinggi anak tangga yang presisi untuk kenyamanan penggunaan.',
                'completion_year' => 2023,
                'price' => 45000000,
                'status' => 'published',
                'is_featured' => false,
            ],
            [
                'title' => 'Pagar Dorong Otomatis',
                'category' => 'pagar',
                'location' => 'Antapani, Bandung',
                'material' => 'Hollow Galvanis 4x4cm, Motor Sliding',
                'finishing' => 'Powder Coating Abu-abu',
                'description' => 'Pagar dorong dengan sistem otomatis menggunakan remote control. Desain minimalis dengan panel besi dan ornamen laser cut.',
                'challenge' => 'Instalasi motor dan rel sliding yang presisi agar pergerakan pagar mulus.',
                'completion_year' => 2024,
                'price' => 32000000,
                'status' => 'published',
                'is_featured' => false,
            ],
            [
                'title' => 'Kanopi Kain Membrane',
                'category' => 'kanopi',
                'location' => 'Sukajadi, Bandung',
                'material' => 'Pipa Galvanis 3inch, Kain Membrane PVDF',
                'finishing' => 'Cat Duco Putih',
                'description' => 'Kanopi dengan atap kain membrane untuk area outdoor cafe. Desain modern dengan kemampuan menahan air dan panas matahari.',
                'challenge' => 'Pola potong kain membrane yang akurat untuk bentuk lengkungan yang diinginkan.',
                'completion_year' => 2024,
                'price' => 28000000,
                'status' => 'published',
                'is_featured' => false,
            ],
            [
                'title' => 'Railing Balkon Ornamen Klasik',
                'category' => 'railing',
                'location' => 'Lembang, Bandung',
                'material' => 'Besi Tempa, Besi Ulir',
                'finishing' => 'Cat Antik Hitam Emas',
                'description' => 'Railing balkon dengan ornamen klasik untuk villa di Lembang. Desain mewah dengan detail ukiran besi tempa.',
                'challenge' => 'Detail ornamen yang rumit membutuhkan keahlian khusus dalam pengelasan dan pembentukan.',
                'completion_year' => 2023,
                'price' => 22000000,
                'status' => 'published',
                'is_featured' => false,
            ],
            [
                'title' => 'Mezzanine Struktur Baja',
                'category' => 'struktur',
                'location' => 'Kopo, Bandung',
                'material' => 'WF 150x75, Floordeck',
                'finishing' => 'Cat Epoxy',
                'description' => 'Struktur mezzanine untuk showroom dengan luas 200m2. Konstruksi kokoh dengan finishing rapi.',
                'challenge' => 'Meminimalkan getaran pada lantai mezzanine saat digunakan.',
                'completion_year' => 2024,
                'price' => 175000000,
                'status' => 'published',
                'is_featured' => false,
            ],
            [
                'title' => 'Pagar Laser Cut Modern',
                'category' => 'pagar',
                'location' => 'Ciumbuleuit, Bandung',
                'material' => 'Plat Besi 3mm, Hollow 4x6cm',
                'finishing' => 'Powder Coating Hitam',
                'description' => 'Pagar dengan panel laser cut bermotif geometris modern. Memberikan privasi sekaligus tampilan artistik.',
                'challenge' => 'Proses laser cutting yang presisi dan pemasangan panel yang rata.',
                'completion_year' => 2024,
                'price' => 38000000,
                'status' => 'draft',
                'is_featured' => false,
            ],
            [
                'title' => 'Kanopi Alderon Double Layer',
                'category' => 'kanopi',
                'location' => 'Ujung Berung, Bandung',
                'material' => 'Hollow Galvanis 5x10cm, Alderon RS',
                'finishing' => 'Cat Duco Coklat',
                'description' => 'Kanopi dengan atap alderon double layer untuk mengurangi panas. Struktur kokoh untuk area parkir.',
                'challenge' => 'Pemasangan double layer yang rapat untuk mencegah kebocoran.',
                'completion_year' => 2024,
                'price' => 15000000,
                'status' => 'draft',
                'is_featured' => false,
            ],
        ];

        foreach ($portfolios as $portfolioData) {
            $portfolio = Portfolio::create($portfolioData);

            // Create placeholder images (in production, these would be real uploaded images)
            for ($i = 1; $i <= rand(3, 5); $i++) {
                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image_path' => 'portfolio/placeholder-' . $portfolio->id . '-' . $i . '.jpg',
                    'is_primary' => $i === 1,
                    'sort_order' => $i,
                ]);
            }
        }
    }
}
