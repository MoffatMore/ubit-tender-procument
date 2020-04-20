<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateBidsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(): void
        {
            Schema::create('bids', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->foreignId('tender_id');
                $table->string('status');
                $table->integer('score')->default(0);
                $table->string('attachments')->default(null);
                $table->boolean('qualification')->default(false);
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
            Schema::dropIfExists('biddings');
        }
    }
