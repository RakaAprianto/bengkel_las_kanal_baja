<?php

namespace App\Console\Commands;

use App\Models\Portfolio;
use Illuminate\Console\Command;

class UpdatePortfolioPrices extends Command
{
    protected $signature = 'portfolio:update-prices';
    protected $description = 'Update portfolio prices with sample data';

    public function handle()
    {
        $prices = [
            25000000, 18500000, 35000000, 85000000, 250000000, 
            45000000, 32000000, 28000000, 22000000, 175000000, 
            38000000, 15000000
        ];

        $portfolios = Portfolio::all();
        
        foreach ($portfolios as $index => $portfolio) {
            $price = $prices[$index] ?? rand(10000000, 50000000);
            $portfolio->update(['price' => $price]);
            $this->info("Updated {$portfolio->title}: Rp " . number_format($price, 0, ',', '.'));
        }

        $this->info('All portfolio prices updated!');
        return 0;
    }
}
