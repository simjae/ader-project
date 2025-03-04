<link rel="stylesheet" href="/css/story/editorial.css">
<link rel=stylesheet href='/css/module/styling.css' type='text/css'>

<?php
	function getUrlParamter($url, $sch_tag) {
		$parts = parse_url($url);
		parse_str($parts['query'], $query);
		return $query[$sch_tag];
	}
	
	$page_url = $_SERVER['REQUEST_URI'];
	
	$page_idx = getUrlParamter($page_url, 'page_idx');
	$size_type = getUrlParamter($page_url, 'size_type');
	
	$editorial_info = array();
	$product_info = array();
	
	if ($page_idx > 0 && $size_type != null) {
		$select_thumb_sql = "
				SELECT
					ET.IDX				AS THUMB_IDX,
					ET.THUMB_TYPE		AS THUMB_TYPE,
					REPLACE(
						ET.THUMB_LOCATION,
						'/var/www/admin/www/',
						''
					)				AS IMG_LOCATION
				FROM
					EDITORIAL_THUMB ET
				WHERE
					ET.PAGE_IDX = " . $page_idx . " AND
					ET.SIZE_TYPE = '" . $size_type . "' AND
					ET.DEL_FLG = FALSE
				ORDER BY
					ET.DISPLAY_NUM ASC
		";

		$db->query($select_thumb_sql);
		
		foreach ($db->fetch() as $thumb_data) {
			$thumb_idx = $thumb_data['THUMB_IDX'];

			$contents_info = array();
			if (!empty($thumb_idx)) {
				$select_contents_sql = "
						SELECT
							EC.IDX				AS CONTENTS_IDX,
							EC.CONTENTS_TYPE	AS CONTENTS_TYPE,
							REPLACE(
								EC.CONTENTS_LOCATION,
								'/var/www/admin/www/',
								''
							)					AS CONTENTS_URL
						FROM
							EDITORIAL_CONTENTS EC
						WHERE
							EC.THUMB_IDX = " . $thumb_idx . " AND
							SIZE_TYPE = '" . $size_type . "'
					";

				$db->query($select_contents_sql);

				foreach ($db->fetch() as $contents_data) {
					$contents_info[] = array(
						'contents_idx' => $contents_data['CONTENTS_IDX'],
						'contents_type' => $contents_data['CONTENTS_TYPE'],
						'contents_url' => $contents_data['CONTENTS_URL'],
					);
				}
			}

			$editorial_info[] = array(
				'editorial_idx' => $thumb_idx,
				'thumb_type' => $thumb_data['THUMB_TYPE'],
				'img_location' => $thumb_data['IMG_LOCATION'],
				'contents_info' => $contents_info
			);
		}
		
		$select_editorial_product_sql = "
			SELECT
				EP.PRODUCT_IDX		AS PRODUCT_IDX
			FROM
				EDITORIAL_PRODUCT EP
			WHERE
				EP.PAGE_IDX = ".$page_idx."
		";
		
		$db->query($select_editorial_product_sql);
		
		foreach($db->fetch() as $product_data) {
			$product_info[] = $product_data['PRODUCT_IDX'];
		}
?>

<main>
	<input type="hidden" id="page_idx" value="<?=$page_idx?>">
    <input type="hidden" id="size_type" value="<?=$size_type?>">
	
    <section class="editorial-detail-wrap">
        <div class="back-btn web" onclick="location.href='/posting/editorial'"><img src="/images/svg/arrow-back.svg" alt=""></div>
		
        <article class="controller-swiper-wrap">
            <div class="editorial-controller-swiper swiper">
                <div class="swiper-wrapper">  
				<?php
					foreach ($editorial_info as $result_data) {
				?>
                    <div class="swiper-slide">
                        <img src="http://116.124.128.246:81/<?=$result_data['img_location'] ?>" alt="">
                    </div>
				<?php
					}
				?>  
                </div>
            </div>

        </article>
		
        <article class="preview-swiper-wrap">
            <div class="lock-wrap">
                <div class="editorial-preview-swiper swiper">
                    <div class="swiper-wrapper">
					<?php
						foreach ($editorial_info as $result_data) {
					?>            
						<div class="swiper-slide">       
					<?php
							if ($result_data['contents_info'][0]['contents_type'] == 'VID') {
					?>
					<figure class="vplayer">
						<video controls="" autoplay="" muted="" loop="" src="http://116.124.128.246:81/<?= $result_data['contents_info'][0]['contents_url'] ?>"></video>
					</figure>
					<?php
							} else {
					?>
						<img src="http://116.124.128.246:81/<?= $result_data['contents_info'][0]['contents_url'] ?>" alt="">
					<?php
							}
					?>  
					</div>
					<?php
						}
					}
					?>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </article>
		
        <article class="editorial-content-wrap">
            <h5 class="editorial-contet-title">2022 F/W 'Phenomenon Communication'</h5>
            <p class="editorial-contet-subtitle">
                The TENIT line draws a new way of<br>
                garment experiences which consisted of<br>
                handbag, outerwear, knitwear and deformed silhouettes<br>
                based on the brand signature tetris pattern
            </p>
        </article>
    </section>
    <section class="styling-with-wrap"></section>
</main>

<script src="/scripts/story/editorial.js"></script>

<script>
let vctrbox  = new Vctrbox(".vplayer");

let main = document.querySelector("main");
let country = getLanguage();

let editorial_product = "<?=implode(",",$product_info)?>";
if (editorial_product.length > 0) {
	const styling = new StylingRender(editorial_product);
}
</script> 