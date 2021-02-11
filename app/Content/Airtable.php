<?php

namespace App\Content;

use \TANIOS\Airtable\Airtable as AirtableContent;
use \Parsedown;
use Carbon\Carbon;

class Airtable {

    private $connection = null;

    public function __construct()
    {
        $this->connection = new AirtableContent([
            'api_key' => config('airtable.api_key'),
            'base'    => config('airtable.base')
        ]);
    }

    public function getBlogDetails()
    {
        $Parsedown = new Parsedown();
        
        // Capture the Blog details
        $request = $this->connection->getContent('Settings');
        $response = $request->getResponse();

        $records = [];

        foreach($response['records'] as $record) {

            $key = strtolower($record->fields->Name);
            $key = str_replace(' ', '_', $key);

            $records[$key] = trim($record->fields->Value) ?? '';

            if ('blog_description' == $key) {
                $records[$key] = $Parsedown->text($record->fields->Value) ?? '';
            }

            if ('blog_email' == $key) {
                $records[$key] = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $record->fields->Value ) ) ) . "&s=300";
            }
        }

        return array_merge([
            'blog_title' => "",
            'blog_description' => "",
            'frsh' => ""
        ],$records);
    }

    public function getPosts()
    {
        // Capture the Posts
        $request = $this->connection->getContent('Posts');
        $response = $request->getResponse();

        $posts = [];

        foreach($response['records'] as $record) {

            $posts[] = [
                'title' => $record->fields->Title ?? "",
                'slug' => $record->fields->Slug ?? "",
                'subtitle' => $record->fields->Subtitle ?? "",
                'content' => $record->fields->Content ?? "",
                'status' => $record->fields->Status ?? "",
                'created' => date("F j, Y", strtotime($record->fields->Created)) ?? "",
            ];
        }

        return $posts;
    }

    public function getPost($params = [])
    {

        $Parsedown = new Parsedown();

        $filters = [
            'filterByFormula' => "FIND('{$params['where']['slug']}',Slug)"
        ];

        // Capture the Posts
        $request = $this->connection->getContent('Posts', $filters);
        $response = $request->getResponse();
        
        $record = $response['records'][0] ?? null;

        return [
            'title' => $record->fields->Title ?? "",
            'slug' => $record->fields->Slug ?? "",
            'subtitle' => $record->fields->Subtitle ?? "",
            'content' => $Parsedown->text($record->fields->Content) ?? "",
            'status' => $record->fields->Status ?? "draft",
            'author' => $this->getAuthor($record->fields->Author[0]),
            'created' => date("F j, Y", strtotime($record->fields->Created)) ?? "",
        ];
    }

    public function getAuthor($author_id)
    {
        $request = $this->connection->getContent("Authors/$author_id");
        $response = $request->getResponse();

        return [
            'name' => $response->fields->Name ?? '',
            'email' => $response->fields->Email ?? '',
        ];
    }
}