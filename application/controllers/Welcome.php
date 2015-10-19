<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $this->load->view('welcome_message');
    }

    public function sendMail() {
        $this->load->library('phpmailer');
        $this->phpmailer->IsSMTP();       // ใช้งาน SMTP
        $this->phpmailer->SMTPAuth = true;   // เปิดการการตรวจสอบการใช้งาน SMTP
        $this->phpmailer->SMTPSecure = "ssl";  // protocol ที่จะใช้เชื่อมต่อกับ server
        $this->phpmailer->Host = "smtp.gmail.com";      // ตั้งค่า mail server ของเรานะครับ ตัวอย่างจะใช้ของ Gmail นะครับ
        $this->phpmailer->Port = 465;                   //  port ที่ใช้  ถ้าเป็นของ hosting ทั่วไปส่วนใหญ่เป็น 25 นะครับ
        $this->phpmailer->Username = "mynameisbee@uru.ac.th";  //  email address
        $this->phpmailer->Password = "beebraingreat";            // รหัสผ่าน Gamil
        $this->phpmailer->SetFrom('mynameisbee@uru.ac.th', 'ชื่อ-นามสกุล');  //ผู้ส่ง
        $this->phpmailer->AddReplyTo("mynameisbee@uru.ac.th", "ชื่อ-นามสกุล");  //email ผู้รับเมื่อมีการตอบกลับนะครับ
        $this->phpmailer->Subject = "subject"; //หัวข้ออีเมล์
        $this->phpmailer->Body = "HTML message "; //ส่วนนี้รายละเอียดสามารถส่งเป็นรูปแบบ HTML ได้
        //$this->phpmailer->AltBody    = "Plain text message"; //ส่วนนี้ส่งเป็นข้อมูลอย่างเดียวเท่าสนั้น แล้วแต่จะเปิดใช้นะครับ
        $this->phpmailer->AddAddress('mynameisbee@uru.ac.th', "Fucyber"); //อีกเมล์ผู้รับ  สามารถเพิ่มได้มากกว่า 1
        //  $this->phpmailer->AddAttachment("images/phpmailer.gif");      // การแนบไฟล์ถ้าต้องการ สามารถเพิ่มได้มากกว่า 1 เช่นกันครับ
        //   $this->phpmailer->AddAttachment("images/phpmailer_mini.gif"); // ตัวอย่างการพิ่มได้มากกว่า 1
        for ($i = 0; $i < 30; $i++) {
            if (!$this->phpmailer->Send()) {
                $data["message"] = "Error: " . $this->phpmailer->ErrorInfo;
            } else {
                $data["message"] = "ส่งอีเมล์สำเร็จ!";
            }
            //$this->load->view('sent_mail', $data);
            echo $i;
            print_r($data);
            sleep(10);
        }
    }

}
