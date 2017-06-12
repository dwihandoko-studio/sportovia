<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Route;
use Request;

use App\Models\Kelas;
use App\Models\KelasKategori;
use App\Models\Kontak;
use App\Models\SosialMedia;
use App\Models\Inbox;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!Request::is('admin/*') || !Request::is('sitemap.xml')){
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

            $callKontak = Kontak::select('alamat')->first();
            view()->share('callKontak', $callKontak);

            $callSosMed = SosialMedia::select(
                'nama_sosmed',
                'link_url'
            )
            ->where('flag_publish', '1')
            ->orderBy('nama_sosmed', 'asc')
            ->get();
            view()->share('callSosMed', $callSosMed);
        }

        if(Request::is('admin/*')){
          // Notifikasi New Inbox
           $getNotifInbox = Inbox::where('has_read', 0)->orderBy('created_at', 'desc')->get();
           view()->share('getNotifInbox', $getNotifInbox);
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
