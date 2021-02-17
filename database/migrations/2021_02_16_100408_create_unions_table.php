<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id')->comment('Fk of Devision Table');
            $table->unsignedBigInteger('district_id')->comment('Fk of Devision Table');
            $table->unsignedBigInteger('upazila_id')->comment('Fk of Devision Table');
            $table->string('union_name', 30);
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
        Schema::dropIfExists('unions');
    }
}
