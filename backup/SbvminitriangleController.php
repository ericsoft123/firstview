<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class SbvminitriangleController extends Controller
{
    //
	public function createsbvmini(Request $request){
			$username1=str_random(5);
		$username2=str_random(6);
		$password1=str_random(8);
		$password2=str_random(7);
		
      $creator_username=$request->input('creator_username');
	 $triangle_parents=$creator_username;
      $creator_money=$request->input('creator_money');
      
	 
	  $child1_email=$request->input('child1_email');
	  $child2_email=$request->input('child2_email');
	  $child1_cell=$request->input('child1_cell');
	  $child2_cell=$request->input('child2_cell');
	  $registration_charge=$request->input('registration_charge');
	  $bitcoin_address=$request->input('bitcoin_address');
	  $address_country1=$request->input('address-country1');
	  $address_country2=$request->input('address-country2');
		//$status="inactive";
		
	$child1_username=substr($child1_email,0,strrpos($child1_email,'@'))."".$username1;
	$child2_username=substr($child2_email,0,strrpos($child2_email,'@'))."".$username2;
		
     // $child1_money=$request->input('creator_money');
//      $child2_money=$request->input('creator_money');
		
		//////
      //$creator_values=$request->input('creator_username');
      //$child1_values=$request->input('creator_money');
     // $child2_values=$request->input('creator_money');
    
      //$country_manager=$request->input('creator_username');
      //$triangle_status=$request->input('creator_usernames');
	  //$vcm=$request->input('creator_username');
	 // $triangle_parents=$request->input('creator_username');
		$today = date("Y-m-d H:i:s"); 
      //$creator_username="makuta";
    //  $creator_money="kagame";
     //$child1_username="sipo";
      //$child2_username="bino";
//		$child1_cell="fi";
//      $child2_cell="ceh";
//		$child1_email="fi";
//      $child2_email="ceh";
//      $child1_money="fi";
//      $child2_money="ceh";
//	
//		
      //$creator_values="ceh";
//     $child1_values="ceh";
//     $child2_values="ceh";
//      $vcm="pesi";
// $country_manager="gizo";
//      $triangle_status="gizo";
//      $triangle_parents="gizo";
    
      
	////working one
//DB::insert('insert into  triangle_grands(creator_username,creator_money,child1_username,child2_username,child1_cell,child2_cell,child1_email,child2_email,child1_money,child2_money,creator_values,child1_values,child2_values,vcm,country_manager,triangle_status,triangle_parents,created_at,updated_at)
//      values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($creator_username,$creator_money,$child1_username,$child2_username,$child1_cell,$child2_cell,$child1_email,$child1_email,$child1_money,$child2_money,$creator_values,$child1_values,$child2_values,$vcm,$country_manager,$triangle_status,$triangle_parents,$today,$today));
//		
		
		////working one
		
		DB::insert('insert into  triangle_minis(creator_username,creator_money,child1_username,child2_username,child1_cell,child2_cell,child1_email,child2_email,triangle_parents,created_at,updated_at)
      values(?,?,?,?,?,?,?,?,?,?,?)',array($creator_username,$creator_money,$child1_username,$child2_username,$child1_cell,$child2_cell,$child1_email,$child2_email,$triangle_parents,$today,$today));
		
		
//		// start this is to save generated user name,email,password in database users using model user located in backup
		$user=new User([
			//this is to initialize model and input type
			'name'=>$username1,
			'username'=>$child1_username,
			'address-country'=>$address_country1,
			'cell'=>$child1_cell,
			'email'=>$child1_email,
			'password'=>$password1,
			'status'=>'inactive',
			'platform'=>'child_minis',
			'child_money'=>$creator_money,
			
			
			
			
		]); // load class from user model to call fillable this will initialize table column with input
		$user->save();
		$user=new User([
			//this is to initialize model and input type
			'name'=>$username2,
			'username'=>$child2_username,
			'address-country'=>$address_country2,
			'cell'=>$child2_cell,
			'email'=>$child2_email,
			'password'=>$password2,
			'status'=>'inactive',
			'platform'=>'child_minis',
			'child_money'=>$creator_money,
			
			
			
			
		]); // load class from user model to call fillable this will initialize table column with input
		$user->save();
		

//end this is to save generated user name,email,password in database users using model user located in backup
     //Start This code is to Update user on users table who were creator to change platform to Creator_Grand
		
		////
		DB::table('users')
           ->where('username',$creator_username)
         ->update(
		 [
			//this is to initialize model and input type
			
			'status'=>'active',
			'platform'=>'creator_minis',
			 'registration_charge'=>$registration_charge,
			 'bitcoin_address'=>$bitcoin_address,
		
		]
		 
		 );
		
		
		////
		 //End This code is to Update user on users table who were creator to change platform to Creator_Grand


	}
	public function activate_childmini(Request $request)
	{
		$creator_username=$request->input('creator_username'); //means that it is equal to authenticated users
		 $creator_money=$request->input('creator_money');
		 $bitcoin_address=$request->input('bitcoin_address');
		$registration_charge=$request->input('registration_charge');
		DB::table('users')
           ->where('username',$creator_username)
         ->update(
		 [
			//this is to initialize model and input type
			
			'status'=>'active',
			'platform'=>'child_active',
			 'registration_charge'=>$registration_charge,
			 'bitcoin_address'=>$bitcoin_address,
		
		]
		 
		 );
		
	}
}
