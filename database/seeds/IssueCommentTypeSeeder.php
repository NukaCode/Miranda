<?php

use App\Models\Type\CommentType;
use Illuminate\Database\Seeder;

class IssueCommentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'        => 'Standard',
                'key_name'    => 'standard',
                'description' => 'A normal, internal only comment.',
            ],
            [
                'name'        => 'Public',
                'key_name'    => 'public',
                'description' => 'A globally viewable comment.',
            ],
            [
                'name'        => 'External',
                'key_name'    => 'external',
                'description' => 'A comment created by an external user.',
            ],
        ];

        foreach ($data as $commentType) {
            CommentType::firstOrCreate($commentType);
        }
    }
}
