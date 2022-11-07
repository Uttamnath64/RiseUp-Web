$(document).ready(function(){
	//channel join and left
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
          $('#P-Joiner').html(result.Joiner + ' Joiner');
          $('#P2-Joiner').html(result.Joiner);
          $('#Channle-Join-Left2').toggleClass("active");
        }, "json");
    });

    $('#Channle-Join-Left2').click(function(){
      $.post('/post/channelJoinAndLeft',
        {Channel_Url: Channel_Url},
        function(result){
          if (result.msg == "JOIN") {
            $('#Channle-Join-Left2').toggleClass("active");
          }else if(result.msg == "LEFT"){
            $('#Channle-Join-Left2').toggleClass("active");
          }else{
            window.location.replace('/feed/SignIn');
          }
          $('#P-Joiner').html(result.Joiner + ' Joiner');
          $('#P2-Joiner').html(result.Joiner);
          $('#Channle-Join-Left').toggleClass("active");
        }, "json");
    });
});