<!--
You are free to copy and use this sample in accordance with the terms of the
Apache license (http://www.apache.org/licenses/LICENSE-2.0.html)
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Translate</title>
    <script src="//www.google.com/jsapi?key=AIzaSyA5m1Nc8ws2BbmPRwKu5gFradvD_hgq6G0" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="kickstart.js"></script> <!-- KICKSTART -->
    <link rel="stylesheet" href="kickstart.css" media="all" />
    <link rel="stylesheet" href="main2.css" media="all" /> 
    <link href="css/jquery.selectbox.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript">
    /*
    *  How to setup a textarea that allows Transliteration from English to Hindi.
    */
    
    google.load("elements", "1", {packages: "transliteration"});
     function clearContents() {
     	var area1 = document.getElementById("transliterateTextarea1");
     	var area2 = document.getElementById("2");
      area1.value = '';
      area2.value = '';
     }
    function changeFunc() {
    var selectBox = document.getElementById("choice1");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    if(selectedValue==1)
    {
      history.go(0);
    }
    else
    {
      fun(); 
    }
   }
   var instant=0;
   var count=1;
   function exp(obj){
   	if(count)
   	{
   		instant=1;
   		count=0;
   	}
   	else{location.reload();}
   	

   	//var inst = document.getElementById(obj);
   	 if(obj.oldText){
    obj.innerHTML = obj.oldText;
    obj.oldText = null;
     
    } else {
    obj.oldText = obj.innerHTML;
    obj.innerHTML = 'Turn off instant translation';
   	
    }
   	
   
   }
    function edValueKeyPress()
    {
    	if(instant)
    	{
        var text = document.getElementById("transliterateTextarea1");
        var lblValue = document.getElementById("2");
        $(document).ready(function() {
        $(document).keydown(function(e) {
          if (e.keyCode == '32') {
            //alert('space');
             var s = text.value;
            var request=$.ajax({ url: 'test.php',
         data: {txt: s},
         type: 'post',
         
});
        request.done(function(msg) {
                       // update input2 here with msg
                       lblValue.value=msg;
                       
               });
          }
        });
      });
        
       } 
    }
    function fun()
    {
          var options = {
          sourceLanguage:
              google.elements.transliteration.LanguageCode.ENGLISH,
          destinationLanguage:
              [google.elements.transliteration.LanguageCode.MALAYALAM],
          shortcutKey: 'ctrl+g',
          transliterationEnabled: true
            };
    
      // Create an instance on TransliterationControl with the required
      // options.
          var control =
          new google.elements.transliteration.TransliterationControl(options);
    
      // Enable transliteration in the textbox with id
      // 'transliterateTextarea'.
          control.makeTransliteratable(['transliterateTextarea1']);
    }
    function fun2()
    {
      //alert ("hai.......");
      google.setOnLoadCallback(OnLoad);
      var options = {
          sourceLanguage:
              google.elements.transliteration.LanguageCode.ENGLISH,
          destinationLanguage:
              [google.elements.transliteration.LanguageCode.MALAYALAM],
          shortcutKey: 'ctrl+g',
          transliterationEnabled: false
        };
    
      // Create an instance on TransliterationControl with the required
      // options.
      var control =
          new google.elements.transliteration.TransliterationControl(options);
    
      // Enable transliteration in the textbox with id
      // 'transliterateTextarea'.
      control.makeTransliteratable(['transliterateTextarea1']);
    }
    function OnLoad() {
      var content = document.getElementById('content');
      // Create the HTML for our text area
      
    
      
    }
    
    google.setOnLoadCallback(OnLoad);
    </script>
  </head>
  
  <body >
  <?php
    if($_POST)
    {

      $choice1 =$_POST["choice1"];
      $choice2=$_POST["choice2"];
      $text=$_POST["txt"];
      $in=$text;
      if (($choice1==1 and $choice2==1)or ($choice1==2 and $choice2==2))
      {
        $text=$text;
      }
      elseif ($choice1==1 and $choice2==2) {
        $text=shell_exec("pharaoh");
        
      }
      
      else{
        $command = './script.py';
	$text = exec($command, $output);
	
      }

    }
  ?>
  <div class="black"style="background-color:black;min-height:30px;min-width:100%;background: linear-gradient(rgb(86, 88, 93), rgb(47, 48, 52)) repeat scroll 0% 0% transparent;"></div>
  <div id="black">
    <table > 
    <div id="logo">
      <tr><td class="Three-Dee">T</td> <td class="Three-Dee4">r</td><td class="Three-Dee3">a</td>

      <td class="Three-Dee4">n</td><td class="Three-Dee2">s</td><td class="Three-Dee3">l</td><td class="Three-Dee">a</td><td class="Three-Dee4">t</td><td class="Three-Dee2">e</td></tr>
    </div>
    </table>
  </div>

  <div id="wdhite">
   
    
  
   
  </div>

  

<div id="white">

<center>
<form action="index.php" method="post">
<div id="name1">
  Translate :
</div>
<div id="part1">
  <select name="choice1" id="choice1" tabindex="1" onchange="changeFunc()">
    <option value="1">English</option>
    <option value="2">Malayalam</option>
   </select>
</div>
<div id="name2">
   To:
</div>
<div id="part2">
   <select name="choice2" id="choice2" tabindex="1">
    <option value="1">English</option>
    <option value="2">Malayalam</option>
   </select>
</div>
    <div>
       <textarea onKeyPress="edValueKeyPress()" onKeyUp="edValueKeyPress()" class="input"  name="txt"id="transliterateTextarea1" style="font-size: 15pt" name="in" ><?php if($in){echo $in;} ?></textarea>
    </div>
  
    <div >
        <textarea  class="output" id="2" readonly="readonly" ><?php if($text){echo $text;} ?></textarea>
    </div>
    <div >
    <input class="blue" id="submit" type="submit" value="Translate">
  </div>
  </form>
  </center>
</div>
    
     <div id="footer">
    <a id="instant"href="#"onclick="javascript:exp(this);" >Turn on instant translation</a> 
    <a id="clear"href="#" onclick="clearContents();">Clear all fields</a>
        
     <a id="about"href="about.php" >About</a>
     

  </div>
  <script type="text/javascript" src="jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="jquery.selectbox-0.2.js"></script>
    <script type="text/javascript">
    $(function () {
      $("#country_id").selectbox();
    });
    </script>
  </body>
</html>
