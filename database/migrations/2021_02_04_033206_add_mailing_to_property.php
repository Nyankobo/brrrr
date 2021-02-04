<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMailingToProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property', function (Blueprint $table) {
            $table->string('last_sold_date')->nullable()->after('photo');
            $table->string('last_sold_amount')->nullable()->after('last_sold_date');

            $table->string('beds')->nullable()->after('last_sold_amount');
            $table->string('baths')->nullable()->after('beds');
            $table->string('square_feet')->nullable()->after('baths');
            $table->string('year_built')->nullable()->after('square_feet');
            $table->boolean('is_mailing')->default(0)->after('year_built');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property', function (Blueprint $table) {
            $table->dropColumn([
                'last_sold_date',
                'last_sold_amount',
                'beds',
                'baths',
                'square_feet',
                'year_built',
                'is_mailing'
                ]);
        });
    }
}
