<?php  

/*
| process variable data or params
| talk to the model
| recieve from the modal
| compile from the model if needed
| pass the data to the correct view
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller {

	public function getIndex() {

		// Query Builder/ Post feeds
		$posts = Post::orderBy('created_at', "desc")->limit(8)->get();
		return view('pages.welcome')->withPosts($posts);
	}

	public function getAbout() {
		return view('pages.about');
	}

	public function getContact() {
		return view('pages.contact');
	}

	public function postContact(Request $request) { // This is for the email at the contact
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10']);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);

		Mail::send('emails.contact', $data, function($message) use ($data)
		{
			$message->from($data['email']);
			$message->to('sydmrmdn@gmail.com');
			$message->subject($data['subject']);

		});

		Session::flash('success', 'Your email was sent');

		return redirect('/');
	}

}