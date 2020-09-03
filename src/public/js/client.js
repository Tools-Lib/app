var loader = `
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgba(241, 242, 243, 0); display: block;" width="44px" height="44px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
<g transform="rotate(0 50 50)">
  <rect x="49.5" y="26.5" rx="0.5" ry="0.77" width="1" height="11" fill="#4790ff">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9803921568627451s" begin="-0.9103641456582632s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(25.714285714285715 50 50)">
  <rect x="49.5" y="26.5" rx="0.5" ry="0.77" width="1" height="11" fill="#4790ff">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9803921568627451s" begin="-0.8403361344537814s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(51.42857142857143 50 50)">
  <rect x="49.5" y="26.5" rx="0.5" ry="0.77" width="1" height="11" fill="#4790ff">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9803921568627451s" begin="-0.7703081232492996s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(77.14285714285714 50 50)">
  <rect x="49.5" y="26.5" rx="0.5" ry="0.77" width="1" height="11" fill="#4790ff">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9803921568627451s" begin="-0.7002801120448179s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(102.85714285714286 50 50)">
  <rect x="49.5" y="26.5" rx="0.5" ry="0.77" width="1" height="11" fill="#4790ff">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9803921568627451s" begin="-0.6302521008403361s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(128.57142857142858 50 50)">
  <rect x="49.5" y="26.5" rx="0.5" ry="0.77" width="1" height="11" fill="#4790ff">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9803921568627451s" begin="-0.5602240896358543s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(154.28571428571428 50 50)">
  <rect x="49.5" y="26.5" rx="0.5" ry="0.77" width="1" height="11" fill="#4790ff">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9803921568627451s" begin="-0.49019607843137253s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(180 50 50)">
  <rect x="49.5" y="26.5" rx="0.5" ry="0.77" width="1" height="11" fill="#4790ff">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9803921568627451s" begin="-0.4201680672268907s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(205.71428571428572 50 50)">
  <rect x="49.5" y="26.5" rx="0.5" ry="0.77" width="1" height="11" fill="#4790ff">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9803921568627451s" begin="-0.35014005602240894s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(231.42857142857142 50 50)">
  <rect x="49.5" y="26.5" rx="0.5" ry="0.77" width="1" height="11" fill="#4790ff">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9803921568627451s" begin="-0.2801120448179272s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(257.14285714285717 50 50)">
  <rect x="49.5" y="26.5" rx="0.5" ry="0.77" width="1" height="11" fill="#4790ff">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9803921568627451s" begin="-0.21008403361344535s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(282.85714285714283 50 50)">
  <rect x="49.5" y="26.5" rx="0.5" ry="0.77" width="1" height="11" fill="#4790ff">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9803921568627451s" begin="-0.1400560224089636s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(308.57142857142856 50 50)">
  <rect x="49.5" y="26.5" rx="0.5" ry="0.77" width="1" height="11" fill="#4790ff">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9803921568627451s" begin="-0.0700280112044818s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(334.2857142857143 50 50)">
  <rect x="49.5" y="26.5" rx="0.5" ry="0.77" width="1" height="11" fill="#4790ff">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9803921568627451s" begin="0s" repeatCount="indefinite"></animate>
  </rect>
</g>
</svg>
`;

function login() {
  post("/accounts/login", {
    username: $("#user").val(),
    password: $("#pass").val()
    },
    "").then((data) => {
      if(data.body.authinticated) {
        $("#logerr").html("");
        $("#submit").remove();
        $("#logged").html(loader);
      var expires;
        var date = new Date();
        date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
      document.cookie = escape("TL-TOKEN") + "=" + escape(data.body.token) + expires + "; path=/";
      setTimeout(() => {}, 350);
      location.reload();
    }
  }).catch(data => {
    data = data.responseJSON
    if(!data.body.authinticated) {
      $("#logged").html("")
      $("#logerr").html(data.body.errors[0].message);
    }
  });
}

function register() {
  post("/accounts/join", {
    email: $("#email").val(),
    username: $("#user").val(),
    password: $("#pass").val()
    },
    "",
    {
    cache: false,
    timeout: 30000,
  }).then((data) => {
    if(data.body.authenticated) {
      $("#logerr").html("");
      $("#submit").remove();
      $("#logged").html(loader);
    var expires;
      var date = new Date();
      date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toGMTString();
    document.cookie = escape("TL-TOKEN") + "=" + escape(data.body.token) + expires + "; path=/";
    setTimeout(() => {}, 350);
    location.reload();
  }
  }).catch(data => {
    data = data.responseJSON
    if(!data.body.authenticated) {
      $("#logged").html("")
      $("#logerr").html(data.body.errors[0].message);
    }
  });
}

function setCookie(name, value) {
  var expires;
        var date = new Date();
        date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
      document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";

}

function edit() {
  post("/accounts/edit", {
    email: $("#email").val(),
    username: $("#username").val(),
    name: $("#name").val(),
    bio: $("#bio").val()
    },
    getCookie("TL-TOKEN"),
    {
    cache: false,
    timeout: 30000,
  }).then((data) => {
    $("#error").html("");
    $("#success").html("Account updated");
  }).catch(data => {
    data = data.responseJSON
      $("#success").html("");
      $("#error").html(data.body.errors[0].message);
  });
}
function changepassword() {
  post("/accounts/edit", {
      password: $("#password").val(),
      old_password: $("#old_password").val(),
      verify_password: $("#verify_password").val()
    },
    getCookie("TL-TOKEN"),
    {
    cache: false,
    timeout: 30000,
  }).then((data) => {
        $("#errorpassw").html("");
        $("#successpassw").html("Password changed");
  }).catch(data => {
      data = data.responseJSON
        $("#successpassw").html("");
        $("#errorpassw").html(data.body.errors[0].message);
  });
}
function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}

function get(path="/", data={}, token="/") {
  return new Promise(function(resolve, reject) {
    $.ajax({
      url: "https://api.toolslib.co" + path,
      method: "get",
      data,
      success: (data) => {
        return resolve(data);
      },
      headers: {
      	"X-AccessToken": token
      },
    }).fail(data => {
        return resolve(data);
    });
  });
}

function post(path="/", data={}, token="/", other={}) {
  return new Promise(function(resolve, reject) {
    $.ajax({
      url: "https://api.toolslib.co" + path,
      method: "post",
      data,
      success: (data) => {
        return resolve(data);
      },
      headers: {
      	"X-AccessToken": token
      },
      ...other
    }).fail(data => {
        return resolve(data);
    });
  });
}


try {
document.querySelector('#formLogin').addEventListener('keyup', function (e) {
  if (e.key == "Enter") {
    login();
  }
})
}
catch(e){}
try{
  document.querySelector('#formRegister').addEventListener('keyup', function (e) {
  if (e.key == "Enter") {
    register();
  }
})
}
catch(e){}
