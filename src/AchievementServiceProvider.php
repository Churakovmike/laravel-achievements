<?php

namespace ChurakovMike\Achievement;

use Illuminate\Support\ServiceProvider;

/**
 * Class AchievementServiceProvider.
 * @package ChurakovMike\Achievement
 */
class AchievementServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Database');
    }
}
