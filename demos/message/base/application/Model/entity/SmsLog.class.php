<?php

/*
 * Tmac PHP MVC framework
 * $Author: ZhangWentao<zwt007@gmail.com> $
 * $Id: SmsLog.class.php 0 2016-04-19 16:08:05Z zhangwentao $
 */

/**
 * Description of SmsLog.class.php
 *
 * @author Tracy McGrady
 */
class entity_SmsLog_base
{
    public $sms_id;
    public $sms_type;
    public $sms_code;
    public $sms_mobile;
    public $sms_content;
    public $sms_confirm_code;
    public $sms_linked_id;
    public $sms_time;
    public $sms_ip;
    public $result_code;
    public $fail_count;
    public $sms_success;
    public $is_only_push;
}