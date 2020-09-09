<?php

/**
 * Command used to create this migration:
 * $  php artisan make:migration creates_profile_user_pivot_table --create profile_user
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesProfileUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_user', function (Blueprint $table) {
            $table->bigIncrements("id");

            // Add unsigned big integer for profile_id and user_id.
            // This allows us to create an M:N relationship for followings.
            $table->unsignedBigInteger("profile_id");
            $table->unsignedBigInteger("user_id");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_user');
    }
}
