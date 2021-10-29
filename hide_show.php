<script>
$(document).ready(function(){
$('#myselection').on('change', function(){
var demovalue = $(this).val(); 
$("div.myDiv").hide();
$("#show"+demovalue).show();
});
});
</script>
<style>
.myDiv{
display:none;
padding:10px;
}  
#showOne{
border:1px solid red;
}
#showTwo{
border:1px solid green;
}
#showThree{
border:1px solid blue;
}
</style>
<select id="myselection">
<option>Select Option</option>
<option value="One">One</option>
<option value="Two">Two</option>
<option value="Three">Three</option>
</select>
<div id="showOne" class="myDiv">
You have selected option <strong>"One"</strong>.
</div>
<div id="showTwo" class="myDiv">
You have selected option <strong>"Two"</strong>.
</div>
<div id="showThree" class="myDiv">
You have selected option <strong>"Three"</strong>.
</div>