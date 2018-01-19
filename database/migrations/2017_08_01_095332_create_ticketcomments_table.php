<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticketcomments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment',500);
            $table->integer('ticket_id');
           /* $table->foreign('ticket_id')->references('id')->on('tickets')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
            $table->timestamps();
        });
        Schema::table('ticketcomments', function (Blueprint $table) {
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('no action');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticketcomments');
    }
}
