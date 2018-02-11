<?php



// Route::get('/', function () {
// 	$blogs = App\Post::paginate(6);

//     return view('blog-home', compact('blogs'));
// });

Route::get('/mail', function () {
 $data = ['name'=> 'Eikhant Mon'];
 Mail::send('mail', $data , function($message){
  $message->to('me@setkyar.com', 'SetKyar')->subject('testing');
  $message->from('eikhantmon961@gmail.com', 'Kyar');
 });
 echo "Done!";
    //return view('welcome');
});


Route::get('/', 'UserBlogController@blog')->name('home.blog');
Route::get('/blog/{slug}', 'UserBlogController@detail')->name('home.blog_detail');
Route::get('/about', 'PagesController@about')->name('home.about');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::post('/contact', 'PagesController@contactSendMail');

Auth::routes();

Route::group(['prefix'=> 'admin', 'middleware' => ['auth', 'admin']], function () {
	Route::get('/home', 'HomeController@index')->name('home');

	//No create
	//Yes Edit
	//Yes Delete
	Route::get('/authors', 'AdminController@index');

	Route::get('/admin/edit', 'AdminController@index'); // for admincontroller, view/admin/edit

	//NO create
	//Yes Edit
	//Yes Delete
	Route::get('/posts', 'AdminPostController@index');
});





Route::group(['prefix' => 'author', 'middleware' => ['auth', 'author']],
	function () {
		Route::resource('blog', 'BlogController');
	});

// Route::resource('blog','BlogController');

