<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->integer('status')->default(1);
            $table->string('regular_price');
            $table->string('discount_price')->nullable();
            $table->string('featured');
            $table->integer('quantity');
            $table->integer('post_type_id');
            $table->boolean('taxable')->default(false);
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
