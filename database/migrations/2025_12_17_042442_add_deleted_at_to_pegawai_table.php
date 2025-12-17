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
        // Laravel otomatis tahu ada prefix 'hilarius_...' dari .env'
        Schema::table('pegawai', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
