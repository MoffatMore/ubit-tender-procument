<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateOrganisationsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(): void
        {
            Schema::create('organisations', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('email')->unique();
                $table->string('contact');
                $table->string('location');
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
            Schema::dropIfExists('organisations');
        }
    }
