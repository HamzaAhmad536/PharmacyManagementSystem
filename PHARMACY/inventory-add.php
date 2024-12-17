<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="form4.css">
<title>
Medicines
</title>
</head>

<body>

	<div class="sidenav">
			<h2 style="font-family:Arial; color:white; text-align:center;"> PHARMACIA </h2>
			<a href="adminmainpage.php">Dashboard</a>
			<button class="dropdown-btn">Inventory
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="inventory-add.php">Add New Medicine</a>
				<a href="inventory-view.php">View Inventory</a>
			</div>
			<button class="dropdown-btn">Suppliers
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="supplier-add.php">Add New Supplier</a>
				<a href="supplier-view.php">Manage Suppliers</a>
			</div>
			<button class="dropdown-btn">Stock Purchase
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="purchase-add.php">Add New Purchase</a>
				<a href="purchase-view.php">Manage Purchases</a>
			</div>			
			<button class="dropdown-btn">Employees
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="employee-add.php">Add New Employee</a>
				<a href="employee-view.php">Manage Employees</a>
			</div>			
			<button class="dropdown-btn">Customers
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="customer-add.php">Add New Customer</a>
				<a href="customer-view.php">Manage Customers</a>
			</div>
			<a href="sales-view.php">View Sales Invoice Details</a>
			<a href="salesitems-view.php">View Sold Products Details</a>
			<a href="pos1.php">Add New Sale</a>		
			<button class="dropdown-btn">Reports
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="stockreport.php">Medicines - Low Stock</a>
				<a href="expiryreport.php">Medicines - Soon to Expire</a>
				<a href="salesreport.php">Transactions Reports</a>			
			</div>			
	</div>

	<div class="topnav">
		<a href="logout.php">Logout</a>
	</div>
	
	<center>
	<div class="head">
	<h2> ADD MEDICINE DETAILS</h2>
	</div>
	</center>
	
	
	<br><br><br><br><br><br><br><br>
	
	
	<div class="one">
    <div class="row">
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <div class="row">
                <div class="column" style="width: 48%; margin-right: 4%;">
                    <p>
                        <label for="medid" style="font-weight: bold;">Medicine ID:</label><br>
                        <input type="number" name="medid" id="medid">
                    </p>
                    <p>
                        <label for="medname" style="font-weight: bold;">Medicine Name:</label><br>
                        <input type="text" name="medname" id="medname" >
                    </p>
                    <p>
                        <label for="brdname" style="font-weight: bold;">Brand Name:</label><br>
                        <input type="text" name="brdname" id="brdname">
                    </p>
                    <p>
                        <label for="category" style="font-weight: bold;">Medicine Category:</label><br>
                        <select id="category" name="category" required style="width: 85%">
                            <option value="Tablet">Tablet</option>
                            <option value="Capsule">Capsule</option>
                            <option value="Syrup">Syrup</option>
                            <option value="Ointment">Ointment</option>
                            <option value="Suppository">Suppository</option>
                            <option value="Injection">Injection</option>
                            <option value="Inhaler">Inhaler</option>
                            <option value="Oral Solution">Oral Solution</option>
                            <option value="Lozenge">Lozenge</option>
                            <option value="Drop">Drop</option>
                            <option value="Gel">Gel</option>
                            <option value="Spray">Spray</option>
                            <option value="Emulsion">Emulsion</option>
                        </select>
                    </p>
                </div>

                <div class="column" style="width: 48%;">
                    <p>
                        <label for="usedfor" style="font-weight: bold;">Used for:</label><br>
                        <input type="text" name="usedfor" id="usedfor" >
                    </p>
					<p>
						<label for="qty"  style="font-weight: bold;">Quantity:</label><br>
						<input type="number" name="qty">
					</p>
                    <p>
                        <label for="sp" style="font-weight: bold;">Price:</label><br>
                        <input type="number" step="0.01" name="sp" id="sp" >
                    </p>
                    <p>
                        <label for="loc" style="font-weight: bold;">Storage Location:</label><br>
                        <input type="text" name="loc" id="loc" >
                    </p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 20px;">
    			<input type="submit" name="add" value="Add Medicine" style="background-color:rgb(76, 92, 175); color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
			</div>

        </form>
    </div>
</div>
		
	<?php
	
		include "config.php";
		 

		if(isset($_POST['add']))
		{
		$id = mysqli_real_escape_string($conn, $_REQUEST['medid']);
		$name = mysqli_real_escape_string($conn, $_REQUEST['medname']);
		$brd = mysqli_real_escape_string($conn, $_REQUEST['brdname']);
		$qty = mysqli_real_escape_string($conn, $_REQUEST['qty']);
		$category = mysqli_real_escape_string($conn, $_REQUEST['category']);
		$sprice = mysqli_real_escape_string($conn, $_REQUEST['sp']);
		$location = mysqli_real_escape_string($conn, $_REQUEST['loc']);
		$uf = mysqli_real_escape_string($conn, $_REQUEST['usedfor']);

		 
		$sql = "INSERT INTO meds VALUES ($id, '$name', '$brd' , $qty,'$category',$sprice, '$location' , '$uf')";
		if(mysqli_query($conn, $sql)){
			echo "<p style='font-size:8;'>Medicine details successfully added!</p>";
		} else{
			echo "<p style='font-size:8; color:red;'>Error! Check details.</p>";
		}
		}
		 

		$conn->close();
	?>
		</div>
	</div>
			
</body>

<script>
	
		var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;

			for (i = 0; i < dropdown.length; i++) {
			  dropdown[i].addEventListener("click", function() {
			  this.classList.toggle("active");
			  var dropdownContent = this.nextElementSibling;
			  if (dropdownContent.style.display === "block") {
			  dropdownContent.style.display = "none";
			  } else {
			  dropdownContent.style.display = "block";
			  }
			  });
			}
			
</script>

</html>
