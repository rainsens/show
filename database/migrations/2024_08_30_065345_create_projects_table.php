<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(0)->index();
            $table->string('initiator');
            $table->string('cover')->nullable();
            $table->string('title');
            $table->string('brief');
            $table->text('detail');
            $table->integer('progress')->default(0);
            $table->boolean('is_team')->default(true);
            $table->string('team_name')->nullable();
            $table->timestamps();
            $table->index(['created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
