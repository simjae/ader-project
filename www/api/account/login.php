<?php
/*
 +=============================================================================
 | 
 | 회원 로그인
 | -------
 |
 | 최초 작성	: 박성혁
 | 최초 작성일	: 2022.11.30
 | 최종 수정일	: 
 | 버전		: 1.0
 | 설명		: 
 |            
 | 
 +=============================================================================
*/
$email		= $_POST['email'];
$password	= $_POST['password'];
// 값 검사
//$id = strtolower(trim($id));

//$pw = strtolower(trim($pw));

if($email == null || $email == ''){
	$result = false;
	$code	= 401;
}
if($password == null || $password == ''){
	$result = false;
	$code	= 402;
}

if($result) {
	$data = @$db->get($_TABLE['MEMBER'],'EMAIL=? AND PW=?',array($email,md5($password)))[0];
	if(is_array($data)) {
		$member_idx = $data['IDX'];
		// 세션 등록
		$_SESSION['MEMBER_IDX']	= $member_idx;
		$_SESSION['EMAIL'] = $data['EMAIL'];

		$sql = "
			UPDATE
				dev.MEMBER
			SET
				LOGIN_CNT = LOGIN_CNT + 1,
				LOGIN_DATE = NOW()
			WHERE
				IDX = ".$member_idx." ";
		$db->query($sql);

	} else {
		$result = false;
		$code	= 300;
	}
}
?>