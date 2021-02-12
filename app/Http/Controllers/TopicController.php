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

		$params = [
			'filterByFormula' => "FIND('Published',Status)"
		];

		return view('home',[
			'blog' => $this->blog_api->index(),
			'topics' => $this->topic_api->index(),
			'posts' => $this->post_api->index($params)
		]);
	}

	public function showTopics(Request $request)
	{
		return view('topics',[
			'blog' => $this->blog_api->index(),
			'topics' => $this->topic_api->index(),
			'posts' => $this->post_api->index()
		]);
	}
	
    public function showTopic(Request $request, $topic)
    {
		$topic = ucwords($topic);

		$params = [
			'filterByFormula' => "FIND('{$topic}',Topic)"
		];

		return view('topic',[
			'blog' => $this->blog_api->index(),
			'topics' => $this->topic_api->index(),
			'posts' => $this->post_api->index($params),
			'topic' => $topic
		]);
    }
    
    public function showPost(Request $request, $topic, $post_slug)
    {
		return view('post',[
			'blog' => $this->blog_api->index(),
			'topics' => $this->topic_api->index(),
			'post' => $this->post_api->show($topic, [
				'where' => ['slug' => $post_slug]
			])
		]);
    }
}
