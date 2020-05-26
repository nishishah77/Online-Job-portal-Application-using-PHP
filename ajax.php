<?php
	include "db.php";
	$country=0;
	if(!isset($_GET['for']))
	{
		if(isset($_GET) && isset($_GET['country']))
		{
			
			$country = $_GET['country'];

			$states = mysqli_query($conn,"select * from state where country_id = $country");
			while( $s = mysqli_fetch_array($states))
			{
				echo "<li data-value=".$s['state_id']." class='option' onclick='fillCityUL(".$s['state_id'].")'>".$s['state_name']."</li>";
			}
		}
		$state=0;

		if(isset($_GET) && isset($_GET['state']) )
		{
			$state = $_GET['state'];

			$cities = mysqli_query($conn,"select * from city where state_id = $state");
			if(isset($_GET['purpose']) && $_GET['purpose'] == "UL")
			{
				while( $c = mysqli_fetch_array($cities))
				{
					echo "<li data-value=".$c['city_id']." class='option'>".$c['city_name']."</li>";
				}
			}
			if (isset($_GET['purpose']) && $_GET['purpose'] == "Option")
			{
				while( $c = mysqli_fetch_array($cities))
				{
				   echo "<option value=".$c['city_id'].">".$c['city_name']."</option>";
				}

			}
		}
	}
	$country=0;
	
	if(isset($_GET) && isset($_GET['country']) && isset($_GET['for']) && $_GET['for']=="company")
	{
		
		$country = $_GET['country'];

		$states = mysqli_query($conn,"select * from state where country_id = $country");
		while( $s = mysqli_fetch_array($states))
		{
			echo "<li data-value=".$s['state_id']." class='option' onclick='companyfillCityUL(".$s['state_id'].")'>".$s['state_name']."</li>";
		}
	}
	$state=0;
	if(isset($_GET) && isset($_GET['state']) && isset($_GET['for']) && $_GET['for']=="company")
	{
		$state = $_GET['state'];

		$cities = mysqli_query($conn,"select * from city where state_id = $state");
		if(isset($_GET['purpose']) && $_GET['purpose'] == "UL")
		{
			while( $c = mysqli_fetch_array($cities))
			{
				echo "<li data-value=".$c['city_id']." class='option'>".$c['city_name']."</li>";
			}
		}
		if (isset($_GET['purpose']) && $_GET['purpose'] == "Option")
		{
			while( $c = mysqli_fetch_array($cities))
			{
			   echo "<option value=".$c['city_id'].">".$c['city_name']."</option>";
			}

		}
	}

?>