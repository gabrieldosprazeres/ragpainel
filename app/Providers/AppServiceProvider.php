<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use App\Models\Config;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $configs = [];

        if(Schema::hasTable('painel_configs')){
            $dbconfigs = Config::all();

            foreach ($dbconfigs as $dbconfig){
                $configs [ $dbconfig['name'] ] = $dbconfig['content'];
            }
           
        }
     
        View()->share('configs', $configs);
    }
}
