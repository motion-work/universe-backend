<?php

namespace App;

use Laravel\Scout\Searchable;

class Tag extends \Conner\Tagging\Model\Tag
{
    use Searchable;
}
