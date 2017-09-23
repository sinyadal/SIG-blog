<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
	public function getArchive() {
		$posts = Post::orderBy('id', 'desc')->paginate(10);

		return view('blog.archive')->withPosts($posts);
	}

    public function getSingle($slug) {
    	// Fetch the database based on slug
    	$post = Post::where('slug', '=', $slug)->first(); // Replace GET with FIRST, GET pull collection of data, FIRST pull single object only

    	// Return view and pass in the post object
    	return view('blog.single')->withPost($post);
    }
}
