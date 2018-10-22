<?php
/**
 * Yapper
 *
 * @author    lyozsi (kristof.dekany@apex-it-services.eu)
 * @copyright internal usage
 *
 * Date: 10/22/18 12:06 PM
 */

use Illuminate\Database\Seeder;

/**
 * Class BlogPostTableSeeder
 */
class BlogPostCollectionSeeder extends Seeder
{
    /**
     * insert some dummy posts
     *
     * @return void
     */
    public function run()
    {
        $db = DB::connection("mongodb");

        $db->table("blog_post")->delete();

        factory(App\Entity\BlogPost::class, 10)->create();

        // tell me for the love of god, why is everything deleted after this finishes?
        // unless I kill the script the table becomes empty again
        die;
    }
}
