 let btn_open_close = document.querySelector(".lit-post-content-channel-open-data-div");
 let div_show = document.querySelector(".lit-post-content-channelv-main");
 let main_div_show = document.querySelector(".lit-post-content-channel-div");

  console.log(btn_open_close);
  btn_open_close.addEventListener("click", ()=>{
    div_show.classList.toggle("active");
    main_div_show.classList.toggle("active");
  });

  $(document).ready(function() {
    //for like
    $('#Like-btn').click(function(){
      $.post('/post/likeAndDislike/',
        {Fun_Value: 1, Channel_Url: Channel_Url, Post_Url: Post_Url},
        function(result){
          if (result.msg == 'LIKE') {
            $('#Like-btn').toggleClass("active");
          }else if(result.msg == 'LIKENOW'){
            $('#Dislike-btn').toggleClass("active");
            $('#Like-btn').toggleClass("active");
          }else if(result.msg == 'UNSET'){
            $('#Like-btn').toggleClass("active");
          }else{
            window.location.replace('/feed/SignIn');
          }
          $('#p_like').html(result.Like + ' Like');
          $('#p_dislike').html(result.Dislike + ' Dislike');
        }, "json");
    });

    //for dislike
    $('#Dislike-btn').click(function(){
      $.post('/post/likeAndDislike/',
        {Fun_Value: 0, Channel_Url: Channel_Url, Post_Url: Post_Url},
        function(result){
          if (result.msg == 'DISLIKE') {
            $('#Dislike-btn').toggleClass("active");
          }else if(result.msg == 'DISLIKENOW'){
            $('#Dislike-btn').toggleClass("active");
            $('#Like-btn').toggleClass("active");
          }else if(result.msg == 'UNSET'){
            $('#Dislike-btn').toggleClass("active");
          }else{
            window.location.replace('/feed/SignIn');
          }
          $('#p_like').html(result.Like + ' Like');
          $('#p_dislike').html(result.Dislike + ' Dislike');
        }, "json");
    });

    //for bookmark 
    $('#Bookmark-btn').click(function(){
      $.post('/post/articlsBookmar',
        {Post_Url: Post_Url},
        function(result){
          if (result.msg == "BOOKMARK") {
            $('#Bookmark-btn').toggleClass("active");
          }else if(result.msg == "REMOVE"){
            $('#Bookmark-btn').toggleClass("active");
          }else{
           window.location.replace('/feed/SignIn');
          }
        }, "json");
    });

    //channel join and left button
    $('#Channle-Join-Left').click(function(){
      $.post('/post/channelJoinAndLeft',
        {Channel_Url: Channel_Url},
        function(result){
          if (result.msg == "JOIN") {
            $('#Channle-Join-Left').toggleClass("active");
          }else if(result.msg == "LEFT"){
            $('#Channle-Join-Left').toggleClass("active");
          }else{
            window.location.replace('/feed/SignIn');
          }
          $('#P-Joiner').html(result.Joiner + ' Joiner')
          $('#P2-Joiner').html(result.Joiner + ' Joiner')
        }, "json");
    });

    //for popup open
    $('#View-Popup').click(function(){
      $('#Main-Popup').toggleClass('active');
    });

 

     //for popup close
    $('#Close-Popup').click(function(){
      $('#Main-Popup').toggleClass('active');
    });

    $('#copy-btn').click(function(){
      $('#like-input').select();
      document.execCommand("copy");
    });


// report
//for popup open
    $('#View-Popup-Report').click(function(){
      $('#Main-Popup-Report').toggleClass('active');
    });

 

     //for popup close
    $('#Close-Popup-Report').click(function(){
      $('#Main-Popup-Report').toggleClass('active');
    });

    $('#Report-btn').click(function(){
      var Report = $('input:radio[name=article_report]:checked').val();
        $.post('/post/Report',
          {Post_Url: Post_Url, Channel_Url: Channel_Url, Report: Report},
          function(result){
            if (result.msg == '') {
              window.location.replace('/feed/SignIn');
            }else{
              $('#Main-Popup-Report').toggleClass('active');
            }
          }, "json");
    });


    //for comments
    $('#Comments-btn').click(function(){
      var Comments = $('#Comments-txt').val();
      if (Comments != '') {
        $.post('/post/Addcomments',
          {Post_Url: Post_Url, Channel_Url: Channel_Url, Comments: Comments},
          function(result){
            if (result.msg == '') {
              window.location.replace('/feed/SignIn');
            }else{
              $('#Comments-div').html(result.Comments_List);
              $('#Comments-txt').val('');
            }
          }, "json");
      }
    });
  });