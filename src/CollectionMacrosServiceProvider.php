<?php

namespace Sourcefli\CollectionMacros;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class CollectionMacrosServiceProvider extends ServiceProvider
{

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        Collection::make($this->macros())
            ->reject(fn ($class, $macro) => Collection::hasMacro($macro))
            ->each(fn ($class, $macro) => Collection::macro($macro, app($class)()));
    }

    private function macros(): array
    {
        return [
            'randomOrFirst' => \Sourcefli\CollectionMacros\Macros\RandomOrFirst::class,
            'modelRelationsMap' => \Sourcefli\CollectionMacros\Macros\ModelRelationsMap::class
        ];
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['collection-macros'];
    }
}
