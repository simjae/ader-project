<style>
#seo{
	margin-top : 50px;
}
.sub{
	margin-top : 10px;
}
</style>
<!-- START RESPONSE CARD -->

<div class="content__card">
	<form id="frm-add">
		<input id="posting_type" type="hidden" value="LKBK" style="width:80%;" placeholder="" name="posting_type">
		<div class="card__header">
			<div class="flex justify-between">
				<h3>룩북 등록</h3>
			</div>
			<div class="drive--x"></div>
		</div>
		
		<div class="card__body">
			<div class="content__wrap">
				<div class="content__title">국가</div>
				<div class="content__row">
					<select id="country" type="select" name="country" style="width:80px">
						<option value="" selected>국가</option>
						<option value="KR" >한국몰</option>
						<option value="EN" >영문몰</option>
						<option value="CN" >중문몰</option>
					</select>
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">페이지명</div>
				<div class="content__row">
					<input id="duplicate_check" type="hidden" value="false">
					<input id="page_title" type="text" value="" style="width:80%;" placeholder="" name="page_title">
					<div id="duplicate_btn" class="defult-btn" style="width:95px;background-color:#e43a45;color:#ffffff;font-size:0.5rem;text-align:center;" onclick="duplicateCheck()">중복체크</div>
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">설명</div>
				<div class="content__row">
					<input type="text" value="" style="width:80%;" placeholder=""  name="page_memo">
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">진열 예약 설정</div>
				<div class="content__row">
					<div class="rd__block">
						<input id="display_flg" type="hidden" value="false">
						
						<input type="radio" id="display_flg_true" class="radio__input display_flg" value="true" name="display_flg" checked>
						<label for="display_flg_true">상시 오픈</label>
						
						<input type="radio" id="display_flg_false" class="radio__input display_flg" value="false" name="display_flg">
						<label for="display_flg_false" style="gap:5px;">지정 시간에만 </label>
						
						<div class="content__date__picker">
							<input class="display_date" type="date" name="display_from"  placeholder="From" readonly="" style="width:150px" onChange="">
							<select class="display_date" type="select" name="display_from_h" style="width:80px">
								<option value="" selected>시간</option>
							</select>
							<select class="display_date" type="select" name="display_from_m" style="width:80px">
								<option value="" selected>분</option>
							</select>
							
							<br><font class="" >~</font><br>
							
							<input class="display_date" type="date" name="display_to" placeholder="To" readonly="" style="width:150px; " onChange="">
							<select class="display_date" type="select" name="display_to_h" style="width:80px">
								<option value="" selected>시간</option>
							</select>
							<select class="display_date" type="select" name="display_to_m" style="width:80px">
								<option value="" selected>분</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="card__header" id="seo">
			<div class="flex justify-between">
				<h3>검색엔진 최적화(SEO)</h3>
			</div>
			<div class="drive--x"></div>
		</div>
		
		<div class="card__body">
			<div class="content__wrap">
				<div class="content__title">검색 엔진 노출 설정</div>
				<div class="content__row">
					<div class="rd__block">
						<input type="radio" id="searchExposure1" class="radio__input" value="true" name="seo_exposure_flg" checked/>
						<label for="searchExposure1">노출함</label>
						<input type="radio" id="searchExposure2" class="radio__input" value="false" name="seo_exposure_flg"/>
						<label for="searchExposure2">노출안함</label>
					</div>
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">검색엔진<br>브라우저 타이틀</div>
				<div class="content__row">
					<input type="text" name="seo_title">
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">검색엔진<br>메타태그 Author</div>
				<div class="content__row">
					<input type="text" name="seo_author">
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">검색엔진<br>메타태그Description</div>
				<div class="content__row">
					<textarea name="seo_description" id="seo_description" cols="70" rows="10" style="width:90%;"></textarea>
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">검색엔진<br>메타태그Keywords</div>
				<div class="content__row">
					<input type="text" name="seo_keywords">
				</div>
			</div>

			<div class="content__wrap">
				<div class="content__title">검색엔진<br>메타태그 Alt 텍스트</div>
				<div class="content__row">
					<textarea name="seo_alt_text" id="seo_alt_text" cols="70" rows="10" style="width:90%;"></textarea>
				</div>
			</div>
		</div>
		
		<div class="card__footer">
			<div class="footer__btn__wrap" style="grid: none;">
				<div class="btn__wrap--lg">
					<div  onclick="postingLookbookRegist();"  class="blue__color__btn"><span>저장</span></div>
					<div onclick="modal_cancel();" class="defult__color__btn"><span>작성 취소</span></div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- START RESPONSE CARD -->
<script>
var seo_description = [];
var seo_alt_text = [];

function setSmartEditor() {
	//seo
	nhn.husky.EZCreator.createInIFrame({
		oAppRef: seo_description,
		elPlaceHolder: "seo_description",
		sSkinURI: "/scripts/smarteditor2/SmartEditor2Skin.html",
		htParams: { fOnBeforeUnload : function(){}}
	});
	nhn.husky.EZCreator.createInIFrame({
		oAppRef: seo_alt_text,
		elPlaceHolder: "seo_alt_text",
		sSkinURI: "/scripts/smarteditor2/SmartEditor2Skin.html",
		htParams: { fOnBeforeUnload : function(){}}
	});
}

$(document).ready(function() {
	setSmartEditor();
	timeSelectInit();
	$('.display_date').val('');
	$('.display_date').attr("disabled", true);
	
	$('#page_title').change(function() {
		$('#duplicate_check').val(false);
		$('#duplicate_btn').css('background-color','#E43A45');
		$('#duplicate_btn').text('중복체크');
	});
});

$('.radio__input').change(function(){
	var val = this.value;
	
	switch(val){
		case 'true':
			$('.display_date').val('');
			$('.display_date').attr("disabled", true);
			break;
		case 'false':
			$('.display_date').removeAttr("disabled");
			break;
	}
});

function duplicateCheck(){
	var country = $('#country').val();
	var posting_type = $('#posting_type').val();
	var page_title = $('#page_title').val();
	
	var page_table = "posting";
	
	if (country.length == 0 || country == null){
		alert('국가를 선택해주세요.');
		return false;
	}
	
	if (page_title.length == 0 || page_title == null){
		alert('페이지명을 입력해주세요.');
		return false;
	}
	
	$.ajax({
		type: "post",
		data: {
			'posting_type' : posting_type,
			'country' : country,
			'page_title' : page_title,
			'page_table' : page_table
		},
		dataType: "json",
		url: config.api + "display/check",
		error: function() {
			alert('페이지명 중복체크에 실패했습니다.');
		},
		success: function(d) {
			var data = d.data;
			if(data != null) {
				var page_cnt = data[0].page_cnt;
				if(page_cnt > 0){
					$('#duplicate_btn').css('background-color','#E43A45');
					$('#duplicate_btn').text('중복체크');
	
					alert("페이지명이 중복됩니다. 다른 페이지명을 입력해주세요.");
				} else{
					$('#duplicate_check').val(true);
					$('#duplicate_btn').css('background-color','#114400');
					$('#duplicate_btn').text('체크완료');
				}
			}
		}
	});
}

function timeSelectInit(){
	for(var i = 0; i < 24; i++){
		$("select[name='display_from_h']").append('<option value="' + i.toString().padStart(2,'0') + '">' + i.toString().padStart(2,'0') + '시</option>');
		$("select[name='display_to_h']").append('<option value="' + i.toString().padStart(2,'0') + '">' + i.toString().padStart(2,'0') + '시</option>');
	}
	
	for(var j = 0; j < 60; j++){
		$("select[name='display_from_m']").append('<option value="' + j.toString().padStart(2,'0') + '">' + j.toString().padStart(2,'0') + '분</option>');
		$("select[name='display_to_m']").append('<option value="' + j.toString().padStart(2,'0') + '">' + j.toString().padStart(2,'0') + '분</option>');
	}
}

function postingLookbookRegist(){
	var country 		= $('select[name=country]');
	var page_title		= $('input[name=page_title]');

	seo_description.getById["seo_description"].exec("UPDATE_CONTENTS_FIELD", []); 
	seo_alt_text.getById["seo_alt_text"].exec("UPDATE_CONTENTS_FIELD", []); 

	if(country.val().length == 0){
		alert("국가를 선택해주세요", country.focus());
		return false;
	}
	
	if(page_title.val().length == 0){
		alert("페이지명을 입력해주세요", page_title.focus());
		return false;
	}
	
	var duplicate_check = $('#duplicate_check').val();
	
	if (duplicate_check == "false") {
		alert('상품 진열페이지 등록을 위해 페이지명 중복검사를 확인해주세요.');
		return;
	}
	
	var display_flg = $('#display_flg').val();
	if (display_flg == "false") {
		var display_start_date = $("input[name='display_from']").val() + ' ' + $("select[name='display_from_h']").val() + ':' + $("select[name='display_from_m']").val();
		var display_end_date = $("input[name='display_to']").val() + ' ' + $("select[name='display_to_h']").val() + ':' + $("select[name='display_to_m']").val();
		
		if (display_start_date != null && display_end_date != null) {
			var start_date = new Date(display_start_date);
			var end_date = new Date(display_end_date);
			
			if (start_date > end_date) {
				alert('진열 시작일/종료일에 올바른 날짜를 입력해주세요.');
				return false;
			}
		} else {
			alert('진열 시작일/종료일에 정확한 날짜를 입력해주세요.');
			return false;
		}
	}
	
	var formData = new FormData();
	formData = $("#frm-add").serializeObject();
	
	confirm('룩북 페이지를 등록하시겠습니까?',function() {
		$.ajax({
			type: "post",
			data: formData,
			dataType: "json",
			url: config.api + "display/posting/add",
			error: function() {
				alert("룩북 페이지 등록 처리에 실패했습니다.");
			},
			success: function(d) {
				if(d.code == 200) {
					alert('룩북 페이지 등록에 성공했습니다.', function pageLocation() {
						insertLog("전시관리 > 게시물 관리", "새 룩북 페이지 등록", 1);
						location.href='/display/posting';
					});
				}
			}
		});
	});
}
</script>