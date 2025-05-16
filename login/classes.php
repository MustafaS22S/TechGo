<?php
abstract class user{

    public $user_id;
    public $name;
    public $email;
    public $phone;
    protected $password;
    public $created_at;
    public $updated_at;
    public $role;

    function __construct($user_id,$name,$email,$phone,$password,$created_at,$updated_at,$role){
        $this->user_id = $user_id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->role = $role;
    }

    public static function login($email,$password){
        $user = null;
        $qry="SELECT * FROM USERS WHERE email='$email' AND password='$password'";
        require_once('config.php');
        $cn =mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt=mysqli_query($cn,$qry);
        if($arr = mysqli_fetch_assoc($rslt)){
            switch ($arr["role"]) {
                case 'subscriber':
                    $user = new Subscriber($arr["user_id"],$arr["name"],$arr["email"],$arr["phone"],$arr["password"],$arr["created_at"],$arr["updated_at"],$arr["role"]);
                    break;
                # code...
                case 'admin':
                    $user = new Admin($arr["user_id"],$arr["name"],$arr["email"],$arr["phone"],$arr["password"],$arr["created_at"],$arr["updated_at"],$arr["role"]);
                    break;
        }
        }else{
            echo "user not found";
        }
        mysqli_close($cn);
        return $user;
    }

    
}

class Subscriber extends user{
    public $role="subscriber";
    public static function register($name,$email,$password,$phone){
        $qry = "INSERT INTO USERS (name,email,phone,password)
        VALUES('$name','$email','$phone','$password')";
        require_once('config.php');
        $cn =mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt=mysqli_query($cn,$qry);
        mysqli_close($cn);
        return $rslt;


    }   


}

class Admin extends user{
    public $role="admin";

    public function store_product($productName,$productDescription,$productCategory,$productPrice,$productImageFile0,$productImageFile1){
        
        $qry = "INSERT INTO products (name,description,category,price,image_url_main,image_url_thumbnail) 
        values('$productName','$productDescription','$productCategory',$productPrice,'$productImageFile0','$productImageFile1')";
        require_once('config.php');
        $cn =mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
        $rslt=mysqli_query($cn,$qry);
        mysqli_close($cn);
        return $rslt;
        
    }
}


 







