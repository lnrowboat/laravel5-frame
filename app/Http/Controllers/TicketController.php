<?php
namespace App\Http\Controllers;
use Illuminate\Events\Dispatcher as Event;
use App\Events\OrderEvent as OrderEvent;
use App\Providers\RegisterIoc as RegisterIoc;

use App;
use Cache;
/*
 Use model: App::make('model'.'Name_of_model');
 Triger an event : event(new Name_of_Event());
*/

class TicketController extends Controller {
   
    public function __construct() {
        //$this->middleware('auth');
		//$this->middleware(['checkage', 'checkname']);
    }
    
	public function getAll() {
		return App::make('modelMongohaha')->all();
    }
	
	public function doCache() {
		Cache::put('bar', 'baz value', 10000);
    }
	
	public function getCache() {
		return Cache::get('bar');
    }
	
	public function testModelMongo() {
        return App::make('modelMongohaha')->first();
    }
	
	public function testModelMySql() {
        return App::make('modelUser')->first();
    }
	
	public function testEvent() {
        $item = App::make('modelMongohaha');
        $item = $item->first();
        event(new OrderEvent($item));
        return 'do that';
    }
	
	public function testNestInclude() {
        $item = App::make('modelMongohaha');
        $item = $item->first();
        event(new OrderEvent($item));
        return 'do that';
    }
	
	public function doNothing() {
		//$rc = new RegisterIoc();
        //return $rc->doNothing();
    }
    
    public function testMoreEvent(Event $event) {
        $item = App::make('subscriber');
        echo $item->subscribe($event);
	}
    
     public function getIndex($state = 'all_open')
    {
       
      // \DB::connection('mongodb')->enableQueryLog();
        $listType = TypeService::getListsType();
        $listPriorities = TicketModel::$prioritys;
        $states = TicketModel::$states;
        $group = strtolower($state);

        $ticketModel = new TicketModel;


        $items = $ticketModel->getAllOpenTickets(\Auth::user());
        //$itemsDifferent = $ticketModel->getAllTicketNotState($group, \Auth::user());

        //get branch map
        $branchMap = BranchService::getListBranchMap();

        $userPermission = PermissionsService::getListPermissionOfScenario();
        // dd($userPermission);
        return view('ticket.index', [
          'state' => 'all_open',
          'listType' => [],
          'prioritys' => [],
          'items' => $items,
          'states' => [],
          'itemsDifferent' => [],
          'branchMap' => [],
          'userPermission' => [],
        ]);
    }
}
