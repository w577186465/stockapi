<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustryReport extends Model
{
  function data () {
    return $this->hasOne('App\IndustryReportData');
  }
}
