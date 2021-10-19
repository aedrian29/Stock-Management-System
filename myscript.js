
function myTablefunction() {

	if(document.getElementById("quantity").value!=''){
		if (document.getElementById("ProductName").value!=''){
		  var table = document.getElementById("myTable");
  		  var row = table.insertRow(0);
  		  var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
   	      cell1.innerHTML = "<input  type='text' name='productid[]' value='"+document.getElementById("ProductName").value+"'></input>";
          cell2.innerHTML = "<input  type='text' name='quantitycart[]' value='"+document.getElementById("quantity").value+"'></input>";
          var x = document.getElementById("ProductName");
          x.remove(x.selectedIndex);
          document.getElementById("quantity").value='';
          document.getElementById("sell").disabled = false;
      		}
      	else{
      			alert("Select product");
      	    }
  		}
  	else
  	{
  		alert("Fill up the quantity");
 	 }
		var x = document.getElementById("myTable").rows.length;
		document.getElementById("a").value=x;
}

function validation(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("test").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("test").innerHTML = this.responseText;

    }
  };
  var productname=document.getElementById("ProductName").value;
  xhttp.open("GET", "validation.php?q="+str+"&productname="+productname, true);
  xhttp.send();   
}