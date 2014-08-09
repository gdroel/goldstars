<?php 

class Student extends Eloquent{

	//A student belongs to a pastor, who is also known as a user.
	public function user(){

		return $this->belongsTo('User');
	}

	public static function addStar($id){

		Student::where('id',$id)->increment('stars');
		
	}
}