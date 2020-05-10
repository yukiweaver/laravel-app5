<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GenreItem extends Pivot
{
    protected $table = 'genre_item';

    public function findByGenreIds(array $genreIds)
    {
      $cnt = count($genreIds);
      $itemIds = [];
      $result = collect($this->whereIn('genre_id', $genreIds)->get(['item_id'])->toArray())->flatten()->toArray();
      foreach (array_count_values($result) as $key => $val) {
        if ($cnt == $val) {
          $itemIds[] = $key;
        }
      }
      return $itemIds;
    }
}
