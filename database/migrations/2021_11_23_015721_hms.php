<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hms extends Migration
{

    public function up()
    {
        Schema::create('appointments', function (Blueprint $table){
            $table->id();
            $table->string('code', 50)->unique();
            $table->integer('patient_id');
            $table->integer('billing_id')->nullable();
            $table->integer('qms_no');
            $table->integer('checked_by')->nullable();
            $table->integer('pharmacies_id')->nullable();
            $table->timestamps();
        });

        Schema::create('appointment_has_diseases', function (Blueprint $table){
            $table->id();
            $table->integer('disease_id');
            $table->text('remark');
            $table->timestamps();
        });

        Schema::create('appointment_has_bills', function (Blueprint $table){
            $table->id();
            $table->string('code', 50)->unique();
            $table->integer('patient_id');
            $table->tinyInteger('payment_status');
            $table->decimal('total', 10,2)->default(0.00);
            $table->integer('generated_by')->nullable();
            $table->integer('received_by')->nullable();
            $table->timestamps();
        });

        Schema::create('appointment_has_drugs', function (Blueprint $table){
            $table->id();
            $table->integer('appointment_id');
            $table->integer('drug_id');
            $table->integer('qty')->default(0);
            $table->decimal('price_per_item', 10,2)->default(0.00);
            $table->decimal('after_adjustment', 10,2)->default(0.00);
            $table->text('remark');
            $table->timestamps();
        });

        Schema::create('bill_items', function (Blueprint $table){
            $table->id();
            $table->integer('bill_id');
            $table->integer('item');
            $table->decimal('price_per_item', 10,2)->default(0.00);
            $table->decimal('total_price', 10,2)->default(0.00);
            $table->timestamps();
        });

        Schema::create('drugs', function (Blueprint $table){
            $table->id();
            $table->string('code', 50)->unique();
            $table->string('name', 255);
            $table->decimal('price', 10,2)->default(0.00);
            $table->integer('left')->default(0);
            $table->integer('total_qty')->default(0);
            $table->timestamps();
        });

        Schema::create('drugs_log_batches', function (Blueprint $table){
            $table->id();
            $table->integer('pharmacies_id');
            $table->tinyInteger('status');
            $table->text('remark');
            $table->timestamps();
        });

        Schema::create('drug_logs', function (Blueprint $table){
            $table->id();
            $table->integer('batch_id');
            $table->integer('drug_id');
            $table->integer('qty')->default(0);
            $table->date('expired_date');
            $table->timestamps();
        });

        Schema::create('patients', function (Blueprint $table){
            $table->id();
            $table->string('card_no', 10)->unique();
            $table->string('name', 255);
            $table->string('no_ic', 255)->nullable();
            $table->date('dob');
            $table->string('no_passport', 255)->nullable();
            $table->string('no_phone', 20);
            $table->integer('nationality');
            $table->text('allergies_information')->nullable();
            $table->text('diseases_history')->nullable();
            $table->timestamps();
        });

        Schema::create('patient_has_heirs', function (Blueprint $table){
            $table->id();
            $table->integer('patient_id');
            $table->integer('registered_id')->nullable();
            $table->string('name', 255);
            $table->string('relation');
            $table->string('no_phone', 20);
            $table->date('dob');
            $table->timestamps();
        });

        Schema::create('diseases', function (Blueprint $table){
            $table->id();
            $table->string('code', 50)->unique();
            $table->string('name', 255);
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('appointments');
        Schema::drop('appointment_has_bills');
        Schema::drop('appointment_has_drugs');
        Schema::drop('diseases');
        Schema::drop('appointment_has_diseases');
        Schema::drop('bill_items');
        Schema::drop('drugs');
        Schema::drop('drugs_log_batches');
        Schema::drop('drug_logs');
        Schema::drop('patients');
        Schema::drop('patient_has_heirs');
    }
}
