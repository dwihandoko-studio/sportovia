<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Route;
use Request;

use App\Models\Kelas;
use App\Models\KelasKategori;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!Request::is('admin/*')){
            $callNavKategori = KelasKategori::select(
                'id',
                'kategori_kelas',
                'slug'
            )
            ->where('flag_publish', '1')
            ->orderBy('kategori_kelas', 'asc')
            ->get();
            view()->share('callNavKategori', $callNavKategori);

            $callNavClass = Kelas::select(
                'id_kelas_kategori',
                'nama_kelas',
                'slug'
            )
            ->where('flag_publish', '1')
            ->orderBy('nama_kelas', 'asc')
            ->get();
            view()->share('callNavClass', $callNavClass);

            $callFreeTrialClass = Kelas::leftJoin('amd_kelas_program', 'amd_kelas_program.id', '=', 'amd_kelas.id_program')
            ->select(
                'amd_kelas.id',
                'program_kelas',
                'nama_kelas'
            )
            ->where('amd_kelas.flag_publish', '1')
            ->where('amd_kelas_program.flag_publish', '1')
            ->orderBy('amd_kelas_program.program_kelas')
            ->get();
            view()->share('callFreeTrialClass', $callFreeTrialClass);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
