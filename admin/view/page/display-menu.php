<style>
.registStoryBtn{width:120px;height:30px;border:1px solid #000000;background-color:#ffffff;color:#000000;margin-right:10px;cursor:pointer;}
.menu__contents{margin-top:20px;margin-left:0px}
.story__title{ margin-top:10px;font-size:10px }
.menu__row{ margin-top:15px;;font-size:11px }
.story_list {display:flex;margin-bottom:5px;}
.story_title {width:100%;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;cursor:pointer;margin-top:10px;}
.menu__lrg {width: 20%;padding-left:10px;padding-right:10px;border-left:2px solid #000000;border-right:2px solid #000000;}
.menu_lrg_title {width:100%;font-size:15px;font-weight:bold;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;cursor:pointer;}
.menu__mdl {margin-left:25px;}
.menu_mdl_title {width:100%;font-size:13px;font-weight:bold;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;cursor:pointer;}
.menu__sml {margin-left:25px;}
.menu_sml_title {width:100%;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;cursor:pointer;}
.row__font{ margin-top:5px;height:18px}
.overflow-auto {height:300px;overflow-x: auto;overflow-y: auto;}
.add_menu_btn {width:20px;height:22px;border:1px solid #bfbfbf;padding:5px;text-align:center;margin-right:5px;cursor:pointer;}
.delete_menu_btn {width:20px;height:22px;border:1px solid #bfbfbf;padding:5px;text-align:center;background-color:#E43A45;color:#ffffff;cursor:pointer;cursor:pointer;}
.add_menu_obj {margin-left:20px;padding: 7px 0;color: #000;width: 100px;cursor: pointer;font-size: 12px;font-weight: 300;border:1px solid #bfbfbf;text-align:center;}
.SL_container {width:100%;height:220px;border:solid 1px #bfbfbf;padding:10px;padding-top:15px;margin-top:15px;display:flex;overflow-x: auto;}
.UP_container {width:100%;height:220px;border:solid 1px #bfbfbf;padding:10px;padding-top:15px;margin-top:15px;;display:flex;overflow-x: auto;}
.LW_container {width:100%;height:95px;border:solid 1px #bfbfbf;padding:10px;padding-top:15px;margin-top:15px;;display:flex;overflow-x: auto;}
.menu_img_obj {width:120px;height:170px;border:1px solid #bfbfbf;padding:10px;margin-right:15px;}
.menu_txt_obj {width:120px;height:65px;border:1px solid #bfbfbf;padding:10px;margin-right:15px;cursor:pointer;}
.menu_obj_img {width:100px;height:100px;border:1px solid #bfbfbf;margin-bottom:10px;background-repeat:no-repeat;background-size:cover;background-position: center;cursor:pointer;}
.menu_obj_title {text-align:center;font-size:10px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
.delete_menu_obj {width:30px;height:20px;padding:4px;text-align:center;background-color:#e43a45;color:#ffffff;font-size:5px;margin-bottom:10px;margin-right:20px;cursor:pointer;}
.display_num {width:20px;height:20px;padding:4px;text-align:center;background-color:#ffffff;color:#bgbgbg;font-size:5px;margin-bottom:10px;border:1px solid #bfbfbf;margin-left:5px;cursor:pointer;}

.country_copy {width:150px;height:30px;border:1px solid #bfbfbf;border-radius:5px;float:right;margin-right:10px;}
.save_font {font-size:12px;font-family:'NanumSquareRound',sans-serif;line-height:2.8;float:right;margin-right:10px;}

.save_menu_btn {width:100px;height:30px;background-color:#000000;color:#ffffff;border:1px solid #bfbfbf;padding:5px;text-align:center;float:right;cursor:pointer;}
#loading_img {position:absolute;width:75px;height:75px;z-index:9999;filter:alpha(opacity=50);opacity:alpha*0.5;margin:auto;padding:0;}
</style>

<div class="filter-wrap" style="width:100%;margin-bottom:20px;display:flex;">
	<div style="width:50%;">
		<button class="menu_tab_btn tap__button" country="KR" style="width:150px; background-color: #000;color: #fff;font-weight: 500;" onClick="menuTabBtnClick(this);">한국몰</button>
		<button class="menu_tab_btn tap__button" country="EN" style="width:150px;" onClick="menuTabBtnClick(this);">영문몰</button>
		<button class="menu_tab_btn tap__button" country="CN" style="width:150px;" onClick="menuTabBtnClick(this);">중국몰</button>
	</div>
	
	<div style="width:50%;">
		<div class="btn" style="float:right;" onClick="copyMenu();">복사</div>				
		
		<font class="save_font">로 복사</font>
		
		<select id="country_to" class="country_copy">
			<option value="KR">한국몰</option>
			<option value="EN">영문몰</option>
			<option value="CN">중문몰</option>
		</select>
		
		<font class="save_font">데이터를</font>
		
		<select id="country_from" class="country_copy" style="">
			<option value="KR">한국몰</option>
			<option value="EN">영문몰</option>
			<option value="CN">중문몰</option>
		</select>
	</div>
</div>

<input id="country" type="hidden" value="KR">

<div id="menu_tab_KR" class="row menu_tab" style="margin-top:0px;">
	<?php include_once("display-menu-kr.php"); ?>
</div>

<div id="menu_tab_EN" class="row menu_tab" style="display:none;margin-top:0px;">
	<?php include_once("display-menu-en.php"); ?>
</div>

<div id="menu_tab_CN" class="row menu_tab" style="display:none;margin-top:0px;">
	<?php include_once("display-menu-cn.php"); ?>
</div>

<script>
function menuTabBtnClick(obj) {
	var country = $(obj).attr('country');
	$('#country').val(country);
	$('.menu_tab').hide();
	$('#menu_tab_' + country).show();
	
	$(obj).css('background-color','#000');
	$(obj).css('color','#ffffff');
	
	$('.menu_tab_btn').not($(obj)).css('background-color','#ffffff');
	$('.menu_tab_btn').not($(obj)).css('color','#000000');
}

function init_fileter(frm_id, func_name){
	var formObj = $('#'+frm_id);
	formObj.find('.rd__block').find('input:radio[value="all"]').prop('checked',true);
	formObj.find('.rd__block').find('input:radio[value="ALL"]').prop('checked',true);

	formObj.find('.fSelect').prop("selectedIndex", 0);

	formObj.find('input[type=checkbox]').attr("checked", false);
	formObj.find('input[type=text]').val('');
	formObj.find('input[type=date]').val('');

	formObj.find('.date__picker').css('background-color','#ffffff');
	formObj.find('.date__picker').css('color','#000000');
	formObj.find('input[name="search_date"]').val('');
	
	$('.posting_type').eq(0).prop('checked',true);
	
	window[func_name]();
}

function resetType(obj) {
	let country = $(obj).attr('country');
	let obj_type = $(obj).attr('obj_type');
	let radio_value = $(obj).val();
	let action_name = getActionName(obj_type);
	
	let frm = $('#frm-put_' + country);
	let param_div = frm.find('.param_' + obj_type + '_' + country);
	
	param_div.find('.page_idx').val(0);
	
	let result_table = param_div.find('.result_table');
	result_table.html('');
	
	let strDiv = "";
	strDiv += '<tr>';
	strDiv += '    <td class="default_td" colspan="12" style="text-align:left;">';
	strDiv += '        선택된 게시물이 없습니다. 게시물을 선택해주세요.';
	strDiv += '    </td>';
	strDiv += '</tr>';
	
	result_table.append(strDiv);
}

function resetMenu(country) {
	let frm = $('#frm-put_' + country);
	let param_MN = frm.find('.param_MN_' + country);
	
	frm.find('.menu_sort').val('');
	param_MN.find('.menu_idx').val(0);
	param_MN.find('.menu_title').val('');
	param_MN.find('.link_url').val('');
	param_MN.find('.link_type').val('');
	param_MN.find('.link_idx').val(0);
	
	frm.parent().hide();
}

function resetMenuLinkUrl(country) {
	let frm = $("#frm-put_" + country);
	let param_MN = frm.find('.param_MN_' + country);
	
	param_MN.find('.link_type').val('EC');
	param_MN.find('.link_idx').val(0);
	
	let result_table = param_MN.find('.result_table');
	
	result_table.html('');
	
	let strDiv = "";
	strDiv += '<TD class="default_td" colspan="12" style="text-align:left;">';
	strDiv += '    선택된 게시물이 없습니다. 게시물을 선택해주세요.';
	strDiv += '</TD>';
	
	result_table.append(strDiv);
}

function resetMenuObjLinkUrl(country,obj_type) {
	let frm = $("#frm-put_" + country);
	let obj_div = $('.param_' + obj_type + '_' + country);
	
	obj_div.find('.link_type').val('EC');
	obj_div.find('.link_idx').val(0);
	
	let result_table = obj_div.find('.result_table');
	
	result_table.html('');
	
	let strDiv = "";
	strDiv += '<TD class="default_td" colspan="12" style="text-align:left;">';
	strDiv += '    선택된 게시물이 없습니다. 게시물을 선택해주세요.';
	strDiv += '</TD>';
	
	result_table.append(strDiv);
}

function addMenu(country,menu_sort,menu_type,menu_idx) {
	$.ajax({
		url: config.api + "display/menu/add",
		type: "post",
		data: {
			'country': country,
			'menu_sort': menu_sort,
			'menu_type': menu_type,
			'menu_idx': menu_idx
		},
		dataType: "json",
		error: function() {
			alert('메뉴 추가처리중 오류가 발생했습니다.');
		},
		success: function(d) {
			let code = d.code;
			if (code == 200) {
				switch (menu_sort) {
					case "SL" :
						getMenuSlideList(country,data[0]);
						break;
					
					case "UP" :
						getUpFilterList(country,data[0]);
						break;
					
					case "LW" :
						getLwFilterList(country,data[0]);
						break;
				}
				getMenuInfoList(country);
			}
		}
	});
}

function putMenuInfo(country) {
	let frm = $("#frm-put_" + country);
	let param_MN = frm.find('.param_MN_' + country);
	
	let menu_sort = frm.find('.menu_sort').val();
	let menu_idx = frm.find('.menu_idx').val();
	
	let menu_title = param_MN.find('.menu_title').val();
	let link_type = param_MN.find('.link_type').val();
	let link_idx = param_MN.find('.link_idx').val();
	let link_url = param_MN.find('.link_url').val();
	
	$.ajax({
		url: config.api + "display/menu/put",
		type: "post",
		data: {
			'country': country,
			'menu_sort': menu_sort,
			'menu_idx': menu_idx,
			'menu_title': menu_title,
			'link_type': link_type,
			'link_idx': link_idx,
			'link_url': link_url
		},
		dataType: "json",
		error: function() {
			alert('선택한 메뉴의 수정처리중 오류가 발생했습니다.');
		},
		success: function(d) {
			let code = d.code;
			if (code == 200) {
				getMenuInfoList(country);
				getMenuInfo(country,menu_sort,menu_idx);
				alert('선택한 메뉴 정보가 수정되었습니다.');
			}
		}
	});
}

function deleteMenuConfirm(country,menu_sort,menu_idx) {
	confirm('삭제 한 메뉴는 복구할 수 없습니다. 정말 삭제하시겠습니까?',
		function deleteMenu() {
			$.ajax({
				url: config.api + "display/menu/delete",
				type: "post",
				data: {
					'country': country,
					'menu_sort': menu_sort,
					'menu_idx': menu_idx
				},
				dataType: "json",
				error: function() {
					alert('선택한 메뉴의 삭제처리중 오류가 발생했습니다.');
				},
				success: function(d) {
					let code = d.code;
					if (code == 200) {
						getMenuInfoList(country);
						alert('선택한 메뉴가 삭제되었습니다.');
					}
				}
			});
		}
	);
}

function getMenuInfo(country,menu_sort,menu_idx) {
	let action = "put";
	
	let frm = $("#frm-put_" + country);
	let obj_div = $('.param_MN_' + country);
	frm.parent().show();
	
	$.ajax({
		url: config.api + "display/menu/get",
		type: "post",
		data: {
			'country': country,
			'menu_sort': menu_sort,
			'menu_idx': menu_idx
		},
		dataType: "json",
		error: function() {
			alert('메뉴 개별정보 조회처리중 오류가 발생했습니다.');
		},
		success: function(d) {
			let code = d.code;
			if (code == 200) {
				let data = d.data;
				if (data != null) {
					let result_table = frm.find('.param_MN_' + country).find('.result_table');
					
					data.forEach(function(menu_row) {
						frm.find('.menu_sort').val(menu_row.menu_sort);
						frm.find('.menu_idx').val(menu_row.menu_idx);
						obj_div.find('.menu_title').val(menu_row.menu_title);
						
						obj_div.find('.link_type').val(menu_row.link_type);
						obj_div.find('.link_idx').val(menu_row.link_idx);
						obj_div.find('.link_url').val(menu_row.link_url);
						
						let link_info = menu_row.link_info;
						if (menu_row.link_idx > 0 && link_info != null) {
							result_table.html('');
							
							let strDiv = "";
							strDiv += '<TR>';
							strDiv += '    <TD>' + link_info.posting_type + '</TD>';
							strDiv += '    <TD>' + link_info.page_title + '</TD>';
							strDiv += '    <TD>' + link_info.page_memo + '</TD>';
							strDiv += '    <TD>' + link_info.page_url + '</TD>';
							strDiv += '    <TD>' + link_info.display_status + '</TD>';
							strDiv += '    <TD>' + link_info.display_start_date + ' ~ ' + link_info.display_end_date + '</TD>';
							strDiv += '    <TD>' + link_info.page_view + '</TD>';
							strDiv += '    <TD>' + link_info.create_date + '</TD>';
							strDiv += '    <TD>' + link_info.creater + '</TD>';
							strDiv += '    <TD>' + link_info.update_date + '</TD>';
							strDiv += '    <TD>' + link_info.updater + '</TD>';
							strDiv += '</TR>';
							
							result_table.append(strDiv);
						}
						
						if (menu_sort == "L") {
							let menu_slide = menu_row.menu_slide;
							if (menu_slide != null) {
								getMenuSlideList(country,menu_slide);
							}
						} else {
							$('.content_menu_slide_' + country).hide();
						}
						
						let up_filter = menu_row.up_filter;
						if (up_filter != null) {
							getUpFilterList(country,up_filter);
						}
						
						let lw_filter = menu_row.lw_filter;
						if (lw_filter != null) {
							getLwFilterList(country,lw_filter);
						}
					});
				}
			}
		}
	});
}

function getMenuSlideList(country,menu_slide) {
	let frm = $("#frm-put_" + country);
	let slide_container = frm.find('.SL_container');
	slide_container.html('');
	
	let strDiv = "";
	strDiv += '<div class="menu_img_obj" onClick="resetMenuObj(\'' + country + '\',\'SL\');">';
	strDiv += '    <div class="obj_btn_wrap" style="display:flex;">';
	strDiv += '        <div class="delete_menu_obj">삭제</div>';
	strDiv += '        <div class="display_num"><</div>';
	strDiv += '        <div class="display_num">></div>';
	strDiv += '    </div>';
	strDiv += '    <div class="menu_obj_img" style="background-image:url(\'/images/default_thumbnail_img.jpg\');"></div>';
	strDiv += '    <p class="menu_obj_title">슬라이드 추가</p>';
	strDiv += '</div>';
	
	menu_slide.forEach(function(row) {
		let slide_idx = row.obj_idx;
		let link_type = row.link_type;
		let slide_title = row.obj_title;
		let img_location = row.img_location;
		let display_num = row.display_num;
		
		strDiv += '<div class="menu_img_obj menu_obj">';
		strDiv += '    <div class="obj_btn_wrap" style="display:flex;">';
		strDiv += '    <div class="delete_menu_obj" style="margin-bottom:0px;margin-right:10px;" onClick="deleteMenuObjConfirm(\'' + country + '\',\'SL\',' + slide_idx + ');">삭제</div>';
		strDiv += '        <div class="display_num" onClick="displayNumCheck(this);" country="' + country + '" recent_idx="' + slide_idx + '" recent_num="' + display_num + '" obj_type="SL" action_type="up"><</div>';
		strDiv += '        <div class="display_num" onClick="displayNumCheck(this);" country="' + country + '" recent_idx="' + slide_idx + '" recent_num="' + display_num + '" obj_type="SL" action_type="down">></div>';
		strDiv += '    </div>';
		
		let background_url = "background-image:url('" + img_location + "');";
		strDiv += '    <div class="menu_obj_img" style="' + background_url + '" onClick="getMenuObjInfo(\'' + country + '\',\'SL\',' + slide_idx + ');"></div>';
		strDiv += '    <p class="menu_obj_title">' + slide_title + '</p>';
		strDiv += '</div>';
	});
	
	slide_container.append(strDiv);
	
	$('.content_menu_slide_' + country).show();
}

function getUpFilterList(country,up_filter) {
	let frm = $("#frm-put_" + country);
	let up_filter_container = frm.find('.UP_container');
	up_filter_container.html('');
	
	let strDiv = "";
	strDiv += '<div class="menu_img_obj" onClick="resetMenuObj(\'' + country + '\',\'UP\');">';
	strDiv += '    <div class="obj_btn_wrap" style="display:flex;">';
	strDiv += '        <div class="delete_menu_obj">삭제</div>';
	strDiv += '        <div class="display_num"><</div>';
	strDiv += '        <div class="display_num">></div>';
	strDiv += '    </div>';
	strDiv += '    <div class="menu_obj_img" style="background-image:url(\'/images/default_thumbnail_img.jpg\');"></div>';
	strDiv += '    <p class="menu_obj_title">필터 추가</p>';
	strDiv += '</div>';
	
	up_filter.forEach(function(row) {
		let filter_idx = row.obj_idx;
		let filter_title = row.obj_title;
		let img_location = row.img_location;
		let display_num = row.display_num;
		
		strDiv += '<div class="menu_img_obj menu_obj">';
		strDiv += '    <div class="obj_btn_wrap" style="display:flex;">';
		strDiv += '    <div class="delete_menu_obj" style="margin-bottom:0px;margin-right:10px;" onClick="deleteMenuObjConfirm(\'' + country + '\',\'UP\',' + filter_idx + ');">삭제</div>';
		strDiv += '        <div class="display_num" onClick="displayNumCheck(this);" country="' + country + '" recent_idx="' + filter_idx + '" recent_num="' + display_num + '" obj_type="UP" action_type="up"><</div>';
		strDiv += '        <div class="display_num" onClick="displayNumCheck(this);" country="' + country + '" recent_idx="' + filter_idx + '" recent_num="' + display_num + '" obj_type="UP" action_type="down">></div>';
		strDiv += '    </div>';
		
		let background_url = "background-image:url('" + img_location + "');";
		strDiv += '    <div class="menu_obj_img" style="' + background_url + '" onClick="getMenuObjInfo(\'' + country + '\',\'UP\',' + filter_idx + ');"></div>';
		strDiv += '    <p class="menu_obj_title">' + filter_title + '</p>';
		strDiv += '</div>';
	});
	
	up_filter_container.append(strDiv);
}

function getLwFilterList(country,lw_filter) {
	let frm = $("#frm-put_" + country);
	let lw_filter_container = frm.find('.LW_container');
	lw_filter_container.html('');
	
	let strDiv = "";
	strDiv += '<div class="menu_txt_obj" onClick="resetMenuObj(\'' + country + '\',\'LW\');">';
	strDiv += '    <div class="obj_btn_wrap" style="display:flex;">';
	strDiv += '        <div class="delete_menu_obj">삭제</div>';
	strDiv += '        <div class="display_num"><</div>';
	strDiv += '        <div class="display_num">></div>';
	strDiv += '    </div>';
	strDiv += '    <p class="menu_obj_title" style="width:50%;margin-top:5px;cursor:pointer;">필터 추가</p>';
	strDiv += '</div>';
	
	lw_filter.forEach(function(row) {
		let filter_idx = row.obj_idx;
		let filter_title = row.obj_title;
		let display_num = row.display_num
		
		strDiv += '<div class="menu_txt_obj menu_obj">';
		strDiv += '    <div class="obj_btn_wrap" style="display:flex;">';
		strDiv += '    	<div class="delete_menu_obj" style="margin-bottom:0px;margin-right:10px;" onClick="deleteMenuObjConfirm(\'' + country + '\',\'LW\',' + filter_idx + ');">삭제</div>';
		strDiv += '        <div class="display_num" onClick="displayNumCheck(this);" country="' + country + '" recent_idx="' + filter_idx + '" recent_num="' + display_num + '" obj_type="LW" action_type="up"><</div>';
		strDiv += '        <div class="display_num" onClick="displayNumCheck(this);" country="' + country + '" recent_idx="' + filter_idx + '" recent_num="' + display_num + '" obj_type="LW" action_type="down">></div>';
		strDiv += '    </div>';
		strDiv += '    <p class="menu_obj_title" style="width:50%;margin-top:5px;cursor:pointer;" onClick="getMenuObjInfo(\'' + country + '\',\'LW\',' + filter_idx + ');">' + filter_title + '</p>';
		strDiv += '</div>';
	});
	
	lw_filter_container.append(strDiv);
}

function resetMenuObj(country,obj_type) {
	let obj_div = $('.param_' + obj_type + '_' + country);
	
	obj_div.find('.obj_idx').val(0);
	obj_div.find('.page_idx').val(0);
	obj_div.find('.obj_title').val('');
	
	$('#link_type_' + obj_type + '_' + country + '_PR').prop('checked',true);
	$('#link_type_' + obj_type + '_' + country + '_PO').prop('checked',false);
	obj_div.find('.img_location').val('');
	
	let strDiv = "";
	strDiv += '<TR>';
	strDiv += '    <TD class="default_td" colspan="12" style="text-align:left;">';
	strDiv += '        선택된 게시물이 없습니다. 게시물을 선택해주세요.';
	strDiv += '    </TD>';
	strDiv += '</TR>';
	
	let result_table = obj_div.find('.result_table');
	result_table.html('');
	result_table.append(strDiv);
	
	obj_div.show();
}

function checkMenuObjAction(country,obj_type) {
	let obj_div = $('.param_' + obj_type + '_' + country);
	let obj_idx = obj_div.find('.obj_idx').val();
	
	if (obj_idx > 0) {
		putMenuObj(country,obj_type);
	} else if (obj_idx == 0) {
		addMenuObj(country,obj_type);
	}
}

function addMenuObj(country,obj_type) {
	let frm = $('#frm-put_' + country);
	let obj_div = $('.param_' + obj_type + '_' + country);
	
	let action_name = getActionName(obj_type);
	
	let menu_sort = frm.find('.menu_sort').val();
	let menu_idx = frm.find('.menu_idx').val();
	
	let obj_title = obj_div.find('.obj_title').val();
	if (obj_title == "" || obj_title == null) {
		alert('추가하려는 ' + action_name + '의 타이틀을 입력해주세요.');
		return false;
	}
	
	let link_type = null;
	let img_location = null;
	if (obj_type != 'LW') {
		img_location = obj_div.find('.img_location').val();
		link_type = $('input:radio[name="link_type_' + obj_type + '_' + country + '"]:checked').val();
	} else {
		link_type = 'PR';
	}
	
	if (link_type == '' || link_type == null) {
		alert(action_name + '의 타입을 선택해주세요.');
		return false;
	}
	
	if (obj_type != 'LW' && img_location == null) {
		alert('추가하려는 ' + action_name + '의 이미지 경로를 입력해주세요.');
		return false;
	}
	
	let page_idx = obj_div.find('.page_idx').val();
	if (page_idx == 0) {
		alert(action_name + '에 연결하려는 게시물을 선택해주세요.');
		return false;
	}
	
	$.ajax({
		url: config.api + "display/menu/obj/add",
		type: "post",
		data: {
			'country': country,
			'obj_type': obj_type,
			'menu_sort': menu_sort,
			'menu_idx': menu_idx,
			'obj_title': obj_title,
			'link_type': link_type,
			'img_location': img_location,
			'page_idx': page_idx
		},
		dataType: "json",
		error: function() {
			alert('메뉴 ' + action_name + ' 추가처리중 오류가 발생했습니다.');
		},
		success: function(d) {
			let code = d.code;
			if (code == 200) {
				let data = d.data;
				if (data != null) {
					console.log(data);
					switch (obj_type) {
						case "SL" :
							getMenuSlideList(country,data);
							break;
						
						case "UP" :
							getUpFilterList(country,data);
							break;
						
						case "LW" :
							getLwFilterList(country,data);
							break;
					}
					
					obj_div.hide();
					alert('선택한 ' + action_name + '가 등록되었습니다.');
				}
			}
		}
	});
}

function putMenuObj(country,obj_type) {
	let frm = $('#frm-put_' + country);
	let obj_div = $('.param_' + obj_type + '_' + country);
	
	let action_name = getActionName(obj_type);
	
	let menu_sort = frm.find('.menu_sort').val();
	let menu_idx = frm.find('.menu_idx').val();
	let obj_idx = obj_div.find('.obj_idx').val();
	
	let obj_title = obj_div.find('.obj_title').val();
	if (obj_title == "" || obj_title == null) {
		alert('추가하려는 ' + action_name + '의 타이틀을 입력해주세요.');
		return false;
	}
	
	let link_type = obj_div.find('.link_type').val();
	
	let img_location = null;
	if (obj_type != 'LW') {
		img_location = obj_div.find('.img_location').val();
	}
	
	if (obj_type != 'LW' && img_location == null) {
		alert('추가하려는 ' + action_name + '의 이미지 경로를 입력해주세요.');
		return false;
	}
	
	let link_idx = obj_div.find('.link_idx').val();
	
	let link_url = obj_div.find('.link_url').val();
	if (link_url.length == 0 || link_url == null) {
		alert(action_name + '에 연결하려는 링크를 입력해주세요.');
		return false;
	}
	
	$.ajax({	
		url: config.api + "display/menu/obj/put",
		type: "post",
		data: {
			'obj_update_flg': true,
			'menu_sort': menu_sort,
			'menu_idx': menu_idx,
			'obj_type': obj_type,
			'obj_idx': obj_idx,
			'obj_title': obj_title,
			'link_type': link_type,
			'link_idx': link_idx,
			'link_url': link_url,
			'img_location': img_location
		},
		dataType: "json",
		error: function() {
			alert('메뉴 ' + action_name + ' 편집처리중 오류가 발생했습니다.');
		},
		success: function(d) {
			let code = d.code;
			if (code == 200) {
				let data = d.data;
				if (data != null) {
					switch (obj_type) {
						case "SL" :
							getMenuSlideList(country,data[0]);
							break;
						
						case "UP" :
							getUpFilterList(country,data[0]);
							break;
						
						case "LW" :
							getLwFilterList(country,data[0]);
							break;
					}
					
					obj_div.hide();
					alert('선택한 ' + action_name + '가 수정되었습니다.');
				}
			}
		}
	});
}

function displayNumCheck(obj) {
	let country = $(obj).attr('country');
	let obj_type = $(obj).attr('obj_type');
	let recent_idx = $(obj).attr('recent_idx');
	let recent_num = $(obj).attr('recent_num');
	let action_type = $(obj).attr('action_type');
	
	let frm = $("#frm-put_" + country);
	let menu_sort = frm.find('.menu_sort').val();
	let menu_idx = frm.find('.menu_idx').val();
	
	let obj_container = frm.find('.' + obj_type + '_container');
	let cnt = obj_container.find('.menu_obj').length;
	
	if (action_type == "up") {
		if (recent_num == 1) {
			alert('진열순서를 변경할 수 없습니다');
			return false;
		} else {
			updateDisplayNum(country,menu_sort,menu_idx,obj_type,recent_idx,recent_num,action_type);
		}
	} else if (action_type == "down") {
		if (recent_num == cnt) {
			alert('진열순서를 변경할 수 없습니다');
			return false;
		} else {
			updateDisplayNum(country,menu_sort,menu_idx,obj_type,recent_idx,recent_num,action_type);
		}
	}
}

function updateDisplayNum(country,menu_sort,menu_idx,obj_type,recent_idx,recent_num,action_type) {
	$.ajax({
		url: config.api + "display/menu/obj/put",
		type: "post",
		data: {
			'obj_display_flg': true,
			'country': country,
			'menu_sort': menu_sort,
			'menu_idx': menu_idx,
			'obj_type': obj_type,
			'recent_idx': recent_idx,
			'recent_num': recent_num,
			'action_type': action_type
		},
		dataType: "json",
		error: function() {
			alert('게시물 스토리 진열순서 변경처리중 오류가 발생했습니다.');
		},
		success: function(d) {
			let code = d.code;
			if (code == 200) {
				let data = d.data;
				if (data != null) {
					switch (obj_type) {
						case "SL" :
							getMenuSlideList(country,data[0]);
							break;
						
						case "UP" :
							getUpFilterList(country,data[0]);
							break;
						
						case "LW" :
							getLwFilterList(country,data[0]);
							break;
					}
				}
			} else {
				alert('진열순서 변경 처리에 실패했습니다. 변경하려는 게시물 스토리의 진열순서를 확인해주세요.');
			}
		}
	});
}

function deleteMenuObjConfirm(country,obj_type,obj_idx) {
	let action_name = getActionName(obj_type);
	
	confirm('삭제 한 ' + action_name + '는 복구할 수 없습니다. 정말 삭제하시겠습니까?',
		function deleteMenuObj() {
			let frm = $('#frm-put_' + country);
			let menu_sort = frm.find('.menu_sort').val();
			let menu_idx = frm.find('.menu_idx').val();
			
			$.ajax({
				url: config.api + "display/menu/obj/delete",
				type: "post",
				data: {
					'menu_sort': menu_sort,
					'menu_idx': menu_idx,
					'obj_type': obj_type,
					'obj_idx': obj_idx
				},
				dataType: "json",
				error: function() {
					alert('메뉴 ' + action_name + ' 삭제처리중 오류가 발생했습니다.');
				},
				success: function(d) {
					let code = d.code;
					if (code == 200) {
						let data = d.data;
						if (data != null) {
							switch (obj_type) {
								case "SL" :
									getMenuSlideList(country,data);
									break;
								
								case "UP" :
									getUpFilterList(country,data);
									break;
								
								case "LW" :
									getLwFilterList(country,data);
									break;
							}
							
						}
						alert('선택한 ' + action_name + '가 삭제되었습니다.');
					}
				}
			});
		}
	);
}

function getMenuObjInfo(country,obj_type,obj_idx) {
	let obj_div = $('.param_' + obj_type + '_' + country);
	let result_table = obj_div.find('.result_table');
	
	let action_name = getActionName(obj_type);
	
	$.ajax({
		url: config.api + "display/menu/obj/get",
		type: "post",
		data: {
			'country': country,
			'obj_type': obj_type,
			'obj_idx': obj_idx
		},
		dataType: "json",
		error: function() {
			alert('메뉴 ' + action_name + ' 조회처리중 오류가 발생했습니다.');
		},
		success: function(d) {
			let code = d.code;
			if (code == 200) {
				let data = d.data;
				
				if (data != null) {
					obj_div.find('.obj_idx').val(data.obj_idx);
					obj_div.find('.link_type').val(data.link_type);
					obj_div.find('.link_idx').val(data.link_idx);
					obj_div.find('.obj_title').val(data.obj_title);
					obj_div.find('.link_url').val(data.link_url);
					
					obj_div.find('.img_location').val(data.img_location);
					
					let link_info = data.link_info;
					if (data.link_idx > 0 && link_info != null) {
						result_table.html('');
						
						let strDiv = "";
						strDiv += '<TR>';
						strDiv += '    <TD>' + link_info.posting_type + '</TD>';
						strDiv += '    <TD>' + link_info.page_title + '</TD>';
						strDiv += '    <TD>' + link_info.page_memo + '</TD>';
						strDiv += '    <TD>' + link_info.page_url + '</TD>';
						strDiv += '    <TD>' + link_info.display_status + '</TD>';
						strDiv += '    <TD>' + link_info.display_start_date + ' ~ ' + link_info.display_end_date + '</TD>';
						strDiv += '    <TD>' + link_info.page_view + '</TD>';
						strDiv += '    <TD>' + link_info.create_date + '</TD>';
						strDiv += '    <TD>' + link_info.creater + '</TD>';
						strDiv += '    <TD>' + link_info.update_date + '</TD>';
						strDiv += '    <TD>' + link_info.updater + '</TD>';
						strDiv += '</TR>';
						
						result_table.append(strDiv);
					}
					
					obj_div.show();
				}
			}
		}
	});
}

function getMenuInfoList(country) {
	$.ajax({
		url: config.api + "display/menu/list/get",
		type: "post",
		data: {
			'country': country
		},
		dataType: "json",
		error: function() {
			alert('메뉴 리스트 조회처리중 오류가 발생했습니다.');
		},
		success: function(d) {
			let code = d.code;
			if (code == 200) {
				let data = d.data;
				let menu_lrg = data[0].menu_lrg;
				
				if (menu_lrg != null) {
					$('#menu_container_' + country).html('');
					
					let strDiv = "";
					menu_lrg.forEach(function(lrg_row) {
						strDiv += '<div class="menu__lrg">';
						strDiv += '    <div class="menu__contents">';
						strDiv += '        <div class="story__title" style="display:flex;">';
						strDiv += '            <p class="menu_lrg_title" onClick="getMenuInfo(\'' + country + '\',\'L\',' + lrg_row.menu_lrg_idx + ');">' + lrg_row.menu_title + '</p>';
						strDiv += '            <div class="add_menu_btn" onclick="addMenu(\'' + country + '\',\'L\',\'' + lrg_row.menu_type + '\',' + lrg_row.menu_lrg_idx + ');" style="margin-right:0px;">+</div>';
						strDiv += '        </div>';
						strDiv += '        <div class="menu__row">';
						
						strDiv += '            <div class="menu__mdl menu_lrg_' + lrg_row.menu_lrg_idx + '" style="">';
						let menu_mdl = lrg_row.menu_mdl;
						if (menu_mdl != null) {
							menu_mdl.forEach(function(mdl_row) {
								strDiv += '        <div class="story_list">';
								strDiv += '            <p class="menu_mdl_title" onClick="getMenuInfo(\'' + country + '\',\'M\',' + mdl_row.menu_mdl_idx + ');">' + mdl_row.menu_title + '</p>';
								
								strDiv += '            <div class="add_menu_btn" onclick="addMenu(\'' + country + '\',\'M\',\'' + mdl_row.menu_type + '\',' + mdl_row.menu_mdl_idx + ');">+</div>';
								
								strDiv += '            <div class="delete_menu_btn" onClick="deleteMenuConfirm(\'' + country + '\',\'M\',' + mdl_row.menu_mdl_idx + ');">-</div>';
								strDiv += '        </div>';
								strDiv += '        ';
								
								strDiv += '        <div class="menu__sml menu_mdl_' + mdl_row.menu_mdl_idx + '">';
								let menu_sml = mdl_row.menu_sml;
								if (menu_sml != null) {
									menu_sml.forEach(function(sml_row) {
										strDiv += '    <div class="story_list">';
										strDiv += '        <p class="row__font story_title" onClick="getMenuInfo(\'' + country + '\',\'S\',' + sml_row.menu_sml_idx + ');">' + sml_row.menu_title + '</p>';
										strDiv += '        <div class="delete_menu_btn" onClick="deleteMenuConfirm(\'' + country + '\',\'S\',' + sml_row.menu_sml_idx + ');">-</div>';
										strDiv += '    </div>';
									});
								}
								strDiv += '        </div>';
							});
						}
						strDiv += '            </div>';

						strDiv += '        </div>';
						strDiv += '    </div>';
						strDiv += '</div>';
					});
					
					$('#menu_container_' + country).append(strDiv);
				}
			}
		}
	});
}

function checkPageModal(country,obj_type) {
	let obj_div = $('.param_' + obj_type + '_' + country);
	
	let link_type = obj_div.find('input:radio[name="link_type_' + obj_type + '_' + country + '"]:checked').val();
	
	if (link_type == "PR") {
		modal('/product_get','param=put_' + obj_type + '_' + country);
	} else if (link_type == "PO") {
		modal('/posting_get','param=put_' + obj_type + '_' + country);
	} else if (link_type == "MN") {
		modal('/menu_get','param=put_' + obj_type + '_' + country);
	} else {
		alert('검색 할 게시물의 유형을을 선택해주세요.');
		return false;
	}
}

function getActionName(obj_type) {
	let action_name = "";
	switch (obj_type) {
		case "SL" :
		action_name = "메뉴 슬라이드";
			break;
		
		case "UP" :
			action_name = "상단 필터";
			break;
		
		case "LW" :
			action_name = "하단 필터";
			break;
	}
	
	return action_name;
}

function setModalPaging(obj) {
	var total_cnt = $(obj).parent().find('.total_cnt');
	var result_cnt = $(obj).parent().find('.result_cnt');
	
	$('.cnt_total').text(total_cnt.val());
	$('.cnt_result').text(result_cnt.val());
}
function saveMenu(country) {
	$.ajax({
		url: config.api + "display/menu/save/add",
		type: "post",
		data: {
			'country': country
		},
		dataType: "json",
		beforeSend: function(){
			loadingWithMask('/images/default/loading_img.gif');
		},
		error: function() {
			closeLoadingWithMask();
			alert('메뉴 리스트 저장처리중 오류가 발생했습니다.');
		},
		success: function(d) {
			let code = d.code;
			if (code == 200) {
				closeLoadingWithMask();
				alert('선택한 국가의 메뉴 리스트가 저장되었습니다.');
				getMenuInfoList(country);
			}
			else{
				closeLoadingWithMask();
				alert(d.msg);
			}
		}
	});
}

function copyMenu() {
	let country_from = $('#country_from').val();
	let country_to = $('#country_to').val();
	
	let from_name = getCountryName(country_from);
	let to_name = getCountryName(country_to);
	
	if (country_from == country_to) {
		alert('동일한 국가로 복사할 수 없습니다.');
		return false;
	}
	
	confirm(
		from_name + '메뉴를 ' + to_name + '로 복사하시겠습니까?<br/><br/>' + from_name + '의 메뉴정보 는 ' + to_name + '으로 복사되고,<br/><br/>' + to_name + ' 메뉴정보에 연결된 추천 검색어 키워드는 는 전부 삭제됩니다.',
		function() {
			$.ajax({
				type: "post",
				url: config.api + "display/menu/save/copy",
				data: {
					'country_from': country_from,
					'country_to': country_to
				},
				dataType: "json",
				beforeSend: function(){
					loadingWithMask('/images/default/loading_img.gif')
				},
				error: function() {
					closeLoadingWithMask();
					alert('메뉴 복사처리중 오류가 발생했습니다.');
				},
				success: function(d) {
					if (d.code == 200) {
						getMenuInfoList(country_to);
						closeLoadingWithMask();
						
						alert("메뉴가 복사되었습니다.");
					}
					else{
						closeLoadingWithMask();
						alert(d.msg);
					}
				}
			});
		}
	)
}

function getCountryName(param) {
	let country_name = "";
	switch (param) {
		case "KR" :
			country_name = "한국몰";
			break;
		
		case "EN" :
			country_name = "영문몰";
			break;
		
		case "CN" :
			country_name = "중문몰";
			break;
	}
	
	return country_name;
}

function loadingWithMask(gif) {
	var maskHeight = $(document).height();
	var maskWidth  = window.document.body.clientWidth;
	var top = 0;
	var left = 0;

	top = ( $(window).height()) / 2 + $(window).scrollTop();
	left = ( $(window).width()) / 2 + $(window).scrollLeft();

	//화면에 출력할 마스크를 설정해줍니다.
	var mask = "<div id='mask_loading' style='position:absolute; z-index:9000; background-color:#000000; display:none; left:0; top:0;'></div>";
	
	let strDiv = "";
	strDiv += '<div id="loading_img">';
	strDiv += '    <img src="' + gif + '" style="width:75px; height:75px;"/>';
	strDiv += '</div>';

	$('body').append(mask);
	$('body').append(strDiv);
	
	$('#loading_img').css('top',top);
	$('#loading_img').css('left',left);

	$('#mask_loading').css({'width':maskWidth,'height':maskHeight,'opacity':'0.5'}); 

	$('#mask_loading').show();
	$('#loading_img').show();
}

function closeLoadingWithMask() {
    $('#mask_loading,#loading_img').hide();
    $('#mask_loading,#loading_img').remove();  
}
</script>