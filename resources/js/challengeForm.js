const checkbox = document.getElementById('slugCheckbox')
const nameField = document.getElementById('name')
const slugField = document.getElementById('slug')
const form = document.getElementById('challengeForm')

nameField.addEventListener('input', (e) => {
    if (!checkbox.checked) return
    slugField.value = nameField.value.replace(/ /g, '-')
})

checkbox.addEventListener('change', (e) => {
    if (e.currentTarget.checked) {
        slugField.value = nameField.value.replace(/ /g, '-')
        slugField.disabled = true
    } else {
        slugField.disabled = false
    }
})

form.addEventListener('submit', e => {
    e.preventDefault()
    slugField.disabled = false
    form.submit()
})
