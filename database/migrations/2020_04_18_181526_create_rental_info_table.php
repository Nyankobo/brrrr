<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_info', function (Blueprint $table) {
            $table->id();

            $table->foreignId('report_id')
            ->constrained('report')
            ->onDelete('cascade');
            
            $table->bigInteger('estimated_repair_cost')->nullable();
            $table->integer('refinance_months')->nullable();
            $table->integer('rehab_months')->nullable();
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
        Schema::dropIfExists('rental_info');
    }
}
