<?php
    class MakePassword{
        // protected $salt;
        // protected $hashedPass;
        // public $result;

        //public function makePassword($password)
            if(preg_match('^\x01-\x7E'),'ああ'){
                $result = 'error';
                return $result;
            }

            // $salt = $this->createSalt();
            // $result = $this->createHash($password,$salt);

            //return 0;
        //}

    //     private function createHash($nonHashPass,$salt){
    //         $hash = crypt($nonHashPass,$salt);
    //         return $hash;
    //     }
  
    //     private function createSalt() {
    //         $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
    //         $salt = null;
    //         for ($i = 0; $i < 3; $i++) {
    //             $salt .= $str[rand(0, count($str) - 1)];
    //         }
            
    //         return $salt;
    //     }
    }

    // $pass = new MakePassword();
    // $password = $pass->makePassword('ああああ');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>