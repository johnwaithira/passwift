<?php
    
    namespace Waithira\Passwift\app\Http\SMTP;
    
    define('LINK', 'http://127.0.0.1:8000');

    require (dirname(__DIR__)."/SMTP/PHPMailer/Exception.php");
    require (dirname(__DIR__)."/SMTP/PHPMailer/PHPMailer.php");
    require (dirname(__DIR__)."/SMTP/PHPMailer/SMTP.php");

use Dotenv\Dotenv;
use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    class MailServer
    {
        /**
         * @param $name
         * @param $email
         * @param $emailTemplate
         * @param $input
         * @return int|void
         */
        public static function sendemail($name, $email, $emailTemplate, $input)
       {

           require_once __DIR__."/../../../vendor/autoload.php";

           $dotenv = \Dotenv\Dotenv::createImmutable( dirname(dirname(dirname(__DIR__))));
           $dotenv->load();      
           
           $mail = new PHPMailer(true);
           $date = date('Y');
       
           $includes = [
               'header' => 
                   '
                       <!DOCTYPE html>
                       <html lang="en">
                       <head>
                           <meta charset="UTF-8">
                           <meta http-equiv="X-UA-Compatible" content="IE=edge">
                           <meta name="viewport" content="width=device-width, initial-scale=1.0">
                       </head>
                       <body>
                           <div style="max-width: 450px; margin: auto; ">
                               <div style=" width: 100%; border: 1px solid rgba(128, 128, 128, 0.597); border-radius: 8px;">
                                   <div style="padding: 20px;">
                                       <div>
                                           <div>
                                               <h3>Passwift Inc</h3>
                                           </div>
                                       </div>
           
                   ',
               'footer' => 
                   '               </div>
                               </div>
                               <div style="padding: 10px ;">
                                   <center>
                                       <p style="color: rgb(139, 139, 139); font-size: 12px;">Developed by <a href="https://linkedin.com/in/johnwaithira">JonWaithira</a></p>
                                       <small style="color: rgb(148, 148, 148);">&copy;'. $date .'  Passwift INC <br> </small>
                                   </center>
                               </div>
                           </div>
                       </body>
                       </html>
                   '
           ];
           $data = [
               'otp' => 
               [
                   'subject' =>
                       '   
                           Verify account via OTP
                       ',
                   'body'=>
                       $includes['header'].
                       '
                           <br>
                           <h2>Verify your Passwift Account</h2>
                           <br>
                           <hr>
                           <p style="padding-top: 10px;">Hello <strong>[ '. $name .' ]</strong>, <br> Your Passwift account has been created successfully </p>
                           <p>Please use this code to verify your account</p>
                           <h1 style="text-align: center;  font-weight: 400;">'. $input.'</h1>
       
                           <a href="'. LINK . 'verify?user='.$email.'&otp='.$input.''.'">Click to verify</a>
                           <p>If you didn\'t create an account using this email, ignore this email.</p>
                       '.$includes['footer']
               ],
               'resetpassword' =>
                   [
                       'subject' =>
                           '
                               Reset Password
                           ',
                       'body' =>
                           $includes['header'].
                           '
                               <br>
                               <h2>Reset password request</h2>
                               <br>
                               <hr>
                               <p>Hello <strong>[ '. $name .' ]</strong>,</p>
                               <p>Somebody requested a new password for the [Kicks Nairobi] account associated with ['.$email.'].</p>
                               <span>No changes have been made to your account yet.</span>
                               <p>You can reset your password by clicking the link below:</p>
                               <p style="padding:10px 10px 10px 0;"><a href="'.$input.'" style="text-decoration: none; background: #32c0dccc; color: aliceblue; padding: 13px 25px; border-radius: 30px;">Reset now</a></p>
                               <p>If you didn\'t request password reset option, ignore this email.</p>
                               
                           '.$includes['footer']
                   ],
           
               'newsletter' => 
                  [
                      'subject' =>
                           '
                               Subscribed to newletter
                           ',
                       'body' =>
                           $includes['header'].
                           '
                               <br>
                               <h2>Subscribed to newsletter</h2>
                               <br>
                               <hr>
                               <p>Hello</p>
                               <p>Thankyou for subscribing to our newsletter </p><p> You will be receiving updates from our site</p>
                               <p>If you didn\'t make the request, please press the *unsubscribe* button below.</p>
                               <p style="padding:10px 10px 10px 0;"><a href="" style="text-decoration: none; background: #32c0dccc; color: aliceblue; padding: 13px 25px; border-radius: 30px;">Unsubscribe</a></p>
                           '.$includes['footer']
                  ],
                  'resetsuccessfull' =>
                  [
                       'subject' =>
                       '
                           Password changed successfully
                       ',
                       'body' =>
                           $includes['header'].
                           '
                               <br>
                               <h2>Password has been updated</h2>
                               <br>
                               <hr>
                               <p>Hello</p>
                               <p>You have successfully changed your password</p>
                               <p>If you didn\'t make the request, please press the *report* button below.</p>
                               <p style="padding:10px 10px 10px 0;"><a href="" style="text-decoration: none; background: #32c0dccc; color: aliceblue; padding: 13px 25px; border-radius: 30px;">Report</a></p>
                           '.$includes['footer']
       
                  ],
                  'contact' =>
                  [
                       'subject' =>
                       '
                           Message sent successfully
                       ',
                       'body' =>
                           $includes['header'].
                           '
                               <br>
                               <h2>We have received your message. We\'ll reach to you ASAP</h2>
                               <br>
                               <hr>
                               <p>Hello</p>
                               <p> Our team is looking on the message sent by you</p>
                               <p>If you didn\'t make the request, please ignore this message.</p>
                           '.$includes['footer']
       
                  ]
           ];
           try
           {    
                $mail -> isSMTP();
                $mail->Host = $_ENV['MAIL_Host'];
                $mail -> SMTPAuth = true;
                $mail -> Username = $_ENV['MAIL_Username'];
                $mail -> Password =  $_ENV['MAIL_Password'];
                $mail -> SMTPSecure = $_ENV['MAIL_SMTPSecure'];
                $mail -> Port =  $_ENV['MAIL_Port'];
                $mail ->setFrom( $_ENV['Mail_setFrom'],  $_ENV['Mail_setFrom_user']);
                $mail ->addAddress($email);
                $mail ->addReplyTo( $_ENV['ReplyTo'],  $_ENV['ReplyTo_User']);
                $mail ->isHTML(true);
                $mail ->Subject = $data[$emailTemplate]['subject'];
                $mail ->Body = $data[$emailTemplate]['body'];;
                $mail ->send();
       
               return 1;
           }
           catch(Exception $e)
           {
               
               echo $mail->ErrorInfo;
       
           }    
       }
    }