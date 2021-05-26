<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('icon')->nullable(false)->default('');
            $table->integer('seq')->nullable(false);
            $table->biginteger('parent_menus_id')->nullable(false)->default(0);
            $table->biginteger('features_id')->nullable(false)->default(0);
            $table->boolean('active')->nullable(false)->default(true);
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
        Schema::dropIfExists('menus');
    }
}
