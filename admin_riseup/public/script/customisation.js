const form = document.querySelector(".lit-edit-from"),
continueBtn = form.querySelector(".lit-edit-btn-submit"),
errorText = form.querySelector(".lit-post-create-error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
  
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/customisations/ChannelDataEdit", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href = "/feed/Dashboard";
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

function showImg(file) {
	if (file.files && file.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e){
			$('.slit-edit-channel-profile-img').attr('src',e.target.result);
		};
		reader.readAsDataURL(file.files[0]);
	}
}

