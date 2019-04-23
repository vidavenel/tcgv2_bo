<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-03-07
 * Time: 03:31
 */

namespace Tcgv2\Bo;

use Illuminate\Support\ServiceProvider;
use Tcgv2\Bo\Presenters\UserPresenter;

class BoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // views
        $this->loadViewsFrom(__DIR__.'/../views', 'bo');

        // assets
        $this->publishes([
            __DIR__.'/../assets' => public_path('vendor/tcgv2_bo')
        ], 'public');

        // configuration
        $this->publishes([
            __DIR__ . '/../config/tcgv2_bo.php' => config_path('tcgv2_bo.php'),
        ]);

        // route
        if (config('tcgv2_bo.develop')) {
            $this->loadRoutesFrom(__DIR__.'/../route.php');
        }

        /**
         * breadcumb
         */
        view()->composer([
            "bo::layouts.app"
        ], function ($view) {
            $breadcumb = [
                ["name" => "Dashboard", "url" => config('tcgv2_bo.route.dashboard'), "icon" => "fa fa-dashboard"],
            ];
            $paths = request()->segments();
            if (count($paths) > 1) {
                foreach ($paths as $key => $pah) {
                    if ($key == 1)
                        $breadcumb[] = ["name" => ucfirst($pah), "url" => request()->getBaseUrl() . "/" . $paths[0] . "/" . $paths[$key], 'icon' => config("tcgv2_bo.icon_breadcrumb." . $pah . ".icon")];
                    elseif ($key == 2)
                        $breadcumb[] = ["name" => ucfirst($pah), "url" => request()->getBaseUrl() . "/" . $paths[0] . "/" . $paths[1] . "/" . $paths[$key], 'icon' => config("tcgv2_bo.icon_breadcrumb." . $pah . ".icon")];
                }
            }
            $view->with(
                [
                    "breadcumbs" => $breadcumb
                ]
            );
        });

        view()->composer('bo::*', function ($view) {
            $view->with('admin', new UserPresenter());
        });
    }
}