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
       Schema::create('commentaires', function (Blueprint $table) {
    $table->id();
    $table->string('contenu');
    $table->timestamp('dateS')->useCurrent();
    $table->foreignId('userId')
          ->constrained('utilisateurs')
          ->onDelete('cascade')
          ->onUpdate('cascade');
    $table->foreignId('offId')
          ->constrained('offers')
          ->onDelete('cascade')
          ->onUpdate('cascade');
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
        Schema::dropIfExists('commentaires');
    }
};
