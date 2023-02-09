<div class="content__card">
	<form id="frm-list" action="display/product/list/get">
		<input type="hidden" class="sort_value" name="sort_value" value="CREATE_DATE">
		<input type="hidden" class="sort_type" name="sort_type" value="DESC">
		
		<input type="hidden" class="rows" name="rows" value="10">
		<input type="hidden" class="page" name="page" value="1">
		
		<div class="card__header">
			<div class="flex justify-between">
				<h3>상품 진열 페이지 검색</h3>
				<div class="black-btn" onclick="location.href='/display/product/regist';">상품 진열 페이지 등록</div>
			</div>
			<div class="drive--x"></div>
		</div>
		<div class="card__body">
			<div class="content__wrap">
				<div class="content__title">검색</div>
				<div class="content__row">
					<select id="search" name="search" class="fSelect" style="width:130px;">
						<option value="page_title">페이지명</option>
						<option value="page_memo">비고(내용)</option>
					</select>
					<input name="search_keyword" type="text" value="" style="width:15%;">
				</div>
			</div>
			<div class="content__wrap">
				<div class="content__title">진열 상태</div>
				<div class="content__row">
					<div class="rd__block">
						<input id="display_status_all" type="radio" name="display_status" value="ALL" checked>
						<label for="display_status_all">전체</label>
						
						<input id="display_status_dpc" type="radio" name="display_status" value="DPC">
						<label for="display_status_dpc">진열중</label>
						
						<input id="display_status_dwt" type="radio" name="display_status" value="DWT">
						<label for="display_status_dwt">진열대기</label>
						
						<input id="display_status_ded" type="radio" name="display_status" value="DED">
						<label for="display_status_ded">진열종료</label>
						
						<input id="display_status_dno" type="radio" name="display_status" value="DNO">
						<label for="display_status_dno">진열안함</label>
					</div>
				</div>
			</div>
			<!--
			<div class="content__wrap">
				<div class="content__title">상품수</div>
				<div class="content__row">
					<input type="number" name="product_min" class="" value="" style="width:100px;">
					<span class="">개</span> 
					<span> ~ </span>
					<input type="number" name="product_max" class="" value="" style="width:100px;">
					<span class="">개</span>
				</div>
			</div>
			-->
			<div class="content__wrap">
				<div class="content__title">등록일</div>
				<div class="content__row">
					<div class="content__date__btn">
						<input class="search_date_type" type="hidden" name="search_date_type" value="">
						<input class="search_date" type="hidden" name="search_date" value="">
						
						<div class="date__picker" date_type="create" date="today" type="button"  onclick="searchDateClick(this);">오늘</div>
						<div class="date__picker" date_type="create" date="01d" type="button"  onclick="searchDateClick(this);">어제</div>
						<div class="date__picker" date_type="create" date="03d" type="button"  onclick="searchDateClick(this);">3일</div>
						<div class="date__picker" date_type="create" date="07d" type="button"  onclick="searchDateClick(this);">7일</div>
						<div class="date__picker" date_type="create" date="15d" type="button"  onclick="searchDateClick(this);">15일</div>
						<div class="date__picker" date_type="create" date="01m" type="button"  onclick="searchDateClick(this);">1개월</div>
						<div class="date__picker" date_type="create" date="03m" type="button"  onclick="searchDateClick(this);">3개월</div>
					</div>
					
					<div class="content__date__picker">
						<input id="create_from" class="date_param" type="date" name="create_from"  placeholder="From" readonly="" style="width:150px;" date_type="create" onChange="dateParamChange(this);">
						<font style="display:none;">~</font>
						<input id="create_to" class="date_param" type="date" name="create_to" placeholder="To" readonly="" style="width:150px;" date_type="create" onChange="dateParamChange(this);">
					</div>
				</div>
			</div>
		</div>
		<div class="card__footer">
			<div class="footer__btn__wrap" style="grid: none;">
				<div class="btn__wrap--lg">
					<div  class="blue__color__btn" onClick="getPageProductList();"><span>검색</span></div>
					<div class="defult__color__btn" onClick="init_fileter('frm-list','getPageProductList')"><span>초기화</span></div>
				</div>
			</div>
		</div> 
	</form>
</div>
<div class="content__card">
	<form id="frm-01" action="display/product/put">
		<input type="hidden" class="action_type" name="action_type">
		<div class="card__header">
			<h3>상품 진열 페이지 리스트 결과</h3>
			<div class="drive--x"></div>
		</div>
		<div class="card__body">
			<div class="info__wrap " style="justify-content:space-between; align-items: center;">
				<div class="body__info--count">
					<div class="drive--left"></div>
					총 <font class="cnt_total info__count" >0</font>개  
					<div class="drive--left"></div>
					검색결과 <font class="cnt_result info__count" >0</font>개
				</div>
					
				<div class="content__row">
					<select name="searchSorting" class="fSelect" style="width:130px;float:right;margin-right:10px;" onchange="orderChange(this)">
						<option value="CREATE_DATE|DESC" selected>등록일 역순</option>
						<option value="CREATE_DATE|ASC">등록일 순</option>
						<option value="UPDATE_DATE|DESC">수정일 역순</option>
						<option value="UPDATE_DATE|ASC">수정일 순</option>
						<option value="PRODUCT_CNT|DESC">상품수 역순</option>
						<option value="PRODUCT_CNT|ASC">상품수 순</option>
					</select>
					<select name="rows" style="width: 130px;" onchange="rowsChange(this)">
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
						<div class="filter__btn" style="width: 130px;" onclick="copyPageProduct()">페이지 복사</div>
						<div class="filter__btn" style="width: 130px;" onclick="deletePageProduct()">페이지 삭제</div>
						<div class="filter__btn" style="width: 130px;" onclick="displayPageProduct('TRUE')">진열</div>
						<div class="filter__btn" style="width: 130px;" onclick="displayPageProduct('FALSE')">진열취소</div>
					</div>                                
					<div>
						<div class="table__setting__btn">설정</div>
					</div>  
				</div>
				<div class="overflow-x-auto">
					<TABLE style="width:150%;">
						<colgroup>
							<col style="width:2%;">
							<col style="width:3%;">
							<col style="width:5%;">
							<col style="width:5%;">
							<col style="width:5%;">
							<col style="width:auto;">
							<col style="width:auto;">
							<col style="width:auto;">
							<col style="width:auto;">
							<col style="width:8%;">
							<col style="width:8%;">
							<col style="width:8%;">
							<col style="width:8%;">
							<col style="width:8%;">
						</colgroup>
						<THEAD>
							<TR>
								<TH>
									<div class="cb__color">
										<label>
											<input type="checkbox" name="selectAll" onclick="selectAllClick(this);">
											<span></span>
										</label>
									</div>
								</TH>
								<TH>No.</TH>
								<TH>미리보기</TH>
								<TH>페이지 편집</TH>
								<TH>진열상태</TH>
								<TH>진열기간</TH>
								
								<TH>구매가능멤버</TH>
								<TH>페이지명(내부용)</TH>
								<TH>비고(내부용)</TH>
								<TH>URL</TH>
								
								<TH>등록일</TH>
								<TH>등록자</TH>
								<TH>수정일</TH>
								<TH>수정자</TH>
							</TR>
						</THEAD>
						<TBODY id="result_table">
							<TR>
								<TD class="default_td" colspan="13">
									조회 결과가 없습니다
								</TD>
							</TR>
						</TBODY>
					</TABLE>
				</div>
			</div>
			<div class="padding__wrap">
				<input type="hidden" class="total_cnt" value="0" onChange="setPaging(this);">
				<input type="hidden" class="result_cnt" value="0" onChange="setPaging(this);">
				<div class="paging"></div>
			</div>
		</div>
	</form>
</div>

<script>
$(document).ready(function() {
	getPageProductList();
});

function openProductDisplayUpdateModal(idx) {
	modal('/put', 'idx='+idx);
}

function searchDateClick(obj) {	
	let date = $(obj).attr('date');
	
	$('.search_date').val(date);

	$('.date__picker').css('color','#000000');
	$('.date__picker').css('background-color','#ffffff');
	
	$(obj).css('background-color','#707070');
	$(obj).css('color','#ffffff');

	$('#create_from').val('');
	$('#create_to').val('');

}

function dateParamChange(obj) {
	
	var date_from = $("#create_from").val();
	var date_to = $("#create_to").val();

	var start_date = new Date(date_from);
	var end_date = new Date(date_to);
	var now_date = new Date();

	if (start_date > now_date) {
		alert('검색 시작일에 올바른 날짜를 입력해주세요.');
		$(obj).val('');
		return false;
	}
	
	if (start_date > end_date) {
		alert('검색 시작일/종료일에 올바른 날짜를 입력해주세요.');
		$(obj).val('');
		return false;
	}
	
	frm.find('.date__picker').css('background-color','#ffffff');
	frm.find('.date__picker').css('color','#000000');
	
	frm.find('.search_date').val('');
}

function selectAllClick(obj) {
	let result_table = $('#result_table');
	
	if ($(obj).prop('checked') == true) {
		result_table.find('.select').prop('checked',true);
	} else {
		result_table.find('.select').prop('checked',false);
	}
}

function getCheckedPageIdx() {
	let result_table = $('#result_table');
	
	let checkbox = result_table.find('.select');
	let cnt = result_table.find('.select').length;
	
	let page_idx = [];
	
	for (let i=0; i<cnt; i++) {
		if (checkbox.eq(i).prop('checked') == true) {
			page_idx.push(checkbox.eq(i).val());
		}
	}
	
	return page_idx;
}

function getPageProductList() {
	let result_table = $("#result_table")
	result_table.html('');
	
	var strDiv = '';
	strDiv += '<TR>';
	strDiv += '    <TD class="default_td" colspan="13" style="text-align:left;">';
	strDiv += '        조회 결과가 없습니다';
	strDiv += '    </TD>';
	strDiv += '</TR>';
	
	result_table.append(strDiv);
	
	let frm = $('#frm-list');
	var rows = frm.find('.rows').val();
	var page = frm.find('.page').val(1);
	
	get_contents(frm,{
		pageObj : $(".paging"),
		html : function(d) {
			if (d.length > 0) {
				result_table.html('');
			}
			
			var strDiv = "";
			d.forEach(function(row) {				
				let display_date = "진열시작 : " + row.display_start_date + "<br>진열종료 : " + row.display_end_date;
				
				strDiv += '<TR>';
				strDiv += '    <td>';
				strDiv += '        <div class="cb__color">';
				strDiv += '            <label>';
				strDiv += '                <input type="checkbox" name="page_idx[]" class="select" value="' + row.page_idx + '" >';
				strDiv += '                <span></span>';
				strDiv += '            </label>';
				strDiv += '        </div>';
				strDiv += '    </td>';
				strDiv += '    <td>' + row.num + '</td>';
				strDiv += '    <TD style="text-align:center;">';
				strDiv += '        <button type="button" page_idx="' + row.page_idx + '" style="font-size:0.5rem;width:40px;height:30px;border:1px solid;background-color:#ffffff;">미리보기</button>';
				strDiv += '    </TD>';
				strDiv += '    <TD style="text-align:center;">';
				strDiv += '        <button type="button" page_idx="' + row.page_idx + '" page_url="' + row.page_url + '" style="font-size:0.5rem;width:60px;height:30px;border:1px solid;background-color:#ffffff;" onClick="location.href=\'/display/product/page?page_idx=' + row.page_idx + '\';">페이지 편집</button>';
				strDiv += '    </TD>';
				strDiv += '    <TD>' + row.display_status + '</TD>';
				strDiv += '    <TD>' + display_date + '</TD>';

				strDiv += '    <td>' + row.display_member_level + '</td>';
				strDiv += '    <TD><font style="cursor:pointer;" onClick="openProductDisplayUpdateModal(' + row.page_idx + ');">' + row.page_title + '</font></TD>';
				strDiv += '    <td>' + row.page_memo + '</td>';
				strDiv += '    <td>' + row.page_url + '</td>';

				strDiv += '    <td>' + row.create_date + '</td>';
				strDiv += '    <td>' + row.creater + '</td>';
				strDiv += '    <td>' + row.update_date + '</td>';
				strDiv += '    <td>' + row.updater + '</td>';
				strDiv += '</TR>';
			});
			
			result_table.append(strDiv);
		},
	},rows,1);
}

function orderChange(obj) {
	var select_value = $(obj).val();
	var order_value = [];
	order_value = select_value.split('|');
	
	$('.sort_value').val(order_value[0]);
	$('.sort_type').val(order_value[1]);
	
	getPageProductList();
}

function rowsChange(obj) {
	var rows = $(obj).val();
	
	$('.rows').val(rows);
	$('.page').val(1);
	
	getPageProductList();
}

function setPaging(obj) {
	var total_cnt = $(obj).parent().find('.total_cnt');
	var result_cnt = $(obj).parent().find('.result_cnt');
	
	$('.cnt_total').text(total_cnt.val());
	$('.cnt_result').text(result_cnt.val());
}

function copyPageProduct() {
	let page_idx = getCheckedPageIdx();
	
	if (page_idx.length > 0) {
		$.ajax({
			type: "post",
			data: {
				'copy_flg' : true,
				'page_idx' : page_idx
			},
			dataType: "json",
			url: config.api + "display/product/put",
			error: function() {
				alert("페이지 복사 처리중 오류가 발생했습니다.");
			},
			success: function(d) {
				if(d.code == 200) {
					$('input[name="selectAll"]').prop('checked', false);
					
					insertLog("전시관리 > 상품진열", '페이지 복사', page_idx.length);
					getPageProductList();
					
					alert('선택한  상품 진열 페이지가 복사되었습니다.');
				}
			}
		});
	} else {
		alert('복사하려는 상품 진열 페이지를 선택해주세요.');
		return false;
	}
}

function deletePageProduct() {
	let page_idx = getCheckedPageIdx();
	
	if (page_idx.length > 0) {
		$.ajax({
			type: "post",
			data: {
				'page_idx' : page_idx
			},
			dataType: "json",
			url: config.api + "display/product/delete",
			error: function() {
				alert("페이지 삭제 처리중 오류가 발생했습니다.");
			},
			success: function(d) {
				if(d.code == 200) {
					$('input[name="selectAll"]').prop('checked', false);
					
					insertLog("전시관리 > 상품진열", '페이지 삭제', page_idx.length);
					getPageProductList();
					
					alert('선택한 상품 진열 페이지가 삭제되었습니다.');
				} else {
					alert(d.msg);
				}
			}
		});
	} else {
		alert('삭제하려는 상품 진열 페이지를 선택해주세요.');
		return false;
	}
}

function displayPageProduct(display_flg) {
	let page_idx = getCheckedPageIdx();
	
	if (page_idx.length > 0) {
		$.ajax({
			type: "post",
			data: {
				'display_toggle_flg' : true,
				'page_idx' : page_idx,
				'display_flg' : display_flg
			},
			dataType: "json",
			url: config.api + "display/product/put",
			error: function() {
				alert("페이지 진열/취소 처리중 오류가 발생했습니다.");
			},
			success: function(d) {
				if(d.code == 200) {
					$('input[name="selectAll"]').prop('checked', false);
					
					insertLog("전시관리 > 상품진열", '페이지 진열/취소', page_idx.length);
					getPageProductList();
					
					alert('선택한 상품 진열 페이지의 상태가 변경되었습니다.');
				} else {
					alert(d.msg);
				}
			}
		});
	} else {
		alert('진열/취소 하려는 상품 진열 페이지를 선택해주세요.');
		return false;
	}
}

function init_fileter(frm_id, func_name){
	var formObj = $('#'+frm_id);
	formObj.find('.rd__block').find('input:radio[value="all"]').prop('checked', true);
	formObj.find('.rd__block').find('input:radio[value="ALL"]').prop('checked', true);

	formObj.find('.fSelect').prop("selectedIndex", 0);

	formObj.find('input[type=checkbox]').attr("checked", false);
	formObj.find('input[type=text]').val('');
	formObj.find('input[type=number]').val('');
	formObj.find('input[type=date]').val('');

	formObj.find('.date__picker').css('background-color','#ffffff');
	formObj.find('.date__picker').css('color','#000000');
	formObj.find('input[name="search_date"]').val('');
	
	window[func_name]();
}
</script>