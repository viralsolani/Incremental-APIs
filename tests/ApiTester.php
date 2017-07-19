<?php

use Faker\Factory as Faker;

class ApiTester extends TestCase
{
    /**
     * @var Faker
     */
    protected $fake;

    /**
     * @var int
     */
    protected $times = 1;

    /**
     * Initialize.
     */
    public function __construct()
    {
        $this->fake = Faker::create();
    }

    /**
     * Setup database for each test.
     */
    public function setUp()
    {
        parent::setUp();

        //$this->app['artisan']->call('migrate');
    }

    /**
     * Number of times to make entities.
     *
     * @param $count
     *
     * @return $this
     */
    protected function times($count)
    {
        $this->times = $count;

        return $this;
    }

    /**
     * Get JSON output from API.
     *
     * @param $uri
     *
     * @return mixed
     */
    protected function getJson($uri)
    {
        return json_decode($this->call('GET', $uri)->getContent());
    }

    /**
     * Assert object has any number of attributes.
     */
    protected function assertObjectHasAttributes()
    {
        $args = func_get_args();
        $object = array_shift($args);

        foreach ($args as $attribute) {
            $this->assertObjectHasAttribute($attribute, $object);
        }
    }
}
