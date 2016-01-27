<?php

namespace App\Providers;

use App\Models\Bin;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($replace_patterns = config('services.bank_replace_patterns')) {
            Bin::saving(function (Bin $bin) use ($replace_patterns) {
                foreach ($replace_patterns as $pattern => $replace) {
                    $bin->bank = preg_replace("/$pattern/", $replace, $bin->bank);
                }
            });
        }
    }

    public function register()
    {
        //
    }
}
