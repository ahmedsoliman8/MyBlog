<?php

namespace App\Http\Controllers;
use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
       // ddd($newsletter);
        request()->validate(['email' => 'required|email']);
        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $ex) {
           // return $ex;
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter!'
            ]);
        }
        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    }
}