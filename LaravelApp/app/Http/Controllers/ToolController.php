<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Test;

class ToolController extends Controller
{
    public function getFertilityTool(){
      return view('tool',['user' => Auth::user()]);
    }
    
     public function postResult(Request $request)
    {
         $this ->validate($request, [
            'seasons' => 'required',
             'age' =>'required',
             'diseases' =>'required',
             'trauma'=>'required',
             'surgery'=>'required',
             'fevers'=>'required',
             'alcohol'=>'required',
             'smoking'=>'required',
             'sitting'=>'required'
        ]);
            
        switch($request['seasons']){
            case 1:
              $season=-1;
            break;
        case 2:
              $season=-0.33;
            break;
        case 3:
              $season=0.33;
            break;
        case 4:
              $season=1;
            break;
        }
      
       $age=($request['age']-18)/18; 
       $disease= $request['diseases'];
       $trauma= $request['trauma'];
       $surgery= $request['surgery'];
       $fevers= $request['fevers'];
       $alcohol= $request['alcohol'];
       $smoking= $request['smoking'];
       $sitting= $request['sitting']/16;
      
        $user = Auth::user();
        $test=new Test();
        $test->season = $season;
        $test->age=$age;
        $test->disease=$disease;
        $test->trauma=$trauma;
        $test->surgery=$surgery;
        $test->fevers=$fevers;
        $test->alcohol=$alcohol;
        $test->smoking=$smoking;
        $test->sitting=$sitting;
        $test->user_id=$user->id;
        $test->post_id=0;
        
        $data = array(
        'Inputs' => array(
            'input1' => array(
                'ColumnNames' => array(
                    "Col1",
                    "Col2",
                    "Col3",
                    "Col4",
                    "Col5",
                    "Col6",
                    "Col7",
                    "Col8",
                    "Col9",
                    "Col10"
                ),
                'Values' => array(array(
                    $season,
                    $age,
                    $disease,
                    $trauma,
                    $surgery,
                    $fevers,
                    $alcohol,
                    $smoking,
                    $sitting,
                    ""
                ))
            ),
        ),
        'GlobalParameters' => null
    );
    $body = json_encode($data);
    $url = 'https://ussouthcentral.services.azureml.net/workspaces/ef984246fc0c427d90efd81b94fdda01/services/44a4519ba263461fa3756ee543174cce/execute?api-version=2.0&details=true';
    $api_key = 'wSH1w+R8fkVYb/Hvsu4/cq4VS1MatD0iLQgrsbXuvWBc5pw/SpfdRCeC0NCDFrbnxwYjgsKW6U3JY8R7GjfinQ==';
    $headers = array('Content-Type: application/json', 'Authorization:Bearer ' . $api_key, 'Content-Length: ' . strlen($body));
    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, $url);
    $result = curl_exec($curl);
    $result = json_decode($result, true);
     if (isset($result["Results"]["output1"]["value"]["Values"])) {
        $dataDecode = $result["Results"]["output1"]["value"]["Values"];
        $dataDecode = $dataDecode[0][10];
     }
    if($dataDecode=='N'){
    $test->result=0;        
    }    
    if($dataDecode=='O'){
     $test->result=1;  
    }
    $test->save();
    return view('result',['result'=>$test, 'user'=> Auth::user()]);   //     $test->save(); Bolje vratiti novi pogled s rezultatom i pitati korisnika jel želi to objaviti pa da dobijem user post
       
    }
    
public function publishResult(Request $request){
    
      $post = new Post();
          
      $tests=Test::orderBy('created_at','desc')->get();
      foreach($tests as $test){
          if($test->post_id==0 && $test->user_id == Auth::user()->id)
          {
              $test->post_id=$post->id;
              $result=$test->result;
              break;
          }
      }
    
      if($result==0){
      $post->title ="My diagnosis is normal!";
      $post->body = 'My diagnosis came out to be normal! Does anybody have similar experience?';
      }
      else{
         $post->title ="My diagnosis is altered!";
         $post->body = 'My diagnosis came out to be altered! Does anybody have similar experience?';
      }
      $message="There was an error while saving your post.";
      if($request->user()->posts()->save($post)){
          $message="Post successfully created!";
      } 
     
    return redirect()->route('home')->with(['message'=>$message]);
}

   public function getStats(){
       $tests=Test::all();
    
      return view('stats', ['tests' =>$tests]);
    }
    
   

}