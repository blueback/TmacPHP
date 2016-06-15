<?php

/**
 * 账单 
 * ============================================================================
 * @author  by time 22014-07-07
 * 
 */
class billAction extends service_Controller_admin
{

    //定义初始化变量

    public function _init()
    {
        $this->checkLogin();        
    }

    /**
     * 取账单统计
     */
    public function home()
    {        
        //取出{累计收入｜账户余额}
        //{待确认｜提现中｜已提现｜自营收入｜代销收入｜直接收款}
        $model = new service_Shop_admin();
        $model->setUid( $this->memberInfo->uid );
        $shopInfo = $model->getShopMoney();


        $bill_model = new service_bill_List_admin();
        $bill_model->setUid( $this->memberInfo->uid );


        $array = array();
        //累计收入
        $array[ 'history_money' ] = $shopInfo->history_money;
        //账户余额
        $array[ 'current_money' ] = $shopInfo->current_money;
        //待确认
        $bill_model->setStatus( 'waiting_confirm' );
        $bill_model->getBillWhere();
        $array[ 'waiting_confirm' ] = $bill_model->getBillSum();
        //提现中
        $bill_model->setStatus( 'expense_withdrawals_ing' );
        $bill_model->getBillWhere();
        $array[ 'expense_withdrawals_ing' ] = $bill_model->getBillSum();
        //已提现
        $bill_model->setStatus( 'expense_withdrawals_success' );
        $bill_model->getBillWhere();
        $array[ 'expense_withdrawals_success' ] = $bill_model->getBillSum();
        //自营收入
        $bill_model->setStatus( 'income_business' );
        $bill_model->getBillWhere();
        $array[ 'income_business' ] = $bill_model->getBillSum();
        //代销收入
        $bill_model->setStatus( 'income_wholesale' );
        $bill_model->getBillWhere();
        $array[ 'income_wholesale' ] = $bill_model->getBillSum();
        //直接收款
        $bill_model->setStatus( 'income_receivable' );
        $bill_model->getBillWhere();
        $array[ 'income_receivable' ] = $bill_model->getBillSum();

        $this->assign( $array );
		

		$config = Tmac::config( 'bill.bill.bill_type', APP_BASE_NAME );
        $data = $res = array();
        foreach ( $config as $key => $value ) {
            $res[ 'key' ] = $key;
            $res[ 'value' ] = $value;
            $data[] = $res;
        }
        $array_type[ 'bill_type_array' ] = $data;
        $this->assign( $array_type );
//		echo '<pre>';
//      print_r( $array_type );
        $this->V( 'bill_home' );
    }

    /**
     * 取全部账单类型
     */
    public function index()
    {
        $config = Tmac::config( 'bill.bill.bill_type', APP_BASE_NAME );
        $data = $res = array();
        foreach ( $config as $key => $value ) {
            $res[ 'key' ] = $key;
            $res[ 'value' ] = $value;
            $data[] = $res;
        }
        $array[ 'bill_type_array' ] = $data;
        $this->assign( $array );

        $this->V( 'bill_index' );
    }

    /**
     * 取全部账单列表
     */
    public function get_bill_list()
    {
        $status = Input::get( 'status', '' )->string();
        $pagesize = Input::get( 'pagesize', 10 )->int();

        $order_model = new service_bill_List_admin();
        $order_model->setUid( $this->memberInfo->uid );
        $order_model->setPagesize( $pagesize );
        $order_model->setStatus( $status );

        $order_model->getBillWhere();
        $rs = $order_model->getBillList();
        $this->apiReturn( $rs );
    }

}
