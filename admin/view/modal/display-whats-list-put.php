<style>
#seo{
	margin-top : 50px;
}
.sub{
	margin-top : 10px;
}
.preview_img{
	background-size: cover;
	width: 100%;
	background-repeat: no-repeat;
	padding: 20px;
	height: 100%;
}
</style>
<div class="content__card" style="width:950px;margin: 0;">
	<form id="frm-update" action="display/whats/put">
		<input id="page_idx" type="hidden" name="page_idx" value="<?=$idx?>">
		<div class="card__header">
			<div class="flex justify-between">
				<h3>What's New 페이지 수정</h3>
				<a href="javascript:;" onclick="modal_close();" class="btn-close"><i class="xi-close"></i></a>
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
					<input id="duplicate_check" type="hidden" value="true">
					<input id="page_title" type="text" value="" style="width:80%;" placeholder="" name="page_title">
					<div id="duplicate_btn" class="defult-btn" style="width:95px;background-color:#114400;color:#ffffff;font-size:0.5rem;text-align:center;" onclick="duplicateCheck()">체크완료</div>
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">서브 페이지명</div>
				<div class="content__row">
					<input type="text" value="" style="width:80%;" placeholder="" name="page_sub_title">
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">설명</div>
				<div class="content__row">
					<input type="text" value="" style="width:80%;" placeholder=""  name="page_memo">
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">URL</div>
				<div class="content__row">
					<input readonly type="text" value="" style="width:80%;" placeholder=""  name="page_url">
				</div>
			</div>
			<div class="content__wrap">
				<div class="content__title">썸네일</div>
				<div class="content__row">
				<div class="edit__img">
					<div class="form-group" style="padding:0px;">
						<div class="preview">
							<div class='preview_img'></div>
						</div>
						<span class="btn btn-large blue" style="margin-top:10px;">
							<i class="xi-image"></i>What's New 썸네일 이미지 선택
							<input class="whats_new_img" id="img_thumbnail" type="file" name="img_thumbnail" class="input-image">
						</span><br>
					</div>
					</div>
				</div>
			</div>

			<div class="content__wrap">
				<div class="content__title" style="vertical-align:top!important;">페이지 컨텐츠</div>
				<div class="content__row">
					<textarea class="width-100p" id="page_content" name="page_content" required style="width:650%; min-height:150px;"></textarea>
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">진열 예약 설정</div>
				<div class="content__row">
					<div class="rd__block">
						<input id="display_flg" type="hidden" value="false">
						
						<input type="radio" id="display_flg_always" class="radio__input display_flg" radio_type="display" value="true" name="display_flg">
						<label for="display_flg_always">상시 오픈</label>
						
						<input type="radio" id="display_flg_date" class="radio__input display_flg" radio_type="display" value="false" name="display_flg">
						<label for="display_flg_date" style="gap:5px;">지정 시간에만 </label>
						
						<div class="content__date__picker">
							<input id="display_from" class="display_date" type="date" name="display_from" placeholder="From" readonly="" style="width:150px" onChange="">
							<select class="display_date" type="select" name="display_from_h" style="width:80px">
								<option value="" selected>시간</option>
							</select>
							<select class="display_date" type="select" name="display_from_m" style="width:80px">
								<option value="" selected>분</option>
							</select>
							
							<br><font class="" >~</font><br>
							
							<input id="display_to" class="display_date" type="date" name="display_to" placeholder="To" readonly="" style="width:150px; " onChange="">
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
						<input type="radio" id="searchExposure1" class="radio__input" radio_type="seo" value="true" name="seo_exposure_flg">
						<label for="searchExposure1">노출함</label>
						<input type="radio" id="searchExposure2" class="radio__input" radio_type="seo" value="false" name="seo_exposure_flg">
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
					<textarea name="seo_description" id="" cols="70" rows="10" style="border: 1px solid #000;"></textarea>
				</div>
			</div>
			<div class="content__wrap">
				<div class="content__title">검색엔진<br>메타태그Keywords</div>
				<div class="content__row">
					<textarea name="seo_keywords" id="" cols="70" rows="10" style="border: 1px solid #000;"></textarea>
				</div>
			</div>
		</div>
		<div class="card__footer">
			<div class="footer__btn__wrap" style="grid: none;">
				<div class="btn__wrap--lg">
					<div  onclick="whatsNewUpdateCheck();"  class="blue__color__btn"><span>저장</span></div>
					<div onclick="modal_cancel();" class="defult__color__btn"><span>작성 취소</span></div>
				</div>
			</div>
		</div>
	</form>
</div>
<script>
var page_content = [];
var infoHtml = "Company ADER | Business Name FIVE SPACE CO.,LTD | Business License 760-87-01757 |MAIL-ORDER LICENSE NO. 2021-서울성동-01588 | CEO HANN| office ADER 3F 53, Yeonmujang-gil, Seongdong-gu, Seoul, KoreaC/S office ADER 3F 53, Yeonmujang-gil, Seongdong-gu, Seoul, Korea TEL. 02-792-2232 | Office hour Mon - Fri AM 10:00 - PM 5:00 ©2021 ADER All Rights Reserved";

$(document).ready(function() {
	var page_idx = $('#page_idx').val();
	
	timeSelectInit();

	nhn.husky.EZCreator.createInIFrame({
		oAppRef: page_content,
		elPlaceHolder: "page_content",
		sSkinURI: "/scripts/smarteditor2/SmartEditor2Skin.html",
		htParams: { fOnBeforeUnload : function(){}}
	});
	
	$('.display_flg').click(function() {
		var display_flg = $(this).val();
		$('#display_flg').val(display_flg);
	});
	
	$('#page_title').change(function() {
		$('#duplicate_check').val(false);
		$('#duplicate_btn').css('background-color','#E43A45');
		$('#duplicate_btn').text('중복체크');
	});
	
	$.ajax({
		type: "post",
		data: {
			'page_idx' : page_idx
		},
		dataType: "json",
		url: config.api + "display/whats/get",
		error: function() {
			alert("WHAT'S NEW 등록정보 불러오기 처리에 실패했습니다.");
		},
		success: function(data) {
			if(data.code == 200) {
				var img_location = data['data'][0].img_location.replace('/var/www/admin/www','');
				$("#frm-update").find(".preview_img").css("background-image","url('" + img_location + "')");
				
				$("select[name='country']").val(data['data'][0].country).prop('selected',true);
				
				$("input[name='page_title']").val(data['data'][0].page_title);
				$("input[name='page_sub_title']").val(data['data'][0].page_sub_title);
				$("input[name='page_memo']").val(data['data'][0].page_memo);
				$("input[name='page_url']").val(data['data'][0].page_url);
				$("input[name='thumbnail_url']").val(data['data'][0].thumbnail_url);
				
				$('#page_content').html(data['data'][0].page_content);
				
				var display_start_date = data['data'][0].display_start_date;
				var display_end_date = data['data'][0].display_end_date;
				
				if (display_end_date == '9999-12-31') {
					$('#display_flg_always').prop('checked',true);
					$('.display_date').attr("disabled", true);
				} else {
					$('#display_flg_date').prop('checked',true);
					$('.display_date').removeAttr("disabled");
					
					$('#display_from').val(display_start_date);
					$('#display_to').val(display_end_date);
					
					$("select[name='display_from_h']").val(data['data'][0].display_start_h).prop('selected',true);
					$("select[name='display_from_m']").val(data['data'][0].display_start_m).prop('selected',true);

					$("select[name='display_to_h']").val(data['data'][0].display_end_h).prop('selected',true);
					$("select[name='display_to_m']").val(data['data'][0].display_end_m).prop('selected',true);
				}
				
				var seo_exposure_flg = data['data'][0].seo_exposure_flg;
				if (seo_exposure_flg == true) {
					$("input[name='seo_exposure_flg'][value='true']").prop('checked',true);
				} else {
					$("input[name='seo_exposure_flg'][value='false']").prop('checked',true);
				}
				
				$("input[name='seo_title']").val(data['data'][0].seo_title);
				$("input[name='seo_author']").val(data['data'][0].seo_author);
				$("textarea[name='seo_description']").text(data['data'][0].seo_description);
				$("textarea[name='seo_keywords']").text(data['data'][0].seo_keywords);
			}
		}
	});
});	
$('.whats_new_img').on('change', function() {
	ext = $(this).val().split('.').pop().toLowerCase(); //확장자
	
	//배열에 추출한 확장자가 존재하는지 체크
	if($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
		resetFormElement($(this)); //폼 초기화
		window.alert('이미지 파일만 등록 가능합니다. (gif, png, jpg, jpeg 만 업로드 가능)');
	} else {
		var file = $(this).prop("files")[0];
		
		//var img_id = $(this).attr('id');
		
		blobURL = window.URL.createObjectURL(file);
		//$('#' + img_id + '_area').hide();
		//$('.' + img_id).show();
		$("#frm-update").find(".preview_img").css("background-image","url('" + blobURL + "')");
		//$('.' + img_id).attr('src', blobURL);
		//$('.' + img_id).slideDown(); //업로드한 이미지 미리보기 
		//$(this).slideUp(); //파일 양식 감춤
	}
});
$('.radio__input').change(function(){
	var radio_type = $(this).attr('radio_type');
	
	if (radio_type == "display") {
		var val = $(this).val();
		if (val == "true") {
			$('.display_date').val('');
			$('.display_date').attr("disabled", true);
		} else {
			$('.display_date').removeAttr("disabled");
		}
	}
});

function duplicateCheck(){
	var country = $('#country').val();
	var page_title = $('#page_title').val();
	
	var page_table = "whats";
	
	if (country.length == 0 || country == null) {
		alert('국가를 입력해주세요.');
		return false;
	}
	
	if (page_title.length == 0 || page_title == null){
		alert('페이지명을 입력해주세요.');
		return false;
		
	}
	
	$.ajax({
		type: "post",
		data: {
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

function whatsNewUpdateCheck(){
	var country 			= $('#country');
	var page_title 			= $('input[name=page_title]');
	var page_sub_title 		= $('input[name=page_sub_title]');
	var page_url 			= $('input[name=page_url]');
	var thumbnail_url 		= $('input[name=thumbnail_url]');

	page_content.getById["page_content"].exec("UPDATE_CONTENTS_FIELD", []);

	if(country.val().length == 0){
		alert("국가를 선택해주세요", country.focus());
		return false;
	}
	
	if(page_title.val().length == 0){
		alert("페이지명을 입력해주세요", page_title.focus());
		return false;
	}
	
	if(page_sub_title.val().length == 0){
		alert("서브 페이지명을 입력해주세요",page_sub_title.focus());
		return false;
	}

	var duplicate_check = $('#duplicate_check').val();
	
	if (duplicate_check == "false") {
		alert("WHAT'S NEW 등록을 위해 페이지명 중복검사를 확인해주세요.");
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
	
	modal_submit($('#frm-list'),'getWhatsInfo');
}
</script>