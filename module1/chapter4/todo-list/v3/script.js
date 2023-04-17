let list = document.querySelector('ul')
let form = document.querySelector('form[name=task-form]')

//let inputTitle = form.querySelector('input[name=title]')
let inputTaskIndex = form.querySelector('input[name=taskIndex]')
let inputAction = form.querySelector('input[name=action]')

list.addEventListener('click', function (event) {
    // make sure the user clicked in the SPAN tag
    if (event.target.tagName === 'SPAN') {
        // getting the value of the input under the clicked SPAN
        let key = event.target.querySelector('input[name=taskClickedKey]').value

        //inputTitle.value = 'trying to delete key: ' + key
        inputTaskIndex.value = key
        inputAction.value = 'delete-task'

        //alert('You are trying to delete a task: ' + key)
        form.submit()
    } 
    // make sure the user clicked in the LI tag
    else if (event.target.tagName === 'A') {
        // getting the value of the input under the clicked SPAN
        let key = event.target.querySelector('input[name=taskClickedKey]').value

        //inputTitle.value = 'trying to delete key: ' + key
        inputTaskIndex.value = key
        inputAction.value = 'marked-task'

        //alert('You are trying to delete a task: ' + key)
        form.submit()
    }
})