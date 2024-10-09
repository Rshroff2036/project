<?php

require 'model.php';



class Control extends Model
{
    function __construct()
    {
        session_start();
        Model::__construct();
        $url = $_SERVER['PATH_INFO'];
        $cate_arr =  $this->select('category');
        switch ($url) {
            case "/index":
                include 'index.php';
                break;
            case "/login":
                
                include 'login.php';

                if (isset($_REQUEST['login'])) {
                    $email = $_REQUEST['email']; //typed EMAIL
                    $password = $_REQUEST['password']; //typed pwd

                    $where = array('email' => $email, 'password' => $password);

                    if(isset(($_REQUEST['chk'])))
                    {
                        setcookie("uemail", $email, time()+10);
                        setcookie("upass", $password, time()+10);
                    }

                    $fetch =  $this->select_where('users', $where);

                    $dbData = $fetch->fetch_object();

                    $dbEmail =  $dbData->email; //db email
                    $dbPwd =  $dbData->password; //db password
                    $dbName =  $dbData->name;

                    $dbId = $dbData->id;

                    $_SESSION['uemail'] = $dbEmail;
                    $_SESSION['uname'] = $dbName;
                    $_SESSION['uid'] = $dbId;

                    if ($dbEmail == $email && $dbPwd == $password) {
                        echo "
                    <script>
                    alert('welcome user..!')
                      window.location.href = 'index'
                    </script>
                    
                    ";
                    } else {
                        echo "
                    <script>
                    alert('Invalid username/password..!')
                    </script>
                    
                    ";
                    }
                }
                break;

            case "/logout": {
                    unset($_SESSION['uemail']);
                    unset( $_SESSION['uname']);
                    unset( $_SESSION['uid']);
                   
                    echo "
                            <script>
                            alert('Logout success..!')
                            window.location.href = 'index'
                            </script>
                            
                            ";
                }
            case "/register":

                if (isset($_POST['register'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $mobile = $_POST['mobile'];
                    $address = $_POST['address'];
                    $gender = $_POST['gender'];
                    $chk = $_POST['chk'];

                    $language = "";
                    foreach ($chk as $lang) {
                        $language = $language . $lang . ",";
                    }
                    $image = $_FILES['file']['name'];

                    $data = array("name" => $name, "email" => $email, "password" => $password, "mobile" => $mobile, "address" => $address, "gender" => $gender, "languages" => $language, "image" => $image);

                    $insert = $this->insert("users", $data);
                    if ($insert) {
                        echo "<script> alert('Record Inserted..!')</script>";
                    }
                }

                include 'register.php';
                break;
            case "/about":
                include 'about.php';
                break;
            case "/product":
                if (isset($_REQUEST['subcate_id'])) {

                    $subcate_id = $_REQUEST['subcate_id']; //1
                    $where = array('subcate_id_fk' => $subcate_id);

                    $prd_arr = $this->select_where_multidata('products', $where);
                }
                include 'product.php';
                break;
            case "/shop":

                if (isset($_REQUEST['cate_id'])) {

                    $cate_id = $_REQUEST['cate_id']; //1
                    $where = array('cate_id_fk' => $cate_id);

                    $subcate_arr = $this->select_where_multidata('subcategory', $where);
                }


                include 'shop.php';
                break;

            case "/addtocart":


               if(isset(($_SESSION['uid'])))
               {
                if (isset($_REQUEST['prd-id'])) {

                    $uId = $_SESSION['uid'];
                    $qty = $_REQUEST['quantity'];
                    $prd_id = $_REQUEST['prd-id'];
                    $subcateId = $_REQUEST['subcate-id'];


                    $where = array("p_id" => $prd_id, "u_id" => $uId);
                    $run = $this->select_where('cart', $where);
                    $fetch = $run->fetch_object();
                   
                    if (!empty($fetch)) {

                        $dbQty =  $fetch->quantity;//1
                        $totalQty = $dbQty+$qty;

                        $data = array('quantity' => $totalQty);
                       $update= $this->update('cart',$data,$where);
                       if ($update) {
                        echo "
                        <script>
                        alert('Updated qty')
                        window.location.href ='product?subcate_id= $subcateId'
                        </script>";
                    }

                    } 
                    else {
                        $data = array('quantity' => $qty, 'p_id' => $prd_id, 'u_id' => $uId);
                        $ins = $this->insert('cart', $data);

                        if ($ins) {
                            echo "
                            <script>
                            alert('added to cart')
                            window.location.href ='product?subcate_id= $subcateId'
                            </script>
                            ";
                        }
                    }
                }
               }

               else{

                echo "
                <script>
                alert('Login to karo bhai')
                window.location.href ='login'
                </script>
                ";
                
               }


                break;

                case "/cart":

                    if(isset(($_SESSION['uid'])))
                    {
                        $uId = $_SESSION['uid'];
                        $where = array('u_id'=>$uId);

                       $cart_arr =  $this->select_join_where_multidata('cart','products','cart.p_id = products.prd_id',$where);
                    }

                    
                    include 'cart.php';
                    break;

            case "/checkout":
                if(isset(($_SESSION['uid'])))
                    {
                        $uId = $_SESSION['uid'];
                        $where = array('u_id'=>$uId);

                       $cart_arr =  $this->select_join_where_multidata('cart','products','cart.p_id = products.prd_id',$where);
                    }

                include 'checkout.php';
                break;
            case "/payment":
                echo "<script>alert('Sdfs')</script>";

                if(isset($_REQUEST['uname']) && isset($_REQUEST['amount']) && isset($_REQUEST['payId']))
                {
                    $payId = $_REQUEST['payId'];
                    $user= $_REQUEST['uname'];
                    $amt = $_REQUEST['amount'];
                    $data = array('pay_id'=>$payId,'user'=>$user,'amount'=>$amt,'pay_status'=>"success");
                   $this->insert('payment',$data); 
                }
                break;
            case "/services":
                include 'services.php';
                break;
                case "/blog":
                    include 'blog.php';
                    break;
            case "/404":
                include '404.php';
                break;
            case "/contact":
                include 'contact.php';
                break;
        }
    }
}

$obj = new Control();
