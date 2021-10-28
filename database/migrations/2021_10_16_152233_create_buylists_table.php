<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buylists', function (Blueprint $table) {
            $table->id();
            $table->date('buy_date');
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\Product::class);
            $table->integer('amount');
            $table->boolean('delivered')->default(false);
            $table->date('deliver_date')->nullable();
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
        Schema::dropIfExists('buylists');
    }
}
