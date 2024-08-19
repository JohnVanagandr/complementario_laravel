<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    Paginator::useBootstrapFive();

    // Implicitly grant "Super-Admin" role all permission checks using can()
    Gate::before(function ($user, $ability) {
      if ($user->hasRole('Super-Admin')) {
        return true;
      }
    });
  }
}
