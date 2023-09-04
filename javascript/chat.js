const form = document.querySelector(".typingArea"),
inputField = form.querySelector(".inputField"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chatBox");

form.onsubmit = (e)=>{
    e.preventDefault(); //formfrom submitting
}

sendBtn.onclick = () =>{
        //AJAX STARTING
        let xhr = new XMLHttpRequest(); //creating xml
        xhr.open("POST", "php/insertChat.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    inputField.value = ""; //deleted inserted message after sending
                    scrollToBottom();   
                }
            }
    
        }
        //send the form data through ajax to php
        let formData = new FormData(form); //creating new formData object
        xhr.send(formData); //sending the form data to php
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(()=>{
    //AJAX STARTING
    let xhr = new XMLHttpRequest(); //creating xml
    xhr.open("POST", "php/getChat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                 let data = xhr.response;
                 chatBox.innerHTML = data;
                 if(!chatBox.classList.contains("active")){
                    scrollToBottom(); 
                 }
             }
        }
     }

     let formData = new FormData(form); //creating new formData object
     xhr.send(formData); //sending the form data to php

}, 500); //this func will run frequently after 500ms


    function scrollToBottom(){
        chatBox.scrollTop = chatBox.scrollHeight;
    }