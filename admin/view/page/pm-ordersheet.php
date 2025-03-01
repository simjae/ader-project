<style>
	.checked{background-color:#707070!important;color:#ffffff!important;}
	.unchecked{background-color:#ffffff!important;color:#000000!important;}
	.btn__gray{
		height: 20px;
		color: #fff;
		padding: 3.5px 20px;
		border-radius: 2px;
		background-color: #bfbfbf;
		cursor:pointer;
	}
    .size_info_text {height:150px;}
    .smart_editer_text {height:180px;}
</style>

<div class="content__card">
    <div class="card__header">
        <div class="flex justify-between">
            <h3>오더시트 개별 조회</h3>
        </div>
        <div class="drive--x"></div>
    </div>
    <div class="card__body">
        <div id="regist_td_tab" class="row regist_tab" style="margin-top:0px;">
            <form id="frm-regist" action="" enctype="multipart/form-data">
                <div class="table table__wrap">
                    <button type="button" toggle_table="ordersheet"
                        style="background-color: #fafafa; width:100%;border:1px solid #000000;height:30px;cursor:pointer;"
                        onClick="toggleTableClick(this);">오더시트 - 기획MD</button>
                    <div class="overflow-x-auto" id="insert_table_ordersheet">
						<TABLE>
							<colgroup>
								<col width="10%">
								<col width="22%">
								<col width="10%">
								<col width="22%">
								<col width="10%">
								<col width="22%">
							</colgroup>
							<TBODY>
								<TR>
									<TD>스타일코드</TD>
									<TD id="style_code"></TD>
									<TD>컬러코드</TD>
									<TD id="color_code"></TD>
									<TD>상품코드</TD>
									<TD id="product_code"></TD>
								</TR>
							</TBODY>
						</TABLE>
						<TABLE>
							<colgroup>
								<col width="10%">
								<col width="15%">
								<col width="10%">
								<col width="15%">
								<col width="10%">
								<col width="15%">
								<col width="10%">
								<col width="15%">
							</colgroup>
							<TBODY>
                                <TR>
									<TD>프리오더 사용여부</TD>
									<TD colspan="3" id="preorder_flg">
									<TD>교환 환불 가능유무</TD>
									<TD colspan="3" id="refund_flg">
								</TR>
								<tr>
                                	<TD>라인 유형</TD>
                                    <TD colspan="7"  id="line_info_table">
                                </tr>
								<tr>
                                    <TD>MD 카테고리</TD>
									<TD colspan="7">
                                        <table style="width:40%">
											<tbody>
												<tr>
													<td style="width:25%" id="category_lrg_title"></td>
													<td style="width:25%" id="category_mdl_title"></td>
													<td style="width:25%" id="category_sml_title"></td>
													<td style="width:25%" id="category_dtl_title"></td>
												</tr>
											</tbody>
										</table>
									</TD>
								</TR>
								<TR>
									<TD>소재</TD>
									<TD colspan="3" id="material"></TD>
									<TD>상품 그래픽</TD>
									<TD colspan="3" id="graphic"></TD>
								</TR>
								<TR>
									<TD>상품 핏</TD>
									<TD colspan="3" id="fit"></TD>
									<TD>상품 이름</TD>
									<TD colspan="3" id="product_name"></TD>
								</TR>
								<TR>
									<TD>상품 사이즈</TD>
									<TD id="product_size"></TD>
									<TD>상품 색상</TD>
									<TD id="color"></TD>
									<TD>RGB 코드</TD>
									<TD id="color_rgb"></TD>
									<TD>팬톤 코드</TD>
									<TD id="pantone_code"></TD>
								</TR>
								<TR>
									<TD>MD 카테고리 가이드</TD>
									<TD colspan="3" id="md_category_guide"></TD>
									<TD>구매 수량 제한</TD>
									<TD id="limit_qty"></TD>
									<TD>구매 멤버 제한</TD>
									<TD id="limit_member"></TD>
								</TR>
							</TBODY>
						</TABLE>
						<div style="margin-top:5px;">
							<div id="currency_table" class="row form-group" style="margin-top:5px;display:none;"></div>
							<div class="overflow-x-auto">
								<TABLE>
									<colgroup>
										<col width="20%">
										<col width="20%">
										<col width="20%">
										<col width="20%">
										<col width="20%">
									</colgroup>
									<TBODY>
										<TR>
											<TD>기획원가</TD>
											<TD>한국몰 판매가격 (원)</TD>
											<TD>영문몰 변환가격 (원)</TD>
											<TD>영문몰 판매가격 (달러)</TD>
											<TD>중문몰 판매가격 (달러)</TD>
										</TR>
										<TR>
											<TD id="price_cost"></TD>
											<TD id="price_kr"></TD>
											<TD id="price_kr_gb"></TD>
											<TD id="price_en"></TD>
											<TD id="price_cn"></TD>
										</TR>
									</TBODY>
								</TABLE>
							</div>
						</div>
						<TABLE>
							<colgroup>
								<col width="10%">
								<col width="40%">
								<col width="10%">
								<col width="40%">
							</colgroup>
							<TBODY>
								<tr>
									<TD>기획재고 수량</TD>
									<TD id="product_qty"></TD>
									<TD>안전재고 수량</TD>
									<TD id="safe_qty"></TD>
								</tr>
							</TBODY>
						</TABLE>
						<TABLE>
							<colgroup>
								<col width="10%">
								<col width="22%">
								<col width="10%">
								<col width="22%">
								<col width="10%">
								<col width="22%">
							</colgroup>
							<TBODY>
								<tr>
									<TD>런칭일</TD>
									<TD id="launching_date"></TD>
									<TD>입고 요청일</TD>
									<TD id="receive_request_date"></TD>
									<TD>최초 TP작성 완료일</TD>
									<TD id="tp_completion_date"></TD>
								</tr>
							</TBODY>
						</TABLE>
                    </div>
                </div>

                <div class="table table__wrap">
                    <button type="button" toggle_table="dsn"
                        style="background-color: #fafafa; width:100%;border:1px solid #000000;height:30px;cursor:pointer;"
                        onClick="toggleTableClick(this);">오더시트 - 디자인</button>
                    <div class="overflow-x-auto" id="insert_table_dsn">
                        <TABLE class="size_info_table">
                            <colgroup>
                                <col width="3%">
                                <col width="11%">
                                <col width="3%">
                                <col width="11%">
                                <col width="3%">
                                <col width="11%">

                                <col width="3%">
                                <col width="11%">
                                <col width="3%">
                                <col width="11%">
                                <col width="3%">
                                <col width="11%">
                            </colgroup>
                            <TBODY>
								<tr>
                                    <TD>W/K/L/A</TD>
									<TD colspan="11"  id="wkla_info_table">
                                </tr>
                                <TR>
                                    <TD colspan="2">모델</TD>
                                    <TD colspan="4" id="model"></TD>
                                    <TD colspan="2">모델착용 사이즈</TD>
                                    <TD colspan="4" id="model_wear"></TD>
                                </TR>
                                <TR>
                                    <TD >A1한글</TD>
                                    <TD class="size_info_text" id="size_a1_kr"></TD>

                                    <TD>A2한글</TD>
                                    <TD class="size_info_text" id="size_a2_kr"></TD>

                                    <TD>A3한글</TD>
                                    <TD class="size_info_text" id="size_a3_kr"></TD>

                                    <TD>A4한글</TD>
                                    <TD class="size_info_text" id="size_a4_kr"></TD>

                                    <TD>A5한글</TD>
                                    <TD class="size_info_text" id="size_a5_kr"></TD>

                                    <TD>ONESIZE한글</TD>
                                    <TD class="size_info_text" id="size_onesize_kr"></TD>
                                </TR>

                                <TR>
                                    <TD>A1영문</TD>
                                    <TD class="size_info_text" id="size_a1_en"></TD>

                                    <TD>A2영문</TD>
                                    <TD class="size_info_text" id="size_a2_en"></TD>

                                    <TD>A3영문</TD>
                                    <TD class="size_info_text" id="size_a3_en"></TD>

                                    <TD>A4영문</TD>
                                    <TD class="size_info_text" id="size_a4_en"></TD>

                                    <TD>A5영문</TD>
                                    <TD class="size_info_text" id="size_a5_en"></TD>

                                    <TD>ONESIZE영문</TD>
                                    <TD class="size_info_text" id="size_onesize_en"></TD>
                                </TR>

                                <TR>
                                    <TD>A1중문</TD>
                                    <TD class="size_info_text" id="size_a1_cn"></TD>

                                    <TD>A2중문</TD>
                                    <TD class="size_info_text" id="size_a2_cn"></TD>

                                    <TD>A3중문</TD>
                                    <TD class="size_info_text" id="size_a3_cn"></TD>

                                    <TD>A4중문</TD>
                                    <TD class="size_info_text" id="size_a4_cn"></TD>

                                    <TD>A5중문</TD>
                                    <TD class="size_info_text" id="size_a5_cn"></TD>

                                    <TD>ONESIZE중문</TD>
                                    <TD class="size_info_text" id="size_onesize_cn"></TD>
                                </TR>
                                <TR>
                                    <TD colspan="2">
                                        사이즈 카테고리
                                    </TD>
                                    <TD colspan="10" id="size_category">dress</TD>
                                </TR>
                            </TBODY>
                        </TABLE>
                        <div id="option_insert_div" style="margin-top:5px"></div>

                        <table style="margin-top:5px">
                            <thead id="product_size_table_head">
                            </thead>
                            <tbody id="product_size_regist_table">
                            </tbody>
                        </table>

                        <TABLE style="margin-top:5px">
                            <colgroup>
                                <col width="10%">
                                <col width="90%">
                            </colgroup>
                            <TBODY>
                                <TR>
                                    <TD style="width:10%;">제품 상세정보 (한글)</TD>
                                    <TD class="smart_editer_text" id="detail_kr"></TD>
                                </TR>

                                <TR>
                                    <TD style="width:10%;">제품 상세정보 (영문)</TD>
                                    <TD class="smart_editer_text" id="detail_en"></TD>
                                </TR>

                                <TR>
                                    <TD style="width:10%;">제품 상세정보 (중문)</TD>
                                    <TD class="smart_editer_text" id="detail_cn"></TD>
                                </TR>
                            </TBODY>
                        </TABLE>
                        <TABLE style="margin-top:5px">
                            <colgroup>
                                <col width="10%">
                                <col width="90%">
                            </colgroup>
                            <TBODY>
                                <TR>
                                    <TD style="width:10%;">제품 취급 유의사항<br>디자인 (한글)</TD>
                                    <TD class="smart_editer_text" id="care_dsn_kr"></TD>
                                </TR>

                                <TR>
                                    <TD style="width:10%;">제품 취급 유의사항<br>디자인 (영문)</TD>
                                    <TD class="smart_editer_text" id="care_dsn_en"></TD>
                                </TR>

                                <TR>
                                    <TD style="width:10%;">제품 취급 유의사항<br>디자인 (중문)</TD>
                                    <TD class="smart_editer_text" id="care_dsn_cn"></TD>
                                </TR>
                            </TBODY>
                        </TABLE>
                    </div>
                </div>
                <div class="table table__wrap">
                    <button type="button" toggle_table="td"
                        style="background-color: #fafafa; width:100%;border:1px solid #000000;height:30px;cursor:pointer;"
                        onClick="toggleTableClick(this);">오더시트 - 생산</button>
                    <div class="overflow-x-auto" id="insert_table_td">
						<TABLE>
							<colgroup>
								<col width="10%">
								<col width="90%">
							</colgroup>
							<TBODY>
                                <TR>
									<TD>제품 취급 유의사항<br>생산 (한글)</TD>
									<TD class="smart_editer_text" id="care_td_kr"></TD>
								</TR>
                                <TR>
									<TD>제품 취급 유의사항<br>생산 (영문)</TD>
									<TD class="smart_editer_text" id="care_td_en"></TD>
								</TR>
                                <TR>
									<TD>제품 취급 유의사항<br>생산 (중문)</TD>
									<TD class="smart_editer_text" id="care_td_cn"></TD>
								</TR>
								<TR>
									<TD>소재 (한글)</TD>
									<TD class="smart_editer_text" id="material_kr"></TD>
								</TR>

								<TR>
									<TD>소재 (영문)</TD>
									<TD class="smart_editer_text" id="material_en"></TD>
								</TR>

								<TR>
									<TD>소재 (중문)</TD>
									<TD class="smart_editer_text" id="material_cn"></TD>
								</TR>
							</TBODY>
						</TABLE>
						<TABLE>
							<colgroup>
								<col width="10%">
								<col width="40%">
								<col width="10%">
								<col width="40%">
							</colgroup>
							<TBODY>
								<TR>
									<TD style="width:10%;">제조사</TD>
									<TD id="manufacturer"></TD>
									<TD style="width:10%;">공급사</TD>
									<TD id="supplier"></TD>
								</TR>
								<TR>
									<TD style="width:10%;">원산지</TD>
									<TD id="origin_country"></TD>
									<TD style="width:10%;">브랜드</TD>
									<TD id="brand"></TD>
								</TR>
                                <tr>
                                    <TD>상품 적재박스 유형</TD>
									<TD colspan="3"  id="load_box_info_table">
                                </tr>
                                <tr>
                                    <TD>상품 적재중량 (kg)</TD>
									<TD id="load_weight"></TD>
                                    <TD>상품 적재수량</TD>
									<TD id="load_qty"></TD>
                                </tr>
                                <tr>
                                    <TD>포장부자재</TD>
									<TD>
										<table style="width:50%">
											<tbody id="td_sub_material"></tbody>
										</table>
									</TD>
									<TD>배송부자재</TD>
									<TD>
										<table style="width:50%">
											<tbody id="delivery_sub_material"></tbody>
										</table>
									</TD>
                                </tr>
							</TBODY>
						</TABLE>
					</div>
                </div>
            </form>
        </div>
		<div class="flex justify-center">
            <button type="button"
				style="width:130px;height:36px;background-color:#140f82;color:#ffffff;cursor:pointer;margin-top:50px"
				onClick="location.href='/pm/ordersheet/list'">돌아가기</button>
		</div>
    </div>
</div>
<script>
var size_category_info = {};

$(document).ready(function() {
    
	urlParsing();
});

function urlParsing(){
	var url = location.href;
	var idx = url.indexOf("?");
	
	if(idx >= 0){
		var data = url.substring( idx + 1, url.length);
		var data_arr = data.split("=");
		if(data_arr[0] == 'ordersheet_idx'){
			ordersheetGet(data_arr[1]);
		}
	}
}

function toggleTableClick(obj) {
	var toggle_val = $(obj).attr('toggle_table');
	
	$('#insert_table_' + toggle_val).toggle();
}

function ordersheetGet(idx) {
    $('input[name=ordersheet_idx]').val(idx);
	$.ajax({
        type: "post",
        data:{
            'sel_idx':idx
        },
        dataType: "json",
        url: config.api + "pm/ordersheet/get",
        error: function() {
            alert("오더시트 불러오기가 실패했습니다.");
        },
        success: function(d) {
            if(d.code == 200) {
                var data = d.data;
				
				//기획 MD
				$('#style_code').text(data.style_code);
				$('#color_code').text(data.color_code);
				$('#product_code').text(data.product_code);
				switch(data.preorder_flg){
					case 0:
						$('#preorder_flg').text('고객상품');
						break;
					case 1:
						$('#preorder_flg').text('프리오더 상품');
						break;
				}
				switch(data.refund_flg){
					case 0:
						$('#refund_flg').text('교환 불가');
						break;
					case 1:
						$('#refund_flg').text('교환 가능');
				}

				if(data.line_idx != null && data.line_idx > 0){
					var type_str = '';
					switch(data.line_type){
						case 'C':
							type_str = '컬렉션 라인';
							break;
						case 'O':
							type_str = '오리진 라인';
							break;
						case 'T':
							type_str = '티피컬 라인';
							break;
					}
					strTable = `
						<table style="width:40%">
							<thead>
								<tr>
									<th>라인명</th>
									<th>타입</th>
									<th>색깔</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>${data.line_name}</td>
									<td>${type_str}</td>
									<td>${data.line_memo}</td>
								</tr>
							</tbody>
						</table>
					`;
					$('#line_info_table').append(strTable);
				}
                $('#category_lrg_title').text(data.category_lrg_title);
                $('#category_mdl_title').text(data.category_mdl_title);
                $('#category_sml_title').text(data.category_sml_title);
                $('#category_dtl_title').text(data.category_dtl_title);
				
                $('#graphic').text(data.graphic);
                $('#fit').text(data.fit);
                $('#material').text(data.material);
                $('#product_name').text(data.product_name);
                $('#product_size').text(data.product_size);
                $('#color').text(data.color);
                $('#color_rgb').text(data.color_rgb);
                $('#pantone_code').text(data.pantone_code);
                $('#md_category_guide').text(data.md_category_guide);
                $('#limit_qty').text(data.limit_qty);
                $('#limit_member').text(data.limit_member);
                $('#price_cost').text(data.price_cost);
                $('#price_kr').text(data.price_kr);
                $('#price_kr_gb').text(data.price_kr_gb);
                $('#price_en').text(data.price_en);
                $('#price_cn').text(data.price_cn);
                $('#product_qty').text(data.product_qty);
                $('#safe_qty').text(data.safe_qty);
                $('#launching_date').text(data.launching_date);
                $('#receive_request_date').text(data.receive_request_date);
                $('#tp_completion_date').text(data.tp_completion_date);

                //디자인
                if(data.wkla_idx != null && data.wkla_idx > 0){
					strTable = `
						<table style="width:30%">
							<thead>
								<tr>
									<th>WKLA 명</th>
									<th>비고</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>${data.wkla_name}</td>
									<td>${data.wkla_memo}</td>
								</tr>
							</tbody>
						</table>
					`;
					$('#wkla_info_table').append(strTable);
				}
                $('#model').text(data.model);
                $('#model_wear').text(data.model_wear);
                $('#size_a1_kr').html(data.size_a1_kr);
                $('#size_a2_kr').html(data.size_a2_kr);
                $('#size_a3_kr').html(data.size_a3_kr);
                $('#size_a4_kr').html(data.size_a4_kr);
                $('#size_a5_kr').html(data.size_a5_kr);
                $('#size_onesize_kr').html(data.size_onesize_kr);
                $('#size_a1_en').html(data.size_a1_en);
                $('#size_a2_en').html(data.size_a2_en);
                $('#size_a3_en').html(data.size_a3_en);
                $('#size_a4_en').html(data.size_a4_en);
                $('#size_a5_en').html(data.size_a5_en);
                $('#size_onesize_en').html(data.size_onesize_en);
                $('#size_a1_cn').html(data.size_a1_cn);
                $('#size_a2_cn').html(data.size_a2_cn);
                $('#size_a3_cn').html(data.size_a3_cn);
                $('#size_a4_cn').html(data.size_a4_cn);
                $('#size_a5_cn').html(data.size_a5_cn);
                $('#size_onesize_cn').html(data.size_onesize_cn);
                $('#size_category').text(data.size_category);
                $('#detail_kr').html(data.detail_kr);
                $('#detail_en').html(data.detail_en);
                $('#detail_cn').html(data.detail_cn);
                $('#care_dsn_kr').html(data.care_dsn_kr);
                $('#care_dsn_en').html(data.care_dsn_en);
                $('#care_dsn_cn').html(data.care_dsn_cn);

                if(data.option_info.length != 0){
                    colunm_name_size_1 = data.option_info[0].size_title_1;
                    colunm_name_size_2 = data.option_info[0].size_title_2;
                    colunm_name_size_3 = data.option_info[0].size_title_3;
                    colunm_name_size_4 = data.option_info[0].size_title_4;
                    colunm_name_size_5 = data.option_info[0].size_title_5;
                    colunm_name_size_6 = data.option_info[0].size_title_6;
                    strTh = `
                        <tr>
                            <th style="width:5%">옵션 이름</th>
                    `;
                    strTh += colunm_name_size_1 != null ? `<th>${colunm_name_size_1}</th>` : '';
                    strTh += colunm_name_size_2 != null ? `<th>${colunm_name_size_2}</th>` : '';
                    strTh += colunm_name_size_3 != null ? `<th>${colunm_name_size_3}</th>` : '';
                    strTh += colunm_name_size_4 != null ? `<th>${colunm_name_size_4}</th>` : '';
                    strTh += colunm_name_size_5 != null ? `<th>${colunm_name_size_5}</th>` : '';
                    strTh += colunm_name_size_6 != null ? `<th>${colunm_name_size_6}</th>` : '';

                    strTh += `
                        </tr>
                    `;
                    $('#product_size_table_head').append(strTh);

                    for(var i = 0; i < data.option_info.length; i++){
                        var row_data = data.option_info[i];

                        strTr = '';
                        var option_size_1 = row_data.option_size_1;
                        var option_size_2 = row_data.option_size_2;
                        var option_size_3 = row_data.option_size_3;
                        var option_size_4 = row_data.option_size_4;
                        var option_size_5 = row_data.option_size_5;
                        var option_size_6 = row_data.option_size_6;

                        strTrCol = ``;
                        strTrCol += option_size_1 != '-' ? `<td name="size_info_1[]">${option_size_1} cm</td>` : '';
                        strTrCol += option_size_2 != '-' ? `<td name="size_info_2[]">${option_size_2} cm</td>` : '';
                        strTrCol += option_size_3 != '-' ? `<td name="size_info_3[]">${option_size_3} cm</td>` : '';
                        strTrCol += option_size_4 != '-' ? `<td name="size_info_4[]">${option_size_4} cm</td>` : '';
                        strTrCol += option_size_5 != '-' ? `<td name="size_info_5[]">${option_size_5} cm</td>` : '';
                        strTrCol += option_size_6 != '-' ? `<td name="size_info_6[]">${option_size_6} cm</td>` : '';
                        
                        strTr += `
                            <tr>
                                <td id="option_name">${row_data.option_name}</td>
                                ${strTrCol}
                            </tr>
                        `;
                        $('#product_size_regist_table').append(strTr);
                    }
                }
                
                //생산
				$('#care_td_kr').html(data.care_td_kr);
				$('#care_td_en').html(data.care_td_en);
				$('#care_td_cn').html(data.care_td_cn);
				$('#material_kr').html(data.material_kr);
				$('#material_en').html(data.material_en);
				$('#material_cn').html(data.material_cn);
				$('#manufacturer').text(data.manufacturer);
				$('#supplier').text(data.supplier);
				$('#origin_country').text(data.origin_country);
				$('#brand').text(data.brand);

				if(data.load_box_idx != null && data.load_box_idx > 0){
					strTable = `
						<table>
							<thead>
								<tr>
									<th>상자명</th>
									<th>너비</th>
									<th>길이</th>
									<th>높이</th>
									<th>부피</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>${data.load_box_name}</td>
									<td>${data.load_box_width} cm</td>
									<td>${data.load_box_length} cm</td>
									<td>${data.load_box_height} cm</td>
									<td>${data.load_box_volume} cm³</td>
								</tr>
							</tbody>
						</table>
					`;
					$('#load_box_info_table').append(strTable);
				}
				$('#load_weight').text(data.load_weight);
				$('#load_qty').text(data.load_qty);
				var sub_info = data.sub_material_info;
				sub_info.forEach(function(sub_data){
					if(sub_data.sub_material_type == 'T'){
						$('#td_sub_material').append(`<tr><td>${sub_data.sub_material_name}</td></tr>`);

					}
					else if(sub_data.sub_material_type == 'D'){
						$('#delivery_sub_material').append(`<tr><td>${sub_data.sub_material_name}</td></tr>`);
					}
				})
            }
        }
    }).then(
        function(){
            var size_category = $('#size_category').text();
            if(size_category.length > 0){
                $.ajax({
                    type: "post",
                    data: {'size_category' : size_category},
                    dataType: "json",
                    //SIZE_DESCRIPTION table : get api url 경로확인
                    url: config.api + "product/size/get",
                    error: function() {
                        alert("사이즈정보 입력창 불러오기 처리에 실패했습니다.");
                    },
                    success: function(d) {
                        if(d.code == 200) {
                            if(d.data != null){
                                size_category_info = d.data[0];
                                setOptionForm(size_category_info);
                            }
                        }
                    }
                });
            }
        }
    );
}

function setOptionForm(size_category_info){
    var strDiv = "";
	var strThDiv = "";
    var category_name = size_category_info['category_name'];
	var img_path = '/images/sizeguide/sizecategory/' + category_name;

	img_path += `/${category_name}.svg`;

	$('#option_insert_div').html('');
	strDiv = `
				<div class="row">
					<div style="float:left;width: 33%;">
						<img id="size_img" src="${img_path}" >
					</div>
					<div style="float:left;width: 50%;padding-top:50px;">
						<table id="size_desc_table">
	`;

	for(var i = 1; i <= 6; i++){
        var size_title_str = size_category_info['size_title_' + i];
        var size_desc_str  = size_category_info['size_desc_' + i];
		
		console.log(size_title_str);
		if(size_title_str != null && size_title_str.length > 0){
			strDiv += `			
						<tr data-idx="${i}" style="cursor:pointer">
							<td>${size_title_str}</td>
							<td>${size_desc_str}</td>
						</tr> 
			`;
		}
	}
	strDiv +=	`		</table>
					</div>
				</div>
	`;
	$('#option_insert_div').append(strDiv);

	$('#size_desc_table tr').mouseover(function(){
        var category_name = size_category_info['category_name'];
	    var img_path = '/images/sizeguide/sizecategory/'+category_name;
		var tr_idx = $(this).attr('data-idx');
		img_path += `/${category_name}_${String.fromCharCode(parseInt(tr_idx) + 96)}.svg`;

        $('#size_desc_table td').css('text-decoration', 'none');
        $(this).find('td').css('text-decoration', 'underline');
		
		$('#size_img').attr('src', img_path);
    })
	
	$('#size_desc_table tr').mouseout(function(){
		var category_name = size_category_info['category_name'];
	    var img_path = '/images/sizeguide/sizecategory/'+category_name;
		var tr_idx = $(this).attr('data-idx');
		img_path += `/${category_name}.svg`;

        $('#size_desc_table td').css('text-decoration', 'none');
		
		$('#size_img').attr('src', img_path);
    })
}
</script>