<?php
/*
 +=============================================================================
 | 
 | 마이페이지_주문조회화면
 | -------
 |
 | 최초 작성	: 손성환
 | 최초 작성일	: 2023.01.30
 | 최종 수정일	: 
 | 버전		: 1.0
 | 설명		: 
 | 
 +=============================================================================
*/

$member_idx = 0;
if (isset($_SESSION['MEMBER_IDX'])) {
	$member_idx = $_SESSION['MEMBER_IDX'];
}

$order_status = null;
if (isset($_POST['order_status'])) {
	$order_status = $_POST['order_status'];
}

$where = " OI.MEMBER_IDX = ".$member_idx." ";

if ($order_status != "ALL" && $order_status != null) {
	switch ($order_status) {
		case "OC" :
			$where .= " AND (OP.ORDER_STATUS = 'OCC') ";
			break;
		
		case "OE" :
			$where .= " AND (OP.ORDER_STATUS IN ('OEX','OEP')) ";
			break;
		
		case "OR" :
			$where .= " AND (OP.ORDER_STATUS IN ('ORF','ORP')) ";
			break;
	}
}

if ($member_idx > 0) {
	$select_order_sql = "
		SELECT
			DISTINCT OI.IDX		AS ORDER_IDX,
			OI.ORDER_CODE		AS ORDER_CODE,
			OI.ORDER_TITLE		AS ORDER_TITLE,
			OI.ORDER_STATUS		AS ORDER_STATUS,
			DATE_FORMAT(
				OI.ORDER_DATE,
				'%Y.%m.%d'
			)					AS ORDER_DATE,
			DATE_FORMAT(
				OI.CANCEL_DATE,
				'%Y.%m.%d'
			)					AS CANCEL_DATE,
			DATE_FORMAT(
				OI.EXCHANGE_DATE,
				'%Y.%m.%d'
			)					AS EXCHANGE_DATE,
			DATE_FORMAT(
				OI.REFUND_DATE,
				'%Y.%m.%d'
			)						AS REFUND_DATE,
			DC.COMPANY_NAME			AS COMPANY_NAME,
			DC.COMPANY_TEL			AS COMPANY_TEL,
			CASE
				WHEN
					OI.ORDER_STATUS = 'DCP' AND
					NOW() <= DATE_ADD(OI.DELIVERY_END_DATE, INTERVAL 7 DAY)
					THEN
						TRUE
				ELSE
						FALSE
			END						AS UPDATE_FLG
		FROM
			ORDER_INFO OI
			LEFT JOIN ORDER_PRODUCT OP ON
			OI.IDX = OP.ORDER_IDX
			LEFT JOIN DELIVERY_COMPANY DC ON
			OI.DELIVERY_IDX = DC.IDX
		WHERE
			".$where."
		ORDER BY
			OI.IDX DESC
	";
	
	$db->query($select_order_sql);
	
	$order_info = array();
	foreach($db->fetch() as $order_data) {
		$order_idx = $order_data['ORDER_IDX'];
		
		$preorder_flg = false;
		$preorder_cnt = $db->count("ORDER_PRODUCT","ORDER_IDX = ".$order_idx." AND PREORDER_FLG = TRUE");
		if ($preorder_cnt > 0) {
			$preorder_flg = true;
		}
		
		$order_product = array();
		if (!empty($order_idx)) {
			$select_order_product_sql = "
				SELECT
					OP.IDX				AS ORDER_PRODUCT_IDX,
					OP.ORDER_STATUS		AS ORDER_STATUS,
					(
						SELECT
							REPLACE(
								S_PI.IMG_LOCATION,
								'/var/www/admin/www',
								''
							)
						FROM
							PRODUCT_IMG S_PI
						WHERE
							S_PI.PRODUCT_IDX = PR.IDX AND
							S_PI.IMG_TYPE = 'P' AND
							S_PI.IMG_SIZE = 'S'
						ORDER BY
							S_PI.IDX ASC
						LIMIT
							0,1
					)					AS IMG_LOCATION,
					OP.PRODUCT_NAME		AS PRODUCT_NAME,
					OM.COLOR			AS COLOR,
					OM.COLOR_RGB		AS COLOR_RGB,
					OP.OPTION_NAME		AS OPTION_NAME,
					OP.PRODUCT_QTY		AS PRODUCT_QTY,
					OP.PRODUCT_PRICE	AS PRODUCT_PRICE
				FROM
					ORDER_PRODUCT OP
					LEFT JOIN SHOP_PRODUCT PR ON
					OP.PRODUCT_IDX = PR.IDX
					LEFT JOIN ORDERSHEET_MST OM ON
					PR.ORDERSHEET_IDX = OM.IDX
				WHERE
					OP.ORDER_IDX = ".$order_idx." AND
					OP.PRODUCT_CODE NOT LIKE 'VOUXXX%'
				ORDER BY
					OP.IDX ASC
			";
			
			$db->query($select_order_product_sql);
			
			foreach($db->fetch() as $order_product_data) {
				$order_product[] = array(
					'order_product_idx'		=>$order_product_data['ORDER_PRODUCT_IDX'],
					'order_status'			=>$order_product_data['ORDER_STATUS'],
					'img_location'			=>$order_product_data['IMG_LOCATION'],
					'product_name'			=>$order_product_data['PRODUCT_NAME'],
					'color'					=>$order_product_data['COLOR'],
					'color_rgb'				=>$order_product_data['COLOR_RGB'],
					'option_name'			=>$order_product_data['OPTION_NAME'],
					'product_qty'			=>$order_product_data['PRODUCT_QTY'],
					'product_price'			=>number_format($order_product_data['PRODUCT_PRICE'])
				);
			}
		}
		
		$order_info[] = array(
			'order_idx'				=>$order_data['ORDER_IDX'],
			'order_code'			=>$order_data['ORDER_CODE'],
			'order_title'			=>$order_data['ORDER_TITLE'],
			'order_status'			=>$order_data['ORDER_STATUS'],
			'preorder_flg'			=>$preorder_flg,
			'order_date'			=>$order_data['ORDER_DATE'],
			'cancel_date'			=>$order_data['CANCEL_DATE'],
			'exchange_date'			=>$order_data['EXCHANGE_DATE'],
			'refund_date'			=>$order_data['REFUND_DATE'],
			'company_name'			=>$order_data['COMPANY_NAME'],
			'company_tel'			=>$order_data['COMPANY_TEL'],
			'update_flg'			=>$order_data['UPDATE_FLG'],
			
			'order_product'			=>$order_product
		);
	}
	
	$json_result['data'] = $order_info;
} else {
	$json_result['code'] = 301;
	$json_result['msg'] = "로그인 정보가 없습니다. 로그인 후 다시 시도해주세요.";
}

?>