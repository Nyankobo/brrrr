<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase', function (Blueprint $table) {
            $table->id();

            $table->foreignId('report_id')
            ->constrained('report')
            ->onDelete('cascade');

            $table->bigInteger('purchase_price')->nullable();
            $table->bigInteger('closing_cost')->nullable();
            $table->bigInteger('estimated_repair_cost')->nullable();
            $table->bigInteger('arv')->nullable();

            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase');
    }
}
