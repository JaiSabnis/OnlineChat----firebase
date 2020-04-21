<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-database.js"></script>


<!-- Style sheets i stole rom the internet lol -->
<link rel="stylesheet" href="css/normalize.css">

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.css'>

        <link rel="stylesheet" href="css/style.css">



<script>
  // This is my Firebase configuration so you can simply change it to whateer are your conigs and it should work

  var firebaseConfig = {
    apiKey: "AIzaSyDRpW2nRR1lWU7CsbBJ-4XQEZ5YrO6qA-8",
    authDomain: "dated-da3dc.firebaseapp.com",
    databaseURL: "https://dated-da3dc.firebaseio.com",
    projectId: "dated-da3dc",
    storageBucket: "dated-da3dc.appspot.com",
    messagingSenderId: "1093720938384",
    appId: "1:1093720938384:web:6a47f8a51324700e27c515"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  // when msg is deleted it'll change 
  firebase.database().ref("messages").on("child_removed", function (snapshot) {
    document.getElementById("message-" + snapshot.key).innerHTML = "This message has been deleted";
  });

  // when the button dor delete msgt will be pressed this thingy is triggered and will remoe the msg on the database (remoeCmd style wink wink)
  function deleteMessage(self) {
    var messageId = self.getAttribute("data-id");
    firebase.database().ref("messages").child(messageId).remove();
  }

  // adds msg to database when the element id is messgaes. I hae basically gien this id to anything typed into the input box
  function sendMessage() {
    var message = document.getElementById("message").value;
    firebase.database().ref("messages").push().set({
      "message": message,
      "sender": myName
    });
    return false;
  }
</script>

<!-- css or aatar-->
<style>
  figure.avatar {
    bottom: 0px !important;
  }
  .btn-delete {
    background: red;
    color: white;
    border: none;
    margin-left: 10px;
    border-radius: 5px;
  }
</style>

<!-- the masthead --> 
<div class="chat">
  <div class="chat-title">
    <h1>datED</h1>
    <h2>Messaging</h2>
    <figure class="avatar">
      <img src="https://p7.hiclipart.com/preview/349/273/275/livechat-online-chat-computer-icons-chat-room-web-chat-others.jpg" /></figure>
  </div>
  <div class="messages">
    <div class="messages-content"></div>
  </div>
  <div class="message-box">
    <textarea type="text" class="message-input" id="message" placeholder="Type message..."></textarea>
    <button type="submit" class="message-submit">Send</button>
  </div>

</div>
<div class="bg"></div>


<!-- Src code links to jquery (same as google irebase) --> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.concat.min.js'></script>
<script src="js/index.js?v=<?= time(); ?>"></script>