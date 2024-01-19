<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function optimize(){
        Artisan::call('optimize:clear');
        return response()
                ->json('Success Call Artisan Optimize');
    }

    public function migrate(){
        Artisan::call('migrate');
        return response()
                ->json('Success Call Artisan Migrate');
    }

    public function fresh(){
        Artisan::call('migrate:fresh');
        return response()
                ->json('Success Call Artisan Migrate Fresh');
    }

    public function storage(){
        Artisan::call('storage:link');
        return response()
                ->json('Success Call Artisan Storage Link');
    }

    public function cache(){
        Artisan::call('cache:clear');
        return response()
                ->json('Success Call Artisan Cache Clear');
    }

    public function seed(){
        Artisan::call('migrate:fresh --seed');
        return response()
                ->json('Success Call Artisan Migrate Fresh Seed');
    }

    public function key(){
        Artisan::call('key:generate');
        return response()
                ->json('Success Call Artisan Key Generate');
    }
}