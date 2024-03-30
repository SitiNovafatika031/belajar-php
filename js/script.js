const signIn = document.querySelector('.signin-btn-link');
const signUp = document.querySelector('.signup-btn-link');
const wrapper = document.querySelector('.wrapper');
signIn.addEventListener('click', ()=> {
   wrapper.classList.toggle('active');
})
signUp.addEventListener('click', ()=> {
   wrapper.classList.toggle('active');
})
