<?php

namespace App\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\UrlWindow;
use Illuminate\Support\Collection;

class CustomLengthAwarePaginator extends LengthAwarePaginator
{
    /**
     * Get the URL for a given page number.
     *
     * @param  int  $page
     * @return string
     */
    public function url($page)
    {
        if ($page <= 1 && $this->path !== '/') {
            return $this->path;
        }

        return parent::url($page);
    }
}

?>