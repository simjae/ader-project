<?php
/*
 +=============================================================================
 | 
 | What's New - 일괄선택 후 복사&삭제
 | -----------
 |
 | 최초 작성	: 박성혁
 | 최초 작성일	: 2022.07.28
 | 최종 수정일	: 
 | 버전		: 1.0
 | 설명		: 
 | 
 +=============================================================================
*/

/** 변수 정리 **/
$select_idx 			= $_POST['select_idx'];
$action_type			= $_POST['action_type'];

$page_idx				= $_POST['page_idx'];				//idx
$page_title         	= $_POST['page_title'];				//페이지 타이틀
$page_title				= str_replace("'","\'",$page_title);
$page_sub_title         = $_POST['page_sub_title'];				//페이지 서브 타이틀
$page_sub_title			= str_replace("'","\'",$page_sub_title);
$page_memo     			= $_POST['page_memo'];				//페이지 비고
$page_memo				= str_replace("'","\'",$page_memo);
$page_content			= $_POST['page_content'];				//페이지 내용
$page_content			= str_replace("'","\'",$page_content);
$page_content			= str_replace("<p>&nbsp;</p>","",$page_content);

$display_flg            = $_POST['display_flg'];        	//진열 플래그
$display_from     		= $_POST['display_from'];			//진열 시작일
$display_from_h     	= $_POST['display_from_h'];			//진열 시작시간 (시간)
$display_from_m     	= $_POST['display_from_m'];			//진열 시작시간 (분)
$display_to       		= $_POST['display_to'];				//진열 종료일
$display_to_h     		= $_POST['display_to_h'];			//진열 종료시간 (시간)
$display_to_m     		= $_POST['display_to_m'];			//진열 종료시간 (분)

$seo_exposure_flg		= $_POST['seo_exposure_flg'];		//검색엔진 노출 플래그
$seo_title				= $_POST['seo_title'];				//브라우저 타이틀
$seo_author				= $_POST['seo_author'];				//메타태그1
$seo_description		= $_POST['seo_description'];		//메타태그2
$seo_keywords			= $_POST['seo_keywords'];			//메타태그3
$seo_alt_text			= $_POST['seo_alt_text'];			//메타태그4

$table = " dev.PAGE_WHATS_NEW ";
$where = " 1=1 ";
$idx_list="";
if ($select_idx != null) {
	$idx_list = implode(',',$select_idx);
	$where .= " AND IDX IN (".$idx_list.")";
} else if ($page_idx != null) {
	$where .= " AND IDX = ".$page_idx;
}

$sql = "";
if ($action_type != null) {
	switch ($action_type) {
		case "page_copy" :
			$db->query("SHOW TABLE STATUS WHERE NAME='PAGE_WHATS_NEW'");
			$max_idx = 0;
			foreach($db->fetch() as $data) {
				$max_idx = intval($data['Auto_increment']);
			}
			
			for ($i=0; $i<count($select_idx); $i++) {
				$sql = "INSERT INTO ".$table." 
						(
							COUNTRY,
							PAGE_TITLE,
							PAGE_SUB_TITLE,
							PAGE_URL,
							PAGE_CONTENT,
							PAGE_MEMO,
							DISPLAY_FLG,
							DISPLAY_START_DATE,
							DISPLAY_END_DATE,
							SEO_EXPOSURE_FLG,
							SEO_TITLE,
							SEO_DESCRIPTION,
							SEO_KEYWORDS,
							SEO_ALT_TEXT,
							CREATER,
							UPDATER
						)
						SELECT    
							COUNTRY,
							CONCAT(PAGE_TITLE,'_복사'),
							CONCAT(PAGE_SUB_TITLE,'_복사'),
							CONCAT(
								'/test/page/whats?page_idx=',
								".$max_idx."
							),
							PAGE_CONTENT,
							PAGE_MEMO,
							FALSE,
							DISPLAY_START_DATE,
							DISPLAY_END_DATE,
							SEO_EXPOSURE_FLG,
							SEO_TITLE,
							SEO_DESCRIPTION,
							SEO_KEYWORDS,
							SEO_ALT_TEXT,
							CREATER,
							UPDATER
						FROM 
							".$table." 
						WHERE
							IDX = ".$select_idx[$i];
				
				$db->query($sql);

				$img_sql = "INSERT INTO dev.PAGE_IMG_WHATS_NEW (
								WHATS_NEW_IDX,
								IMG_TYPE,
								IMG_SIZE,
								IMG_LOCATION,
								IMG_URL,
								CREATER,
								UPDATER
							)
							SELECT
								".$max_idx.",
								IMG_TYPE,
								IMG_SIZE,
								IMG_LOCATION,
								IMG_URL,
								CREATER,
								UPDATER
							FROM
								dev.PAGE_IMG_WHATS_NEW
							WHERE
								WHATS_NEW_IDX = ".$select_idx[$i]."
							AND
								DEL_FLG = FALSE
							";
				$db->query($img_sql);
				$max_idx++;
			}
			
			break;
		
		case "page_delete" :
			$sql = "UPDATE
						".$table."
					SET
						DEL_FLG = TRUE
					WHERE
						".$where;
			
			break;
		
		case "display_true" :
			$sql = "UPDATE
						".$table."
					SET
						DISPLAY_FLG = TRUE
					WHERE
						".$where;
			
			break;
		
		case "display_false" :
			$sql = "UPDATE
						".$table."
					SET
						DISPLAY_FLG = FALSE
					WHERE
						".$where;
			
			break;
	}
	
	if ($action_type != "page_copy") {
		$db->query($sql);
	}
}

if ($page_idx != null) {
	//if($_FILES['img']['size'] > 0) {
	//	$values['IMG'] = file_up('img','/var/www/admin/upload/whats/'); // 이미지 업로드
	//}
	
	$display_start_date = "";
	$display_end_date = "";
	if($display_flg != null){
		if ($display_flg == "true") {
			$display_start_date = "NOW()";
			$display_end_date = "9999-12-31 23:59";
		} else {
			$display_start_date = "'".$display_from." ".$display_from_h.":".$display_from_m."'";
			$display_end_date = $display_to." ".$display_to_h.":".$display_to_m;
		}
	}
	
	$sql = "UPDATE
				dev.PAGE_WHATS_NEW
			SET
				PAGE_TITLE			= '".$page_title."',
				PAGE_SUB_TITLE		= '".$page_sub_title."',
				PAGE_URL			= '".$page_url."',
				THUMBNAIL_URL		= '".$thumbnail_url."',
				PAGE_MEMO			= '".$page_memo."',
				PAGE_CONTENT		= '".$page_content."',
				DISPLAY_START_DATE	= ".$display_start_date.",
				DISPLAY_END_DATE	= '".$display_end_date."',
				SEO_EXPOSURE_FLG	= ".$seo_exposure_flg.",
				SEO_TITLE			= '".$seo_title."',
				SEO_AUTHOR			= '".$seo_author."',
				SEO_DESCRIPTION		= '".$seo_description."',
				SEO_KEYWORDS		= '".$seo_keywords."',
				UPDATE_DATE			= NOW(),
				UPDATER				= 'Admin'
			WHERE
				".$where;
	$db->query($sql);

	$img_path = "/var/www/admin/www/images/display/whats/";
	if($_FILES['img_thumbnail']['size'] > 0) {
		$prev_img_del_sql = "
			UPDATE 	dev.PAGE_IMG_WHATS_NEW
			SET 	DEL_FLG = TRUE
			WHERE	WHATS_NEW_IDX = ".$page_idx."
		";
		$db->query($prev_img_del_sql);

		$file_name_arr = explode('.',$_FILES['img_thumbnail']['name']);
		$ext = $file_name_arr[1];

		$_FILES['img_thumbnail']['name'] = "img_whats_".$page_idx.".".$ext;
		$upload_file = file_up('img_thumbnail',$img_path); // 이미지 업로드
		if ($upload_file != null) {
			for ($i=0; $i<count($upload_file); $i++) {
				$img_sql = "INSERT INTO
							dev.PAGE_IMG_WHATS_NEW
							(
								WHATS_NEW_IDX,
								IMG_TYPE,
								IMG_SIZE,
								IMG_LOCATION,
								IMG_URL,
								DEL_FLG,
								CREATE_DATE,
								CREATER,
								UPDATE_DATE,
								UPDATER
							)
							VALUES
							(
								".$page_idx.",
								'main',
								'".$upload_file[$i]['img_size']."',
								'".$img_path.$upload_file[$i]['filename']."',
								'".$img_path.$upload_file[$i]['filename']."',
								FALSE,
								NOW(),
								'Admin',
								NOW(),
								'Admin'
							)";
				$db->query($img_sql);
			}
		}
	}	
}
?>