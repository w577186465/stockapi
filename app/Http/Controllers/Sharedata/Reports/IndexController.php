<?php

namespace App\Http\Controllers\Sharedata\Reports;

use Illuminate\Http\Request;
use App\Report;
use App\ReportData;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Sharedata\ApiController;
use App\Http\Resources\ReportIndSingle;

class IndexController extends ApiController
{
  public function list(Request $request) {
    $pagesize = $request->input('pagesize', 50);
    $data = Report::orderBy('created_at', 'desc')->paginate($pagesize);
    return $this->success($data, '获取成功');
  }

  public function single($id) {
    $report = Report::find($id);
    $data = $report->data;
    if ($data) {
      $report->content = $data->content;
    } else {
      $report->content = '';
    }
    
    return $this->success($report, '获取成功');
  }

  public function add(Request $req) {
    if (!$req->filled('code') || !$req->filled('name') || !$req->filled('title') || !$req->filled('author') || !$req->filled('insname') || !$req->filled('created_at')) {
      return $this->failed('缺少必须字段');
    }

    $model = new Report;
    $model->code = $req->input('code');
    $model->name = $req->input('name');
    $model->title = $req->input('title');
    $model->author = $req->input('author');
    $model->rate = $req->input('rate', '');
    $model->change = $req->input('change', '');
    $model->insname = $req->input('insname');
    $model->created_at = $req->input('created_at');
    $model->save();

    // 副表
    $data = new ReportData;
    $data->content = $req->input('content', '');
    $model->data()->save($data);
    return $this->message('获取成功');
  }
}
