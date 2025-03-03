<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navette extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'departure_city',
        'arrival_city',
        'departure_time',
        'arrival_time',
        'seats_total',
        'seats_booked',
        'description',
        'status'
    ];

    /**
     * Get the company that owns the navette.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the tickets for the navette.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Get the users who booked tickets for this navette.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'tickets');
    }
}