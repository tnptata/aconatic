<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claimlists', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignIdFor(\App\Models\Warranty::class);
            $table->enum('status',['รอชำระ','รอส่งซ่อม','ส่งซ่อม','รับคืนงานซ่อม','ปิดงาน']);
            $table->string('damage');
            $table->string('repair_condition')->nullable();
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
        Schema::dropIfExists('claimlists');
    }
}
