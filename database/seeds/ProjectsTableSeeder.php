<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $domains = [
            1 => [
                'url' => 'https://cacm.acm.org',
                'key' => 'Go'
            ],
            2 => [
                'url' => 'https://rjlipton.wordpress.com',
                'key' => 'widget'
            ],
            3 => [
                'url' => 'http://lambda-the-ultimate.org',
                'key' => 'archives'
            ],
            4 => [
                'url' => 'https://blog.regehr.org',
                'key' => 'bugs '
            ],
            5 => [
                'url' => 'http://matt.might.net',
                'key' => 'please'
            ],
            6 => [
                'url' => 'https://blog.computationalcomplexity.org',
                'key' => 'Gasarch'
            ],
            7 => [
                'url' => 'https://www.johndcook.com',
                'key' => 'Science'
            ],
            8 => [
                'url' => 'https://science-professor.blogspot.ru',
                'key' => 'recommendations'
            ],
            9 => [
                'url' => 'http://www.scottaaronson.com',
                'key' => 'Bruton'
            ],
            10 => [
                'url' => 'https://compscigail.blogspot.com',
                'key' => 'education'
            ],
        ];

        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[$i] = [
                'name' => $domains[$i]['url'],
                'keyword' => $domains[$i]['key'],
            ];
        }

        DB::table('projects')->insert($data);
    }
}
