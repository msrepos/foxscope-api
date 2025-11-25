<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scopes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('note');
            $table->bigInteger('views')->nullable();
            $table->bigInteger('visits')->nullable();
            $table->string('img')->nullable();
            $table->decimal('lat', 17, 14);
            $table->decimal('lng', 17, 14);
            $table->unsignedBigInteger('user_id')->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('type_id')->default(1);
            $table->foreign('type_id')->references('id')->on('scope_types');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('scope_statuses');
            $table->string('country_code');
            $table->enum('privacy', ['public', 'private'])->default('public');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scopes');
    }
};
