<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	
    protected $fillable = [
        'name','username','address-country','cell','email','bank_name','account_number','branch_code','	btc_address','password','password_decode','creator_status','status','platform','company_name','rand_payme','btc_payme','rand_invest','btc_invest','child_money','btc_childmoney','	registration_charge','btc_charge','internal_wallet','bitcoin_address','compaign_name',
    ];
	

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
public function role() {
        return $this->belongsTo('App\Role', 'id');
    }
	public function sbvtriangle() {
        return $this->belongsTo('App\Triangle_grand', 'id');
    }
}
