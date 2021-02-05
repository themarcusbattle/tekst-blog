<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function showTopic(Request $request, $topic)
    {
    	echo $topic;
    }
    
    public function showContent(Request $request, $topic, $slug)
    {
    	echo $topic . ' ' . $slug;
    }
}
