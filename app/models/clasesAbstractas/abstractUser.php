<?php


class abstractUser extends Eloquent{

	public function __construct(){}

		public function canEdit(){
		if(Auth::user()->isAdmin == '1'){
			return true;
		}else{
			return false;
		}
	}

	public function canDelete(){
		if(Auth::user()->isAdmin == '1'){
			return true;
		}else{
			return false;
		}
	}

}

