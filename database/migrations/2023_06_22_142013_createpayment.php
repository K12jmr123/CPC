<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('section');
            $table->longText('message');
            $table->string('amount');
            $table->string('sender');
            $table->date('Date');
            $table->string('status')->nullable();
            $table->integer('numberofstudents')->unsigned()->default(mt_rand(33, 50));
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};