<?php

namespace JesseGall\Laravel\Database\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class AsNonNullCollection extends AsCollection
{
    /**
     * @param array $arguments
     * @return \Illuminate\Contracts\Database\Eloquent\CastsAttributes<\Illuminate\Support\Collection<array-key, mixed>, iterable>
     */
    public static function castUsing(array $arguments): CastsAttributes
    {
        $cast = parent::castUsing($arguments);

        return new class($cast) implements CastsAttributes {

            public function __construct(protected CastsAttributes $cast) { }

            public function get(Model $model, string $key, mixed $value, array $attributes): Collection
            {
                return $this->cast->get($model, $key, $value, $attributes)
                    ?? $this->cast->get($model, $key, $value, [$key => '[]']);
            }

            public function set(Model $model, string $key, mixed $value, array $attributes)
            {
                return $this->cast->set($model, $key, $value, $attributes);
            }
        };
    }
}