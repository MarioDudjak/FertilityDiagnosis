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
use App\Repositories\Contracts\ITestRepository;

class ToolController extends Controller
{

    protected $testRepository;
    
    public function __construct(ITestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function getFertilityTool()
    {
        return view('tool', ['user' => Auth::user()]);
    }
    
    public function SaveResult(Request $request)
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

        switch ($request['seasons']) {
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

        $result = \App\Utilities\FertilityDiagnosis::getFertilityTestResult($season,$age,$disease,$trauma,$surgery,$fevers,$alcohol,$smoking,$sitting);

        if (isset($result["Results"]["output1"]["value"]["Values"])) {
              $dataDecode = $result["Results"]["output1"]["value"]["Values"];
              $dataDecode = $dataDecode[0][10];
        }
        if ($dataDecode=='N') {
            $testresult=0;
        }
        if ($dataDecode=='O') {
             $testresult=1;
        }
        $test=$this->testRepository->saveTest($season,$age,$disease,$trauma,$surgery,$fevers,$alcohol,$smoking,$sitting,$testresult,$user->id,0);
        
        return view('result', ['result'=>$test, 'user'=> Auth::user()]);   
    }

    public function PublishResult(Request $request)
    {
        $post = new Post();
        $tests=$this->testRepository->getAll();
        foreach ($tests as $test) {
            if ($test->post_id==0 && $test->user_id == Auth::user()->id) {
                $test->post_id=$post->id;
                $result=$test->result;
                break;
            }
        }
        if ($result==0) {
            $post->title ="My diagnosis is normal!";
            $post->body = 'My diagnosis came out to be normal! Does anybody have similar experience?';
        } else {
            $post->title ="My diagnosis is altered!";
            $post->body = 'My diagnosis came out to be altered! Does anybody have similar experience?';
        }
          $message="There was an error while saving your post.";
        if ($request->user()->posts()->save($post)) {
            $message="Post successfully created!";
        }
        return redirect()->route('home')->with(['message'=>$message]);
    }

    public function Stats()
    {
        $tests=Test::all();
        return view('stats', ['tests' =>$tests]);
    }
}
