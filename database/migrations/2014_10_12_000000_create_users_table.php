<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name')->default('noname');
			
			$table->string('first_name')->default('noname');
			$table->string('last_name')->default('noname');
			$table->string('username')->unique();
			$table->string('address-country')->default('noname');
			$table->string('cell')->default('noname');
            $table->string('email')->default('noname');
			
			$table->string('bank_name')->default('none');
			$table->string('account_number')->default(0);
			$table->string('branch_code')->default(0);
			$table->string('btc_address')->default('none');
			
		    $table->string('password')->default('noname');
			$table->string('password_decode')->default('noname');
			
			//
			
		    $table->string('creator_status')->default('none');
			$table->string('status')->default('none');
			$table->string('platform')->default('none');
			$table->string('company_name')->default('none');
			$table->string('compaign_name')->default('none');
			
			
			
			$table->string('rand_startdate')->default('none');
			$table->string('rand_enddate')->default('none');
			
			$table->string('btc_startdate')->default('none');
			$table->string('btc_enddate')->default('none');
			
			
			$table->string('rand_payme')->default(0);
			$table->string('btc_payme')->default(0);
			$table->string('rand_invest')->default(0);
			$table->string('btc_invest')->default(0);
				
			
			$table->string('registration_charge')->default('none');
			
			$table->string('btc_charge')->default('none');
			$table->string('internal_wallet')->default('none');
			$table->string('bitcoin_address')->default('none');//external wallet
			//
			$table->string('userapi_avabtc')->default(0);//available money on btc
            $table->rememberToken();
            $table->timestamps();
        });
    }
     //internal wallet== to wallet requested by API this wallet will search on database and update platform
	
	//wallet money will be > registration charge
	//wallet money will be >creator_values
	//wallet money will be >child1_value
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
