<?php

namespace App\Http\Controllers\Sharedata;

use Illuminate\Http\Request;
use App\Hyreport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Hyreport as HyreportRes;

class ReportControll extends ApiController
{
    public function industry(Request $request) {
        $pagesize = $request->input('pagesize', 50);
        $data = Hyreport::paginate($pagesize);
        return $this->success($data, '获取成功');
    }
}
