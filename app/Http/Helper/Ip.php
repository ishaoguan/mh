<?php
namespace App\Http\Helper;
trait Ip{



    /**获取iP
     * @param int $type
     * @param bool $client
     * @return mixed
     */
    public function getIp()
    {

        $ip= false;

        if(!empty($_SERVER['HTTP_CLIENT_IP'])){

            return $this->is_ip($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:$ip;

        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){

            return $this->is_ip($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$ip;

        }else{

            return $this->is_ip($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:$ip;

        }

    }

    function is_ip($str){

        $ip=explode('.',$str);

        for($i=0;$i<count($ip);$i++){

            if($ip[$i]>255){

            }
        }
        return preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/',$str);

    }


}