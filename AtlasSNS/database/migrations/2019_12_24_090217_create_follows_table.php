<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
          //  $table->integer('id')->autoIncrement();
            $table->bigIncrements('id');
            $table->foreign('following_id')->index()->comment('フォローしているユーザID');
            $table->foreign('followed_id')->index()->comment('フォローされているユーザID');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));

            $table->foreign('followed_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->foreign('following_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('follows');
    }
}
