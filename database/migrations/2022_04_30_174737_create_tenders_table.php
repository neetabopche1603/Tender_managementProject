<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('quotation_no');
            $table->string('tender_no');
            $table->date('tender_publish_date');
            $table->string('tender_type')->comment('0=Open Tender,1=Limited Tender,2=Single Tender,3=Physical Tender,4=GEM Tender,5=Other');
            $table->string('client_name');
            $table->string('client_address');
            $table->date('bid_submitted_date');
            $table->date('bid_opening_date');
            $table->string('tender_fee');
            $table->string('emd_fee');
            $table->string('tender_status')->comment('0=Not Opening,1= Under Technical Evalution,2=Under Commercial Evalution,3=Cancelled,4=Rejected,5=Rejected Commercial,6=admitted,7=admitted &Poreceived');
            $table->string('quoted_value');
            $table->string('work_details');
            $table->string('remark');
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
        Schema::dropIfExists('tenders');
    }
};
