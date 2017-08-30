<?php

namespace App\Models;

use Laravel\Scout\Searchable;

class Tag extends \Conner\Tagging\Model\Tag
{
    use Searchable;
}
