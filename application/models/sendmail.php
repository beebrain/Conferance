<?php

class sendmail extends CI_Model {

    private $username = "mynameisbee@uru.ac.th";
    private $detailname = "Science International Conference";
    private $password = "beebraingreat";
    private $sendform = "mynameisbee@uru.ac.th";

    // private $subject = "Confirm Account";


    public function __construct() {
        parent::__construct();
    }

    public function confirmUser($emailAddress, $password) {
        $body = "Welcome to Science and Technology International Conference
Please keep this e-mail for your records. Your account information is as follows:
----------------------------

Username:" . $emailAddress;
        $body .="
Password:" . $password;
        $body .="

----------------------------
Please visit the following link in order to activate your account:
";
        $body .= base_url('index.php/UserController/confirmUser/') . "/" . base64_encode($emailAddress);
        $body .="
Your password has been securely stored in our database and cannot be 
retrieved. In the event that it is forgotten, you will be able to reset it
using the email address associated with your account.

Thank you for registering.";

        $subject = "Welcome to Science and Technology International Conference ";

        $this->sendMail($emailAddress, $body, $subject);
    }

    public function sendMail($emailAddress, $body, $subject) {

        $this->load->library('phpmailer');
        $this->phpmailer->IsSMTP();       // ใช้งาน SMTP
        $this->phpmailer->SMTPAuth = true;   // เปิดการการตรวจสอบการใช้งาน SMTP
        $this->phpmailer->SMTPSecure = "ssl";  // protocol ที่จะใช้เชื่อมต่อกับ server
        $this->phpmailer->Host = "smtp.gmail.com";      // ตั้งค่า mail server ของเรานะครับ ตัวอย่างจะใช้ของ Gmail นะครับ
        $this->phpmailer->Port = 465;                   //  port ที่ใช้  ถ้าเป็นของ hosting ทั่วไปส่วนใหญ่เป็น 25 นะครับ
        $this->phpmailer->Username = $this->username;  //  email address
        $this->phpmailer->Password = $this->password;            // รหัสผ่าน Gamil
        $this->phpmailer->SetFrom($this->sendform, $this->detailname);  //ผู้ส่ง
        //$this->phpmailer->AddReplyTo("mynameisbee@uru.ac.th", "ชื่อ-นามสกุล");  //email ผู้รับเมื่อมีการตอบกลับนะครับ
        $this->phpmailer->Subject = $subject; //หัวข้ออีเมล์
        $this->phpmailer->Body = $body; //ส่วนนี้รายละเอียดสามารถส่งเป็นรูปแบบ HTML ได้
        //$this->phpmailer->AltBody    = "Plain text message"; //ส่วนนี้ส่งเป็นข้อมูลอย่างเดียวเท่าสนั้น แล้วแต่จะเปิดใช้นะครับ
        $this->phpmailer->AddAddress($emailAddress); //อีกเมล์ผู้รับ  สามารถเพิ่มได้มากกว่า 1
        //  $this->phpmailer->AddAttachment("images/phpmailer.gif");      // การแนบไฟล์ถ้าต้องการ สามารถเพิ่มได้มากกว่า 1 เช่นกันครับ
        //   $this->phpmailer->AddAttachment("images/phpmailer_mini.gif"); // ตัวอย่างการพิ่มได้มากกว่า 1

        if (!$this->phpmailer->Send()) {
            $data["message"] = "Error: " . $this->phpmailer->ErrorInfo;
        } else {
            $data["message"] = "ส่งอีเมล์สำเร็จ!";
        }
        //$this->load->view('sent_mail', $data);
        return $data;
    }

}
