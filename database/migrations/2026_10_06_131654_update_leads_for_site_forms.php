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
        Schema::table('leads', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('trainees_per_year')->nullable()->after('interest');
            $table->timestamp('privacy_accepted_at')->nullable()->after('message');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn(['trainees_per_year', 'privacy_accepted_at']);
            $table->string('name')->nullable(false)->change();
        });
    }
};
