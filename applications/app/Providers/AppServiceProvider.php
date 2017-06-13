<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Route;
use Request;
use DateTime;

use App\Models\AdsBanner;
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
            if($callNavKategori->isEmpty()){
                $callNavKategori = null;
            }
            view()->share('callNavKategori', $callNavKategori);
            // dd($callNavKategori);
            // else if($callNavKategori->isEmpty()){
            //     dd('not null');
            // }

            $callNavClass = Kelas::select(
                'id_kelas_kategori',
                'nama_kelas',
                'slug'
            )
            ->where('flag_publish', '1')
            ->orderBy('nama_kelas', 'asc')
            ->get();
            if($callNavClass->isEmpty()){
                $callNavClass = null;
            }
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
            if($callFreeTrialClass->isEmpty()){
                $callFreeTrialClass = null;
            }
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
            if($callSosMed->isEmpty()){
                $callSosMed = null;
            }
            view()->share('callSosMed', $callSosMed);


            $date = new DateTime;
            $format_date = $date->format('Y-m-d');
            $callAdv = AdsBanner::select(
                'ads_judul',
                'img_url',
                'img_alt'
            )
            ->where('flag_publish', '1')
            ->whereDATE('tanggal_publish', '<=', $format_date)
            ->inRandomOrder()
            ->first();
            view()->share('callAdv', $callAdv);


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
