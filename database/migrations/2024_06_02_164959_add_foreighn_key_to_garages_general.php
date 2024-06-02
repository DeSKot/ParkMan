<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('garages_general', function (Blueprint $table) {
            $table->foreign('owner_id')
                ->references('id')
                ->on('garages_owner')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('garages_general', function (Blueprint $table) {
            $table->dropForeign('garages_general_owner_id_foreign');
        });
    }
};
