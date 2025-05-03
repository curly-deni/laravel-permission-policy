<?php

namespace Aesis\PermissionPolicy;

use Illuminate\Contracts\Auth\Access\Gate;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PermissionPolicyServiceProvider extends PackageServiceProvider
{
    public function register()
    {
        parent::register();

        if (config('permission-policy.register_gate', false)) {
            $this->app->singleton(Gate::class, CustomGate::class);
        }
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-permission-policy')
            ->hasConfigFile();
    }
}
