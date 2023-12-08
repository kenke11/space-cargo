<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('request_response_logs', function (Blueprint $table) {
            $table->id();
            $table->string('session_id');
            $table->string('user_ip');
            $table->string('method');
            $table->text('url');
            $table->longText('request_parameters')->nullable();
            $table->integer('status_code')->nullable();
            $table->longText('response_content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_response_logs');
    }
};
