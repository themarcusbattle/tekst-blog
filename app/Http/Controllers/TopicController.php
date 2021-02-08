<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\API\TopicController as TopicAPI;

class TopicController extends Controller
{
	public function showHome()
	{
		$topic_api = new TopicAPI();
		$topics = $topic_api->index();
		
		echo "<h1>Topics</h1>";
		
		foreach($topics as $topic) {
			echo "<a href=\"{$topic}\">{$topic}</a><br>";
		}
	}
	
    public function showTopic(Request $request, $topic)
    {
    	echo $topic;
    }
    
    public function showContent(Request $request, $topic, $slug)
    {
    	echo $topic . ' ' . $slug;
    }
}
