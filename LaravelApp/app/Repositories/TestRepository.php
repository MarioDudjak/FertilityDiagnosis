<?php
namespace App\Repositories;

use App\Repositories\Contracts\ITestRepository;
use App\Test;

class TestRepository implements ITestRepository
{
        public function __construct()
        {
        }
        
        public function getAll()
        {
            $tests=Test::orderBy('created_at', 'desc')->get();
            return $tests;            
        }

        public function saveTest($season,$age,$disease,$trauma,$surgery,$fevers,$alcohol,$smoking,$sitting,$testresult,$user_id,$post_id)
        {    
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
            $test->result=$testresult;
            $test->user_id=$user_id;
            $test->post_id=$post_id;
            
            if ($test->save()) {
                return $test;
            }
            else{
                return null;
            }
        }
        
        public function deleteTest($id)
        {
            $test=Test::where('id', $id)->first();
            try{
                $test->delete();
                return 'Successfully deleted!';
            }
            catch(\Exception $exception){
                return 'Error while deleting:'.$exception->getCode();           
            }
  
        }
    
        public function updateTest($request)
        {
            $test = Test::find($request['testId']);
            if ($test ->update()) {
                return $test;
            }
            else{
                return null;
            }
        }
    
        public function find($id)
        {
                return Test::find($id);
        }
        
        public function findBy($att, $column)
        {
                return Test::where($att, $column);
        }
}
?>
