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
            $table->bigInteger('loan_amount')->nullable();

            $table->boolean('is_cash_purchase')->default(0);
            $table->integer('downpayment_of_purchase')->nullable();
            $table->decimal('loan_interest_rate')->nullable();
            $table->boolean('is_pmi_included')->default(0);
            $table->integer('amortized_years')->nullable();
            $table->bigInteger('closing_cost')->nullable();

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
