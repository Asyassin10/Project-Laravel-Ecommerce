<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProuductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prouducts', function (Blueprint $table) {
            $table->id();
            $table->string('titale');
            $table->string('slug', 191)->unique();
            $table->text('description');
            $table->float('price', 8, 2)->default(0);
            $table->float('old_price', 8, 2)->default(0);
            $table->integer('in_stock')->default(0);
            $table->integer('qty')->default(0);
            $table->string('picture');
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');





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
        Schema::dropIfExists('prouducts');
    }
}