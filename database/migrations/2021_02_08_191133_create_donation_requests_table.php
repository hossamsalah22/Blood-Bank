<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('phone');
			$table->integer('city_id')->unsigned();
			$table->integer('blood_type_id')->unsigned();
			$table->string('hospital_name');
			$table->integer('patient_age');
			$table->integer('blood_bags_num');
			$table->string('hospital_address');
			$table->integer('client_id')->unsigned();
			$table->text('notes')->nullable();
			$table->decimal('longitude', 10,8)->nullable();
			$table->decimal('latitude', 10,8)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}