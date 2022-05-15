<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesdegroupesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagesdegroupes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')->constrained('users');
            $table->foreignId('groupId')->constrained('groupes');
            $table->string('type')->default('text');
            $table->text('content');
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
        Schema::dropIfExists('messagesdegroupes');
    }
}
