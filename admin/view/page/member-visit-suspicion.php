<div class="content__card">
	<form id="frm-filter_SPC" action="member/visit/suspicion/list/get">
		<input type="hidden" class="sort_value" name="sort_value" value="IP">
		<input type="hidden" class="sort_type" name="sort_type" value="DESC">
		
		<input type="hidden" class="rows" name="rows" value="10">
		<input type="hidden" class="page" name="page" value="1">
		
		<div class="card__header">
			<h3 id="tabTitle">부정의심 로그인 관리</h3>
			<div class="drive--x"></div>
		</div>
		<div class="card__body">
			<div class="content__wrap">
				<div class="content__title">쇼핑몰</div>
				<div class="content__row">
					<select class="fSelect country" name="country" style="width:163px;">
						<option value="KR" selected="selected">한국몰</option>
						<option value="EN">영문몰</option>
						<option value="CN">중국몰</option>
					</select>
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">회원정보</div>
				<div class="content__row">
					<select name="search_type" class="fSelect" style="width:163px;">
						<option value="member_id" selected="">아이디</option>
						<option value="member_name">이름</option>
						<option value="tel_mobile">휴대폰번호</option>
						<option value="member_addr">주소</option>
					</select>

					<input class="content__input" type="text" name="search_keyword" value="" style="width:70%;">
				</div>
			</div>
			
			<div class="content__wrap grid__half">
				<div class="half__box__wrap">
					<div class="content__title">회원레벨</div>
					<div class="content__row">
						<select name="member_level" class="fSelect" style="width:163px;">
							<option value="ALL" selected="selected">전체</option>
						<?php
							$select_level_sql = "
								SELECT
									ML.IDX		AS LEVEL_IDX,
									ML.TITLE	AS LEVEL_TITLE
								FROM
									MEMBER_LEVEL ML
								WHERE
									DEL_FLG = FALSE
							";
							
							$db->query($select_level_sql);
							
							foreach($db->fetch() as $level_data) {
						?>
							<option value="<?=$level_data['LEVEL_IDX']?>"><?=$level_data['LEVEL_TITLE']?></option>
						<?php
							}
						?>
						</select>
					</div>
				</div>
				
				<div class="half__box__wrap">
					<div class="content__title">로그인 IP</div>
					<div class="content__row">
						<input type="text" value=""  name="login_ip">
					</div>
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">회원 상태</div>
				<div class="content__row">
					<div class="rd__block">
						<input id="member_status_SPC_ALL" type="radio" name="member_status" value="ALL" checked>
						<label for="member_status_SPC_ALL">전체</label>
						
						<input id="member_status_SPC_NML" type="radio" name="member_status" value="NML" >
						<label for="member_status_SPC_NML">정상</label>
						
						<input id="member_status_SPC_SLP" type="radio" name="member_status" value="SLP" >
						<label for="member_status_SPC_SLP">휴면</label>
						
						<input id="member_status_SPC_BMB" type="radio" name="member_status" value="BMB" >
						<label for="member_status_SPC_BMB">불량</label>
						
						<input id="member_status_SPC_NDP" type="radio" name="member_status" value="NDP" >
						<label for="member_status_SPC_NDP">일반탈퇴</label>
						
						<input id="member_status_SPC_FDP" type="radio" name="member_status" value="FDP" >
						<label for="member_status_SPC_FDP">강제탈퇴</label>
					</div>
				</div>
			</div>
			
			<div class="content__wrap">
                <div class="content__title">로그인 기간</div>
				<div class="content__row">
					<div class="content__date__wrap">
						<div class="content__date__btn">
							<input class="search_date" type="hidden" name="search_date" value="">
							<div class="date__picker" date_type="login" date="all" type="button"  onclick="searchDateClick(this);">전체</div>
							<div class="date__picker" date_type="login" date="today" type="button"  onclick="searchDateClick(this);">오늘</div>
							<div class="date__picker" date_type="login" date="01d" type="button"  onclick="searchDateClick(this);">어제</div>
							<div class="date__picker" date_type="login" date="03d" type="button"  onclick="searchDateClick(this);">3일</div>
							<div class="date__picker" date_type="login" date="07d" type="button"  onclick="searchDateClick(this);">7일</div>
							<div class="date__picker" date_type="login" date="15d" type="button"  onclick="searchDateClick(this);">15일</div>
							<div class="date__picker" date_type="login" date="01m" type="button"  onclick="searchDateClick(this);">1개월</div>
							<div class="date__picker" date_type="login" date="03m" type="button"  onclick="searchDateClick(this);">3개월</div>
							<div class="date__picker" date_type="login" date="01y" type="button"  onclick="searchDateClick(this);">1년</div>
						</div>
						
						<div class="content__date__picker">
							<input id="login_from" class="date_param" type="date" name="login_from"  placeholder="From" readonly="" style="width:150px;" date_type="login" onChange="dateParamChange(this);">
							<font style="display:none;">~</font>
							<input id="login_from" class="date_param" type="date" name="login_to" placeholder="To" readonly="" style="width:150px;" date_type="login" onChange="dateParamChange(this);">
						</div>
					</div>
				</div>
            </div>
		</div>
		
		<div class="card__footer">
			<div class="footer__btn__wrap" style="grid: none;">
				<div class="btn__wrap--lg">
					<div  class="blue__color__btn" onClick="getMemberVisitInfoList('SPC');"><span>검색</span></div>
					<div class="defult__color__btn" onClick="init_filter('frm-filter_SPC','getMemberVisitInfoList');"><span>초기화</span></div>
				</div>
			</div>
		</div> 
	</form>
</div>
<div class="content__card">
	<form id="frm-02-01" action="member/update/put">
		<div class="card__body">
			<div class="info__wrap " style="justify-content:space-between; align-items: center;">
				<div class="body__info--count">
					<div class="drive--left"></div>
					총 회원 수 <font class="cnt_SPC_total info__count" >0</font>명 
					<div class="drive--left"></div>
					검색결과 <font class="cnt_SPC_result info__count" >0</font>명
				</div>
				<div class="content__row">
					<select style="width:163px;float:right;" onChange="orderChange(this);">
						<option value="IP|DESC">접속IP 역순</option>
						<option value="IP|ASC">접속IP 순</option>
						<option value="ID|DESC">회원ID 역순</option>
						<option value="ID|ASC">회원ID 순</option>
						<option value="ID|DESC">회원이름 역순</option>
						<option value="ID|ASC">회원이름 순</option>
						<option value="STATUS|DESC">회원상태 역순</option>
						<option value="STATUS|ASC">회원상태 순</option>
						<option value="JOIN_DATE|DESC">가입일 역순</option>
						<option value="JOIN_DATE|ASC">가입일 순</option>
						<option value="LOGIN_DATE|DESC">최근로그인 역순</option>
						<option value="LOGIN_DATE|ASC">최근로그인 순</option>
					</select>
					
					<select name="rows" onChange="rowsChange(this);" style="width: 130px;">
						<option value="10" selected>10개씩보기</option>
						<option value="20">20개씩보기</option>
						<option value="30">30개씩보기</option>
						<option value="50">50개씩보기</option>
						<option value="100">100개씩보기</option>
						<option value="200">200개씩보기</option>
						<option value="300">300개씩보기</option>
						<option value="500">500개씩보기</option>
					</select>
				</div>
			</div>
		
		
			<div class="table table__wrap">
				<div class="table__filter">
					<div class="filrer__wrap">
						<input type="hidden" class="action_type" name="action_type">
						<input type="hidden" class="action_name" name="action_name">
							
						<div class="filter__btn" style="width:130px;" action_type="member_trust" onclick="memberActionCheck(this);">부정의심 해제</div>
						<div class="filter__btn" style="width:130px;" action_type="member_faulty" onclick="memberActionCheck(this);">불량회원 설정</div>
						<div class="filter__btn" style="width:130px;" action_type="member_default" onclick="memberActionCheck(this);">불량회원 해제</div>
						<div class="filter__btn" style="width:130px;">SMS 보내기</div>
						<div class="filter__btn" style="width:130px;">MAIL 보내기</div>
						<div class="filter__btn" onClick="excelDownload();">엑셀 다운로드</div>
					</div> 
				</div>    
				<div class="overflow-x-auto">
					<TABLE>
						<colgroup>
							<col width="200px">
							<col width="50px">
							<col width="80px">
							<col width="150px">
							<col width="150px">
							<col width="150px">
							<col width="200px">
							<col width="100px">
							<col width="150px">
							<col width="100px">
							<col width="100px">
							<col width="100px">
							
							<col width="auto;">
							<col width="auto;">
						</colgroup>
						<THEAD>
							<TR>
								<TH>IP</TH>
								<TH>
									<div class="cb__color">
										<label>
											<input type="checkbox" onClick="selectAllClick(this);">
											<span></span>
										</label>
									</div>
								</TH>
								<TH>No.</TH>
								<TH>최근로그인</TH>
								<TH>회원이름</TH>
								<TH>회원ID</TH>
								<TH>회원등급</TH>
								<TH>회원상태</TH>
								<TH>휴대전화</TH>
								<TH>회원성별</TH>
								<TH>회원나이</TH>
								<TH>로그인횟수</TH>
								
								<TH>IP차단설정</TH>
								<TH>메일/SMS/메모</TH>
							</TR>
						</THEAD>
						<TBODY id="result_table_SPC">
							<TR>
								<TD class="default_td" colspan="17">
									조회 결과가 없습니다.
								</TD>
							</TR>
						</TBODY>
					</TABLE>
				</div>
			</div>
			<div class="padding__wrap">
				<input type="hidden" class="total_cnt" tab_status="SPC" value="0" onChange="setPaging(this);">
				<input type="hidden" class="result_cnt" tab_status="SPC" value="0" onChange="setPaging(this);">
				<div class="paging_SPC"></div>
			</div>
		</div>
	</form>
</div>

<script>
$(document).ready(function() {
	getMemberVisitInfoList('SPC');
})

function setMemberVisitInfoList_SPC(member_data) {
	let result_table = $('#result_table_SPC');
	
	result_table.html('');
	
	if (member_data != null) {
		let prev_ip = "";
		let row_num = 1;
		let row_id = "";
		
		member_data.forEach(function(row) {
			let detail_link = "";
			if (row.country != null && row.member_idx != null) {
				detail_link = ' style="text-decoration:underline;cursor:pointer;" onclick="javascript:void(window.open(\'http://116.124.128.246:81/member/detail?country=' + row.country + '&member_idx=' + row.member_idx + '\', \'회원상세 페이지\',\'width=#, height=#\'))" ';
			}
			
			let recent_ip = row.login_ip;
			
			if (prev_ip != recent_ip) {
				prev_ip = recent_ip;
				row_num = 1;
				row_id = 'ip_row_' + row.member_idx;
			} else {
				row_num++;
				$('#' + row_id).attr('rowspan',row_num);
			}
			
			let strDiv = "";
			strDiv += '<TR>';
			if (row_num == 1) {
				strDiv += '<TD id="ip_row_' + row.member_idx + '">' + row.login_ip + '</TD>';
			}
			strDiv += '    <TD>';
			strDiv += '        <div class="cb__color">';
			strDiv += '            <label>';
			strDiv += '                <input class="select" type="checkbox" name="member_idx[]" value="' + row.member_idx + '">';
			strDiv += '                    <span></span>';
			strDiv += '            </label>';
			strDiv += '        </div>';
			strDiv += '    </TD>';
			strDiv += '    <TD>' + row.num + '</TD>';
			strDiv += '    <TD>' + row.login_date + '</TD>';
			strDiv += '    <TD ' + detail_link + '>' + row.member_name + '</TD>';
			strDiv += '    <TD ' + detail_link + '>' + row.member_id + '</TD>';
			strDiv += '    <TD>' + row.member_level + '</TD>';
			strDiv += '    <TD>' + row.member_status + '</TD>';
			strDiv += '    <TD>' + row.tel_mobile + '</TD>';
			strDiv += '    <TD>' + row.member_gender + '</TD>';
			strDiv += '    <TD>' + row.age + '</TD>';
			
			strDiv += '    <TD style="text-align:right;">' + row.login_cnt + '</TD>';
			strDiv += '    <TD>';
			if (row.ip_ban_flg == true) {
				strDiv += '    <button class="btn ip_ban_btn" onClick="banMemberIp(\'' + row.country + '\',\'UBN\',' + row.member_idx + ');">IP차단 해제</button>';
			} else {
				strDiv += '    <button class="btn ip_unban_btn" onClick="banMemberIp(\'' + row.country + '\',\'BAN\',' + row.member_idx + ');">IP차단 설정</button>';
			}
			strDiv += '    </TD>';
			
			strDiv += '    <TD>';
			strDiv += '        <div class="row">';
			
			if (row.receive_sms_flg == true) {
				strDiv += '        <button class="receive_true_btn" style="">SMS</button>';
			} else {
				strDiv += '        <button class="receive_false_btn">SMS</button>';
			}
			
			if (row.receive_push_flg == true) {
				strDiv += '        <button class="receive_true_btn">알림</button>';
			} else {
				strDiv += '        <button class="receive_false_btn">알림</button>';
			}
			
			if (row.receive_email_flg == true) {
				strDiv += '        <button class="receive_true_btn">메일</button>';
			} else {
				strDiv += '        <button class="receive_false_btn">메일</button>';
			}
				
			strDiv += '            <button style="font-size:0.5rem;width:40px;height:30px;border:1px solid;background-color:#000000;color:#ffffff;border-radius:5px;">메모</button>';
			strDiv += '        </div>';
			strDiv += '    </TD>';
			strDiv += '</TR>';
			
			result_table.append(strDiv);
		});
	} else {
		let strDiv = "";
		strDiv += '<TD class="default_td" colspan="17" style="text-align:left;">';
		strDiv += '    조회 결과가 없습니다';
		strDiv += '</TD>';
		
		result_table.append(strDiv);
	}
}

</script>
