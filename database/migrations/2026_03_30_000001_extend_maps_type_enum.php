<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // MODIFY COLUMN is MySQL-only; SQLite (used in tests) does not support it.
        // The base maps migration already uses a plain string column, so this is a no-op on SQLite.
        if (DB::getDriverName() === 'sqlite') {
            return;
        }

        DB::statement("ALTER TABLE maps MODIFY COLUMN type ENUM('evacuation','hazard','geojson','wms') NOT NULL");
    }

    public function down(): void
    {
        if (DB::getDriverName() === 'sqlite') {
            return;
        }

        DB::statement("ALTER TABLE maps MODIFY COLUMN type ENUM('evacuation','hazard') NOT NULL");
    }
};
