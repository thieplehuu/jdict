<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class EngineController extends Controller
{
    //
    
	public function pull(Request $request)
	{			
		$endtime = time() + 20;
		$lasttime = $this->fetch($request->all(), 'lastTime');
		$curtime = null;
		
		while(time() <= $endtime){

			$messages = Message::with('user')->orderBy('created_at', 'desc')->limit(30)->get();
						
			$curtime = strtotime($messages->first()->created_at);
			
			if( $messages->count() > 0 && $curtime != $lasttime){
				$this->output(true, '', array_reverse($messages->toArray()), $curtime);
				break;
			}
			else{
				sleep(1);
			}
		}
	}
	
	public function push(Request $request){
		$user = $this->fetch($request->all(), 'user_id');
		$text = $this->fetch($request->all(), 'text');
		
		if(empty($user) || empty($text)){
			$this->output(false, 'Username and Chat Text must be inputted.');
		}
		else{
			$requestData = $request->all();
			
			$requestData['user_id'] = $requestData['user_id'];
			$requestData['message'] = $requestData['message'];
			$message =  Message::create($requestData);
			
			
			if($message){
				$this->output(true, '');
			}
			else{
				$this->output(false, 'Chat posting failed. Please try again.');
			}
		}
	}
	
	public function fetch($request, $name){
		$val = isset($request[$name]) ? $request[$name] : '';
		return $val;
	}
	
	public function output($result, $output, $message = null, $latest = null){
		echo json_encode(array(
				'result' => $result,
				'message' => $message,
				'output' => $output,
				'latest' => $latest
		));
	}
}

