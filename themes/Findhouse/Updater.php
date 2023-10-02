<?php

namespace Themes\Findhouse;

use Closure;
use Themes\Findhouse\Database\Updaters\Updater200;
use Themes\Findhouse\Database\Updaters\Updater210;

class Updater
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if (file_exists(storage_path().'/installed') and !app()->runningInConsole()) {
            Updater200::run();
            Updater210::run();
        }
        return $next($request);
    }
}
