const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".errorMessage");


form.onsubmit = (e)=>{
    e.preventDefault(); //formfrom submitting
}

continueBtn.onclick = () =>{
    //AJAX STARTING
    let xhr = new XMLHttpRequest(); //creating xml
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "succes"){
                    location.href = "user.php";
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }

    }
    //send the form data through ajax to php
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData); //sending the form data to php
}