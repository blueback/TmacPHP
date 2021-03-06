<?php

$config[ 'identity_id' ] = array(
    1 => '任课老师',
    2 => '班主任',
    3 => '课程组组长', //课程组组长负责整个年级的一个学科对作业细节有调配权限（可发布，删除等）
    4 => '年级组长', //年级组长负责整个年级的所有学科    无调配权限
    5 => '教务主任', //教务主任负责全校所有学生    无调配权限
    6 => '校长'
);


$config[ 'student_identity_id' ] = array(
    1 => '课代表',
    2 => '信息委员'
);

$config[ 'member_type' ] = array(
    1 => '学生',
    2 => '家长',
    3 => '老师',
    4 => '学校管理员'
);

$config['member_setting']['bank_id'] = array(
    'cmb' => '招商银行',
    'icbc' => '中国工商银行',
    'abc' => '中国农业银行',
    'ccb' => '中国建设银行',
    'boc' => '中国银行',
    'spdb' => '上海浦东发展银行',
    'bcom' => '交通银行',
    'cmbc' => '中国民生银行',
    'citic' => '中信银行',
    'psbc' => '中国邮政储蓄银行'
);
$config['member_setting']['settle_bank_id'] = array(
    'alipay' => '支付宝',
    'cmb' => '招商银行',
    'icbc' => '中国工商银行',
    'abc' => '中国农业银行',
    'ccb' => '中国建设银行',
    'boc' => '中国银行',
    'spdb' => '上海浦东发展银行',
    'bcom' => '交通银行',
    'cmbc' => '中国民生银行',
    'citic' => '中信银行',
    'psbc' => '中国邮政储蓄银行'
);