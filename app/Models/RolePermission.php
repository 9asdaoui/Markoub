<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

    protected $table = 'role_permissions';
    
    protected $fillable = [
        'role_id',
        'permission_id'
    ];
    
    // Disable timestamps as the migration doesn't have timestamp columns
    public $timestamps = false;
    
    // Define primary key columns
    protected $primaryKey = ['role_id', 'permission_id'];
    
    // Tell Laravel this model uses composite keys
    public $incrementing = false;
    
    /**
     * Get the role that owns the permission.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    /**
     * Get the permission that belongs to the role.
     */
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
