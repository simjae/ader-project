<style>
	.flex__wrap{
		display: flex;
		justify-content: space-between;
	}
	.filter-wrap{
		display: flex;
		gap: 10px;
	}
	.filter-btn{
		color: #11aba6;
		background-color: #fff;
		font-size: 20px;
		font-weight: 500;
		padding: 10px;
	}
	.checked{
		background-color: #11aba6;
		color: #fff;
	}
	.wrap__bg--wh {
		background-color: #fff;
		padding: 10px;
		margin: 10px 0;
	}
	.defult__btn{
		color: black;
		background-color: #fff;
		border-radius: 5px;
		text-align: center;
		padding:  5px;
		border: 1px solid #484848;
	}
	.black__btn{
		color: #fff;
		background-color: black;
	}

	.btn__flex__box{
		display: flex;
		gap: 10px;
	}
	.xi-close-min{
		color: red;
		margin-right: 5px;
	}
	.essential{
		background-color: red;
		color: #fff;
	}
	.detail__btn{
		font-size: 20px;
		margin-bottom: 5px;
		border-bottom: 1px solid black;
		font-weight: 500;
	}
	.size__guide{
		width: 200px;
		height: 200px;
		border: 1px solid #4f4f4f;
	}
	.file__wrap{
		display: grid;
		grid-template-columns: 3fr 7fr;
		padding: 20px;
	}
	
	.file__content__wrap{
		padding: 0 20px;
	}
	.exel__zone{
		width: 100%;
		height: 200px;
		border: 1px solid #bfbfbf;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}
	.img__zone{
		width: 100%;
		height: 100px;
		border: 1px dashed #b1b1b1;
		margin-bottom: 20px;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.exel__upload__btn{
		background-color: #BFBFC0;
		color: #fff;
		font-size: 12px;
		width: 140px;
		text-align: center;
		line-height: 2;
		height: 22px;
		font-weight: 500;
		box-shadow: 1px 1px 4px #2d222238;
		border-radius: 2px;
	}
	#exel-dropzone{
		margin: 60px 0 20px 0;
		height: 150px;
		width: 150px;
		display: flex;
		justify-content: center;
		align-items: center;
		background-color: #fff;
		border-radius: 50%;
		box-shadow: 2px 2px 6px #2d222238;
	}
	.content__exel__btn{
		border: 1px solid #E2E5E9;
		font-size: 12px;
		border-radius: 30px;
		color: #605F60;
		padding: 10px 15px;
		font-weight: 500;
	}
	.file__content__line{
		display: flex;
		flex-basis: 100%;
		align-items: center;
		margin: 10px 0;
	}
	.file__content__line::after {
		content: "";
		flex-grow: 1;
		background: #c2c2c2;
		height: 1px;
		font-size: 0px;
		line-height: 0px;
		margin: 0 10px;
	}
	.file__content__uploading{
		min-height: 100px;
		display: flex;
		flex-direction:column;
		justify-content: center;
		align-items: center;
	}
	.file__content__uploaded{
		min-height: 100px;
		display: flex;
		align-items: center;
		border-bottom: 1px solid #F0F0F0;
		justify-content: space-between;
	}
	.content__result__list{
		display: flex;
		gap: 20px;
		padding: 20px;
	}
	.exel__btn__wrap{
		display: flex;
		gap: 10px;
		justify-content: end;
		padding-top: 20px;
		align-items: center;
	}
	.exel__btn{
		cursor: pointer;
		display: flex;
		font-size: 13px;
		align-items: center;
		justify-content: center;
		width: 140px;
		height: 22px;
		border-radius: 2px;
		padding: 10px;
		border: solid 1px #707070;
	}
	.exel__btn.blue{
		background-color: #140f82;
    	color: #fff;
	}
	.bold__font{
		font-family: NanumSquareRound;
		font-size: 14px;font-weight: bold;color: #000;
	}
</style>

<?php include_once("check.php"); ?>

<div class="filter-wrap" style="margin-bottom:20px">
	<button class="excel_tab_btn tap__button" tab_num="01" style="background-color: #000;color: #fff;font-weight: 500;" onClick="excelTabBtnClick(this);">엑셀-배송박스 등록</button>
	<button class="excel_tab_btn tap__button" tab_num="02" onClick="excelTabBtnClick(this);">엑셀-부자재 등록</button>
</div>


<input id="tab_num" type="hidden" value="01">
<div id="excel_tab_01" class=" excel_tab">
	<?php include_once("pcs-ordersheet-sub_material-excel-box.php"); ?>
</div>
<div id="excel_tab_02" class=" excel_tab" style="display:none;">
	<?php include_once("pcs-ordersheet-sub_material-excel-material.php"); ?>
</div>

<script>
var wait_sheet 	= [];

$(document).ready(function() {
});
function excelTabBtnClick(obj) {
	var tabTitle = $(obj).text();
	$('#tabTitle').text(tabTitle);
	
	var tab_num = $(obj).attr('tab_num');
	$('#tab_num').val(tab_num);
	$('.excel_tab').hide();
	$('#excel_tab_' + tab_num).show();
	
	$(obj).css('background-color','#000000');
	$(obj).css('color','#ffffff');
	
	$('.excel_tab_btn').not($(obj)).css('background-color','#ffffff');
	$('.excel_tab_btn').not($(obj)).css('color','#000000');
	resetExcelList();
}

$('.exel__zone').on('dragenter', function(e){
    e.preventDefault();
    e.stopPropagation();
})
.on("dragover", function(e){
    e.preventDefault();
    e.stopPropagation();
    $(this).css("background-color","#FFD8D8");
})
.on("dragleave",function(e){
    e.preventDefault();
    e.stopPropagation();
    $(this).css("background-color","#F1F6FF");
})
.on("drop", function(e){
    e.preventDefault();
    $('.exel__zone').css("background-color","#F1F6FF");
    var files = e.originalEvent.dataTransfer.files;
	setSheetList(nomalizeNFC(files));
})
$('.upload_btn').on('change', function(e){
    var files = e.target.files;
	console.log(files);
	setSheetList(nomalizeNFC(files));
	event.target.value = '';
})
$('.exel__zone').on('click', function(e){
	var tab_num = $('#tab_num').val();
    $("input[name='upload_btn_"+tab_num+"']").click();
})
$('.exel__execute__btn').on('click', function(e){
	confirm("상품등록작업을 시작하시겠습니까?<br>이름이 동일한 파일명은 최신 파일로 덮어씌워집니다.", `excelActionBtn()`);
})

//맥에서 파일 업로드 할 경우, 자모음 분리현상이 나타난다. 
//이를 해결하기 위한 함수
function nomalizeNFC(files){
	for(var i= 0; i < files.length; i++){
		files[i].name = files[i].name.normalize('NFC');
	}
	return files;
}
//파일 업로드
function setSheetList(obj){
	let tab_num = $('#tab_num').val();
	let overlap_flg = false;
	for(let i = 0; i < obj.length; i++){
		let file = obj[i];

		let wait_list = $('#wait_list_table_' +  + tab_num);
		let overlap_obj = wait_list.find('tr').find('td:eq(0):contains(' + file.name + ')');
		let overlap_idx = overlap_obj.parents('tr').index();

		if(overlap_obj.length > 0){
			wait_sheet[overlap_idx] = file;
		}
		else{
			wait_sheet.push(file);
		}
	}
	printWaitSheetList();
}

function printWaitSheetList(){
	var tab_num = $('#tab_num').val();

	$('#wait_list_table_'+tab_num).html('');
	
	if(wait_sheet.length > 0){
		wait_sheet.forEach(function(element){
			var last_date = new Date(element.lastModifiedDate);
			var date_format = last_date.toISOString().substring(0,19);
			date_format = date_format.replace('T', ' ');
			$('#wait_list_table_'+tab_num).append(`
				<TR>
					<TD style="width: 70%;">${element.name}</TD>
					<TD>최종수정시간:${date_format}</TD>
				</TR>
			`);
		});
	}
	else{
		$('#list_table_'+tab_num).append(`<p>업로드 된 파일이 없습니다.</p>`);
	}
}
//엑셀등록/수정 작업
function excelActionBtn(){
	let num = $('#tab_num').val();

	$('#wait_list_table_'+num).html('');

	if(wait_sheet.length > 0){
		wait_sheet.forEach(function(element){
			readExcel(element);
		});
		wait_sheet = [];
	}
	else{
		alert("업로드한 파일이 없습니다.");
	}
}
function readExcel(element){
	let num = $('#tab_num').val();
	var file_name = element.name;
	var msg = null;
    var reader = new FileReader();
	var total_row = {};
	
    reader.onload = function () {
        let data = reader.result;
        let workBook = XLSX.read(data, { type: 'binary'});
        workBook.SheetNames.forEach(function (sheetName) {
            if(sheetName == '박스 정보'){
                var box_sheet = XLSX.utils.sheet_to_json(workBook.Sheets[sheetName], {range : 1, header:1});
                total_row.box_sheet = box_sheet;
            }
			if(sheetName == '포장부자재 정보'){
                var td_sub_material_sheet = XLSX.utils.sheet_to_json(workBook.Sheets[sheetName], {range : 1, header:1});
                total_row.td_sub_material_sheet = td_sub_material_sheet;
            }
			if(sheetName == '배송부자재 정보'){
                var delivery_sub_material_sheet = XLSX.utils.sheet_to_json(workBook.Sheets[sheetName], {range : 1, header:1});
                total_row.delivery_sub_material_sheet = delivery_sub_material_sheet;
            }
        })
		//console.log(total_row.ordersheet_regist_sheet);
		if(num == '01'){
			if(!total_row.hasOwnProperty('box_sheet')){
				printFailSheetList(file_name, '박스정보 시트가 존재하지 않습니다.');
				return false;
			}
			else{
				json_str = JSON.stringify(total_row);
				putExcel(json_str,file_name);
			}
		}
		else if(num == '02'){
			if(!total_row.hasOwnProperty('td_sub_material_sheet') || !total_row.hasOwnProperty('delivery_sub_material_sheet')){
				printFailSheetList(file_name, '부자재정보 시트가 존재하지 않습니다.');
				return false;
			}
			else{
				json_str = JSON.stringify(total_row);
				putExcel(json_str,file_name);
			}
		}
    };
	reader.readAsBinaryString(element);
}

function putExcel(json_str,file_name){
	let num = $('#tab_num').val();
	var api_addr = '';
	var action_str = '';
	var msg = '';

	if(json_str == null){
		printFailSheetList(file_name, '시트정보가 존재하지 않습니다.');
		return false;
	}
	else{
		switch(num){
			case '01':
				api_addr = 'box/add';
				action_str = '배송박스 등록';
				break;
			case '02':
				api_addr = 'sub_material/add';
				action_str = '부자재 등록';
				break;
		}
		if(api_addr != ''){
			var result_json = {};
			$.ajax({
				type: "post",
				data: {
					'sheet_data':json_str
				},
				dataType: "json",
				url: config.api + "pcs/ordersheet/excel/"+api_addr,
				error: function() {
					msg = 'api 접근에러';
				},
				success: function(d) {
					insertLog('상품관리 > 엑셀 등록', action_str + ": " + file_name, 1);
					if(d.code == 200) {
						let result_cnt = 0;
						result_json = d.result;
						let json_str = JSON.stringify(result_json);

						let result_str = null;
						if(d.data != null){
							result_str = `생산부자재 ${d.data.td_success}건, 포장부자재 ${d.data.delivery_success}건 등록`;
							d.data.td_success_cnt
							d.data.delivery_success_cnt
						}
						alert('등록이 완료되었습니다.');
						printFinishSheetList(file_name, json_str, result_str);
					}
					else{
						printFailSheetList(file_name, d.msg);
						return false;
					}
				}
			})
		}
	}
}

function printFinishSheetList(file_name, json_str, result_str){
	var tab_num = $('#tab_num').val();
	var date = new Date();
	var regist_date = date.toISOString().substring(0,19);
	
	regist_date = regist_date.replace('T', ' ');

	let result_td = '';
	if(result_str != null){
		result_td = `<td>${result_str}</td>`;
	}
	$('#finish_list_table_'+tab_num).append(`
		<TR onclick="openExcelResultModal(this)" style="cursor:pointer;">
		<input type="hidden" value='${json_str}'>
			<TD style="width: 70%;">${file_name}</TD>
			<TD>업로드 시간: ${regist_date}</TD>
			${result_td}
		</TR>
	`);
}
function printFailSheetList(file_name, err_msg){
	var tab_num = $('#tab_num').val();
	$('#fail_list_table_'+tab_num).append(`
		<TR>
			<TD style="width: 70%;">${file_name}</TD>
			<TD>실패원인: ${err_msg}</TD>
		</TR>
	`);
}
function openExcelResultModal(obj){
	var tab_num = $('#tab_num').val();
	var json_str = $(obj).find('input:eq(0)').val();

	modal('result', `json_str=${json_str}`);
}
function resetExcelList(){
	var tab_num = $('#tab_num').val();
	wait_sheet 	= [];
	$('#wait_list_table_'+tab_num).html('');
	$('#finish_list_table_'+tab_num).html('');
	$('#fail_list_table_'+tab_num).html('');
}
</script>