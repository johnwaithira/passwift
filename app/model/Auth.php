<?php
    
    namespace Waithira\Passwift\app\model;
    
    use Waithira\Passwift\app\Http\Security\Validate;
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
                    $params['userid'] = Rand::make(4);
                    $idqry = $db->prepare("SELECT * FROM users where userid = ?");
                    $idqry->execute([$params['userid']]);
            
                    $otp = Rand::number(1000, 9999);
            
                    if($idqry->rowCount() > 0)
                    {
                        $params['userid'] = Rand::make(5);
                    }
                    $username = strtolower
                        (
                            str_replace
                            (
                                ' ',
                                '',
                                (
                                    $params['firstname'].$params['secondname']
                                )
                            )
                        )."_".$params['userid'];
            
                    $stmt = $db->prepare("INSERT INTO users(userid, username, clientFirstName, clientLastName, clientEmail, clientPassword)
                    VALUES(?,?,?,?,?,?)");
            
                    if($stmt->execute
                    (
                        [
                            $params['userid'],
                            $username,
                            $params['firstname'],
                            $params['secondname'],
                            $params['email'],
                            Hash::make(
                                $params['password']
                            )
                        ]
                    )
                    )
                    {
                        $insertotp = $db->prepare("INSERT INTO clientOTP(userid, otp) VALUES (?, ?)");
                        if($insertotp->execute([$params['userid'], $otp]))
                        {
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
                    echo  "Email already taken";
                }
            }
            else{
                echo  0;
            }
        }
    }