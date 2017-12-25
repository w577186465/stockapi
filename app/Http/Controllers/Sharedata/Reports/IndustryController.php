<?php

namespace App\Http\Controllers\Sharedata\Reports;

use Illuminate\Http\Request;
use App\Hyreport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Hyreport as HyreportRes;
use App\Http\Controllers\Sharedata\ApiController;
use App\Http\Resources\ReportIndSingle;

class IndustryController extends ApiController
{
  public function list(Request $request) {
    $pagesize = $request->input('pagesize', 50);
    $data = Hyreport::orderBy('date', 'desc')->paginate($pagesize);
    return $this->success($data, '获取成功');
  }

  public function single($id) {
    $data = Hyreport::find($id);
    $data->content = DB::table('hyreports_data')->find($id)->content;
    return $this->success($data, '获取成功');
  }
}
