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
use Illuminate\Support\Facades\DB;

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

        $db->collection("blog_post")->delete();

        //factory(App\Entity\BlogPost::class, 5)->create();

        $now = new \DateTime();

        // as far as I was able to deduce, this is weh the actual document structure is fixed
        // it is certainly strange coming from relational databases

        /*$post1 = new \App\Entity\BlogPost();

        $post1->title      = "Trying to save things here";
        $post1->summary    = "It seems that DBeaver can only update one cell at the time";
        $post1->content    = "MongoDB is a free and open-source cross-platform document-oriented database program. Classified as a NoSQL database program, MongoDB uses JSON-like documents with schemata. MongoDB is developed by MongoDB Inc., and is published under a combination of the Server Side Public License and the Apache License. ";
        $post1->status     = 1;
        $post1->created_at = $now;

        $post1->save();*/

        /*\App\Entity\BlogPost::create([
             "title"      => "Trying to save things here",
             "summary"    => "It seems that DBeaver can only update one cell at the time",
             "content"    => "MongoDB is a free and open-source cross-platform document-oriented database program. Classified as a NoSQL database program, MongoDB uses JSON-like documents with schemata. MongoDB is developed by MongoDB Inc., and is published under a combination of the Server Side Public License and the Apache License. ",
             "status"     => 1,
             "user_id"    => 1,
             "created_at" => $now->format('Y-m-d H:i:s'),
             "updated_at" => null,
             "deleted_at" => null
         ]);*/

        /*\App\Entity\BlogPost::create([
                                         "title"      => "Trying to save things here",
                                         "summary"    => "It seems that DBeaver can only update one cell at the time",
                                         "content"    => "MongoDB is a free and open-source cross-platform document-oriented database program. Classified as a NoSQL database program, MongoDB uses JSON-like documents with schemata. MongoDB is developed by MongoDB Inc., and is published under a combination of the Server Side Public License and the Apache License. ",
                                         "status"     => 1,
                                         "user_id"    => 1,
                                         "created_at" => "2018-10-22 12:12:12",
                                         "updated_at" => null,
                                         "deleted_at" => null
                                     ]);

        \App\Entity\BlogPost::create([
                                         "title"      => "Trying to save things here",
                                         "summary"    => "It seems that DBeaver can only update one cell at the time",
                                         "content"    => "MongoDB is a free and open-source cross-platform document-oriented database program. Classified as a NoSQL database program, MongoDB uses JSON-like documents with schemata. MongoDB is developed by MongoDB Inc., and is published under a combination of the Server Side Public License and the Apache License. ",
                                         "status"     => 1,
                                         "user_id"    => 1,
                                         "created_at" => "2018-10-22 12:12:12",
                                         "updated_at" => null,
                                         "deleted_at" => null
                                     ]);

        \App\Entity\BlogPost::create([
                                         "title"      => "Trying to save things here",
                                         "summary"    => "It seems that DBeaver can only update one cell at the time",
                                         "content"    => "MongoDB is a free and open-source cross-platform document-oriented database program. Classified as a NoSQL database program, MongoDB uses JSON-like documents with schemata. MongoDB is developed by MongoDB Inc., and is published under a combination of the Server Side Public License and the Apache License. ",
                                         "status"     => 1,
                                         "user_id"    => 1,
                                         "created_at" => "2018-10-22 12:12:12",
                                         "updated_at" => null,
                                         "deleted_at" => null
                                     ]);*/

        /*$db->collection("blog_post")->insert([
            "title"      => "Trying to save things here",
            "summary"    => "It seems that DBeaver can only update one cell at the time",
            "content"    => "MongoDB is a free and open-source cross-platform document-oriented database program. Classified as a NoSQL database program, MongoDB uses JSON-like documents with schemata. MongoDB is developed by MongoDB Inc., and is published under a combination of the Server Side Public License and the Apache License. ",
            "status"     => 1,
            "user_id"    => 1,
            "created_at" => $now->format('Y-m-d H:i:s'),
            "updated_at" => null,
            "deleted_at" => null
        ]);

        $db->collection("blog_post")->insert([
            "title"      => "Trying to seed things here",
            "summary"    => "It seems that DBeaver can only update one cell at the time",
            "content"    => "MongoDB is a free and open-source cross-platform document-oriented database program. Classified as a NoSQL database program, MongoDB uses JSON-like documents with schemata. MongoDB is developed by MongoDB Inc., and is published under a combination of the Server Side Public License and the Apache License. ",
            "status"     => 1,
            "user_id"    => 2,
            "created_at" => $now->format('Y-m-d H:i:s'),
            "updated_at" => null,
            "deleted_at" => null
        ]);*/
    }
}
