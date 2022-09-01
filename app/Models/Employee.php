<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $company_id
 * @property string|null $email
 * @property string|null $phone_number
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Database\Factories\EmployeeFactory factory(...$parameters)
 * @method filter($value)
 * @mixin Eloquent
 */
class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'company_id'
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['first_name'] . ' ' . $attributes['last_name'],
        );
    }

    /**
     * @param $query
     * @param array $filters
     * @return void
     */
    public function scopeFilter($query, array $filters)
    {
        $query
            ->when($filters['search'] ?? false, function ($query, $search) {
                $query
                    ->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phone_number', 'like', '%' . $search . '%')
                    ->orWhereHas('company', function ($query) use ($search) {
                        $query
                            ->where('name', 'like', '%' . $search . '%');
                        });
            });

        $query
            ->when($filters['lastName'] ?? false, function ($query, $lastName) {
                $query
                    ->where('last_name', 'like', $lastName . '%');
            });
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}

