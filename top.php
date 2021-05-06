<style>
body {
  background-image: url("<?=file_get_contents('back.thm');?>");
  background-size: cover;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js" type="text/javascript"></script>
<script src="time.js?rev=<?=time();?>"></script>
<script>
function search(q) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       xmlhttp.open("GET","gseek.php?q="+q,true);
       xmlhttp.send();
    }
  };
  window.location.href = "gseek.php?q="+q;
}
</script>
