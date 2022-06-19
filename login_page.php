<?php 

session_start(); 

// include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['username']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: mdsite.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: mdsite.php?error=Password is required");

        exit();

    }else{
        $db = new SQLite3('mdaccounts.sq3');
        $sql = "SELECT * FROM logindetails WHERE user_name='$uname' AND password='$pass'";
        $sql_2 = "SELECT count(*) FROM ( SELECT * FROM logindetails WHERE user_name='$uname' AND password='$pass' ) as tmp";
        $result = $db->query($sql);
        $result_2 = $db->query($sql_2);
        $row_2=$result_2->fetchArray();
        if ($row_2['count(*)'] === 1) {

            $row=$result->fetchArray();
            if ($row['user_name'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['user_name'] = $row['user_name'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];

                header("Location: home.php");

                exit();

            }else{

                header("Location: mdsite.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: mdsite.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: mdsite.php");

    exit();

}
?>