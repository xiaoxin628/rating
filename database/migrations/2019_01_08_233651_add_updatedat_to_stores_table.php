<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUpdatedatToStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            if (Schema::hasColumn('stores', 'created')) {
                $table->renameColumn('created', 'created_at');
            }
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            //
        });
    }
}
