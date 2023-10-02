<?php


namespace Themes\Findhouse;


use Illuminate\Contracts\Http\Kernel;
use Modules\Theme\Abstracts\AbstractThemeProvider;
use Modules\Tracking\ModuleProvider;
use Modules\User\Helpers\PermissionHelper;
use Themes\Findhouse\Database\Seeders\DatabaseSeeder;
use Themes\Findhouse\Database\Seeders\DatabaseSeederForReImport;

include_once 'Helpers.php';

class ThemeProvider extends AbstractThemeProvider
{

    public static $version = '2.1.0';
    public static $name = 'Findhouse';
    public static $core_modules = [
        'core'=> \Modules\Core\ModuleProvider::class,
        'contact'=>\Modules\Contact\ModuleProvider::class,
        'dashboard'=>\Modules\Dashboard\ModuleProvider::class,
        'email'=>\Modules\Email\ModuleProvider::class,
        'language'=>\Modules\Language\ModuleProvider::class,
        'media'=>\Modules\Media\ModuleProvider::class,
        'news'=>\Modules\News\ModuleProvider::class,
        'page'=>\Modules\Page\ModuleProvider::class,
        'user'=>\Modules\User\ModuleProvider::class,
        'template'=>\Modules\Template\ModuleProvider::class,
        'location'=>\Modules\Location\ModuleProvider::class,
        'review'=>\Modules\Review\ModuleProvider::class,
        'booking'=>\Modules\Booking\ModuleProvider::class,
        'tracking'=>ModuleProvider::class
    ];
    public static $modules = [
        'agencies'=>\Themes\Findhouse\Agencies\ModuleProvider::class,
        'property'=>\Themes\Findhouse\Property\ModuleProvider::class,
        'dashboard'=>\Themes\Findhouse\Dashboard\ModuleProvider::class,
        'report'=>\Themes\Findhouse\Report\ModuleProvider::class,
        'location'=>\Themes\Findhouse\Location\ModuleProvider::class,
        'template'=>\Themes\Findhouse\Template\ModuleProvider::class,
        'user'=>\Themes\Findhouse\User\ModuleProvider::class,
        'news'=>\Themes\Findhouse\News\ModuleProvider::class,
        'core'=>\Themes\Findhouse\Core\ModuleProvider::class,
        'booking'=>\Themes\Findhouse\Booking\ModuleProvider::class,
    ];

    public static $seeder = DatabaseSeeder::class;
    public static $seederForReImport = DatabaseSeederForReImport::class;

    public function boot(Kernel $kernel){
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');

        // Setup Permission
        PermissionHelper::add([
            'property_view',
            'property_create',
            'property_update',
            'property_delete',
            'property_manage_others',
            'dashboard_agent_access',

            'agencies_view',
            'agencies_create',
            'agencies_update',
            'agencies_delete',
        ]);
        $kernel->pushMiddleware(Updater::class);
    }

    public function register()
    {
        foreach (static::$core_modules as $module=>$class){
            $this->app->register($class);
        }
        foreach (static::$modules as $module=>$class){
            $this->app->register($class);
        }
    }
}
