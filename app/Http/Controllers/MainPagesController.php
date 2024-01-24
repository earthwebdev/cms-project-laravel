<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Team;
use App\Models\Service;
use Illuminate\Http\Request;

use Illuminate\Notifications\Messages\MailMessage;

class MainPagesController extends Controller
{
    public function index(Request $request){
        $urlpath = $request->path();



        $data['page'] = Page::where('slug', $urlpath)->where('status', 1)->first();
        if($urlpath == 'team'){
            $model =  new Team();
            $arr_data = $model::all()->where('status', 1);
            $data['page'][$urlpath] = $arr_data;
        }else if($urlpath == 'service'){
            $model =   new Service();
            $arr_data = $model::all()->where('status', 1);
            $data['page'][$urlpath] = $arr_data;
        }

        $data['url'] = $urlpath;

        return view('frontend.pages', $data);
        //dd($page);
    }

    public function contactSubmit(Request $request){
        
        $validated = $request->validate([
            'name' => 'required',
            'email'     => 'required|email',
            'service'   =>'required',
            'message'   => 'required'
        ]);

        $to = 'earthweb21st@gmail.com'; 
        $subject = $request->name. ' contact mail'; 
        $message = $request->message; 
        $headers = 'From: ' . $request->email . "\r\n" . 'Reply-To: ' . $request->email . "\r\n" .  'X-Mailer: PHP/' . phpversion();
        $send = mail($to, $subject, $message, $headers);
        if($send){
            $request->session()->flash('success', 'Email has sent successfully.');
            return redirect()->back();
        } else {
            $request->session()->flash('error', 'Email has not sent successfully.');
            return redirect()->back()->withInput();
        }
    }

    public function toMail($notifiable)
    {
        $url = url('/invoice/2');
    
        return (new MailMessage)
                    ->greeting('Hello!')
                    ->line('One of your invoices has been paid!')
                    ->action('View Invoice', $url)
                    ->line('Thank you for using our application!');
    }
}
