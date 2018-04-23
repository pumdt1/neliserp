<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Filters\TaskFilter;

class Task extends Model
{
    use RecordsActivity;

    protected $fillable = [
        'code',
        'name',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = uuid();
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function scopeFilter($builder, TaskFilter $filter)
    {
        return $filter->apply($builder);
    }
}
