<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->default(0)->comment('顧客id');
            $table->foreignId('treatment_type_id')->default(0)->comment('施術タイプid');
            $table->foreignId('sales_id')->default(0)->comment('売上id');
            $table->datetime('start_time')->comment('開始時間');
            $table->boolean('reservable')->default(true)->comment('予約可能');
            $table->boolean('babysitting')->default(false)->comment('託児サービス');
            $table->boolean('payment')->default(false)->comment('支払いあり');
            $table->tinyInteger('payment_method')->default(0)->comment('支払い方法');
            $table->boolean('completed')->default(false)->comment('施術済み');
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
        Schema::dropIfExists('reservations');
    }
}
