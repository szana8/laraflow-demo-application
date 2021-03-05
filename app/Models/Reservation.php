<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use szana8\Laraflow\Traits\Flowable;

class Reservation extends Model
{
    use HasFactory, Flowable;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['possibleTransactions', 'actualStepName'];

    /**
     * @var string[]
     */
    protected $casts = [
        'from' => 'date:Y-m-d',
        'to' => 'date:Y-m-d'
    ];

    public function books()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

    public function getLaraflowStates()
    {
        return config('laraflow.default');
    }

    /**
     * Return the possible transitions list.
     *
     * @return array
     */
    public function getPossibleTransactionsAttribute()
    {
        return $this->laraflowInstance()->getPossibleTransitions();
    }

    /**
     * Return the actual step name of the issue.
     *
     * @return string
     */
    public function getFlowHistoryAttribute()
    {
        return $this->history();
    }

    /**
     * Return the actual step name of the issue.
     *
     * @return string
     */
    public function getActualStepNameAttribute()
    {
        return $this->getActualStepName();
    }
}
