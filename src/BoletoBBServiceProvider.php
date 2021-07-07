<?php

namespace Mjbezer\BBBoleto;

use Illuminate\Support\ServiceProvider;

class BoletoBBServiceProvider extends ServiceProvider {

    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind('bbToken', function () {
            return new AuthenticationToken();
        });
    }


}
