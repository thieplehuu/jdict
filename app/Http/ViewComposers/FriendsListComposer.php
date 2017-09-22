<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class  FriendsListComposer {
	
	protected $friendsList = [];
	
	/**
	 * Create movie contrustor
	 * 
	 * @return void
	 */
	public function _construct(){
		
	}
	
	/** 
	 * Bind data to view
	 * 
	 * @param View $view
	 * @return void
	 */
	public function compose(View $view){
		
		$view->with('friendsList', $this->friendsList);
		
	}
	
}