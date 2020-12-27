<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('code', 50);
            $table->unsignedTinyInteger('status_id')->default(1)->index();
            $table->unsignedTinyInteger('format_id')->default(1)->index();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->text('address')->nullable();
            $table->boolean('is_vip')->default(false);

            $table->foreign('project_id')->references('id')->on('project');

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
        Schema::dropIfExists('guest');
    }
}
