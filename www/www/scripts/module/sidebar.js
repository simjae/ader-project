import {Basket} from '/scripts/module/basket.js';


const randomNum = Math.floor(Math.random() * 100000000);
const sideId = `side-${randomNum}`;
export function Sidebar() {
    this.appendSidebar = (() => {
        const sidebar = document.createElement("div");
        sidebar.id = "sidebar";
        document.body.appendChild(sidebar);
    })();

    this.makeSidebar = (() => {
        const docflag = document.createDocumentFragment();
        const $sidebar = document.getElementById("sidebar");
        const sideWrap = document.createElement('div');
        let sideContent = "";
        sideWrap.className = "side__background";
        sideContent =`<div class="side__wrap">
        <div class="sidebar-close-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="12.707" height="12.707" viewBox="0 0 12.707 12.707">
                <path data-name="선 1772" transform="rotate(135 6.103 2.736)" style="fill:none;stroke:#343434" d="M16.969 0 0 .001"/>
                <path data-name="선 1787" transform="rotate(45 -.25 .606)" style="fill:none;stroke:#343434" d="M16.969.001 0 0"/>
            </svg>
        </div>
        <div class="side__box">
        
        
        </div>
        
        
        </div>`;
        sideWrap.innerHTML = sideContent;
        docflag.appendChild(sideWrap);
        $sidebar.appendChild(docflag);
    })();
    this.openSidebar =()=>{
        let basketBtn = document.querySelector(".basket__btn");
        let sideContainner = document.querySelector(`#sidebar`);
        let sideBg = document.querySelector(`.side__background`);
        let sideWrap = document.querySelector(`#sidebar`);
        if(basketBtn.classList.contains("open")){
            document.body.style["overflow"] ="hidden"
            document.querySelector("header").classList.add("hover")
            sideContainner.classList.add("open");
            sideBg.classList.add("open");
            sideWrap.classList.add("open");
        }else {
            document.body.style["overflow"] ="inherit"
            document.querySelector("header").classList.remove("hover")
            sideContainner.classList.remove("open");
            sideBg.classList.remove("open");
            sideWrap.classList.remove("open");
        }
    };
    return randomNum;
}
// export function 
// const sidebar = new Sidebar(); 사이드메뉴 생성
