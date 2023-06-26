<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100)->comment('姓');
            $table->string('last_name', 100)->comment('名');
            $table->string('first_kana_name', 100)->comment('セイ');
            $table->string('last_kana_name', 100)->comment('メイ');
            $table->string('email', 100)->comment('メール');
            $table->string('tel', 100)->nullable()->comment('電話番号');
            $table->string('zipcode', 10)->nullable()->comment('郵便番号');
            $table->integer('prefectures')->nullable()->comment('都道府県');
            $table->string('address', 255)->nullable()->comment('住所');
            $table->string('building', 255)->nullable()->comment('建物');
            $table->date('birthday')->nullable()->comment('生年月日');
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
        Schema::dropIfExists('customers');
    }
}
