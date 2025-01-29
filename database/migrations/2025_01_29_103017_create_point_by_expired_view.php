<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("DROP VIEW IF EXISTS point_by_expired_views");
        DB::statement("CREATE VIEW point_by_expired_views AS
              SELECT    user_id,
                        expired_at,
                        sum(point) AS total_point,
                        sum(used) AS used_point,
                        sum(point - used) AS remaining_point
              FROM points
              WHERE deleted_at IS NULL
                    AND is_active = 1
              GROUP BY user_id, expired_at
              ORDER BY user_id, expired_at"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW point_by_expired_views");
    }
};
