<?php namespace Illizian\Notifications;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth as Auth;

class NotificationsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('illizian/notifications');

		// Load routes
		require_once __DIR__ . '/../../routes.php';

		// Listen to requests and mark notifications as read
		$this->app->before(function($request) {
			if(!Auth::guest()) {
				Models\Notifications::ForIdAndUrl(Auth::id(), $request->getPathInfo())->update(array("read" => true));
			}
		});
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// Add Class to IOC
        $this->app['notify'] = $this->app->share(function($app)
        {
            return new \Illizian\Notifications\Notify;
        });

        // Add Alias (saves adding it app/config/app.php)
        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Notify', 'Illizian\Notifications\Facades\Notify');
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('notify');
	}

}
