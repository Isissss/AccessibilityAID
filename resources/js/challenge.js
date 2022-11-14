window.addEventListener('load', init);

let container;
let challengeInfo;

function init() {
    let list = document.getElementById('challengeList');
    container = document.getElementById('challengeContainer');
    let details = document.getElementById('info');
    list.addEventListener('click', challengeClickHandler);
    ajax(apiurl, createInfoContainer);
}

function ajax(url, succesHandler) {
    fetch(url)
        // .then((res) => res.json())
        .then((res) => {
            return res.json()
        })
        .then(succesHandler)
        .catch((res) => {

        })
}

function challengeClickHandler(e) {
    let clickedItem = e.target;
    if (clickedItem.nodeName !== 'SPAN' && clickedItem.nodeName !== 'BUTTON') {
        return;
    }
    if (challengeInfo){
        while (challengeInfo.firstChild){
            challengeInfo.removeChild(challengeInfo.firstChild)
        }
    }
    ajax(apiurl, showInfo);
}

function createInfoContainer(data) {
    console.log(data);
    let challenge = document.createElement('div');
    challenge.classList.add('col-md-7', 'p-1');
    challenge.dataset.name = data.name;
    container.appendChild(challenge);

}

function showInfo(data) {
    console.log(data.description);
    challengeInfo = document.querySelector(`[data-name='${data.name}']`)
    let name = document.createElement('h1');
    name.innerHTML = data.name;
    challengeInfo.appendChild(name);

    let description = document.createElement('p');
    description.innerHTML = data.description;
    challengeInfo.appendChild(description);

    let goal = document.createElement('p');
    goal.innerHTML = data.goal;
    challengeInfo.appendChild(goal);


}
