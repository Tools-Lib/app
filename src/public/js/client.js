function login() {
  $.ajax({
    url: "https://api.toolslib.co/accounts/login",
    method: "post",
    data: {
      username: $(".user").val(),
      password: $(".pass").val()
    },
    success: (data) => {
      console.log("D")
      if(data.body.authinticated) {
        $("#logerr").html("")
        $("#logged").html("<strong>Success!</strong> you will be redirected soon");
      } else {
        $("#logged").html("")
        $("#logerr").html(data.body.errors[0].message);
      }
    }
  }).fail(data => {
      data = data.responseJSON
      if(!data.body.authinticated) {
        $("#logged").html("")
        $("#logerr").html(data.body.errors[0].message);
      }
  });
}
