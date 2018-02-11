<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class PagesController extends Controller
{
   public function about()
    {
    	return view('pages.about');
    }

   public function contact()
   {
   		return view('pages.contact');
   }

   public function contactSendMail() {
   	$data = request()->all();

   	Mail::send('pages.contact_mail', ['data'=>$data], function($m) use ($data) {
   		$m->from($data['email'], $data['name']);

   		$m->to('me@setkyar.com', 'Set Kyar Wa Lar')->subject('Message from your website!');
   	});

   	return redirect('/contact');
   }
}
