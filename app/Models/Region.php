<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function getRegionsForForm(): array
    {
        return self::all()
            ->mapWithKeys(function ($item) {
                return [$item['id'] => $item['name']];
            })
            ->toArray();
    }
}
