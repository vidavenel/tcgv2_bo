<?php

class BoServiceProvider extends \Tcgv2\Bo\BoServiceProvider
{
    public function boot()
    {
        parent::boot();
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }
}