<style>
    select:focus {
        outline: none;
    }

    input:focus {
        outline: none;
    }

    textarea:focus {
        outline: none;
    }

    input {
        padding-left: 10px;
        font-size: 11px;
        font-family: var(--ft-no-fu);
        width: 100%;
        height: 40px;
        margin-top: 10px;
        border-radius: 1px;
        border: solid 1px #808080;
    }

    [type="radio"] {
        vertical-align: middle;
        appearance: none;
        border: 1px solid gray;
        width: 10px;
        height: 10px;
        margin: 0px;
        padding: 0px;
    }

    [type="radio"]:checked {
        background-color: #000000;
    }

    [type="checkbox"] {
        vertical-align: middle;
        appearance: none;
        border: 1px solid gray;
        width: 10px;
        height: 10px;
        margin: 0px;
        padding: 0px;
    }

    [type="checkbox"]:checked {
        background-color: #000000;
    }

    label {
        padding-right: 30px;
        vertical-align: middle;
    }

    label p,
    label span {
        font-size: 11px;
        font-family: var(--ft-no-fu);
        font-weight: normal;
        font-stretch: normal;
        font-style: normal;
        line-height: normal;
        letter-spacing: normal;
        text-align: left;
        color: #343434;
    }

    textarea {
        padding-left: 10px;
        font-size: 11px;
        font-family: var(--ft-no-fu);
        width: 100%;
        margin-top: 10px;
        border-radius: 1px;
        border: solid 1px #808080;
    }

    select {
        width: 100%;
        padding-left: 10px;
        font-size: 11px;
        font-family: var(--ft-no-fu);
        height: 40px;
        margin-top: 10px;
        border-radius: 1px;
        border: solid 1px #808080;
    }

    input::placeholder {
        color: #dcdcdc;
    }

    .tab__btn__item img {
        height: 24px;
    }

    .description p {
        margin-bottom: 10px;
        font-size: 11px;
        font-family: var(--ft-no-fu);
        font-weight: normal;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.65;
        letter-spacing: normal;
        text-align: left;
        color: #343434;
        text-indent: -6px;
        word-break: break-all;
    }

    .mypage__wrap p,
    .mypage__wrap span {
        font-family: var(--ft-no-fu);
        font-size: 11px;
        font-weight: normal;
        font-stretch: normal;
        font-style: normal;
        line-height: normal;
        letter-spacing: normal;
        text-align: left;
        color: #343434;
        margin-bottom: 10px;
    }

    .title p,
    .title span {
        font-size: 13px;
        line-height: 1.15;
        margin-bottom: 10px;
    }

    .mypage__wrap {
        width: 100%;
    }

    /* mypage-foryou */
    .recommend-wrap {
        margin-bottom: 70px;
    }

    /* .recommend-wrap .foryou-wrap .product-info .color-title {
        margin-bottom: 5px;
    } */

    .recommend-wrap .foryou-wrap {
        display: flex;
        flex-direction: column;
        margin-bottom: 75px;
    }

    .recommend-wrap .foryou-wrap .left__title {
        padding: 0px 10px 20px;
        grid-column: 1/2;
        border: none;
    }

    .recommend-wrap .foryou-wrap .left__title span {
        font-size: 13px;
        text-decoration: none;
    }

    .recommend-wrap .foryou-wrap .foryou-swiper .product .product-info .color__box {
        height: 15px;
        overflow: hidden;
        gap: 10px;
        padding-top: 7px;
    }

    .recommend-wrap .foryou-wrap .product .product-info .info-row .price {
        font-size: 11px;
    }

    .recommend-wrap .size__box li[data-soldout="STSO"]::after {
        top: -2px;
    }

    .recommend-wrap .product .product-info .info-row .color__box[data-maxcount="over"]::after {
        display: none;
    }

    .recommend-wrap .foryou-wrap .product .product-info .info-row .color__box .color[data-soldout="STSO"]::after {
        right: -2px;
        top: -3px;
    }

    .icon__item {
        cursor: pointer
    }

    .icon__item .icon {
        /* margin: 0 15px; */
        margin: 0 auto;
        background-image: url("data:image/svg+xml,%3Csvg id='구성_요소_152_1' data-name='구성 요소 152 – 1' xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 50 50'%3E%3Cdefs%3E%3Cstyle%3E .cls-1, .cls-3 %7B fill: none; %7D .cls-1 %7B stroke: %23dcdcdc; %7D .cls-2 %7B stroke: none; %7D %3C/style%3E%3C/defs%3E%3Cg id='타원_85' data-name='타원 85' class='cls-1'%3E%3Ccircle class='cls-2' cx='25' cy='25' r='25'/%3E%3Ccircle class='cls-3' cx='25' cy='25' r='24.5'/%3E%3C/g%3E%3C/svg%3E%0A");
        width: 50px;
        height: 50px;
    }

    /* .icon__item .icon {
        margin: 0 auto;
        background-image: url("data:image/svg+xml,%3Csvg id='구성_요소_156_1' data-name='구성 요소 156 – 1' xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 50 50'%3E%3Cdefs%3E%3Cstyle%3E .cls-1, .cls-3 %7B fill: none; %7D .cls-1 %7B stroke: %23343434; %7D .cls-2 %7B stroke: none; %7D %3C/style%3E%3C/defs%3E%3Cg id='타원_82' data-name='타원 82' class='cls-1'%3E%3Ccircle class='cls-2' cx='25' cy='25' r='25'/%3E%3Ccircle class='cls-3' cx='25' cy='25' r='24.5'/%3E%3C/g%3E%3C/svg%3E%0A");
        width: 50px;
        height: 50px;
    } */
    /* .icon__item:hover .icon {
        margin: 0 15px;
        background-image: url("data:image/svg+xml,%3Csvg id='구성_요소_156_1' data-name='구성 요소 156 – 1' xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 50 50'%3E%3Cdefs%3E%3Cstyle%3E .cls-1, .cls-3 %7B fill: none; %7D .cls-1 %7B stroke: %23343434; %7D .cls-2 %7B stroke: none; %7D %3C/style%3E%3C/defs%3E%3Cg id='타원_82' data-name='타원 82' class='cls-1'%3E%3Ccircle class='cls-2' cx='25' cy='25' r='25'/%3E%3Ccircle class='cls-3' cx='25' cy='25' r='24.5'/%3E%3C/g%3E%3C/svg%3E%0A");
        width: 50px;
        height: 50px;
    } */

    .icon__item:hover .icon__title {
        text-decoration: underline;
        text-underline-position: under;
        text-decoration-color: #343434;
    }

    .icon__title {
        margin-top: 10px;
        height: 19px;
    }

    .icon__title p {
        font-size: 13px;
        text-align: center;
        line-height: 15px;
        line-height: 1.15;
        letter-spacing: -1.3px;
    }

    .click__icon__item .icon {
        margin: 0 auto;
        background-image: url("data:image/svg+xml,%3Csvg id='구성_요소_156_1' data-name='구성 요소 156 – 1' xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 50 50'%3E%3Cdefs%3E%3Cstyle%3E .cls-1, .cls-3 %7B fill: none; %7D .cls-1 %7B stroke: %23343434; %7D .cls-2 %7B stroke: none; %7D %3C/style%3E%3C/defs%3E%3Cg id='타원_82' data-name='타원 82' class='cls-1'%3E%3Ccircle class='cls-2' cx='25' cy='25' r='25'/%3E%3Ccircle class='cls-3' cx='25' cy='25' r='24.5'/%3E%3C/g%3E%3C/svg%3E%0A");
        width: 50px;
        height: 50px;
    }

    .click__icon__item .icon__title {
        text-decoration: underline;
        text-underline-position: under;
        text-decoration-color: #343434;
    }

    .member__contents {
        margin: 0 auto;
        background-image: url("data:image/svg+xml,%3Csvg id='구성_요소_156_1' data-name='구성 요소 156 – 1' xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 50 50'%3E%3Cdefs%3E%3Cstyle%3E .cls-1, .cls-3 %7B fill: none; %7D .cls-1 %7B stroke: %23343434; %7D .cls-2 %7B stroke: none; %7D %3C/style%3E%3C/defs%3E%3Cg id='타원_82' data-name='타원 82' class='cls-1'%3E%3Ccircle class='cls-2' cx='25' cy='25' r='25'/%3E%3Ccircle class='cls-3' cx='25' cy='25' r='24.5'/%3E%3C/g%3E%3C/svg%3E%0A");
        width: 50px;
        height: 50px;
        margin: 0 auto;
    }

    .mypage__container {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(16, 1fr);
    }

    .mypage__items.profile {
        grid-column: 1/17;
        width: 100%;
        margin: 0 auto;
        margin-top: 40px;
    }

    .btn__items {
        grid-column: 1/17;
        padding-top: 40px;
        display: grid;
        place-items: center;
        grid-template-columns: repeat(13, 80px);
        margin: 0 auto;
    }

    .profile_info {
        grid-column: 1/17;
        display: grid;
        place-items: center;
        grid-template-columns: repeat(3, auto);
        margin: 0 auto;
        margin-top: 30px;
        padding-right: 25px;
    }

    .mypage__tab__container {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(16, 1fr);
    }

    .menu__tab {
        grid-column: 1/17;
        width: 100%;
        display: block;
        margin: 0 auto;
    }

    .point__item {
        padding: 0 29.5px;
    }

    .profile__member__name {
        margin-top: 9px;
        height: 16px;
        font-family: var(--ft-no-fu);
        font-size: 11px;
    }

    .profile__member__name p {
        text-align: center;
    }

    .profile__member__id {
        margin-top: 6px;
        height: 14px;
        font-family: var(--ft-no-fu);
        font-size: 13px;
    }

    .profile__member__id p {
        text-align: center;
    }

    .profile__member__point {
        margin: 0 auto;
        margin-top: 33px;
        margin-bottom: 50px;
        width: 250px;
        display: grid;
        place-items: center;
        grid-template-columns: 81px 110px 60px;
        height: 32px;
        font-family: var(--ft-no-fu);
    }

    .point__title {
        text-align: center;
        font-size: 11px;
        font-family: var(--ft-no-fu);
        width: auto;
    }

    .icon__title.underline {
        text-decoration: underline;
        text-underline-position: under;
        text-decoration-color: #343434;
    }

    .point__value {
        text-decoration: underline;
        text-align: center;
        font-size: 13px;
        font-family: var(--ft-no-fu);
        width: auto;
    }

    .point__item {
        border-right: 1px solid;
        border-color: #dcdcdc;
    }

    .non__display__tab {
        display: none;
    }

    .contents__table {
        margin-top: 12.5px;
        border-top: 1px solid #dcdcdc;
        border-bottom: 1px solid #dcdcdc;
    }

    .contents__table p {
        font-family: var(--ft-no-fu);
        font-size: 11px;
        font-weight: normal;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.36;
        letter-spacing: normal;
        color: #343434;
        margin-bottom: 10px;
    }

    .non__usable__info {
        opacity: 0.5;
    }

    .footer p {
        margin-bottom: 10px;
    }

    .non__border {
        border: none !important;
    }

    .contents__info {
        display: flex;
    }

    .contents__info .info span {
        font-family: var(--ft-no-fu);
        font-size: 13px;
    }

    .contents__table .vertical__top {
        vertical-align: top;
    }

    .height__10px__blank {
        height: 10px;
    }

    td {
        padding-top: 10px;
        padding-bottom: 10px;
        padding-right: 10px;
    }

    td p {
        margin-bottom: 10px;
        height: 12px;
    }

    .black__full__width__btn {
        width: 100%;
        height: 40px;
        background-color: #191919;
        color: #ffffff;
        text-align: center;
        border-radius: 1px;
        font-size: 11px;
    }

    .white__full__width__btn {
        width: 100%;
        height: 40px;
        background-color: #ffffff;
        color: #343434;
        text-align: center;
        border-radius: 1px;
        border: solid 1px #dcdcdc;
        font-size: 11px;
    }

    .gray__mypage__btn {
        width: 100%;
        height: 40px;
        background-color: #dcdcdc;
        color: #343434;
        text-align: center;
        border-radius: 1px;
        border: solid 1px #dcdcdc;
        font-size: 11px;
    }

    .next__line__exist {
        margin-bottom: 0px !important;
    }

    .detail__btn {
        margin-left: auto;
    }

    .detail__btn span {
        font-size: 11px;
        font-family: var(--ft-no-fu);
        text-decoration: underline;
    }

    .toggle__list {
        width: 710px;
        float: right;
    }

    .float__none {
        float: none !important;
    }

    .toggle__list span {
        font-family: var(--ft-no-fu);
        font-size: 11px;
        font-weight: normal;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.36;
        letter-spacing: normal;
        text-align: left;
        color: #343434;
    }

    .toggle__list .category__title {
        margin-bottom: 10px;
    }

    .toggle__list .question {
        margin-bottom: 20px;
    }

    .toggle__list .request {
        margin-bottom: 20px;
    }

    .toggle__item {
        border-bottom: 1px solid #dcdcdc;
        margin-bottom: 20px;
    }

    .foryou-wrap .swiper-grid {
        grid-column: 1/17;
    }

    .foryou__wrapper .title {
        font-family: var(--ft-no-fu);
        font-size: 13px;
        margin-left: 10px;
        margin-bottom: 20px;
    }

    .swiper.tab__btn {
        grid-column: 1/17;
        width: calc(100% - 20px);
        height: 24px;
        overflow: hidden;
    }

    .swiper.tab__btn .swiper-slide {
        width: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        list-style: none;
        height: 24px;
        cursor: pointer;
        font-size: 11px;
        color: #343434;
        opacity: 0.5;
    }

    .swiper.tab__btn .swiper-slide.selected {
        border: 1px solid #808080;
        color: #343434;
        opacity: 1;
    }

    .swiper.icon {
        margin-top: 30px;
        margin-right: 15px;
    }

    .swiper.icon .swiper-slide {
        width: 70px !important;
        margin-right: 10px;
    }

    .swiper.icon {
        width: calc(100% - 20px);
        overflow: hidden;
    }

    .swiper-autoheight .swiper-wrapper {
        margin-left: 10px;
    }

    .mypage__paging {
        margin-top: 30px;
    }

    .mypage--paging {
        margin: 0 auto;
        width: 110px;
        display: flex;
        justify-content: center;
    }

    .tab__btn__item {
        display: flex;
        justify-content: center;
        align-items: center;
        list-style: none;
        height: 24px;
        cursor: pointer;
        font-size: 11px;
        color: #343434;
        opacity: 0.5;
    }

    .tab__btn__item.selected {
        border: 1px solid #808080;
        color: #343434;
        opacity: 1;
    }

    .mypage--paging .page {
        width: 30px;
        text-align: center;
    }

    .mypage--paging .page.prev {
        width: 10px;
    }

    .mypage--paging .page.next {
        width: 10px;
    }

    .mypage .product .wish__btn {
        display: flex;
        justify-content: center;
        align-items: center;
        float: right;
        width: 60px;
        height: 55px;
    }

    .mypage .product .wish__btn img {
        width: 15px !important;
        height: 12.5px;
    }

    .swiper-autoheight,
    .swiper-autoheight .swiper-slide {
        display: grid;
        place-items: center;
    }

    .swiper-slide.tab__btn__item {
        padding: 0 7px 0 7px
    }

    .flex_text {
        display: flex;
    }

    .long_text p {
        text-indent: 0;
        margin-left: -6px;
    }

    /* 충전포인트 숨기기 */
    #charging_icon {
        display: none;
    }

    @media (min-width: 1250px) {
        .swiper.icon {
            display: none;
        }
    }

    @media (max-width: 1250px) {
        .mypage__items.btn__items {
            display: none;
        }
    }

    @media (min-width: 1024px) {
        .pc__view {
            display: block
        }

        .mobile__view {
            display: none
        }
    }

    @media (max-width: 1024px) {

        .mypage .product .product-info .info-row .price[data-dis="true"]::before {
            margin-top: 3px;
        }

        .mypage__items.profile {
            grid-column: 1/9;
            margin-top: 20px;
        }

        .mypage__container {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(8, 1fr);
        }

        .profile_info {
            grid-column: 1/9;
            display: grid;
            place-items: center;
            grid-template-columns: repeat(3, auto);
            margin: 0 auto;
            margin-top: 20px;
        }

        .mypage__tab__container {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            padding: 0 10px;
        }

        .menu__tab {
            grid-column: 1/9;
            width: calc(100% - 20px);
            display: block;
            margin: 0 auto;
            margin-left: 10px;
            margin-right: 10px;
        }

        .non__display__tab {
            display: none;
        }

        .pc__view {
            display: none
        }

        .mobile__view {
            display: block
        }

        .mobile__view table {
            width: 100%;
        }

        .mypage .foryou-wrap .foryou-swiper .product .product-info .color__box {
            margin-bottom: 6px;
        }

        .point__item {
            padding: 0 19.5px;
        }

        .icon__item .icon {
            margin: 0 0px;
        }

        /* .icon__item .icon,
        .icon__item:hover .icon {
            margin: 0 0px;
        } */

        .recommend-wrap {
            margin-bottom: 60px;
        }

        .recommend-wrap .foryou-wrap .product .name span {
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            display: block;
        }

        .recommend-wrap .foryou-wrap .foryou-swiper .product .product-info .color__box {
            height: 8px;
            overflow: visible;
            bottom: -4px;
            gap: 5px;
        }

        .recommend-wrap .foryou-wrap .product-info .color-title {
            margin-bottom: 0;
        }

        .recommend-wrap .foryou-wrap .product .color-title {
            height: 0;
        }

        .recommend-wrap .foryou-wrap .product .product-info .info-row .color__box[data-maxcount="over"]::after {
            height: 13px;
        }

        .recommend-wrap .foryou-wrap .product .product-info .info-row .price {
            font-size: 9px;
        }
    }
</style>
<?php
if (!isset($_SESSION['MEMBER_IDX'])) {
    echo "
                <script>
                    location.href = '/login';
                </script>
		";
}
function getUrlParamter($url, $sch_tag)
{
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    return $query[$sch_tag];
}
$page_url = $_SERVER['REQUEST_URI'];
$mypage_type = getUrlParamter($page_url, 'mypage_type');
?>
<link rel="stylesheet" href="/css/module/foryou.css">
<link rel="stylesheet" href="/css/module/wishlist.css">
<main>
    <input type="hidden" id="mypage_type" value="<?= $mypage_type ?>">
    <div class="mypage__wrap">
        <div class="mypage__container">
            <div class="mypage__items profile">
                <div class="member__contents">
                    <img src="/images/mypage/mypage_member_icon.svg" style="padding-top:8px;padding-left:6px;">
                </div>
                <div class="profile__member__name">
                    <p id="mypage_member_name"></p>
                </div>
                <div class="profile__member__id">
                    <p id="mypage_member_id"></p>
                </div>
            </div>
            <div class="mypage__items profile_info">
                <div class="point__item" style="cursor:pointer" info-type="orderlist" onclick="memberInfoClick(this)">
                    <div class="point__title" data-i18n="m_order_cnt">진행중 주문</div>
                    <div class="point__value" id="order_value"></div>
                </div>
                <div class="point__item" style="cursor:pointer" info-type="mileage" onclick="memberInfoClick(this)">
                    <div class="point__title" data-i18n="m_mileage">적립금</div>
                    <div class="point__value" id="mileage_value"></div>
                </div>
                <div class="point__item" style="cursor:pointer" info-type="voucher" onclick="memberInfoClick(this)">
                    <div class="point__title" data-i18n="m_voucher">바우처</div>
                    <div class="point__value" id="voucher_cnt"></div>
                </div>
            </div>
            <div class="mypage__items btn__items">
                <div class="click__icon__item icon__item" btn-type="home" onclick="mypageTabBtnClick('home', 0)">
                    <div class="icon">
                        <img src="/images/mypage/mypage_home_icon.svg" style="padding-top:17.5px;padding-left:16.5px;">
                    </div>
                    <div class="icon__title">
                        <p data-i18n="m_my-page">마이페이지 홈</p>
                    </div>
                </div>
                <div id="orderlist_icon" class="icon__item" btn-type="orderlist" onclick="mypageTabBtnClick('orderlist',0)">
                    <div class="icon">
                        <img src="/images/mypage/mypage_orderlist_icon.svg" style="padding-top:15px;padding-left:17px;">
                    </div>
                    <div class="icon__title">
                        <p data-i18n="m_order_history">주문내역</p>
                    </div>
                </div>
                <div id="mileage_icon" class="icon__item" btn-type="mileage" onclick="mypageTabBtnClick('mileage',0)">
                    <div class="icon">
                        <img src="/images/mypage/mypage_point_icon.svg" style="padding-top:17px;padding-left:17px;">
                    </div>
                    <div class="icon__title">
                        <p data-i18n="m_mileage_charging">적립금</p>
                    </div>
                </div>
                <div id="charging_icon" class="icon__item" btn-type="charging" onclick="">
                    <div class="icon">
                        <img src="/images/mypage/mypage_charging_point_icon.png"
                            style="width:18px;height:34px;padding-top:16px;margin-left:16px;">
                    </div>
                    <div class="icon__title">
                        <p data-i18n="m_prepaid_mileage">예치금</p>
                    </div>
                </div>
                <div id="voucher_icon" class="icon__item" btn-type="voucher" onclick="mypageTabBtnClick('voucher',0)">
                    <div class="icon">
                        <img src="/images/mypage/mypage_voucher_icon.svg" style="padding-top:19px;padding-left:14px;">
                    </div>
                    <div class="icon__title">
                        <p data-i18n="m_voucher">바우처</p>
                    </div>
                </div>
                <div class="icon__item" btn-type="bluemark" onclick="mypageTabBtnClick('bluemark',0)">
                    <div class="icon">
                        <img src="/images/mypage/mypage_bluemark_icon.svg" style="padding-top:21px;padding-left:21px;">
                    </div>
                    <div class="icon__title">
                        <p data-i18n="m_blue_mark">블루마크</p>
                    </div>
                </div>
                <div class="icon__item" btn-type="stanby" onclick="mypageTabBtnClick('stanby',0)">
                    <div class="icon">
                        <img src="/images/mypage/mypage_stanby_icon.svg" style="padding-top:13px;padding-left:11px;">
                    </div>
                    <div class="icon__title">
                        <p data-i18n="m_standby">스탠바이</p>
                    </div>
                </div>
                <div class="icon__item" btn-type="preorder" onclick="mypageTabBtnClick('preorder',0)">
                    <div class="icon">
                        <img src="/images/mypage/mypage_preorder_icon.svg" style="padding-top:14px;padding-left:16px;">
                    </div>
                    <div class="icon__title">
                        <p data-i18n="m_preorder">프리오더</p>
                    </div>
                </div>
                <div class="icon__item" btn-type="reorder" onclick="mypageTabBtnClick('reorder',0)">
                    <div class="icon">
                        <img src="/images/mypage/mypage_reorder_icon.svg" style="padding-top:14px;padding-left:17px;">
                    </div>
                    <div class="icon__title">
                        <p data-i18n="m_notify_me">재입고알림</p>
                    </div>
                </div>
                <!-- <div class="icon__item" btn-type="draw" onclick="mypageTabBtnClick('draw',0)">
                    <div class="icon">
                        <img src="/images/mypage/mypage_draw_icon.svg" style="padding-top:12px;padding-left:16px;">
                    </div>
                    <div class="icon__title">
                        <p data-i18n="m_draw">드로우</p>
                    </div>
                </div> -->
                <div class="icon__item" btn-type="membership" onclick="mypageTabBtnClick('membership',0)">
                    <div class="icon">
                        <img src="/images/mypage/mypage_membership_icon.svg"
                            style="padding-top:18px;padding-left:15px;">
                    </div>
                    <div class="icon__title">
                        <p data-i18n="m_membership">멤버십</p>
                    </div>
                </div>
                <div class="icon__item" btn-type="inquiry" onclick="mypageTabBtnClick('inquiry',0)">
                    <div class="icon">
                        <img src="/images/mypage/mypage_inquiry_icon.svg" style="padding-top:18px;padding-left:15px;">
                    </div>
                    <div class="icon__title">
                        <p data-i18n="m_inquiry">문의</p>
                    </div>
                </div>
                <div class="icon__item" btn-type="as" onclick="mypageTabBtnClick('as',0)">
                    <div class="icon">
                        <img src="/images/mypage/mypage_as_icon.svg" style="padding-top:13px;padding-left:15px;">
                    </div>
                    <div class="icon__title">
                        <p>A/S</p>
                    </div>
                </div>
                <div class="icon__item" btn-type="service" onclick="mypageTabBtnClick('service',0)">
                    <div class="icon">
                        <img src="/images/mypage/mypage_service_icon.svg" style="padding-top:12px;padding-left:12px;">
                    </div>
                    <div class="icon__title">
                        <p data-i18n="m_customer_care">고객서비스</p>
                    </div>
                </div>
                <div class="icon__item" btn-type="profile" onclick="mypageTabBtnClick('profile',0)">
                    <div class="icon" style="width:50px;height:50px;">
                        <img src="/images/mypage/mypage_profile_icon.svg" style="padding-top:15px;padding-left:13px;">
                    </div>
                    <div class="icon__title">
                        <p data-i18n="m_account">회원정보</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper icon">
        <div class="swiper-wrapper">
            <div class="swiper-slide icon__item click__icon__item" btn-type="home"
                onclick="mypageTabBtnClick('home',0)">
                <div class="icon">
                    <img src="/images/mypage/mypage_home_icon.svg" style="padding-top:17.5px;padding-left:16.5px;">
                </div>
                <div class="icon__title">
                    <p data-i18n="m_my-page">마이페이지 홈</p>
                </div>
            </div>
            <div class="swiper-slide icon__item" btn-type="orderlist" onclick="mypageTabBtnClick('orderlist',0)">
                <div class="icon">
                    <img src="/images/mypage/mypage_orderlist_icon.svg" style="padding-top:15px;padding-left:17px;">
                </div>
                <div class="icon__title">
                    <p data-i18n="m_order_history">주문조회</p>
                </div>
            </div>
            <div id="mileage_icon" class="swiper-slide icon__item" btn-type="mileage"
                onclick="mypageTabBtnClick('mileage',0)">
                <div class="icon">
                    <img src="/images/mypage/mypage_point_icon.svg" style="padding-top:17px;padding-left:17px;">
                </div>
                <div class="icon__title">
                    <p data-i18n="m_mileage_charging">적립금</p>
                </div>
            </div>
            <!--
            <div id="charging_icon" class="swiper-slide icon__item" btn-type="charging" onclick="">
                <div class="icon">
                    <img src="/images/mypage/mypage_charging_point_icon.png"
                        style="width:18px;height:34px;padding-top:16px;margin-left:16px;">
                </div>
                <div class="icon__title">
                    <p data-i18n="m_prepaid_mileage">충전포인트</p>
                </div>
            </div>
-->
            <div id="voucher_icon" class="swiper-slide icon__item" btn-type="voucher"
                onclick="mypageTabBtnClick('voucher',0)">
                <div class="icon">
                    <img src="/images/mypage/mypage_voucher_icon.svg" style="padding-top:19px;padding-left:14px;">
                </div>
                <div class="icon__title">
                    <p data-i18n="m_voucher">바우처</p>
                </div>
            </div>
            <div class="swiper-slide icon__item" btn-type="bluemark" onclick="mypageTabBtnClick('bluemark',0)">
                <div class="icon">
                    <img src="/images/mypage/mypage_bluemark_icon.svg" style="padding-top:21px;padding-left:21px;">
                </div>
                <div class="icon__title">
                    <p data-i18n="m_blue_mark">블루마크</p>
                </div>
            </div>
            <div class="swiper-slide icon__item" btn-type="stanby" onclick="mypageTabBtnClick('stanby',0)">
                <div class="icon">
                    <img src="/images/mypage/mypage_stanby_icon.svg" style="padding-top:13px;padding-left:11px;">
                </div>
                <div class="icon__title">
                    <p data-i18n="m_standby">스탠바이</p>
                </div>
            </div>
            <div class="swiper-slide icon__item" btn-type="preorder" onclick="mypageTabBtnClick('preorder',0)">
                <div class="icon">
                    <img src="/images/mypage/mypage_preorder_icon.svg" style="padding-top:14px;padding-left:16px;">
                </div>
                <div class="icon__title">
                    <p data-i18n="m_preorder">프리오더</p>
                </div>
            </div>
            <div class="swiper-slide icon__item" btn-type="reorder" onclick="mypageTabBtnClick('reorder',0)">
                <div class="icon">
                    <img src="/images/mypage/mypage_reorder_icon.svg" style="padding-top:14px;padding-left:17px;">
                </div>
                <div class="icon__title">
                    <p data-i18n="m_notify_me">재입고알림</p>
                </div>
            </div>
            <!-- <div class="swiper-slide icon__item" btn-type="draw" onclick="mypageTabBtnClick('draw',0)">
                <div class="icon">
                    <img src="/images/mypage/mypage_draw_icon.svg" style="padding-top:12px;padding-left:16px;">
                </div>
                <div class="icon__title">
                    <p data-i18n="m_draw">드로우</p>
                </div>
            </div> -->
            <div class="swiper-slide icon__item" btn-type="membership" onclick="mypageTabBtnClick('membership',0)">
                <div class="icon">
                    <img src="/images/mypage/mypage_membership_icon.svg" style="padding-top:18px;padding-left:15px;">
                </div>
                <div class="icon__title">
                    <p data-i18n="m_membership">멤버십</p>
                </div>
            </div>
            <div class="swiper-slide icon__item" btn-type="inquiry" onclick="mypageTabBtnClick('inquiry',0)">
                <div class="icon">
                    <img src="/images/mypage/mypage_inquiry_icon.svg" style="padding-top:18px;padding-left:15px;">
                </div>
                <div class="icon__title">
                    <p data-i18n="m_inquiry">문의</p>
                </div>
            </div>
            <div class="swiper-slide icon__item" btn-type="as" onclick="mypageTabBtnClick('as',0)">
                <div class="icon">
                    <img src="/images/mypage/mypage_as_icon.svg" style="padding-top:13px;padding-left:15px;">
                </div>
                <div class="icon__title">
                    <p>A/S</p>
                </div>
            </div>
            <div class="swiper-slide icon__item" btn-type="service" onclick="mypageTabBtnClick('service',0)">
                <div class="icon">
                    <img src="/images/mypage/mypage_service_icon.svg" style="padding-top:12px;padding-left:12px;">
                </div>
                <div class="icon__title">
                    <p data-i18n="m_customer_care">고객서비스</p>
                </div>
            </div>
            <div class="swiper-slide icon__item" btn-type="profile" onclick="mypageTabBtnClick('profile',0)">
                <div class="icon" style="width:50px;height:50px;">
                    <img src="/images/mypage/mypage_profile_icon.svg" style="padding-top:15px;padding-left:13px;">
                </div>
                <div class="icon__title">
                    <p data-i18n="m_account">회원정보</p>
                </div>
            </div>
        </div>
    </div>
    <input id="btn_type" type="hidden" value="home">

    <div class="mypage__tab__container">
        <div id="mypage_tab_stanby" class="menu__tab non__display__tab">
            <?php include_once("mypage-main-stanby.php"); ?>
        </div>
        <div id="mypage_tab_preorder" class="menu__tab non__display__tab">
            <?php include_once("mypage-main-preorder.php"); ?>
        </div>
        <div id="mypage_tab_reorder" class="menu__tab non__display__tab">
            <?php include_once("mypage-main-reorder.php"); ?>
        </div>
        <div id="mypage_tab_draw" class="menu__tab non__display__tab">
            <?php include_once("mypage-main-draw.php"); ?>
        </div>
        <div id="mypage_tab_membership" class="menu__tab non__display__tab">
            <?php include_once("mypage-main-membership.php"); ?>
        </div>
        <div id="mypage_tab_inquiry" class="menu__tab non__display__tab">
            <?php include_once("mypage-main-inquiry.php"); ?>
        </div>
        <div id="mypage_tab_as" class="menu__tab non__display__tab">
            <?php include_once("mypage-main-as.php"); ?>
        </div>
        <div id="mypage_tab_service" class="menu__tab non__display__tab">
            <?php include_once("mypage-main-service.php"); ?>
        </div>
        <div id="mypage_tab_home" class="menu__tab">
            <?php include_once("mypage-main-home.php"); ?>
        </div>
        <div id="mypage_tab_orderlist" class="menu__tab non__display__tab">
            <?php include_once("mypage-main-orderlist-demo.php"); ?>
        </div>
        <div id="mypage_tab_mileage" class="menu__tab non__display__tab">
            <?php include_once("mypage-main-mileage.php"); ?>
        </div>
        <div id="mypage_tab_charging" class="menu__tab non__display__tab">
            <?php include_once("mypage-main-charging.php"); ?>
        </div>
        <div id="mypage_tab_voucher" class="menu__tab non__display__tab">
            <?php include_once("mypage-main-voucher.php"); ?>
        </div>
        <div id="mypage_tab_profile" class="menu__tab non__display__tab">
            <?php include_once("mypage-main-profile.php"); ?>
        </div>
        <div id="mypage_tab_bluemark" class="menu__tab non__display__tab">
            <?php include_once("mypage-main-bluemark.php"); ?>
        </div>
    </div>

    <div class="recommend-wrap"></div>
</main>
<script>
    var swiperMypage = '';
    var searchEnterKeyHandler = function (e) {
        if (e.keyCode == '13') {
            $('.search__icon__img').click();
        }
    }
    $(document).ready(function () {
        swiperMypage = new Swiper(".swiper.icon", {
            //옵션은 유동적으로 필요한부분만 추가해서 사용가능,
            navigation: {
                nextEl: ".swiper.icon .swiper-button-next",
                prevEl: ".swiper.icon .swiper-button-prev",
            },
            pagination: {
                el: ".swiper.icon .swiper-pagination",
                clickable: true,
            },
            autoHeight: true,
            grabCursor: true,
            slidesPerView: 'auto',
            loop: false,
            loopAdditionalSlides: 1
        });
        swiperTabBtn = new Swiper(".swiper.tab__btn", {
            //옵션은 유동적으로 필요한부분만 추가해서 사용가능,
            navigation: {
                nextEl: ".swiper.tab__btn .swiper-button-next",
                prevEl: ".swiper.tab__btn .swiper-button-prev",
            },
            pagination: {
                el: ".swiper.tab__btn .swiper-pagination",
                clickable: true,
            },
            autoHeight: true,
            grabCursor: true,
            slidesPerView: 'auto',
            loop: false,
            loopAdditionalSlides: 1,
            spaceBetween: 10,
            observer: true,
            obseveParents: true
        });
        $(".tab__btn__item").on('click', function () {
            var ancestorObj = $(this).parents('.menu__tab');
            var btn_parents = ancestorObj.children().eq(1).children().eq(0);
            var swiper_btn_parents = ancestorObj.children().eq(1).children().eq(1);

            var btn_group = btn_parents.find('.tab__btn__item');
            var swiper_btn_group = swiper_btn_parents.find('.tab__btn__item');

            /* new */
            ancestorObj.find('.tab__btn__item').removeClass('selected');
            btn_group.eq($(this).index()).addClass('selected');
            swiper_btn_group.eq($(this).index()).addClass('selected');

            var tab_class = $('#btn_type').val() + '__tab';
            var form_id = $(this).attr('form-id');
            if (form_id != '') {
                $('.' + tab_class).hide();
                $('.' + form_id).show();
            }
            ancestorObj.find('input[type="password"]').val('');
            ancestorObj.find('input[type="text"]').val('');
            ancestorObj.find('.select-items.select-hide').hide();
            ancestorObj.find('.toggle__item .question .down__up__icon').attr('src', 'http://116.124.128.246/images/mypage/mypage_down_tab_btn.svg');
            $('.mypage__tab__container input[name="page"]').val(1);
            $('.request').hide();
        })
        $('.question').on('click', function () {
            if ($(this).next().css('display') == 'none') {
                $(this).find('img.down__up__icon').attr('src', '/images/mypage/mypage_up_tab_btn.svg');
            }
            else {
                $(this).find('img.down__up__icon').attr('src', '/images/mypage/mypage_down_tab_btn.svg');
            }
            $(this).next().toggle();
        })
        $('.swiper-slide.icon__item').on('click', function () {
            console.log($(this).index() - 1);
            swiperMypage.slideTo($(this).index() - 1);
        });

        let country = "KR";
        $.ajax({
            type: "post",
            data: {
                "country": getLanguage()
            },
            dataType: "json",
            url: "http://116.124.128.246:80/_api/mypage/get",
            error: function (d) {
            },
            success: function (d) {
                if (d.code == 302) {
                    window.location.replace("/login");
                }
                else {
                    var data = d.data[0];
                    var balance = data.mileage_balance_total;
                    if (balance == null) {
                        balance = 0;
                    }
                    else {
                        balance = parseInt(balance).toLocaleString('ko-KR');
                    }

                    $('#mileage_value').text(`${balance}P`);
                    $('#order_value').text(`${data.order_ing_cnt==null?0:data.order_ing_cnt}`);
                    $('#voucher_cnt').text(`${data.voucher_cnt}`);
                    $('#mypage_member_name').text(`${data.member_name}`);
                    $('#mypage_member_id').text(`${data.member_id}`);
                    $('html').scrollTop(0);
                }
            }
        });
        var mypage_type = $('#mypage_type').val();
        if (mypage_type != null && mypage_type.length > 0) {
            switch (mypage_type) {
                case 'bluemark_verify':
                    mypageTabBtnClick('bluemark', 0);
                    break;
                case 'bluemark_list':
                    mypageTabBtnClick('bluemark', 1);
                    break;
                case 'orderlist':
                    mypageTabBtnClick('orderlist', 0);
                    break;
                case 'mileage_first':
                    mypageTabBtnClick('mileage', 0);
                    break;
                case 'voucher_first':
                    mypageTabBtnClick('voucher', 0);
                    break;
                case 'stanby_first':
                    mypageTabBtnClick('stanby', 0);
                    break;
                case 'preorder_first':
                    mypageTabBtnClick('preorder', 0);
                    break;
                case 'reorder_first':
                    mypageTabBtnClick('reorder', 0);
                    break;
                case 'draw_first':
                    mypageTabBtnClick('draw', 0);
                    break;
                case 'membership_first':
                    mypageTabBtnClick('membership', 0);
                    break;
                case 'inquiry_first':
                    mypageTabBtnClick('inquiry', 0);
                    break;
                case 'inquiry':
                    mypageTabBtnClick('inquiry', 1);
                    break;
                case 'inquiry_list':
                    mypageTabBtnClick('inquiry', 2);
                    break;
                case 'as_first':
                    mypageTabBtnClick('as', 0);
                    break;
                case 'service_first':
                    mypageTabBtnClick('service', 0);
                    break;
                case 'profile_first':
                    mypageTabBtnClick('profile', 0);
                    break;
            }
        }
    });

    function mypageTabBtnClick(type, tab_idx) {
        $('#btn_type').val(type);

        $('.menu__tab').addClass('non__display__tab');
        $('#mypage_tab_' + type).removeClass('non__display__tab');
        $('.click__icon__item').removeClass('click__icon__item');

        $('.icon__item[btn-type=' + type + ']').addClass('click__icon__item');
        swiperMypage.slideTo($(`.icon__item[btn-type='${type}']`).index() - 1);
        $(`.${type}__wrap`).find('.tab__btn__item').eq(tab_idx).click();
        changeLanguageR();
    }

    function memberInfoClick(obj) {
        var info_type = $(obj).attr('info-type');
        $("#" + info_type + "_icon").trigger("click");
    }
    function makeSelect(divId) {

        var selectDiv = $('.' + divId);
        selectDiv.css('position', 'relative');
        var SelLen = selectDiv.find('select option').length;

        var selectedDiv = ` <div class="select-selected">${selectDiv.find('select option:selected').text()}</div><img src="/images/mypage/mypage_down_tab_btn.svg" style="width:10px;height:5px;position: absolute;right:10px;top:18px;">`;
        selectDiv.append(selectedDiv);

        var selectHideDiv = `<div class="select-items select-hide">`;
        for (var i = 0; i < SelLen; i++) {
            selectHideDiv += `  
                            <div>${selectDiv.find(`select option:eq(${i})`).text()}</div>
                        `;
        }
        selectHideDiv += `  </div>`;
        selectDiv.append(selectHideDiv);

        selectDiv.find('.select-items').find('div').on('click', function () {
            var clickCountryText = $(this).text();

            var sameCountryOption = selectDiv.find(`select option:contains("${clickCountryText}")`);
            sameCountryOption.prop('selected', true);

            selectDiv.find('.select-selected').text(clickCountryText);

            selectDiv.find('.select-items').toggle();

            if ($(this).parent().parent().attr('class') == 'inquiry__category') {
                var category_no = $('#inq_cate').val();
                getFaqList('click', category_no);
                $('.category__small').find('.faq__category__btn').removeClass('click__btn');
                $('.category__small').find('.faq__category__btn[category-no=' + category_no + ']').addClass('click__btn');
            }
        })

        selectDiv.find('.select-selected').on('click', function () {
            selectDiv.find('.select-items').toggle();
        });
    }   
    const foryou = new ForyouRender();
    const wish = new WishlistRender();
</script>
