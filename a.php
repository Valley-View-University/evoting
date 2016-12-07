<html>
<head>
<script type="text/javascript">
function UpdateCost() {
  var sum = 0;
  var gn, elem;
  for (i=0; i<2; i++) {
    gn = 'sum_m_'+i;
    elem = document.getElementById(gn);
    if (elem.checked == true) { sum += 1; }
  }
  document.getElementById('totalcost' ).value = sum.toFixed(2);
}
window.onload=UpdateCost
</script>
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td> <input name="sum_m[]" value="25" type="checkbox" id="sum_m_0" onclick="UpdateCost()"> </td>
    <td> ResponseOption_1 </td>
  </tr>
  <tr>
    <td> <input name="sum_m[]" value="15" type="checkbox" id="sum_m_1" onclick="UpdateCost()"> </td>
    <td> ResponseOption_2 </td>
  </tr>
</table>
<input type="text" id="totalcost" value="">
</body>
</html>