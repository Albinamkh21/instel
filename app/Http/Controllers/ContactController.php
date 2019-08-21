<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;

//require "pink/phpmailer/PHPMailerAutoload.php";

class ContactController extends SiteController
{
    public function __construct()
    {

        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

        $this->sidebar = 'left';
        $this->template = env('THEME').'.contact';


    }
    public function index(Request $request){


        if($request->isMethod('post')){

           $messages = [
                'required'=> 'Поле :attribute обязательно к заполнению',
                'email' => 'Поле должно соответствовать email адресу'

            ];

            $this->validate($request,[
                'name' => 'required|max:255',
                'email'=> 'required|email',
                'message' => 'required'

            ], $messages);

            $data = $request->all();

            $result = Mail::send(env('THEME').'.contact_email', ['data' => $data ], function ($message) use ($data){

                $mail_amdin = env('MAIL_ADMIN');

                $message->from($mail_amdin, $data['name']);
                $message->to($mail_amdin, 'Instel.kz форма обратной связи')->subject('Вопрос пользоваеля');

            });

            if(!$result){
                return redirect()->route('contacts')->with('status', 'Письмо отправлено!');
            }

        }



        $this->title = "Instel.kz - Контакты";
        $this->meta_desc = "Видеореклама, корпоративные ролики, документальные фильмы, видеозаставки, видеосъемка, изготовление видеороликов в Алматы, изготовление видеорекламы ";
        $this->keywords = "Видеореклама, корпоративные ролики, документальные фильмы, видеозаставки, видеосъемка, изготовление видеороликов в Алматы, изготовление видеорекламы ";
        $content = view(env('THEME').'.contact_content')->render();
        $this->data = array_add($this->data, 'content',$content);
        $this->contentLeftBar = view(env('THEME').'.contact_left')->render();

        return $this->renderOutput();
    }

}


