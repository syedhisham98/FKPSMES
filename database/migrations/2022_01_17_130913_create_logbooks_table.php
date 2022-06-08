<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbooks', function (Blueprint $table) {
            $table->id(logbook_id);
            $table->string(student_id);
            $table->string(name) ;
            $table->text(title) ;
            $table->date(meet_date);
            $table->time(start_time);
            $table->time(end_time);
            $table->longtext(progress);
            $table->longtext(detail);
            $table->longtext(plan);
            $table->string(status);
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
        Schema::dropIfExists('logbooks');
    }
}
