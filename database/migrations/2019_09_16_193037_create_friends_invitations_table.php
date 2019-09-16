<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends_invitations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('from');
            $table->foreign('from')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('to');
            $table->foreign('to')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('accepted')->default(false);
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
        Schema::dropIfExists('friends_invitations');
    }
}
