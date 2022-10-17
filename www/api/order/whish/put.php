<?php
/*
 +=============================================================================
 | 
 | 찜한 상품 리스트 - 상품 정보 수정
 | -------
 |
 | 최초 작성	: 손성환
 | 최초 작성일	: 2022.10.13
 | 최종 수정일	: 
 | 버전		: 1.0
 | 설명		: 
 | 
 +=============================================================================
*/

$member_idx		= $_SESSION[SS_HEAD.'MEMBER_IDX'];

$whish_idx		= $_POST['whish_idx'];
$product_idx	= $_POST['product_idx'];
$option_idx		= $_POST['option_idx'];
$product_qty	= $_POST['product_qty'];

if ($member_idx != null && $whish_list_idx != null && $product_idx != null && $option_idx != null && $product_qty != null) {
	$sql = "UPDATE
				dev.WHISH_LIST WL,
				(
					SELECT
						IDX					AS OPTION_IDX,
						BARCODE				AS BARCODE,
						OPTION_NAME			AS OPTION_NAME
					FROM
						dev.ORDERSHEET_OPTION
					WHERE
						IDX =".$option_idx."
				) OO
			SET
				WL.OPTION_IDX = OO.OPTION_IDX,
				WL.BARCODE = OO.BARCODE,
				WL.OPTION_NAME = OO.OPTION_NAME,
				WL.PRODUCT_QTY = ".$product_qty."
			WHERE
				WL.IDX = ".$whish_idx." AND
				WL.MEMBER_IDX = ".$member_idx." AND
				WL.PRODUCT_IDX = ".$product_idx." AND
				WL.OPTION_IDX = ".$option_idx;
	
	$db->query($sql);
}
?>