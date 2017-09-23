<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use App\Category;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Create a variable and store all the blog posts in it from th database
        $posts = Post::orderBy('id', 'desc')->paginate(10); //desc - Descending

        // Return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('posts.create')->withCategories($categories);

    }

    /**
     * Store a newly created resource in storage.
     *
     * Go to validation section at laravel.com for validation list
     *
     * Validate the CSRF (Cross-Site Forgery Request Protection)
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the data
        $this -> validate($request, array(
                'title' => 'required|max:225',
                'slug'  => 'required|alpha_dash|min:5|max:225|unique:posts,slug',
                'category_id' => 'required|integer',
                'body'  => 'required',
                'featured_image' => 'sometimes|image'
            ));

        // Store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body); // Add youtube with comma after ..body) if you want to add youtube links

        // Saving image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $post->image = $filename; // Tell the database the filename
        }

        $post->save();

        // THIS IS SESSION / Give and alert to the user ---------------------------------------------------------------
        // Example: Session::flash('key', 'value')
        Session::flash('success', 'The post was successfully saved!');

        // Redirect to another pages
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        // Pass item in here
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the post in the database and save it as variable
        $post = Post::find($id);

        $categories = Category::all();
        $cat = array();
        foreach ($categories as $category){
            $cats[$category->id] = $category->name;
        }

        // Return the view and pass the variable previously created
        return view('posts.edit')->withPost($post)->withCategories($cats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the data
        $post = Post::find($id);
            $this -> validate($request, array(
                'title' => 'required|max:225',
                'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'category_id' => 'required|integer',
                'body' => 'required',
                'featured_image' => 'image'
            ));


        // Save the data to database
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->input('body'));

        if ($request->hasFile('featured_image')) {

            // Add new photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $oldFileName = $post->image; // Temporary old file name, to ease deleting later after the image deleted

            // Update the database
            $post->image = $filename; // Tell the database the filename

            // Delete old photo - Go to filesystem.php in config folder, update the local with the current working path
            Storage::delete($oldFileName);
        }

        $post->save();

        // Set flash data with success message
        Session::flash('success', 'The post was successfully updated.');

        // Redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        Storage::delete($post->image); // Also delete featured image

        $post->delete(); 

        Session::flash('success', 'The post was successfully deleted.');

        return redirect()->route('posts.index');
    }
}

