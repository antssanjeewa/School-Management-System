<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendDateChildren extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attend_date_children', function (Blueprint $table) {
            $table->unsignedBigInteger('children_id');
            $table->unsignedBigInteger('attend_date_id');
            $table->boolean('present');
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['children_id','attend_date_id']);
            $table->foreign('children_id')->references('id')->on('childrens')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('attend_date_id')->references('id')->on('attend_dates')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attend_date_children');
    }
}
