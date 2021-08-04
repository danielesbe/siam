<?php

namespace App\Providers;

use Gate;
use App\Models\guru;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

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
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        Gate::define('TU', function($user) {
            return $user->role == 'TU';
         });
        Gate::define('Guru', function($user) {
            return $user->role == 'guru';
         });
        Gate::define('Murid', function($user) {
            return $user->role == 'murid';
         });
        Gate::define('calon', function($user) {
            return $user->role == 'calon';
         });
         Gate::define('Wakel', function($user) {
            $wakel=guru::where('nik',$user->username)->first();
             if($wakel==null){
                 return false;
             }
             $cek=$wakel->walikelas()->exists();
             if($cek){
                 return true;
             }
             return false;
         });
    }
}
