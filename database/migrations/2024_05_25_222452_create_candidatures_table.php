<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')
            ->constrained('utilisateurs')
            ->onDelete('cascade')
            ->onUpdatet('cascade');
            $table->foreignId('offerId')
            ->constrained('offers')
            ->onDelete('cascade')
            ->onUpdatet('cascade');
            $table->string('CV');
            $table->timestamp('dateS')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('status');
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
        Schema::dropIfExists('candidatures');
    }
};
