<style type="text/css">

 .wrapper{
    padding: 40px 90px;
    background-color: #ffffff;
    width: 80%;
    height: 100% auto;
    margin: 0px auto;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px; 
    }

    .data{
   font-family:Arial, Helvetica, sans-serif;
   padding-top: 1px;
}

table { 
      border-spacing:6px; 
      border-collapse:collapse; 
      padding-top: 6px;  

    }
 
</style>
 
<?php
	include "config/koneksi.php";
	error_reporting();

	$loc 		 = $_GET["loc"];
	$indo 		 = $_GET["indo"];
	$arrdep		 = $_GET["arrdep"];
	/*var_dump($loc, $indo, $arrdep);*/
?>

<div class="data">
	<div class="wrapper">

		<div class="table-responsive">	
		<table class="table-bordered" id="row" width="100%" cellpadding="" ;>
		<thead>
		<tr align="center">
			<th><font size="4px">No.</font></th>
			<th><font size="4px">Airlines</font></th>
			<th><font size="4px">Flight</font></th>
			<th><font size="4px">Destination/From</font></th>
			<th><font size="4px">Schedule</font></th>
			<th><font size="4px">Status</font></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php
				include "config/koneksi.php";
				$no = 1;
				$path = "img/airlines/";
				$type = ".png";
				$query = mysqli_query($konek, "SELECT iata, flight, sname, schedule, status FROM flights WHERE LENGTH(trim(iata)) < 4 AND LENGTH(trim(iata)) > 0 AND loc='$loc' AND indo='$indo' AND arrdep = '$arrdep' ORDER BY schedule")or die(mysqli_error($konek));
					if(mysqli_num_rows($query) == 0){
						echo '<tr><td colspan="6" align="center">Tidak ada data!</td></tr>';
					}
					else {
						$no = 1;

						while($row = mysqli_fetch_array($query))
						 {  
							?>
				  
				          <td><center><font size="3px"><?php echo $no++; ?></font></center></td>
				          <td><center><font size="3px"><?php echo '<img src = "'.$path.$row['iata'].$type.'" width="90px" height="35px">'; ?></font></center></td>
				          <td><center><font size="3px"><?php echo $row['flight']; ?></font></center></td>
				          <td><center><font size="3px"><?php echo ucwords(strtolower($row['sname'])); ?></font></center></td>
				          <td><center><font size="3px"><?php echo $row['schedule']; ?></font></center></td>
				          <td><center><font size="3px"><?php echo ucwords(strtolower($row['status'])); ?></font></center></td>
				          </tr>


				        <?php }

				        ?>		
			</tr>
		</tbody>
	</table>
	</div>
	

    <script type="text/javascript">
    	$('#row').dataTable( {
  			 stateSave: true,
  			 paging: false
  			
		} );
	</script>
	
		
		
	
	 
	 	<!-- $('#row').dataTable( {
   		 searching: false
		} );*/
	/*$('#row').dataTable( {
	  "stateSave": true,
	   stateLoadParams: function (settings, data) {
	    return false;
	 	 }
		} );*/
	/*row.columns().eq( 0 ).each( function ( colIdx ) {
    $( 'input', row.column( colIdx ).footer() ).on( 'keyup change', function () {
        row
            .column( colIdx )
            .search( this.value )
            .draw();
   		 } );
		} ); -->

	
	<?php
	}
	?>
