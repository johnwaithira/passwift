<?php
    
    namespace Waithira\Passwift\app\model;
    
    use Waithira\Passwift\app\Http\Format\Generator\Rand;
    use Waithira\Passwift\app\Http\Security\Auth\Session;
    use Waithira\Passwift\app\Http\Security\Hash;
    use Waithira\Passwift\app\Http\Security\Validate;
    use Waithira\Passwift\app\Http\SMTP\MailServer;
    use Waithira\Passwift\database\Database;

    class Auth
    {
        public Database $database ;
        public function __construct(Database $database)
        {
            $this->database = $database;
        }
    
        public function create_account($params = [])
        {
            $db = $this->database->pdo;
            if(Validate::csrf())
            {
                $qry  = $db->prepare("SELECT * FROM users where clientEmail = ?");
                $qry->execute([$params['email']]);
                if($qry->rowCount() < 1)
                {
                    $userid = Rand::make(4);
                    $idqry = $db->prepare("SELECT * FROM users where userid = ?");
                    $idqry->execute([$userid]);
            
                    $otp = Rand::number(1000, 9999);
            
                    if($idqry->rowCount() > 0)
                    {
                        $userid = Rand::make(5);
                    }
                    $username = strtolower
                        (
                            str_replace
                            (
                                ' ',
                                '',
                                (
                                    $params['firstname'].$params['surname']
                                )
                            )
                        )."_".$userid;
            
                    $stmt = $db->prepare("INSERT INTO users(userid, username, clientFirstName, clientSurName, clientEmail, clientPassword)
                    VALUES(?,?,?,?,?,?)");
            
                    if($stmt->execute
                    (
                        [
                            $userid,
                            $username,
                            $params['firstname'],
                            $params['surname'],
                            $params['email'],
                            Hash::make($params['password']
                            )
                        ]
                    )
                    )
                    {
                        $insertotp = $db->prepare("INSERT INTO clientOTP(userid, otp) VALUES (?, ?)");
                        if($insertotp->execute([$userid, $otp]))
                        {
                            MailServer::sendemail($params['surname'],$params['email'], 'otp', $otp);
                            return true;
                        }
                        else{
                            echo "Not created";
                        }
                    }
                    else{
                        echo  "Failed";
                    }
                }else{
                    echo  "Email is already taken";
                }
            }
            else{
                echo  0;
            }
        }
        public static function check()
        {
            return Session::checksession();
        }
    
        public function user_login($params)
        {
            $db = $this->database->pdo;
            $db = $this->database->pdo;
            if(Validate::csrf())
            {
                $qry = $db->prepare("SELECT * FROM users where clientEmail = ?");
                $qry->execute([$params['email']]);
        
                if($qry->rowCount() < 1)
                {
                    echo "Email not registered";
                }
                else
                {
                    $clientData = $qry->fetch();
                    if($clientData['clientPassword'] == Hash::make($params['password']))
                    {
                        Session::setSession($clientData['userid']);
                        Session::set('user', [$clientData]);
                        return true;
                    }
                    else
                    {
                        echo  "Password error";
                    }
            
                }
        
            }
    
    
        }
    }