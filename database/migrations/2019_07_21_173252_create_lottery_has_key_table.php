<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotteryHasKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery_has_key', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lottery_id')->unsigned();
            $table->integer('key_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('lotteries', function (Blueprint $table) {
            $table->dropColumn('key_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lottery_has_key');
        Schema::table('lotteries', function (Blueprint $table) {
            $table->integer('key_id')->unsigned();
        });
    }
}
