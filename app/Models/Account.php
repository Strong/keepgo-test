<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property SimCard[] $activeSimCards
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 *
 * @mixin \Eloquent
 */
class Account extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function simCards(): HasMany
    {
        return $this->hasMany(
            SimCard::class,
            'account_id',
            'id',
        );
    }

    public function activeSimCards(): HasMany
    {
        return $this->simCards()->active();
    }
}
