<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEInvitationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_invitation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->index();
            $table->string('font')->nullable();
            $table->boolean('is_display_text_over_cover')->default(true);
            $table->string('title')->nullable();
            $table->string('text_top')->nullable();
            $table->string('text_bottom')->nullable();
            $table->text('message')->nullable();
            $table->boolean('is_display_qr')->default(true);

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
        Schema::dropIfExists('e_invitation');
    }
}
