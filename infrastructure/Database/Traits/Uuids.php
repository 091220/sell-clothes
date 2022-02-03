<?php

namespace Infrastructure\Database\Traits;

trait Uuids
{

    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if(!$model->{$model->getKeyName()}) {
                $model->{$model->getKeyName()} = strtoupper((string)\Str::uuid());
            }
        });
    }
}
