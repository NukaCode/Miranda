<?php

use App\Models\Issue\Status;
use Illuminate\Database\Seeder;

class IssueStatusSeeder extends Seeder
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
                'name'        => 'Voting',
                'key_name'    => 'vote',
                'description' => 'Issue is being voted on.',
            ],
            [
                'name'        => 'Open',
                'key_name'    => 'open',
                'description' => 'Issue is created but not being worked on or voted on.',
            ],
            [
                'name'        => 'In Progress',
                'key_name'    => 'in-progress',
                'description' => 'Issue is being actively worked on.',
            ],
            [
                'name'        => 'In Testing',
                'key_name'    => 'in-testing',
                'description' => 'Issue is being tested for problems.',
            ],
            [
                'name'        => 'In Review',
                'key_name'    => 'in-review',
                'description' => 'Issue is being reviewed for consistency.',
            ],
            [
                'name'        => 'Closed',
                'key_name'    => 'closed',
                'description' => 'Issue is completed and no longer being worked on.',
            ],
        ];

        foreach ($data as $status) {
            Status::firstOrCreate($status);
        }
    }
}
