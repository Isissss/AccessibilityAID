import Swal from "sweetalert2";

document.querySelector('#challengeToggle').addEventListener('click', function (e) {
    let clicked = e.target
    console.log(clicked.dataset.id)
    if (clicked.nodeName !== 'INPUT') {
        return
    }

    let data = {
        active: (clicked.checked),
        challenge: clicked.dataset.id
    }

    axios.patch(route('admin.challenge.update-visibility', data))
        .then(function (res) {
            Swal.fire({
                icon: 'success',
                position: 'top',
                toast: 'true',
                timer: '2000',
                text: `Category is now ${(clicked.checked) ? "visible" : "hidden"}!`,
            })
        }).catch(function (error) {
        Swal.fire({
            icon: 'error',
            position: 'top',
            toast: 'true',
            timer: '2000',
            showConfirmButton: 'false',
            text: 'Something went wrong..',
        })
    })
});


