<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table(
            'companies',
            fn (Blueprint $table) => $table->string('stripe_account')
                ->nullable()
                ->index()
                ->after('trial_ends_at')
        );
    }

    public function down(): void
    {
        Schema::table(
            'companies',
            fn (Blueprint $table) => $table->dropColumn('stripe_account')
        );
    }
};
