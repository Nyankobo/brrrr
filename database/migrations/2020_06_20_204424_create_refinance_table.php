<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefinanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refinance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')
            ->constrained('report')
            ->onDelete('cascade');

            $table->integer('refinance_loan_amount')->nullable();
            $table->decimal('refinance_loan_interest_rate')->nullable();
            $table->integer('refinance_amortized_years')->nullable();

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
        Schema::dropIfExists('refinance');
    }
}
