<?php

namespace App\Http\Controllers;

use Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\Mysql\Userindex as Userindex;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($action = 'search') {
        return call_user_func_array(array($this, $action), array());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function search() {
        $user = new UserIndex;
        $faker = Faker\Factory::create();
        $user->name = $faker->name;
        $user->email = $faker->email;
        $user->password =  Hash::make($faker->password);
        $user->created_at = $faker->dateTime;
        $user->updated_at = $faker->dateTime;
        $user->remember_token = NULL;
        $user->save();
        // Get all records from the Review that match the term "Llew"
       //return Review::search('Holly')->get();

        // Get all records from the Review that match the term "Llew",
        // limited to 20 per page and reading the ?page query parameter,
        // just like Eloquent pagination
        //User::search('Holly')->paginate(20);

        // Get all records from the Review that match the term "Llew"
        // and have an account_id field set to 2
        //User::search('Holly')->where('account_id', 2)->get();
    }
    
}
