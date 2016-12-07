<script type="text/javascript">
function validateForm()
{
var a=document.forms["frmOne"]["password"].value;
var b=document.forms["frmOne"]["rpassword"].value;
if (a!=b)
  {
  alert("password mismatch");
  return false;
  }
}
</script>
<form NAME = "frmOne" action="save.php" method="POST" onsubmit="return validateForm()">
<span style="color: #000000;">ID Number</span><br>
<input type="text" name="username" value="" /><br>
<span style="color: #000000;">Password</span><br>
<input type="password" name="password" value="" /><br>
<span style="color: #000000;">Re-enter Password</span><br>
<input type="password" name="rpassword" value="" /><br>
<span style="color: #000000;">Question</span><br>
<select name="question">
<option>what is your favorite color</option>
<option>what is your favorite movie</option>
<option>what is your favorite singer</option>
<option>what is your favorite pet</option>
<option>what is your favorite cartoon character</option>
</select>
<br>
<span style="color: #000000;">Answer</span><br>
<input type="text" name="ans" value="" /><br><br>
<input type="submit" value="Save" />
</form>