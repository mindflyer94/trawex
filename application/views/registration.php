<html>
    <head>
        <title>amal joseph</title>
        <style>
  @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

body { background:rgb(30,30,40); }
form { max-width:420px; margin:50px auto; }

.feedback-input {
  color:white;
  font-family: Helvetica, Arial, sans-serif;
  font-weight:500;
  font-size: 18px;
  border-radius: 5px;
  line-height: 22px;
  background-color: transparent;
  border:2px solid #CC6666;
  transition: all 0.3s;
  padding: 13px;
  margin-bottom: 15px;
  width:100%;
  box-sizing: border-box;
  outline:0;
}

.feedback-input:focus { border:2px solid #CC4949; }

textarea {
  height: 150px;
  line-height: 150%;
  resize:vertical;
}

[type="button"] {
  font-family: 'Montserrat', Arial, Helvetica, sans-serif;
  width: 100%;
  background:#CC6666;
  border-radius:5px;
  border:0;
  cursor:pointer;
  color:white;
  font-size:24px;
  padding-top:10px;
  padding-bottom:10px;
  transition: all 0.3s;
  margin-top:-4px;
  font-weight:700;
}

a {
  font-family: 'Montserrat', Arial, Helvetica, sans-serif;
 
  cursor:pointer;
  color:white;
  font-size:24px;
  padding-top:10px;
  padding-bottom:10px;
  transition: all 0.3s;
  margin-top:-4px;
  font-weight:700;
  text-decoration : none;
}

[type="button"]:hover { background:#CC4949; }
        </style>
    </head>
    <body>
         <a href="<?php echo base_url(); ?>index.php/welcome/login">Login</a>
    <form id="regform">      
  <input name="name" type="text" class="feedback-input" placeholder="Name" />   
  <input name="email" type="text" class="feedback-input" placeholder="Email" />
  <input name="password" type="password" class="feedback-input" placeholder="password" />
  <input type="button" id="regbtn" value="Register"/>

</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>
<script>
 $(document).on('click','#regbtn',function(){
    var url = '<?php echo base_url(); ?>index.php/welcome/registration';
      $.ajax({
          url : url,
          data : $("#regform").serialize(),
          type :"POST",
        success:function(data){
    if(data){
        alert("Registration Succesfully");
        
    }else{
        alert("something went wrong");
    }
        }
      });
  });
</script>
    </body>
</html>