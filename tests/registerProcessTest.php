<?php


use PHPUnit\Framework\TestCase;
class RegisterProcessTest extends TestCase
{
    private function executeThis(array $params = array()){
        $_POST = $params;
        ob_start();
        include './pages/login/registerProcess.php';
        return ob_get_clean();
    }

    public function testRegisterProcess(){
        $args = array('staffNum' =>'123496', 'name'=>'Jessica','email'=>'jessy@gmail.com','password'=>'121212');
        // $this-> assert(sucess, $this->_execute($args));
        $this-> assertEquals(true, $this->executeThis($args));
    }
}
?>