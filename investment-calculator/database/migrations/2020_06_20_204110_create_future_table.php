<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFutureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('future', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')
            ->constrained('report')
            ->onDelete('cascade');

            $table->decimal('future_annual_income_growth')->nullable();
            $table->decimal('future_annual_pv_growth')->nullable();
            $table->decimal('future_annual_expense_growth')->nullable();
            $table->decimal('future_sales_expenses')->nullable();

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
        Schema::dropIfExists('future');
    }
}
