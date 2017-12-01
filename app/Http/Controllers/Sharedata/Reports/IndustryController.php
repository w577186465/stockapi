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
        $data = Hyreport::paginate($pagesize);
        return $this->success($data, '获取成功');
    }

    public function single($id) {
    	$data = Hyreport::find($id);
    	$data->content = DB::table('hyreport_data')->find($id)->content;
    	return new HyreportRes($data);
    	// $_data = DB::table('hyreport_data')->where('id', $id)->first();
    	// $data['content'] = $_data['content'];
    	// return $this->success($data, '获取成功');
    }
}
