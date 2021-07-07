<?php

namespace Mjbezer\BBBoleto;


use Mjbezer\BBBoleto\Environment;

class EnvironmentSetup {

    public function setup()
    {
        $setDotEnv = env("ENVIROMENT_BB");
        if($setDotEnv == "SANDBOX") {
            return Environment::sandbox();
        }
        if ($setDotEnv == "PRODUCTION") {
            return Environment::production();
        }
    }
}