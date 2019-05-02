<?php

namespace Tests\Unit\App;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2017-12-16 at 16:44:41.
 */
class RegisterControllerTest extends TestCase {
    
    use DatabaseMigrations;
    //use DatabaseTransactions;

    /**
     * @var RegisterController
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        parent::setUp();
        $this->object = new \App\Http\Controllers\Auth\RegisterController;
    }

    /**
     * @covers App\Http\Controllers\Auth\RegisterController::create
     * @todo   Implement testCreate().
     */
    public function testCreate() {
        $data = array('email' => str_random(10) . '@noemail.app', 'name' => str_random(10), 'password' => str_random(6));
        $result = $this->object->create($data);
        $this->assertEquals($result->email, $data['email']);
    }

}
