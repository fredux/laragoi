<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait
{
    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }

}
