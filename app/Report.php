<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
  function data () {
    return $this->hasOne('App\ReportData');
  }
}
