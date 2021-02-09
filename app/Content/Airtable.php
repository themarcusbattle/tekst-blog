<?php

namespace App\Content;

use \TANIOS\Airtable\Airtable as AirtableContent;

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
        // Capture the Blog details
        $request = $this->connection->getContent('Settings');
        $response = $request->getResponse();

        $records = [];

        foreach($response['records'] as $record) {

            $key = strtolower($record->fields->Name);
            $key = str_replace(' ', '_', $key);

            $records[$key] = $record->fields->Value ?? '';
        }
        
        return array_merge([
            'blog_title' => "",
            'blog_description' => ""
        ],$records);
    }
}