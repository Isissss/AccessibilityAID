window.addEventListener('load', init);

let tipContainer

function init() {
    let nav = document.getElementById('wordpressNav');
    // container = document.getElementById('tipContainer');
    nav.addEventListener('click', challengeClickHandler);
}

function ajax(url, succesHandler) {
    fetch(url)
        .then((res) => {
            return res.json()
        })
        .then(succesHandler)
        .catch((res) => {

        })
}

function challengeClickHandler(e) {
    if (e.target.nodeName !== "BUTTON") {
        return;
    }
    let noWordpressButton = document.getElementById('noWordpressButton');
    let wordpressButton = document.getElementById('wordpressButton');

    if (!e.target.getAttribute('aria-current')) {
        noWordpressButton.classList.remove('active');
        noWordpressButton.removeAttribute("aria-current");
        wordpressButton.classList.remove('active');
        wordpressButton.removeAttribute("aria-current");

        e.target.classList.add('active');
        e.target.setAttribute("aria-current", "page");
    }
    ajax((apiurl + e.target.dataset.id), showInfo);
}

function showInfo(data) {
    tipContainer = document.getElementById('tipContainer')
    if(tipContainer) {
        tipContainer.innerHTML = "";
    }

    let tip = document.createElement('li');
    tip.innerHTML = data.content;
    tipContainer.appendChild(tip);
}
