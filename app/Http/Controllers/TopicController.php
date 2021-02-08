<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\API\TopicController as TopicAPI;
use App\Http\Controllers\API\PostController as PostAPI;

class TopicController extends Controller
{
	public function __construct()
	{
		$this->topic_api = new TopicAPI();
		$this->post_api = new PostAPI();
	}

	public function showHome()
	{
		$topics = $this->topic_api->index();
		
		echo "<h1>Topics</h1>";
		
		foreach($topics as $topic) {
			echo "<a href=\"{$topic}\">{$topic}</a><br>";
		}
	}
	
    public function showTopic(Request $request, $topic)
    {
		$posts = $this->post_api->index();
		$posts = $posts[$topic] ?? null;

		echo "<h2>$topic</h2>";
		
		if ($posts) {

			foreach($posts as $post) {
				echo "<p><a href=\"/$topic{$post['slug']}\">{$post['title']}</a></p>";
			}
		} else {

		}

		echo "<p><a href=\"/\">Home</a></p>";
    }
    
    public function showPost(Request $request, $topic, $post_slug)
    {
		echo $topic . ' ' . $post_slug;

		echo "<p><a href=\"/$topic\">Back to $topic</a></p>";
    }
}
