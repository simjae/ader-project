
<div class="korea-tap filter-tap">
    <div class="content__card">
		<div class="card__header">
			<h2>홈페이지 내 알림메세지 설정(한국몰)</h2>
			<div class="drive--x"></div>
		</div>
		<div class="card__body">
            <form id="frm-list-01">
                <input type="hidden" name="country" id="" value="KR">
                <div class="table__wrap table">
                    <table>
                        <tbody id="notice_table_01">
                            <tr>
                                <th style="vertical-align:middle;">재고 수량 부족</th>
                                <td>
                                    <input type="hidden" name="alarm_condition[]" id="" value="stock_empty">
                                    <input style="width:90%" placeholder="" type="text" name="alarm_message" id="">
                                </td>
                                <td style="width:85px"><button style="width:70px;height:30px;border:1px solid;background-color:black;color:#ffffff;font-size:0.5rem;cursor:pointer;" onclick="singleSaveBtn(this)">메세지 저장</button></td>
                            </tr>
                            <tr>
                                <th style="vertical-align:middle;">상품분류 접근제한</th>
                                <td>
                                    <input type="hidden" name="alarm_condition[]" id="" value="product_category_access">
                                    <input style="width:90%" placeholder="" type="text" name="alarm_message" id="">
                                </td>
                                <td style="width:85px"><button style="width:70px;height:30px;border:1px solid;background-color:black;color:#ffffff;font-size:0.5rem;cursor:pointer;" onclick="singleSaveBtn(this)">메세지 저장</button></td>
                            </tr>
                            <tr>
                                <th style="vertical-align:middle;">상품사용후기<br>제한 설정</th>
                                <td>
                                    <input type="hidden" name="alarm_condition[]" id="" value="product_review">
                                    <input style="width:90%" placeholder="" type="text" name="alarm_message" id="">
                                </td>
                                <td style="width:85px"><button style="width:70px;height:30px;border:1px solid;background-color:black;color:#ffffff;font-size:0.5rem;cursor:pointer;" onclick="singleSaveBtn(this)">메세지 저장</button></td>
                            </tr>
                            <tr>
                                <th style="vertical-align:middle;">불량회원 로그인시<br>안내 문구 설정</th>
                                <td>
                                    <input type="hidden" name="alarm_condition[]" id="" value="bad_user_login_restrict">
                                    <input style="width:90%" placeholder="" type="text" name="alarm_message" id="">
                                </td>
                                <td style="width:85px"><button style="width:70px;height:30px;border:1px solid;background-color:black;color:#ffffff;font-size:0.5rem;cursor:pointer;" onclick="singleSaveBtn(this)">메세지 저장</button></td>
                            </tr>
                            <tr>
                                <th style="vertical-align:middle;">불량회원 구매제한<br>안내 문구 설정</th>
                                <td>
                                    <input type="hidden" name="alarm_condition[]" id="" value="bad_user_buy_restrict">
                                    <input style="width:90%" placeholder="" type="text" name="alarm_message" id="">
                                </td>
                                <td style="width:85px"><button style="width:70px;height:30px;border:1px solid;background-color:black;color:#ffffff;font-size:0.5rem;cursor:pointer;" onclick="singleSaveBtn(this)">메세지 저장</button></td>
                            </tr>
                            <tr>
                                <th style="vertical-align:middle;">온라인 설문조사<br>결과보기 기능제한</th>
                                <td>
                                    <input type="hidden" name="alarm_condition[]" id="" value="online_servey_result_limit">
                                    <input style="width:90%" placeholder="" type="text" name="alarm_message" id="">
                                    <p style="line-height:2; color: #888888;"> - 온라인 설문조사 결과보기를 권한이 없는 그룹이 클릭했을때 노출되는 쇼핑몰화면 메시지입니다.</p>
                                </td>
                                <td style="width:85px"><button style="width:70px;height:30px;border:1px solid;background-color:black;color:#ffffff;font-size:0.5rem;cursor:pointer;" onclick="singleSaveBtn(this)">메세지 저장</button></td>
                            </tr>
                            <tr>
                                <th style="vertical-align:middle;">회원가입 재가입 제한</th>
                                <td>
                                    <input type="hidden" name="alarm_condition[]" id="" value="re_sign_up_restrict">
                                    <input style="width:90%" placeholder="" type="text" name="alarm_message" id="">
                                </td>
                                <td style="width:85px"><button style="width:70px;height:30px;border:1px solid;background-color:black;color:#ffffff;font-size:0.5rem;cursor:pointer;" onclick="singleSaveBtn(this)">메세지 저장</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-between" style="margin-top:20px;"> 
                        <div class="black-btn" tab-num="01" onclick="saveAlarm(this)"><span>저장</span></div>
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>


<script>



function addRow() {
		// table element 찾기
		const table = $('.notice-table >tbody');
		table.append("<tr><td><input type='text' placeholder='항목 이름'></td><td><input style='width:90%' type='text' placeholder='항목 내용'><td></tr>");
	}
	function removeRow(){
		const table = $('.notice-table >tbody');
		table.find("tr:last-child").remove();
	}
</script>