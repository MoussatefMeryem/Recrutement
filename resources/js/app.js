import './bootstrap';

const nickname = document.getElementById('nickname');
const message = document.getElementById('message');
const submitButton = document.getElementById('submitButton');

submitButton.addEventListener('click', ()=>{
       axios.post('chat', {
          nickname: nickname.value,
          message: message.value
       });
});

window.Echo.channel('chat')
     .listen('.chat-message', (event) => {
        console.log(event)
     });
