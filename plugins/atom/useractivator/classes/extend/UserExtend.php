<?php

namespace Atom\UserActivator\Classes\Extend;

use Event;
use RainLab\User\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class UserExtend{

    private static function random_str() {

        $length = 6;
        $keyspace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pieces = [];
        
        $max = mb_strlen($keyspace, '8bit') - 1;

        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }

        return implode('', $pieces);
    }

    /**
     * Generate activation code and send it to user email
     * @param string $activation_code code to activate user
     * @param string $receiver_name 
     * @param string $receiver surname
     * @param string $receiver_email email to send activation code
     */
    private static function sendMail($activation_code, $receiver_name, $receiver_surname, $receiver_email) {
        
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = '78ccb9c176a7bf';
        $phpmailer->Password = '7e84060b1e49c3';

        $phpmailer->setFrom('activation@atom.sk', 'October');
        $phpmailer->addAddress($receiver_email, "$receiver_name $receiver_surname");  

        $phpmailer->isHtml(true);
        $phpmailer->Subject = 'Activation of your account';
        $phpmailer->Body    = "Hello there $receiver_name $receiver_surname, here is your activation code: <strong>$activation_code</strong>";

        $phpmailer->send();
    }

    public static function afterUserRegister_generateActivationCode() {

        Event::listen('user_registered', function($data) {

            $user = User::find($data->id);
            $user->activation_code = self::random_str();
            $user->save();

            self::sendMail($user->activation_code, $user->name, $user->surname, $user->email);

        }); 
    }

    //useless because hidden and visible are proteced
    public static function makeActivationCodeVisible() {

        User::extend(function($model) {

            return;

            $model->hidden = ['password'];
            $model->visible = ['activation_code'];

        });

    }
}