require('./bootstrap');

//import Alpine from 'alpinejs';
import axios from 'axios';

window.Alpine = Alpine;

Alpine.start();

const userId = document.getElementById('idUser').value;
const message= document.getElementById('message').value;
const submit = document.getElementById('submit');
submit.addEventListener('click', ()=>{
    axios.post('addMessage', {
        id : userId,
        content : message 
    })
     
});



window.Echo.channel('chat')
    .listen('.chat-message', (event) =>{
        console.log(event);
    })
