<?php
/**
 * Yapper
 *
 * @author    lyozsi (kristof.dekany@apex-it-services.eu)
 * @copyright internal usage
 *
 * Date: 10/22/18 3:26 PM
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class CommentTableSeeder
 */
class CommentCollectionSeeder extends Seeder
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

        $now = new \DateTime();

        // at this point the post seeder is finished and we should have 2 post
        /*$posts = \App\Entity\BlogPost::take(2)->get();

        $db->table("blog_comment")->insert([
            "content" => "MongoDB is a free and open-source cross-platform document-oriented database program. Classified as a NoSQL database program, MongoDB uses JSON-like documents with schemata. MongoDB is developed by MongoDB Inc., and is published under a combination of the Server Side Public License and the Apache License. ",
            "status"  => 1,
            "user_id" => 1,
            "post_id" => $post1->id,
            "created_at" => $now->format('Y-m-d H:i:s'),
            "updated_at" => null
        ]);

        $db->table("blog_comment")->insert([
            "content" => "MongoDB is a free and open-source cross-platform document-oriented database program. Classified as a NoSQL database program, MongoDB uses JSON-like documents with schemata. MongoDB is developed by MongoDB Inc., and is published under a combination of the Server Side Public License and the Apache License. ",
            "status"  => 1,
            "user_id" => 2,
            "post_id" => $post2->id,
            "created_at" => $now->format('Y-m-d H:i:s'),
            "updated_at" => null
        ]);*/
    }
}
