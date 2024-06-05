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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->String('contenu');
            $table->boolean('is_read')->default(false);
            $table->timestamp('dateN')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreignId('userId')
            ->constrained('utilisateurs')
            ->onDelete('cascade')
            ->onUpdatet('cascade');
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
        Schema::dropIfExists('notifications');
    }
};
