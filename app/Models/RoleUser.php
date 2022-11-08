<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property int $role_id
 * @property int $user_id
 * @property ?string $comment
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property Role $role
 * @property User $user
 */
class RoleUser extends Pivot
{
    //
}
