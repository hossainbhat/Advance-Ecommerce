@extends("layouts.admin_layouts.admin_layout")
@section('title','Users Chart')
@section("content")
<?php
 $months = array();
 $count =0;
 while($count <=3){
    $months[] = date('M Y', strtotime("-".$count." month"));
    $count ++;
 }


$dataPoints = array(
	array("y" => $userCount[3], "label" => $months[3]),
	array("y" => $userCount[2], "label" => $months[2]),
	array("y" => $userCount[1], "label" => $months[1]),
	array("y" => $userCount[0], "label" => $months[0]),
);
 
?>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<h6 class="mb-0 text-uppercase">Users Chart</h6>
                <a href="{{url('admin/users')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">User List <i class="lni lni-list"></i></button></a>
                <hr/>
                <div class="card">
					<div class="card-body">
						
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>

						
					</div>
				</div>
				
			</div>
		</div>
		<!--end page wrapper -->
		
@endsection
@section("script_js")
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Users Report"
	},
	axisY: {
		title: "Number of Users"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

@endsection