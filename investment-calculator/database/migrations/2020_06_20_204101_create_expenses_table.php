<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')
            ->constrained('report')
            ->onDelete('cascade');

            $table->integer('fixed_expenses_monthly_insurance')->nullable();
            $table->integer('fixed_expenses_electric_gas')->nullable();
            $table->integer('fixed_expenses_water_sewer')->nullable();
            $table->integer('fixed_expenses_garbage')->nullable();
            $table->integer('fixed_expenses_hoa')->nullable();
            $table->integer('fixed_expenses_property_taxes')->nullable();
            $table->integer('fixed_expenses_other')->nullable();

            $table->decimal('variable_expenses_vacancy')->nullable();
            $table->decimal('variable_expenses_repair_maintenance')->nullable();
            $table->integer('variable_expenses_capital_expenditure')->nullable();
            $table->integer('variable_expenses_mgmt_fees')->nullable();

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
        Schema::dropIfExists('expenses');
    }
}
