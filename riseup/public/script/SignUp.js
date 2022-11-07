const form = document.querySelector(".lit-signup-div form"),
continueBtn = form.querySelector(".lit-signup-input-btn"),
errorText = form.querySelector(".lit-signup-error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/SignInAndUp/signupActiv", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href = "/feed/home";
              }else{
                errorText.style.display = "block";
                //errorText.innerHTML = data;
                errorText.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}