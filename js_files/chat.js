const formControl = document.querySelector('.form-control');
const formGroup = document.querySelector('.form_group');
const chats = document.querySelector('.chats');

    formControl.addEventListener('focus', () => {
        formControl.classList.toggle('focused');
        chats.classList.toggle('heightened');
     })
     


formGroup.addEventListener('click', () => {
    if(formControl.classList.contains('focused')){
   formControl.classList.remove('focused');
   chats.classList.remove('heightened');
    }else{
        formControl.classList.add('focused');
        chats.classList.add('heightened');
    }
});