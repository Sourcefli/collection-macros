<?php

namespace Sourcefli\CollectionMacros\Macros;

use ReflectionClass;
use ReflectionMethod;
use ReflectionNamedType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @mixin \Illuminate\Support\Collection
 *
 * @return mixed
 */
class ModelRelationships
{
    public function __invoke()
    {

        /*
         * Get a random item when collection count is more than 1, or just get the first item
         *
         * Returns 'hasManyDeep' instances as well, as provided by this package..
         * @see https://github.com/staudenmeir/eloquent-has-many-deep
         *
         * @mixin \Illuminate\Support\Collection
         *
         * @return \Illuminate\Support\Collection
         */
        return function (Model $model) {
            /** @var Collection $this */
            return collect((new ReflectionClass($model))
                ->getMethods(\ReflectionMethod::IS_PUBLIC))
                ->mapWithKeys(function (ReflectionMethod $item) {
                    if ($item->getReturnType() instanceof ReflectionNamedType) {
                        return [$item->getName() => $item->getReturnType()];
                    }

                    return [];
                })
                ->filter(function (?ReflectionNamedType $item) {
                    return $item
                        && (Str::contains(
                            $item->getName(),
                            'Illuminate\Database\Eloquent\Relations'
                        )
                            ||
                            Str::contains(
                                $item->getName(),
                                'EloquentHasManyDeep'
                            ));
                });
        };
    }
}
