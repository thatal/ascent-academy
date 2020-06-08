<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaymentTableAlter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('online_payments', function (Blueprint $table) {
            $table->string('order_id', 100)->after("application_id");
            $table->string('merchant_order_id', 100)->after("order_id");
            $table->string('payment_signature', 100)->after("transaction_date")->nullable();
            $table->string('is_error', 100)->nullable()->after("merchant_order_id");
            $table->string('error_message', 100)->nullable()->after("is_error");
            $table->string('payment_type', 100)->after("error_message")->default("application")->comment("application, examination, admission");
            $table->tinyInteger('is_cron_checked')->after("payment_type")->default(0);
            $table->float('response_amount', 10, 2)->nullable()->after("amount");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('online_payments', function (Blueprint $table) {
            $table->dropColumn([
                'order_id', "merchant_order_id", "payment_signature", "is_error",
                "error_message", "payment_type",
                "is_cron_checked", "response_amount"
            ]);
        });
    }
}
