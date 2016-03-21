<!DOCTYPE html>

<html>

<head>

<title>Facebook Login JavaScript Example</title>

<meta charset="UTF-8">

</head>

<body>

<script>

  // This is called with the results from from FB.getLoginStatus().

    appId      : '1006593146053954',

    cookie     : true,  // enable cookies to allow the server to access 

                        // the session

    xfbml      : true,  // parse social plugins on this page

    version    : 'v2.5' // use graph api version 2.5

  });



  // Now that we've initialized the JavaScript SDK, we call 

  // FB.getLoginStatus().  This function gets the state of the

  // person visiting this page and can return one of three states to

  // the callback you provide.  They can be:

  //

  // 1. Logged into your app ('connected')

  // 2. Logged into Facebook, but not your app ('not_authorized')

  // 3. Not logged into Facebook and can't tell if they are logged into

  //    your app or not.

  //

  // These three cases are handled in the callback function.



  FB.getLoginStatus(function(response) {

    statusChangeCallback(response);

  });



  };



  // Load the SDK asynchronously

  (function(d, s, id) {

    var js, fjs = d.getElementsByTagName(s)[0];

    if (d.getElementById(id)) return;

    js = d.createElement(s); js.id = id;

    js.src = "//connect.facebook.net/en_US/sdk.js";


    fjs.parentNode.insertBefore(js, fjs);

  }(document, 'script', 'facebook-jssdk'));



  // Here we run a very simple test of the Graph API after login is

  // successful.  See statusChangeCallback() for when this call is made.

  function testAPI() {

    console.log('Welcome!  Fetching your information.... ');

    FB.api('/me', function(response) {

      console.log('Successful login for: ' + response.name);

      document.getElementById('status').innerHTML =

        'Thanks for logging in, ' + response.name + '!';

    });

  }

</script>



<!--

  Below we include the Login Button social plugin. This button uses

  the JavaScript SDK to present a graphical Login button that triggers

  the FB.login() function when clicked.

-->



<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">

</fb:login-button>



<div id="status">

</div>



</body>

</html>