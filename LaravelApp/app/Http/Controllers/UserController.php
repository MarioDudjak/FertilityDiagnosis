<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class UserController extends Controller
{
    
    public function SignUp(Request $request)
    {
        $this ->validate($request, [
            'email' => 'email|unique:users',
            'first_name' => 'required|max:30|unique:users',
            'password'=>'required|min:8'
        ]);
        
        $email = $request['email'];
        $first_name=$request['first_name'];
        $password= bcrypt($request['password']);
        
        $user=new User();
        $user->email = $email;
        $user->api_token=str_random(60);
        $user->first_name=$first_name;
        $user->password=$password;
        $user->save();
        Auth::login($user);
        return redirect()->route('home');
    }
    
    public function SignIn(Request $request)
    {
         $this ->validate($request, [
            'email' => 'email',
            'password'=>'required|min:8'
         ]);
         
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']], $request['rembember'])) {
            return redirect()->route('home');
        }
        return redirect()->back();
    }
    
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
    
    public function Account()
    {
        return view('account', ['user'=>Auth::user()]);
    }
    
    public function SaveAccount(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:30'
        ]);
        
        $user =Auth::user();
        $user -> first_name= $request['first_name'];
        $user -> update();
        $file =$request->file('image');
        $filename=$request['first_name']. '-' .$user->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect() -> route('home');
    }
    
    public function Contact(Request $request)
    {
        $this ->validate($request, [
            'email' => 'email',
            'name' => 'required|max:30',
            'phone'=>'required',
            'message'=>'required'
        ]);
        
        $email = $request['email'];
        $name=$request['name'];
        $phone= $request['phone'];
        $message=$request['message'];
        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: Your name '.$email. "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $contact_message='There was an error while saving your e-mail.';
        ini_set("SMTP", "ssl://smtp.gmail.com");
        ini_set("smtp_port", "465");
        if (mail ("dudjakmario2014@gmail.com", $name.$phone, $message, "From: $name <$email>" . "\\r\
        " . "Reply-To: $name <$email>")) {
            $contact_message='E-mail successfuly sent!';
        }
        return redirect()->route('welcome')->with(['contactMessage'=>$contact_message]);
    }
    
    public function UserImage($filename)
    {
        $file = Storage::disk('local') -> get($filename);
        return new Response($file, 200);
    }
    
    public function Documentation()
    {
        return view('documentation', ['user' => Auth::user()]);
    }
}
