
<div class="content__card">
	<div class="card__header">
		<h3>엑셀 독립몰 상품정보 수정</h3>
		<div class="drive--x"></div>
	</div>
	<div class="card__body">
		<div class="hidden"><input class="upload_btn" id="upload_btn_01" name="upload_btn_01" type="file" style="visibility:hidden"></div>
		<div class="table table__wrap">
			<div class="overflow-x-auto">
				<table>
					<thead><th colspan="2" style="font-size: 14px;font-weight: bold;color: #000;">양식다운로드</th></thead>
					<tbody>
						<tr>
							<td style="width: 20%;">독립몰 상품정보 수정용 엑셀 다운로드</td>
							<td><div class="exel__btn"><a href="http://116.124.128.246:81/excel_form/독립몰상품 수정 엑셀.xlsx" download>다운로드</a></div></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="table table__wrap">
			<div class="overflow-x-auto">
				<table>
					<thead><th style="font-size: 14px;font-weight: bold;color: #000;">엑셀업로드</th></thead>
					<tbody>
						<tr>
							<td>
							<div class="exel__zone">
								<form action="/target">
									<p style="margin-bottom: 20px;color: #bfbfbf;">첨부할 파일 드래그 또는 선택</p>
									<div type="button" class="exel__upload__btn" style="cursor:pointer">엑셀 업로드</div>
								</form>
							</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="table table__wrap">
			<div class="overflow-x-auto">
				<table>
					<thead><th colspan="2">대기중</th></thead>
					<TBODY id="wait_list_table_01">
					</TBODY>
				</table>
			</div>
			<div class="exel__btn__wrap">
				<div class="exel__btn blue exel__execute__btn">상품정보 수정</div>
				<div class="exel__btn" onclick="resetExcelList()"><i class="xi-refresh"></i>초기화</div>
			</div>
		</div>
		<div class="table table__wrap">
			<div class="overflow-x-auto">
				<table>
					<thead><th colspan="3">진행 완료</th></thead>
					<TBODY id="finish_list_table_01">
					</TBODY>
				</table>
			</div>
		</div>
		<div class="table table__wrap">
			<div class="overflow-x-auto">
				<table>
					<thead><th colspan="2">진행 실패</th></thead>
					<TBODY id="fail_list_table_01">
					</TBODY>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
</script>
