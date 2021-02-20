<?php

namespace Sourcefli\CollectionMacros\Macros;

/**
 * Get a random amount of items from the collection if it contains the requested amount, or more, otherwise get a random item. 
 * If only one item, return first item
 *
 * @mixin \Illuminate\Support\Collection
 *
 * @return mixed
 */
class RandomOrFirst
{
    public function __invoke()
    {

        /*
         * Get a random item when collection count is more than 1, or just get the first item
         *
         * @mixin \Illuminate\Support\Collection
         * @return \Illuminate\Database\Eloquent\Model|Illuminate\Support\Collection
         */
        return function (?int $totalItems = null) {
            /** @var Collection $this */

            if (!$this->count()) {
                return $this;
            }

            return $totalItems && $this->count() >= $totalItems
                ? $this->random($totalItems)
                : ($this->count() === 1
                    ? $this->first()
                    : $this->random());
        };
    }
}
