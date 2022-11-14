// Set inactive/active class, put all stars in an array
const starInactive = "far fa-star";
const starActive = "fas fa-star";
const votingDiv = document.getElementById('voting');
const stars = [...document.getElementsByClassName("fa-star")]
let i;

votingDiv.addEventListener('click', function (e) {

    i = (stars.indexOf(e.target))

    if (e.target.nodeName !== 'I') {
        return
    }

    if (e.target.className === starInactive) {
        for (i; i >= 0; i--) {
            stars[i].className = starActive;
        }
    } else {
        for (i++; i < stars.length; i++) {
            stars[i].className = starInactive;
        }
    }

    document.getElementById('count').innerHTML = e.target.dataset.vote
    document.getElementById('rating').value = e.target.dataset.vote
});

