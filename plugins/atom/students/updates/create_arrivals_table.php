<?php namespace Atom\Students\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateArrivalsTable extends Migration
{
    public function up()
    {
        Schema::create('atom_students_arrivals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->default(1);
            $table->string('name');
            $table->integer('user_id')->nullable()->index();
            $table->dateTime('arrival_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('atom_students_arrivals');
    }
}
