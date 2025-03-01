<div class="content__card">
	<form id="frm-list_ALL" action="order/list/get">
		<div class="card__header">
			<div class="card__header">
				<h3>전체 주문 검색</h3>
				<div class="drive--x"></div>
			</div>
		</div>
		<div class="card__body">
			<div class="content__wrap">
				<div class="content__title">쇼핑몰</div>
				<div class="content__row" >
					<select class="fSelect" name="country" style="width:163px">
						<option value="KR" selected>한국몰</option>
						<option value="EN">영문몰</option>
						<option value="CN">중문몰</option>
					</select>
				</div>
			</div>
			
			<div class="content__wrap" style="align-items: start;">
				<div class="content__title">주문상태</div>
				<div class="content__row" style="display:block;">
					<div class="cb__color" style="margin-bottom:10px;">
						<label>
							<input type="checkbox" name="order_status[]" value="ALL">
							<span>전체</span>
						</label>
						
						<label>
							<input type="checkbox" name="order_status[]" value="PCP">
							<span>결제완료</span>
						</label>
						
						<label>
							<input type="checkbox" name="order_status[]" value="PPR">
							<span>상품준비</span>
						</label>
						
						<label>
							<input type="checkbox" name="order_status[]" value="POP">
							<span>프리오더 준비</span>
						</label>
						
						<label>
							<input type="checkbox" name="order_status[]" value="POD">
							<span>프리오더 상품 생산</span>
						</label>
						
						<label>
							<input type="checkbox" name="order_status[]" value="DPR">
							<span>배송준비</span>
						</label>
						
						<label>
							<input type="checkbox" name="order_status[]" value="DPG">
							<span>배송중</span>
						</label>
						
						<label>
							<input type="checkbox" name="order_status[]" value="DCP">
							<span>배송완료</span>
						</label>
					</div>
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">검색어</div>
				<div class="content__row">
					<select class="fSelect" name="keyword_type" style="width:163px;">
						<option value="ALL" selected>검색 키워드 선택</option>
						<option value="order_code">주문번호</option>
						<option value="delivery_num">운송장번호</option>
						<option value="member_name">멤버 이름</option>
						<option value="member_id">멤버 아이디</option>
						<option value="member_tel">멤버 핸드폰</option>
						<option value="member_email">멤버 이메일</option>
						<option value="to_place">배송지</option>
						<option value="to_name">수령자 이름</option>
						<option value="to_mobile">수령자 핸드폰</option>
						<option value="order_memo">주문 메모</option>
					</select>
					
					<input type="text" name="keyword_param" value="" style="width:60%;">
					<button style="width:30px;height:30px;border:1px solid;background-color:#ffff;margin-left:15px;">+</button>
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">기간</div>
				<div class="content__row">
					<select class="fSelect" name="date_type" style="width:163px;" class="fSelect disabled">
						<option value="ALL" selected>기간정보 선택</option>
						<option value="order_date">주문일</option>
						<option value="cancel_date">취소 요청일</option>
						<option value="refund_date">환불 요청일</option>
						<option value="delivery_start_date">배송 시작일</option>
						<option value="delivery_end_date">배송 종료일</option>
					</select>
					
					<div class="content__date__wrap">
						<div class="content__date__btn">
							<input id="date_param_OCO" type="hidden" name="date_param" value="" style="width:150px;">

							<div class="search_date_OCO date__picker" date_type="OCO" date="today"	type="button" onclick="searchDateClick(this);">오늘</div>
							<div class="search_date_OCO date__picker" date_type="OCO" date="01d"	type="button" onclick="searchDateClick(this);">어제</div>
							<div class="search_date_OCO date__picker" date_type="OCO" date="03d"	type="button" onclick="searchDateClick(this);">3일</div>
							<div class="search_date_OCO date__picker" date_type="OCO" date="07d"	type="button" onclick="searchDateClick(this);">7일</div>
							<div class="search_date_OCO date__picker" date_type="OCO" date="15d"	type="button" onclick="searchDateClick(this);">15일</div>
							<div class="search_date_OCO date__picker" date_type="OCO" date="01m"	type="button" onclick="searchDateClick(this);">1개월</div>
							<div class="search_date_OCO date__picker" date_type="OCO" date="03m"	type="button" onclick="searchDateClick(this);">3개월</div>
							<div class="search_date_OCO date__picker" date_type="OCO" date="01y"	type="button" onclick="searchDateClick(this);">1년</div>
						</div>
						
						<div class="content__date__picker">
							<input id="date_from_OCO" class="date_param_OCO" type="date" name="date_from" class="margin-bottom-6" placeholder="From" readonly style="width:150px;" date_type="OCO" onChange="dateParamChange(this);">
								<font>~</font>
							<input id="date_to_OCO" class="date_param_OCO" type="date" name="date_to" placeholder="To" readonly style="width:150px;" date_type="OCO" onChange="dateParamChange(this);">
						</div>
					</div>
				</div>
			</div>
			
			<div class="content__wrap">
				<div class="content__title">상품정보</div>
				<div class="content__row">
					<select class="fSelect" name="product_type" style="width:163px;">
						<option value="ALL" selected>상품정보 선택</option>
						<option value="code">상품 코드</option>
						<option value="name">상품 이름</option>
					</select>
					
					<input type="text" name="product_param" value="" style="width:60%;">
					
					<button style="width:100px;height:30px;border:1px solid;background-color:#ffffff;margin-left:15px;">상품 찾기</button>
				</div>
			</div>
			
			<div class="content__wrap grid__half">
				<div class="half__box__wrap">
					<div class="content__title">희망 배송업체/방식</div>
					<div class="content__row">
						<select name="delivery_company" class="fSelect" style="width:163px;">
							<option value="ALL">배송업체 선택</option>
							<?php
								$sql = "SELECT
											IDX				AS DELIVERY_IDX,
											COMPANY_NAME	AS COMPANY_NAME
										FROM
											dev.DELIVERY_COMPANY";
								$db->query($sql);
								foreach($db->fetch() as $data) {
							?>
							<option value="<?=$data['DELIVERY_IDX']?>"><?=$data['COMPANY_NAME']?></option>
							<?php
								}
							?>
						</select>
					</div>
				</div>
				
				<div class="half__box__wrap">
					<div class="content__title">배송 구분</div>
					<div class="content__row">
						<div class="rd__block">
							<input type="radio" id="delivery_type_ALL_ALL" class="radio__input" value="" name="delivery_type">
							<label for="delivery_type_ALL_ALL">전체</label>
							
							<input type="radio" id="delivery_type_KR_ALL" class="radio__input" value="" name="delivery_type">
							<label for="delivery_type_KR_ALL">국내 배송</label>
							
							<input type="radio" id="delivery_type_FR_ALL" class="radio__input" value="" name="delivery_type">
							<label for="delivery_type_FR_ALL">해외 배송</label>
						</div>
					</div>
				</div>
			</div>
			
			<div class="card__body--hide detail_hidden" style="display: none;">
				<div class="content__wrap grid__half">
					<div class="half__box__wrap">
						<div class="content__title">멤버 레벨</div>
						<div class="content__row">
							<div class="rd__block">
								<select class="fSelect" name="group_no" id="groupNo" style="width:163px;">
									<option value="ALL">전체등급</option>
									<?php
										$sql = "SELECT
													IDX		AS LEVEL_IDX,
													TITLE	AS TITLE
												FROM
													dev.MEMBER_LEVEL";
										
										$db->query($sql);
										foreach($db->fetch() as $data) {
									?>
									<option value="<?=$data['LEVEL_IDX']?>"><?=$data['TITLE']?></option>
									<?php
										}
									?>
								</select>
								
							</div>
						</div>
					</div>
					
					<div class="half__box__wrap">
						<div class="content__title">멤버 상태</div>
						<div class="content__row">
							<div class="cb__color">
								<label>
									<input type="checkbox" name="member_status" value="">
									<span>특별 관리 회원</span>
								</label>
								
								<label>
									<input type="checkbox" name="member_status" value="">
									<span>불량 회원</span>
								</label>
							</div>
						</div>
					</div>
				</div>
				
				<div class="content__wrap grid__half">
					<div class="half__box__wrap">
						<div class="content__title">금액 조건</div>
						<div class="content__row">
							<select class="fSelect" name="price_type" style="width:163px;">
								<option value="ALL" selected>금액조건 선택</option>
								<option value="PRICE_PRODUCT">상품 총 가격</option>
								<option value="PRICE_MILEAGE_POINT">사용 적립 포인트</option>
								<option value="PRICE_CHARGE_POINT">사용 충전 포인트</option>
								<option value="PRICE_DISCOUNT">자체 할인가</option>
								<option value="PRICE_DELIVERY">배송비</option>
								<option value="PRICE_TOTAL">총 가격</option>
							</select>
							
							<input type="text" name="price_min" value="0" style="width:100px;">
							~
							<input type="text" name="price_max" value="0" style="width:100px;">
						</div>
					</div>
					
					<div class="half__box__wrap">
						<div class="content__title">주문 상품 수량</div>
						<div class="content__row">
							<input type="text" name="qty_min" value="0" style="width:100px;">
							~
							<input type="text" name="qty_max" value="0" style="width:100px;">
						</div>
					</div>
				</div>
				
				<div class="content__wrap grid__half">
					<div class="half__box__wrap">
						<div class="content__title">결제수단</div>
						<div class="content__row">
							<select class="fSelect" name="pg_payment" style="width:163px;">
								<option value="ALL" selected>결제수단 선택</option>
								<option value="PRICE_PRODUCT">상품 총 가격</option>
								<option value="PRICE_MILEAGE">사용 적립금</option>
								<option value="PRICE_DISCOUNT">자체 할인가</option>
								<option value="PRICE_DELIVERY">배송비</option>
								<option value="PRICE_TOTAL">총 가격</option>
							</select>
						</div>
					</div>
					
					<div class="half__box__wrap">
						<div class="content__title">할인 수단</div>
						<div class="content__row">
							<div class="cb__color">
								<label>
									<input type="checkbox" name="discount_type" value="mileage">
									<span>적립금</span>
								</label>
								
								<label>
									<input type="checkbox" name="discount_type" value="coupon">
									<span>쿠폰</span>
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="card__footer">
			<div class="footer__btn__wrap">
				<div id="detail_toggle" toggle="hide" onclick="detailToggleClick(this)">상세 검색 열기 +</div>
				<div class="btn__wrap--lg">
					<div  class="blue__color__btn" onClick="getOrderInfo_all();"><span>검색</span></div>
					<div class="defult__color__btn" onClick=""><span>초기화</span></div>
				</div>
			</div>
		</div> 
	</div>

	<div class="content__card">
		<div class="card__header">
			<h3>전체 주문 검색 결과</h3>
			<div class="drive--x"></div>
		</div>
		<div class="card__body">
			<div class="info__wrap " style="justify-content:flex-end; align-items: center;">
				<div class="content__row">
					<select style="width:163px;float:right;margin-right:10px;" onChange="orderChange(this);">
						<option value="CREATE_DATE|DESC">등록일 역순</option>
						<option value="CREATE_DATE|ASC">등록일 순</option>
						<option value="PRODUCT_NAME|DESC">상품명 역순</option>
						<option value="PRODUCT_NAME|ASC">상품명 순</option>
						<option value="SALES_PRICE_KR|DESC">판매가(힌국몰) 역순</option>
						<option value="SALES_PRICE_KR|ASC">판매가(힌국몰) 순</option>
						<option value="SALES_PRICE_EN|DESC">판매가(영문몰) 역순</option>
						<option value="SALES_PRICE_EN|ASC">판매가(영문몰) 순</option>
						<option value="SALES_PRICE_CN|DESC">판매가(중문몰) 역순</option>
						<option value="SALES_PRICE_CN|ASC">판매가(중문몰) 순</option>
					</select>
					
					<select name="rows" style="width:163px;float:right;" onChange="rowsChange(this);">
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

			<div class="table table__wrap tabNum tabNum_01">					
				<div class="overflow-x-auto">
					<TABLE style="width:350%;">
						<THEAD>
							<TR>
								<TH style="width:15px;">
									<div class="cb__color">
										<label>
											<input type="checkbox" name="selectAll1" value="">
											<span></span>
										</label>
									</div>
								</TH>
								<TH style="width:100px;">쇼핑몰</TH>
								<TH style="width:100px;">주문 상태</TH>
								<TH style="width:350px;">주문일</TH>
								<TH style="width:350px;">주문 번호</TH>
								<TH style="width:350px;">주문자</TH>
								<TH style="width:250px;">상품 총 가격</TH>
								<TH style="width:250px;">사용 적립 포인트</TH>
								<TH style="width:250px;">사용 충전 포인트</TH>
								<TH style="width:250px;">할인금액</TH>
								<TH style="width:250px;">배송비</TH>
								<TH style="width:250px;">총 결제금액</TH>
								
								<TH style="width:100px;">상품 타입</TH>
								<TH style="width:350px;">상품 정보</TH>
								<TH style="width:100px;">상품 주문 상태</TH>
								<TH style="width:100px;">옵션 이름</TH>
								<TH style="width:350px;">바코드</TH>
								<TH style="width:250px;">상품 수량</TH>
								<TH style="width:250px;">상품 가격</TH>
								<TH style="width:100px;">리뷰 작성 유무</TH>
								
								<TH style="width:350px;">송장 번호</TH>
								<TH style="width:100px;">배송 유형</TH>
								<TH style="width:350px;">배송 예정일</TH>
								<TH style="width:100px;">배송 상태</TH>
								<TH style="width:350px;">배송 시작일</TH>
								<TH style="width:350px;">배송 종료일</TH>
								<TH style="width:350px;">배송회사 명</TH>
								<TH style="width:500px;">주문 메모</TH>
							</TR>
						</THEAD>
						<TBODY id="result_table_all">
						</TBODY>
					</TABLE>
				</div>
			</div>
		</div>
	</form>
</div>

<script>
function getOrderInfo_all() {
	$("#result_table_all").html('');
	
	var strDiv = '';
	strDiv += '<TD class="default_td" colspan="30">';
	strDiv += '    조회 결과가 없습니다';
	strDiv += '</TD>';
	
	$("#result_table_02").append(strDiv);
	
	var rows = $("#frm-list_ALL").find('.rows').val();
	var page = $("#frm-list_ALL").find('.page').val(1);
	
	get_contents($("#frm-list_ALL"),{
		pageObj : $(".paging"),
		html : function(d) {
			if (d.length > 0) {
				$("#result_table_all").html('');
			}
			
			let rowspan = 1;
			let prev_code = "";
			d.forEach(function(row) {
				let recent_code = row.order_code;
				
				if (prev_code != recent_code) {
					prev_code = recent_code;
					rowspan = 1;
				} else if (prev_code == recent_code){
					rowspan++;
				}
				
				console.log(rowspan);
				let strDiv = "";
				strDiv += '<TR>';
				if (rowspan == 1) {
					strDiv += '    <TD class="' + recent_code + '_rowspan_td">';
					strDiv += '        <div class="cb__color">';
					strDiv += '            <label>';
					strDiv += '                <input type="checkbox" name="select_idx[]" value="">';
					strDiv += '                <span></span>';
					strDiv += '            </label>';
					strDiv += '        </div>';
					strDiv += '    </TD>';
					
					let country = "";
					switch (row.country) {
						case "KR" :
							country = "한국몰";
							break;
						
						case "EN" :
							country = "영문몰";
							break;
						
						case "CN" :
							country = "중문몰";
							break;
					}
					
					strDiv += '    <TD class="' + recent_code + '_rowspan_td">' + country + '</TD>';
					
					let oi_status = "";
					switch (row.oi_status) {
						case "PCP" :
							oi_status = "결제완료";
							break;
						
						case "PPR" :
							oi_status = "상품준비";
							break;
						
						case "POP" :
							oi_status = "프리오더 준비";
							break;
						
						case "POD" :
							oi_status = "프리오더 상품 생산";
							break;
						
						case "DPR" :
							oi_status = "배송준비";
							break;
						
						case "DPG" :
							oi_status = "배송중";
							break;
							
						case "DCP" :
							oi_status = "배송완료";
							break;
					}
					
					strDiv += '    <TD class="' + recent_code + '_rowspan_td">' + oi_status + '</TD>';
					strDiv += '    <TD class="' + recent_code + '_rowspan_td">' + row.order_date + '</TD>';
					strDiv += '    <TD class="' + recent_code + '_rowspan_td">' + row.order_code + '</TD>';
					strDiv += '    <TD class="' + recent_code + '_rowspan_td">' + row.member_id + '</TD>';
					strDiv += '    <TD class="' + recent_code + '_rowspan_td" style="text-align:right;">' + row.price_product.toLocaleString('ko-KR') + '</TD>';
					strDiv += '    <TD class="' + recent_code + '_rowspan_td" style="text-align:right;">' + row.price_mileage_point.toLocaleString('ko-KR') + '</TD>';
					strDiv += '    <TD class="' + recent_code + '_rowspan_td" style="text-align:right;">' + row.price_charge_point.toLocaleString('ko-KR') + '</TD>';
					strDiv += '    <TD class="' + recent_code + '_rowspan_td" style="text-align:right;">' + row.price_discount.toLocaleString('ko-KR') + '</TD>';
					strDiv += '    <TD class="' + recent_code + '_rowspan_td" style="text-align:right;">' + row.price_delivery.toLocaleString('ko-KR') + '</TD>';
					strDiv += '    <TD class="' + recent_code + '_rowspan_td" style="text-align:right;">' + row.price_total.toLocaleString('ko-KR') + '</TD>';
				}
				
				let product_type = "";
				switch (row.product_type) {
					case "B" :
						product_type = "일반상품";
						break;
					
					case "S" :
						product_type = "세트상품";
						break;
				}
				
				strDiv += '    <TD>' + product_type + '</TD>';
				strDiv += '    <TD>' + row.product_name + '<br>' + row.product_code + '</TD>';
				
				let op_status = "";
				switch (row.op_status) {
					case "PCP" :
						op_status = "결제완료";
						break;
					
					case "PPR" :
						op_status = "상품준비";
						break;
					
					case "POP" :
						op_status = "프리오더 준비";
						break;
					
					case "POD" :
						op_status = "프리오더 상품 생산";
						break;
					
					case "DPR" :
						op_status = "배송준비";
						break;
					
					case "DPG" :
						op_status = "배송중";
						break;
						
					case "DCP" :
						op_status = "배송완료";
						break;
				}
				strDiv += '    <TD>' + op_status + '</TD>';
				strDiv += '    <TD>' + row.option_name + '</TD>';
				strDiv += '    <TD>' + row.barcode + '</TD>';
				strDiv += '    <TD>' + row.product_qty + '</TD>';
				strDiv += '    <TD style="text-align:right;">' + row.product_price.toLocaleString('ko-KR') + '</TD>';
				strDiv += '    <TD>' + row.review_type + '</TD>';
				
				strDiv += '    <TD>' + row.delivery_num + '</TD>';
				
				let delivery_type = "";
				switch (row.delivery_type) {
					case "KR" :
						delivery_type = "국내배송";
						break;
					
					case "FR" :
						delivery_type = "해외배송";
						break;
				}
				
				strDiv += '    <TD>' + delivery_type + '</TD>';
				strDiv += '    <TD>' + row.delivery_date + '</TD>';
				
				let delivery_status = "";
				switch (row.delivery_status) {
					case "DPR" :
						delivery_status = "배송준비";
						break;
					
					case "DPG" :
						delivery_status = "배송중";
						break;
					
					case "MRD" :
						delivery_status = "멤버 재배송";
						break;
					
					case "ARD" :
						delivery_status = "아더 재배송";
						break;
					
					case "DCP" :
						delivery_status = "배송완료";
						break;
				}
				
				strDiv += '    <TD>' + delivery_status + '</TD>';
				strDiv += '    <TD>' + row.delivery_start_date + '</TD>';
				strDiv += '    <TD>' + row.delivery_end_date + '</TD>';
				strDiv += '    <TD>' + row.company_name + '</TD>';
				if (rowspan == 1) {
					strDiv += '    <TD class="' + recent_code + '_rowspan_td">' + row.order_memo + '</TD>';
				}
				strDiv += '</TR>';
				
				$("#result_table_all").append(strDiv);
				
				$('.' + prev_code + '_rowspan_td').attr('rowspan',rowspan);
			});
		},
	},rows,1);
}
</script>