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
            $table->string('name');
            $table->double('price');
            $table->text('ingredients');
            $table->text('description')->nullable()->default('N/A');
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('type_id')
                  ->references('id')
                  ->on('menu_types');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
            $table->timestamps();
            $table->softDeletes();
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
