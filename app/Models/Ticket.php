<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use Searchable, GlobalStatus;
}
