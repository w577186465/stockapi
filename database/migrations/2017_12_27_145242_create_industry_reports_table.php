<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndustryReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industry_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->string('pjchange', 50)->nullable();
            $table->string('insname', 50); // 券商名称
            $table->integer('indid')->index(); // 行业id
            $table->string('pjtype', 50)->nullable();
            $table->string('expect', 50)->nullable();
            $table->string('indname', 50)->nullable(); // 行业名称
            $table->float('fluctuation', 4, 2); // 涨跌幅
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('industry_reports');
    }
}
