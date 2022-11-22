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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('reciever_id')->index();
            $table->integer('amount')->default(0)->comment('Cena v centih'); //10.00e  1000 / 100 = 10
            $table->smallInteger('status')->default(\App\Enums\Invoice\InvoiceState::UNPAID);
            $table->timestamps();
        });

        if(app()->environment()!='production'){

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
