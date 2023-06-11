<?php

class ViewRenderer
{
    public function view($page)
    {
        global $error_username,$error_email,$error_password,$error_exist,$bookings,$errorname,$errorphone,
        $errorcheckdate,$errorin,$errorout,$utilities,$erroractive,$errorpassword,$erroremail,$errorcredentials,
        $singleroom,$fetch,$rooms,$room,$error_subject,$error_message;
        require(APP_PATH . "view/$page.view.php");
    }
}

class View
{
    public function viewadmin($page)
    {
        global $erroremail,$errorpassword,$show_rooms,$booking_count,$up_hotels,$show_hotels,$errorstatus,$errorcredentialsadmin,$admins,$error_name,$error_email,$error_password,$error_exist,$admins_count,$hotels,$rooms,$error_description,$error_location
        ,$error_price,$error_persons, $error_beds,$error_size,$error_view,$show_bookings;
        require(APP_PATH . "admin-panel/view/$page.view.php");
    }
}
class RequestHandler
{
    public function isPost()
    {
        return $_SERVER["REQUEST_METHOD"] == "POST";
    }
}

class StringDefender
{
    public function defend($var)
    {
        return trim(htmlspecialchars($var));
    }
}

class ErrorChecker
{
    public function checkError($value, $name, $type)
    {
        $error = "";
        $error = empty($value) ? $name . " is required" : "";

        if (!empty($error)) {
            return $error;
        }

        switch ($type) {
            case "string":
                $error = !is_string($value) ? $name . " must be a string" : "";
                break;
            case "integer":
                $error = !is_numeric($value) ? $name . " must be of numeric type " : "";
                break;
            case "email" :
                $error = !filter_var($value, FILTER_VALIDATE_EMAIL) ? $name . " must be an email " : "";
                break;
            case "password" :
                $error = strlen($value) < 8 || !preg_match('@[0-9]@', $value) ||
                !preg_match('@[a-z]@', $value) || !preg_match('@[A-Z]@', $value) || !preg_match('@[^\w]@', $value) ?
                $name . " must be at least 8 characters, includes one uppercase, one lowercase, one number, and one symbol " : "";
                break;
            default:
                $error = "";
        }

        return $error;
    }
}


class DateChecker
{
    public function errorCheckDate($in, $out)
    {
        $currentDate = date("Y/m/d");

        if ($currentDate > $in || $currentDate > $out || $in > $out || $in == $currentDate) {
            $error = "Wrong date";
        } else {
            $error = "";
        }

        return $error;
    }
}


class EmailChecker
{
    public function checkEmail($email)
    {
        global $dba;
        $sql = "SELECT * FROM hotel.register where email = ?";
        $smt = $dba->prepare($sql);
        $smt->execute([$email]);
        $query = $smt->fetch();

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}


class EmailExistChecker
{
    public function emailExist($email)
    {
        $emailChecker = new EmailChecker();
        $error = $emailChecker->checkEmail($email) ? ' email already exists' : "";
        return $error;
    }
}

class AdminEmailChecker
{
    public function checkEmailAdmin($email)
    {
        global $dba;
        $sql = "SELECT * FROM hotel.admins WHERE email = ?";
        $smt = $dba->prepare($sql);
        $smt->execute([$email]);
        $query = $smt->fetch();

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}


class AdminEmailExistChecker
{
    public function emailExistAdmin($email)
    {
        $adminEmailChecker = new AdminEmailChecker();
        $error = $adminEmailChecker->checkEmailAdmin($email) ? ' email already exists' : "";
        return $error;
    }
}
class PasswordEncrypter
{
    public function encrypt($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}


class PasswordChecker
{
    public function passwordCheck($password, $existingPassword)
    {
        $hash = crypt($password, $existingPassword);
        if ($hash === $existingPassword) {
            return true;
        } else {
            return false;
        }
    }
}

class CredentialChecker
{
    public function checkCredentials($email, $password)
    {
        global $dba;
        $sql = "SELECT * FROM hotel.register WHERE email = ?";
        $smt = $dba->prepare($sql);
        $smt->execute([$email]);
        $query = $smt->rowCount();
        $qur = $smt->fetch();

        if ($query == 1) {
            if ($qur) {
                $passwordChecker = new PasswordChecker();
                if ($passwordChecker->passwordCheck($password, $qur['password'])) {
                    return $qur;
                }
            }
        }

        return null;
    }
}

class CredentialErrorChecker
{
    public function checkErrorCredentials($email, $password)
    {
        $credentialChecker = new CredentialChecker();
        $error = !$credentialChecker->checkCredentials($email, $password) ? ' check your credentials !' : "";
        return $error;
    }
}


class AdminCredentialChecker
{
    public function checkAdminCredentials($email, $password)
    {
        global $dba;
        $sql = "SELECT * FROM hotel.admins WHERE email = ?";
        $smt = $dba->prepare($sql);
        $smt->execute([$email]);
        $query = $smt->rowCount();
        $qur = $smt->fetch();

        if ($query == 1) {
            if ($qur) {
                $passwordChecker = new PasswordChecker();
                if ($passwordChecker->passwordCheck($password, $qur['password'])) {
                    return $qur;
                }
            }
        }

        return null;
    }
}

class AdminCredentialErrorChecker
{
    public function checkErrorAdminCredentials($email, $password)
    {
        $adminCredentialChecker = new AdminCredentialChecker();
        $error = !$adminCredentialChecker->checkAdminCredentials($email, $password) ? ' check your credentials !' : "";
        return $error;
    }
}

class AccountActivator
{
    public function checkActivationStatus($email)
    {
        global $dba;
        $sql = "SELECT * FROM hotel.register WHERE email = ? AND status = 'ON'";
        $smt = $dba->prepare($sql);
        $smt->execute([$email]);
        $query = $smt->fetch();

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}

class AccountStatusChecker
{
    public function checkAccountStatus($email)
    {
        $accountActivator = new AccountActivator();
        $error = !$accountActivator->checkActivationStatus($email) ? " your account is not activated !" : "";
        return $error;
    }
}

class MessageHandler
{
    public function getMessage()
    {
        if (isset($_SESSION["message"])) {
            $output = $_SESSION["message"];
            $_SESSION["message"] = null;
            return $output;
        }
        return null;
    }
}