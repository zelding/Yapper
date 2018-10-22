<?php
/**
 * Yapper
 *
 * @author    lyozsi (kristof.dekany@apex-it-services.eu)
 * @copyright internal usage
 *
 * Date: 10/22/18 3:19 PM
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * this is mongodb things work differently
 * @link https://github.com/jenssegers/laravel-mongodb#schema
 *
 * Class CreateCommentsTable
 */
class CreateCommentsCollection extends Migration
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

        $schema->create('blog_comment', function (Blueprint $table) {

            // these are mostly just dummy pass-through calls
            // but they give a good idea what to expect

            $table->boolean("status")->default(false);
            $table->text("content");
            $table->string("post_id")->nullable(false);
            $table->integer("user_id")->nullable(false);
            $table->timestamps();

            //these work
            $table->index("user_id");
            $table->index("post_id");
            $table->index("status");
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

        $schema->dropIfExists('blog_comment');
    }
}
