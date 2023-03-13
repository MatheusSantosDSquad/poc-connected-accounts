<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->integer('fee')
                ->after('has_account_details')
                ->nullable();

            $table->string('fee_type')
                ->after('fee')
                ->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['fee', 'fee_type']);
        });
    }
};
