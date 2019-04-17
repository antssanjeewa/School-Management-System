<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenClassRoom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children_class_room', function (Blueprint $table) {
           $table->unsignedBigInteger('children_id');
            $table->unsignedBigInteger('class_room_id');
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['children_id','class_room_id']);
            $table->foreign('children_id')->references('id')->on('childrens')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('class_room_id')->references('id')->on('class_rooms')
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
        Schema::dropIfExists('children_class_room');
    }
}
