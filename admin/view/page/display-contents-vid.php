<div class="content__card">
	<form id="frm-filter_02" action="display/contents/get">
		<input type="hidden" name="contents_type" value="VID">
		
		<input type="hidden" class="sort_type" name="sort_type" value="DESC">
		<input type="hidden" class="sort_value" name="sort_value" value="CREATE_DATE">
		<input type="hidden" class="rows" name="rows" value="10">
		<input type="hidden" class="page" name="page" value="1">

		<div class="card__header">
			<div class="flex justify-between">
				<h3>동영상 검색</h3>
				<div class="black-btn" onclick="openContentsVidAddModal();">동영상 등록</div>
			</div>
			<div class="drive--x"></div>
		</div>
		
		<div class="card__body">
			<div class="content__wrap">
				<div class="content__title">동영상 타이틀</div>
				<div class="content__row">
					<input id="vid_title" type="text" name="title" value="">
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">동영상 타입</div>
				<div class="content__row">
					<div class="rd__block">
						<input id="vid_type" type="text" name="type" value="">
					</div>
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">동영상 메모</div>
				<div class="content__row">
					<div class="rd__block">
						<input id="vid_memo" type="text" name="memo" value="">
					</div>
				</div>
			</div>
		</div>
		
		<div class="card__footer">
			<div class="footer__btn__wrap" style="grid: none;">
				<div class="btn__wrap--lg">
					<div class="blue__color__btn" onclick="getContentsVid();"><span>검색</span></div>
					<div class="defult__color__btn" onclick="init_fileter('frm-list','getContentsVid')"><span>초기화</span></div>
				</div>
			</div>
		</div>
	</form>
</div>

<div class="content__card">
	<form id="frm-list">
		<input type="hidden" class="action_type" name="action_type">
		<input type="hidden" class="action_name" name="action_name">
		
		<div class="card__header">
			<h3>동영상 검색 결과</h3>
			<div class="drive--x"></div>
		</div>
		<div class="card__body">
			<div class="info__wrap " style="justify-content:space-between; align-items: center;">
				<div class="body__info--count">
					<div class="drive--left"></div>
					총 동영상 수 <font class="cnt_02_total info__count" >0</font>개 / 검색결과 <font class="cnt_02_result info__count" >0</font>개
				</div>
					
				<div class="content__row">
					<select style="width:163px;float:right;margin-right:10px;" onChange="orderChange(this);">
						<option value="CREATE_DATE|DESC">등록일 역순</option>
						<option value="CREATE_DATE|ASC">등록일 순</option>
						<option value="UPDATE_DATE|DESC">갱신일 역순</option>
						<option value="UPDATE_DATE|ASC">갱신일 순</option>
						<option value="VID_TITLE|DESC">동영상 타이틀 역순</option>
						<option value="VID_TITLE|ASC">동영상 타이틀 순</option>
						<option value="VID_TYPE|DESC">동영상 타입 역순</option>
						<option value="VID_TYPE|ASC">동영상 타입 순</option>
					</select>
					<select name="rows" style="width:163px;margin-right:10px;float:right;" onChange="rowsChange(this);">
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
						<div style="width: 140px;" class="filter__btn" action_type="prod_delete" onclick="prodActionCheck(this);">삭제</div>
					</div>                                
				</div>
				<TABLE id="excel_table">
					<THEAD>
						<TR>
							<TH style="width:3%;">
								<div class="cb__color">
									<label>
										<input type="checkbox" onClick="selectAllClick(this);">
										<span></span>
									</label>
								</div>
							</TH>
							<TH style="width:5%;">No.</TH>
							<TH style="width:15%;">동영상 타이틀</TH>
							<TH style="width:8%;">동영상 타입</TH>
							<TH>동영상</TH>
							<TH style="width:8%;">동영상 등록일</TH>
							<TH style="width:8%;">작성자</TH>
							<TH style="width:8%;">동영상 갱신일</TH>
							<TH style="width:8%;">갱신자</TH>
						</TR>
					</THEAD>
					<TBODY id="result_table_02">
					</TBODY>
				</TABLE>
			</div>
			<div class="padding__wrap">
				<input type="hidden" tab_num="02" class="total_02_cnt" value="0" onChange="setPaging(this);">
				<input type="hidden" tab_num="02" class="result_02_cnt" value="0" onChange="setPaging(this);">
            	<div class="paging_02"></div>
        	</div>
		</div>
	</form>
</div>

<script>
$(document).ready(function() {
	getContentsVid();
});

function openContentsVidAddModal() {
	modal('vid/add');
}

function getContentsVid() {
	$("#result_table_02").html('');
	
	var strDiv = '';
	strDiv += '<TD class="default_td" colspan="10">';
	strDiv += '    조회 결과가 없습니다';
	strDiv += '</TD>';
	
	$("#result_table_02").append(strDiv);
	
	var rows = $("#frm-filter_02").find('.rows').val();
	var page = $("#frm-filter_02").find('.page').val();
	get_contents($("#frm-filter_02"),{
		pageObj : $(".paging_02"),
		html : function(d) {
			if (d.length > 0) {
				$("#result_table_02").html('');
			}
			
			d.forEach(function(row) {
				var strDiv = "";
				strDiv += '<tr>';
				strDiv += '    <td>';
				strDiv += '        <div class="cb__color">';
				strDiv += '            <label>';
				strDiv += '                <input type="checkbox" class="select" name="no[]" value="' + row.no + '">';
				strDiv += '                <span></span>';
				strDiv += '            </label>';
				strDiv += '        </div>';
				strDiv += '    </td>';
				strDiv += '    <td>' + row.num + '</td>';
				strDiv += '    <td>' + row.title + '</td>';
				strDiv += '    <td>' + row.type + '</td>';
				strDiv += '    <td>' + row.location + '</td>';
				strDiv += '    <td>' + row.create_date + '</td>';
				strDiv += '    <td>' + row.creater + '</td>';
				strDiv += '    <td>' + row.update_date + '</td>';
				strDiv += '    <td>' + row.updater + '</td>';
				strDiv += '</tr>';
				
				$("#result_table_02").append(strDiv);
			});
		},
	},rows, page);
}
</script>