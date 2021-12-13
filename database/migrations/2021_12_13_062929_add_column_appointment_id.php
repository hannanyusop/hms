<?php

use App\Models\AppointmentHasDisease;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAppointmentId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointment_has_diseases', function (Blueprint $blueprint){
            $blueprint->bigInteger('appointment_id')->after('id');
        });

        Schema::table('appointments', function (Blueprint $blueprint){
            $blueprint->tinyInteger('completed_status')->after('pharmacies_id')->default(0);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointment_has_diseases', function (Blueprint $blueprint){
            $blueprint->dropColumn('appointment_id');
        });

        Schema::table('appointments', function (Blueprint $blueprint){
            $blueprint->dropColumn('completed_status');
        });
    }


}
