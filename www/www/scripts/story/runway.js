window.addEventListener('DOMContentLoaded', function(){
    var page_idx = $('#page_idx').val();
    if(page_idx != null){
        appendSlide();
    }
    else{
        getRunwayList();  
    }
    scrollTop();
})

function getRunwayList() {
	let isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
	
	let size_type = "W";
	if (isMobile == true) {
		size_type = "M";
	}
	
	let country = getLanguage();
    $.ajax({
        type: "post",
        data: {
			'country' : country,
            'size_type' : size_type
        },
        dataType: "json",
        url: "http://116.124.128.246:80/_api/posting/runway/list/get",
        error: function() {
            alert("블루마크 내역 조회처리에 실패했습니다.");
        },
        success: function(d) {
            if(d.code == 200){
                let cnt = 0;
                if(d.data != null){
                    d.data.forEach(function(row){
                        appendThumbnailTitle(row.page_title, row.page_idx , row.size_type);
                        appendThumbnailBackground(row.contents_location, row.page_title, row.page_idx, cnt++, row.size_type)
                        asideClickEvent();
                        responsive();
                    })
                    addBtn();
                    /*
                    $(".runway-wrap.open .banner").on('touchmove', function(ev){
                       ev.preventDefault();
                    })
                    */
                  
                }
            }
        }
    });
}

function appendThumbnailTitle(title,pageIdx,sizeType) {
    let titleUl = document.querySelector(".thumbnail-side nav ul");
    let titleLi = document.createElement("li");
    titleLi.className = "thumbnail-title"
    titleLi.innerHTML = title;
    titleLi.dataset.pageidx = pageIdx;
    titleLi.dataset.sizetype = sizeType;
    titleUl.appendChild(titleLi);
}

function appendSlide() {
    $('.runway-detail-wrap').addClass('open');
}

function appendThumbnailBackground(thumbnail_background, title, page_idx, idx, size_type) {
    let backgroundHtml;
	console.log(thumbnail_background);
    let backgroundType = thumbnail_background.split('.', 2)[1];
    let runwayWrap = document.querySelector(".runway-wrap");
    let article = document.createElement("article");
    let url = "http://116.124.128.246:81";
    article.className = "banner";
    if (idx > 0) article.classList.add("hidden")

    if (backgroundType === "mp4") {
        backgroundHtml = `
        <video id="video-coustom-${idx}" autoplay muted loop playsinline src="${url}${thumbnail_background}" onclick="moveRunwayDtail(${page_idx}, '${size_type}')" ontouchend="moveRunwayDtail(${page_idx}, '${size_type}')"></video>
        `
    } else {
        backgroundHtml = `<img class="object-fit" src="http://116.124.128.246:81${thumbnail_background}" onclick="moveRunwayDtail(${page_idx}, '${size_type}')" ontouchend="moveRunwayDtail(${page_idx}, '${size_type}')">`
    }
    article.innerHTML = `
        <figure>
            ${backgroundHtml}
            <figcaption>${title}</figcation>
        </figure>
    `;
    runwayWrap.appendChild(article);
}

function asideClickEvent() {
    let banner = document.querySelectorAll(".runway-wrap .banner");
    let thumTitle = document.querySelectorAll(".thumbnail-title");
    thumTitle[0].classList.add("select");
    
    thumTitle.forEach((el, idx) => {
        el.addEventListener("click", function() {
            if(this.classList.contains("select")){
                let {pageidx, sizetype } = this.dataset;
                moveRunwayDtail(pageidx, sizetype)
            }
        })
        el.addEventListener("mouseover", function () {
            thumTitle.forEach(el => el.classList.remove("select"));
            this.classList.add("select");
            banner.forEach(el => el.classList.add("hidden"));
            bannerTarget(idx).classList.remove("hidden");
        })
    }) 
    function bannerTarget(tidx) {
        return [...banner].find((el, idx) => idx === tidx);
    }
}

function bannerClickEvent(page_idx, size_type) {

}
var runway_ControllerSwiper = new Swiper(".runway-controller-swiper", {
    spaceBetween: 10,
    slidesPerView: 16.5,
    freeMode: true,
    watchSlidesProgress: true,
    autoHeight: true,
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 8.2,
            spaceBetween: 10
        },
        // when window width is >= 480px
        480: {
            spaceBetween: 10,
            slidesPerView: 9.2
        },
        // when window width is >= 640px
        640: {
            spaceBetween: 10,
            slidesPerView: 10.2
        },
        740: {
            spaceBetween: 10,
            slidesPerView: 11.2
        },
        840: {
            spaceBetween: 10,
            slidesPerView: 12.2
        },
        940: {
            spaceBetween: 10,
            slidesPerView: 14.2
        }
    },
    pagination: {
        el: '.controller-swiper-wrap .swiper-pagination',
        type: 'fraction'
        // renderFraction: function (currentClass, totalClass) { // type이 fraction일 때 사용
        //     console.log(currentClass)
        //     return '<span class="' + currentClass + '"></span>' +
        //            '<span class="' + totalClass + '"></span>';
        //   }
    },
});
var runway_PreviewSwiper = new Swiper(".runway-preview-swiper", {
    slidesPerView: 1,
    thumbs: {
        swiper: runway_ControllerSwiper,
    },
    navigation: {
        nextEl: ".preview-swiper-wrap .swiper-button-next",
        prevEl: ".preview-swiper-wrap .swiper-button-prev",
    },
    pagination: {
        el: '.preview-swiper-wrap .swiper-pagination',
        type: 'fraction'
        // renderFraction: function (currentClass, totalClass) { // type이 fraction일 때 사용
        //     console.log(currentClass)
        //     return '<span class="' + currentClass + '"></span>' +
        //            '<span class="' + totalClass + '"></span>';
        //   }
    },
    on : {
        afterInit : function () {
            console.log('swiper 초기화 될때 실행');
        },
        imagesReady : function () { // 모든 내부 이미지가 로드 된 직후 이벤트가 시작됩니다.
            console.log('슬라이드 이미지 로드 후 실행');
        }
    }
});

window.addEventListener("resize", function () {
    responsive()
});
function responsive(){
    let breakpoint = window.matchMedia('screen and (max-width:1025px)');
    if (breakpoint.matches === true) {
            let banner = document.querySelectorAll(".runway-wrap .banner");
            banner.forEach(el => el.classList.remove("hidden"));
    } else if (breakpoint.matches === false) {
    }
}
function moveRunwayDtail(page_idx, size_type){
    location.href = `runway/detail?page_idx=${page_idx}&size_type=${size_type}`;
}

function addBtn() {
    let addBtn = document.createElement("div");
    addBtn.className = "show_more_btn"
    addBtn.innerHTML =`
        <span class="add-btn">더보기 +</span>
        <img src="" alt="">
    ` 
    document.querySelector("main").appendChild(addBtn);
}
function scrollTop() {
    let topBtn = document.querySelector(".top-btn");
    if(topBtn !== null){
        topBtn.addEventListener("click", function (){
            window.scrollTo({ top: 0,left: 0,behavior: 'smooth'});
        })
    }
}