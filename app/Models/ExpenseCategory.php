<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExpenseCategory extends Model
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

    /**
     * Office Expenses
     *
     * @return HasMany
     */
    public function office_expenses(): HasMany
    {
        return $this->hasMany(OfficeExpense::class, 'expense_category_id');
    }
}
