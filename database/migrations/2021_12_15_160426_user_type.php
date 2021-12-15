<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domains\Auth\Models\User;

class UserType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'doctor', 'nurse', 'pharmacy'])->default( 'nurse')->after('type');
        });

        $admin = User::find(1);
        $admin->role = 'admin';
        $admin->save();

        $accounts = [
            'nurse' => [
                'name' => "MDM. AIN BINTI SUHAILI",
                'email' => "ain@hmst.com"
            ],
            'doctor' => [
                'name' => "DR. ALI BIN SABTU",
                'email' => "ali@hmst.com"
            ],
            'pharmacy' => [
                'name' => "MR. ADAM BIN ZULKIFLIE",
                'email' => "adam@hmst.com"
            ]
        ];

        foreach ($accounts as $role => $account){

            $user = User::where('email', $account['email'])->first();

            if($user){
                $user->role = $role;
                $user->save();
            }else{
                User::create([
                    'type' => User::TYPE_USER,
                    'role' => $role,
                    'name' => $account['name'],
                    'email' => $account['email'],
                    'password' => 'secret',
                    'email_verified_at' => now(),
                    'active' => true,
                ]);
            }

        }

        Schema::table('appointment_has_bills', function (Blueprint $table) {
            $table->bigInteger('appointment_id')->after('code');
            $table->dropColumn('patient_id');
        });

        Schema::table('bill_items', function (Blueprint $table) {
            $table->integer('bill_items')->default(0)->after('price_per_item');
        });

    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });

        Schema::table('appointment_has_bills', function (Blueprint $table) {
            $table->bigInteger('patient_id')->after('code');
            $table->dropColumn('appointment_id');
        });

        Schema::table('bill_items', function (Blueprint $table) {
            $table->dropColumn('bill_items');
        });

    }
}
