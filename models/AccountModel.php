<?php
    require './assets/vendor/phpmailer/phpmailer/src/Exception.php';
    // require './assets/vendor/phpmailer/phpmailer/src/OAuth.php';
    require './assets/vendor/phpmailer/phpmailer/src/SMTP.php';
    require './assets/vendor/phpmailer/phpmailer/src/POP3.php';
    require './assets/vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require './assets/vendor/phpmailer/phpmailer/src/OAuthTokenProvider.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    $mes = [];
       
    trait AccountModel
    {
        public function modelLogin()
        {
            $user = $_POST['user'];
            $password = $_POST['password'];
            $password = sha1($password);
            $conn = Connection::connectDB();
            $query = $conn->prepare("select id,name,email,password,phone,token,status from customers where email=:var_email");
            $query->execute(["var_email"=>$user]);
            if($query->rowCount() > 0)
            {
                $result = $query->fetch(PDO::FETCH_OBJ);
                if($password == $result->password && $result->status == 1)
                {
                    $_SESSION['customer_name'] = $result->name;
                    $_SESSION['customer_id'] = $result->id;
                    $_SESSION['customer_email'] = $result->email;
                    header('location:index.php');
                }
                else if($result->status == 0)
                {
                    header("location:index.php?controller=account&action=login&notify=error-token");
                }
                else
                {
                    header("location:index.php?controller=account&action=login&notify=error-password");
                }
            }
            else
            {
                header("location:index.php?controller=account&action=login&notify=error");
            }
            // print_r($_POST);
        }
        public function modelRegister()
        {
            $mail = new PHPMailer(true);
            $name = $_POST['name'];
            $password = $_POST['password'];
            $phone = $_POST['phone_number'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $password = sha1($password);
            $token=sha1(rand(0,1000));
            $conn = Connection::connectDB();
            $queryCheck = $conn->prepare("select email from customers where email=:var_email");
			$queryCheck->execute(["var_email"=>$email]);
			if($queryCheck->rowCount() > 0)
				header("location:index.php?controller=account&action=register&notify=error");
			else{
				//insert ban ghi
                $query = $conn->prepare("insert into customers set name=:var_name,password=:var_password,phone=:var_phone,email=:var_email,gender=:var_gender,token=:var_token,status=0");
                $query->execute(["var_name"=>$name,"var_password"=>$password,"var_email"=>$email,"var_gender"=>$gender,"var_phone"=>$phone,"var_token"=>$token]);
                try {
                    //Server settings
                    $mail->charSet = "UTF-8";
                    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'dungduc10a8@gmail.com';                 // SMTP username
                    $mail->Password = 'muvihwikmhgxuxvu';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to
                 
                    //Recipients
                    $mail->setFrom('dungduc10a8@gmail.com', 'Mailer');
                    $mail->addAddress("$email", "$name");     // Add a recipient
                    // $mail->addCC('dungduc10a8@gmail.com');
                    
                 
                    //Attachments
                
                 
                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'accept account habongcometis';
                     $mail->Body   = "<div>Ấn vào đây để xác thực tài khoản của bạn</br><a style='text-decoration:none;display:inline-block;background-color:#c73030;padding:10px 20px;color:#fff;border-radius:4px;' href='http://localhost/cocolux_mvc_rewrite/index.php?controller=account&action=acceptEmail&token={$token}'>Xác thực tài khoản</a></div>";
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                 
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
                header('location:index.php?controller=account&action=login&notify=vet-email');
			}
           
        }
        public function modelLogout()
        {
            unset($_SESSION['customer_email']);
            unset($_SESSION['customer_name']);
            header('location:index.php');
        }
        public function modelAcceptMail()
        {
            $conn = Connection::connectDB();
            $token = $_GET['token'];
            $queryToken = $conn->query("select * from customers where token='{$token}' ");
            $result = $queryToken->fetch(PDO::FETCH_OBJ);
            if($result->status == 1)
            {
                header('location:index.php?controller=account&action=login&notify=dup-email');
            }
            else
            {
                $query = $conn->prepare("UPDATE `customers` SET `status` = '1' where id=:var_id");
                $queryUpdate = $query->execute(["var_id"=>$result->id]);
                if($queryUpdate)
                {
                    header('location:index.php?controller=account&action=login&notify=success-email');
                }
                else
                {
                    header('location:index.php?controller=account&action=login&notify=error-email');
                }
            }
            
        }
    }
?>