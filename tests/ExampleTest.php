<?php

use App\Jobs\SendReminderEmail;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
   // use WithoutMiddleware;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('queue/sendmail');
        //$this->seeJsonEquals([
        //         'created' => true,
        //     ]);
        
        //$this->assertTrue(true);
        
        //$response = $this->call('GET', '/');
        //$this->assertEquals(200, $response->status());
        
        $this->seeInDatabase('users', ['email' => 'lap@rowboat.com']);
        //$this->expectsJobs(App\Jobs\SendReminderEmail::class);
        echo '--------------------------------';
        $this->visit('queue/justtest');
        $this->see('nothing');
    }
}
