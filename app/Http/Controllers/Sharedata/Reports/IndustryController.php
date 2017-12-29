<?php

namespace App\Http\Controllers\Sharedata\Reports;

use Illuminate\Http\Request;
use App\IndustryReport;
use App\IndustryReportData;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Sharedata\ApiController;
use App\Http\Resources\ReportIndSingle;

class IndustryController extends ApiController
{
  public function list(Request $request) {
    $pagesize = $request->input('pagesize', 50);
    $report = IndustryReport::orderBy('updated_at', 'desc')->paginate($pagesize);
    return $this->success($report, '获取成功');
  }

  public function single($id) {
    $report = IndustryReport::find($id);
    $data = IndustryReport::find($id)->content;
    $report->content = $data->content;
    return $this->success($report, '获取成功');
  }

  public function add(Request $req) {
    if (!$req->filled('title') || !$req->filled('insname') || !$req->filled('indid') || !$req->filled('indname') || !$req->filled('fluctuation') || !$req->filled('created_at')) {
      return $this->failed('缺少必须字段');
    }

    $model = new IndustryReport;
    $model->title = $req->input('title');
    $model->pjchange = $req->input('pjchange');
    $model->insname = $req->input('insname');
    $model->indid = $req->input('indid');
    $model->pjtype = $req->input('pjtype');
    $model->expect = $req->input('expect');
    $model->indname = $req->input('indname');
    $model->fluctuation = $req->input('fluctuation');
    $model->created_at = $req->input('created_at');
    $model->save();

    // 副表
    $data = new IndustryReportData;
    $data->content = $req->input('content', '');
    $model->data()->save($data);
    return $this->message('获取成功');
  }
}
