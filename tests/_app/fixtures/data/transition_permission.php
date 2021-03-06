<?php

$now = new yii\db\Expression('now()');

return [
    [
        'source_stage_id' => 1,
        'target_stage_id' => 2,
        'permission' => 'administrator',
        'created_by' => 1,
        'created_at' => $now,
        'updated_by' => 1,
        'updated_at' => $now,
    ],
    [
        'source_stage_id' => 2,
        'target_stage_id' => 3,
        'permission' => 'admin',
        'created_by' => 1,
        'created_at' => $now,
        'updated_by' => 1,
        'updated_at' => $now,
    ],
    [
        'source_stage_id' => 3,
        'target_stage_id' => 1,
        'permission' => 'admin',
        'created_by' => 1,
        'created_at' => $now,
        'updated_by' => 1,
        'updated_at' => $now,
    ],
    [
        'source_stage_id' => 5,
        'target_stage_id' => 6,
        'permission' => 'admin',
        'created_by' => 1,
        'created_at' => $now,
        'updated_by' => 1,
        'updated_at' => $now,
    ],
    [
        'source_stage_id' => 5,
        'target_stage_id' => 7,
        'permission' => 'admin',
        'created_by' => 1,
        'created_at' => $now,
        'updated_by' => 1,
        'updated_at' => $now,
    ],
    [
        'source_stage_id' => 6,
        'target_stage_id' => 7,
        'permission' => 'admin',
        'created_by' => 1,
        'created_at' => $now,
        'updated_by' => 1,
        'updated_at' => $now,
    ],
    [
        'source_stage_id' => 7,
        'target_stage_id' => 4,
        'permission' => 'admin',
        'created_by' => 1,
        'created_at' => $now,
        'updated_by' => 1,
        'updated_at' => $now,
    ],
];
