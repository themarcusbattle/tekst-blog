<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\API\BlogController as BlogAPI;
use App\Http\Controllers\API\TopicController as TopicAPI;
use App\Http\Controllers\API\PostController as PostAPI;

class TopicController extends Controller
{
	public function __construct()
	{
		$this->blog_api = new BlogAPI();
		$this->topic_api = new TopicAPI();
		$this->post_api = new PostAPI();
	}

	public function showHome()
	{
		$topics = $this->topic_api->index();

		return view('home',[
			'blog' => $this->blog_api->index(),
			'posts' => $this->post_api->index()
		]);
	}

	public function showTopics(Request $request)
	{
		return view('topics',[
			'blog' => $this->blog_api->index(),
			'topics' => $this->topic_api->index(),
		]);
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
		return view('post',[
			'blog' => $this->blog_api->index(),
			'post' => $this->post_api->show($topic, [
				'where' => ['slug' => $post_slug]
			])
		]);
    }
}
