<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlineApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id', false, true);
            $table->string('name');
            $table->date('dob');
            $table->string('father_name');
            $table->string('mother_name');

            $table->string('present_street_address_1');
            $table->string('present_street_address_2');
            $table->string('present_village_town_city');
            $table->integer('present_district_id', false, true);
            $table->string('present_pin');
            $table->string('present_police_station');

            $table->string('permanent_street_address_1');
            $table->string('permanent_street_address_2');
            $table->string('permanent_village_town_city');
            $table->integer('permanent_district_id', false, true);
            $table->string('permanent_pin');
            $table->string('permanent_police_station');


            $table->string('nationality');
            $table->string('employment_exchange_registered');
            $table->string('employment_exchange_number')->nullable();

            $table->string('hslc_stream')->nullable();
            $table->string('hslc_university');
            $table->string('hslc_percentage');
            $table->string('hslc_division');

            $table->string('hs_stream');
            $table->string('hs_university');
            $table->string('hs_percentage');
            $table->string('hs_division');

            $table->string('graduation_stream')->nullable();
            $table->string('graduation_university')->nullable();
            $table->string('graduation_percentage')->nullable();
            $table->string('graduation_division')->nullable();

            $table->string('others_stream')->nullable();
            $table->string('others_university')->nullable();
            $table->string('others_percentage')->nullable();
            $table->string('others_division')->nullable();

            $table->string('computer_knowledge');
            $table->string('experience');
            $table->string('experience_in_health')->default(0);

            $table->string('assamese_read');
            $table->string('assamese_write');
            $table->string('assamese_speak');

            $table->string('hindi_read');
            $table->string('hindi_write');
            $table->string('hindi_speak');

            $table->string('english_read');
            $table->string('english_write');
            $table->string('english_speak');

            $table->string('hslc_admit_card');
            $table->string('hslc_marksheet');
            $table->string('hslc_certificate');
            $table->string('hs_marksheet');
            $table->string('hs_certificate');
            $table->string('computer_certificate')->nullable();
            $table->string('exp_certificate');
            $table->string('recent_photo');
            $table->string('signature');

            $table->date('submission_date');
            $table->string('ip_address');
            $table->string('unique_code');
            
            $table->boolean('status')->default(1)->comment('0=deactivate,1=active');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('present_district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('permanent_district_id')->references('id')->on('districts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('online_applications');
    }
}
