const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const tabs = $$(".home-tab-item2");
const panes = $$(".home-tab-pane2");

const tabActive = $(".home-tab-item2.active");
const line = $(".line2");

requestIdleCallback(function() {
    line.style.left = tabActive.offsetLeft + "px";
    line.style.width = tabActive.offsetWidth + "px";
});

tabs.forEach((tab, index) => {
    const pane = panes[index];

    tab.onclick = function() {
        $(".home-tab-item2.active").classList.remove("active");
        $(".home-tab-pane2.active").classList.remove("active");

        line.style.left = this.offsetLeft + "px";
        line.style.width = this.offsetWidth + "px";

        this.classList.add("active");
        pane.classList.add("active");
    };
});