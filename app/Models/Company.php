<?php

namespace App\Models;

use Database\Factories\CompanyFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Company
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string|null $logo
 * @property string|null $website
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method filter($value)
 * @method static CompanyFactory factory(...$parameters)
 * @method static Builder|Company newModelQuery()
 * @method static Builder|Company newQuery()
 * @method static Builder|Company query()
 * @method static Builder|Company whereCreatedAt($value)
 * @method static Builder|Company whereEmail($value)
 * @method static Builder|Company whereId($value)
 * @method static Builder|Company whereLogo($value)
 * @method static Builder|Company whereName($value)
 * @method static Builder|Company whereUpdatedAt($value)
 * @method static Builder|Company whereWebsite($value)
 * @mixin Eloquent
 */
class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'website',
        'logo'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query
            ->when($filters['search'] ?? false, function ($query, $search) {
                $query
                    ->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('website', 'like', '%' . $search . '%');
            });


        $query
            ->when($filters['name'] ?? false, function ($query, $name) {
                $query
                    ->where('name', 'like', $name . '%');
            });
    }

    public
    function employees(): HasMany
    {
        return $this->hasMany(Employee::class)->orderBy('last_name');
    }
}
