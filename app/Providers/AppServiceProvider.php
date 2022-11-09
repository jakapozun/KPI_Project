<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

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
        Cache::rememberForever('translations', function () {
            $translations = collect();

            foreach (['en', 'sl'] as $locale) {
                $path = resource_path("lang/$locale");

                $translations[$locale] = collect(File::allFiles($path))->flatMap(function ($file) use ($locale) {
                    $key = ($translation = $file->getBasename('.php'));

                    return [$key => trans($translation, [], $locale)];
                });
            }

            return $translations;
        });
    }
}
