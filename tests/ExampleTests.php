<?php

class ExampleTests extends Orchestra\Testbench\TestCase
{
	/**
	 * Setup the test environment.
	 */
	public function setUp()
	{
		parent::setUp();
		// uncomment to enable route filters if your package defines routes with filters
		// $this->app['router']->enableFilters();

		// create an artisan object for running migrations
		$artisan = $this->app->make( 'artisan' );

		// call migrations specific to our tests, e.g. to seed the db
		// the path option should be relative to the 'path.database'
		// path unless `--path` option is available.
		// $this->app['artisan']->('migrate', [
		$artisan->call( 'migrate', [
			'--database' => 'testbench',
			'--path' => realpath(__DIR__.'tests/migrations'),
		]);

		$artisan->call( 'migrate', [
			'--database' => 'testbench',
			'--path' => realpath(__DIR__.'src/migrations'),
		]);

	}

	/**
	 * Define environment setup.
	 *
	 * @param  \Illuminate\Foundation\Application  $app
	 *
	 * @return void
	 */
	protected function getEnvironmentSetUp($app)
	{
		$app['config']->set('database.default', 'testbench');
		$app['config']->set('database.connections.testbench', [
			'driver'   => 'sqlite',
			'database' => ':memory:',
			'prefix'   => '',
		]);
	}

	/**
	 * Get package providers.  At a minimum this is the package being tested, but also
	 * would include packages upon which our package depends, e.g. Cartalyst/Sentry
	 * In a normal app environment these would be added to the 'providers' array in
	 * the config/app.php file.
	 *
	 * @param  \Illuminate\Foundation\Application  $app
	 *
	 * @return array
	 */
	protected function getPackageProviders()
	{
		return [
			'Illizian\Notifications\NotificationsServiceProvider'
		];
	}

	/**
	 * Get package aliases.  In a normal app environment these would be added to
	 * the 'aliases' array in the config/app.php file.  If your package exposes an
	 * aliased facade, you should add the alias here, along with aliases for
	 * facades upon which your package depends, e.g. Cartalyst/Sentry.
	 *
	 * @param  \Illuminate\Foundation\Application  $app
	 *
	 * @return array
	 */
	protected function getPackageAliases()
	{
		return [];
	}

	/**
	 * Test running migration.
	 *
	 * @test
	 */
	public function testRunningMigration()
	{
		$this->assertTrue(true);
	}
}