<?php
/**
 * Yapper
 *
 * @author    lyozsi (kristof.dekany@apex-it-services.eu)
 * @copyright internal usage
 *
 * Date: 10/22/18 11:54 AM
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostTable extends Migration
{
    protected $connection = 'mongodb';

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
        Schema::create('blog_post', function (Blueprint $table) {

            // these are mostly just dummy pass-through calls
            // but they give a good idea what to expect

            $table->string("title");
            $table->string("summary");
            $table->boolean("status")->default(false);
            $table->text("content");
            $table->integer("user_id")->nullable(false);

            $table->softDeletes();
            $table->timestamps();

            $table->index("user_id");
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
        Schema::dropIfExists('blog_post');
    }
}
