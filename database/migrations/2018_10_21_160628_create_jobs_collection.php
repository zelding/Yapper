<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsCollection extends Migration
{
    protected $connection = 'mongodb'; // this does fuck-all

    /**
     * Run the migrations.
     *
     * this is mongodb things work differently
     * @link https://github.com/jenssegers/laravel-mongodb#schema
     *
     * @return void
     */
    public function up()
    {
        $schema = Schema::connection("mongodb");

        $schema->create('jobs', function (Blueprint $table) {

            // these are mostly just dummy pass-through calls
            // but they give a good idea what to expect

            $table->string('queue');
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')
                  ->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');

            $table->index("queue");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $schema = Schema::connection("mongodb");

        $schema->dropIfExists('jobs');
    }
}
