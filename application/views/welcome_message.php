
<!doctype html>
<html lang="en">
<head>
	<title>Pantau Corona</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- Material Kit CSS -->
	<link href="<?php echo base_url('assets')?>/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url('assets')?>/css/now-ui-dashboard.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
	integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
	crossorigin=""/>
	<style>

		#card{
			padding-left: 20px;
		}
	/*	.bg-infoo{
			background: linear-gradient(145deg, #faffff, #d3dde2);;
			}*/
			.card{
				margin-left: 7px;
				border-radius: 16px;
				background: white;
				box-shadow:  10px 10px 2px rgba(0,0,0,0.1), 
				-10px -10px 3px rgba(0,0,0,0.1);
			}
			.nav-link{



				font-size: 1.1rem;
				line-height: 20px;









			}
		</style>

	</head>
	<body id="peta" style="height: 100vh;margin:0;">
		<nav class="navbar fixed-top navbar-expand-lg bg-danger">
			<div class="container">
				<a class="navbar-brand font-weight-bold" href="#">Pantau Corona | Powered By Rahmad Riyadi</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar navbar-kebab"></span>
					<span class="navbar-toggler-bar navbar-kebab"></span>
					<span class="navbar-toggler-bar navbar-kebab"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						<li class="nav-item active  font-weight-bold">
							<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active  font-weight-bold">
							<a class="nav-link" href="#" data-toggle="modal" data-target="#info">Tentang Saya<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active  font-weight-bold">
							<a class="nav-link" href="#" data-toggle="modal" data-target="#dataPerProvinsi">Data Per Provinsi <span class="sr-only">(current)</span></a>
						</li>

						<li class="nav-item active  font-weight-bold">
							<a class="nav-link" href="#" data-toggle="modal" data-target="#dataG">Data Global<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active  font-weight-bold">
							<a class="nav-link" href="#">Data Local<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active  font-weight-bold">
							<a class="nav-link" href="#">Data Statistik<span class="sr-only">(current)</span></a>
						</li>

						<!-- <li class="nav-item active font-weight-bold">
							<button class="btn btn-success" href="#" d>Data Penyebaran Virus Per Provinsi </button>
						</li>
						<li class="nav-item active font-weight-bold">
							<button class="btn btn-success" href="#" data-toggle="modal" data-target="#dataPerProvinsi">Data Penyebaran Virus Per Provinsi </button>
						</li>

						<li class="nav-item active font-weight-bold">
							<button class="btn btn-success">Informasi Terkini </button>
						</li>
						<li class="nav-item active btn btn-success font-weight-bold">
							<button class="btn btn-success">Statistik </button>
						</li> -->



					</ul>
					<form class="form-inline ml-auto">
						<div class="form-group no-border">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-neutral btn-icon btn-round">
							<i class="now-ui-icons ui-1_zoom-bold"></i>
						</button>
					</form>
				</div>
			</div>
		</nav>
		<br><br><br>
		<!-- modal -->
		<!-- Button trigger modal -->

		<div class="container fixed-bottom">

			<div class="btn-group justify-content-center" role="group" aria-label="Basic example">
				<button type="button" class="btn btn-dark font-weight-bold"><h6>Data Di <?php echo $result["name"] ?></h6></button>
				<button type="button" class="btn btn-dark font-weight-bold">Positif : <?php echo $result["positif"] ?></button>
				<button type="button" class="btn btn-success font-weight-bold">Sembuh :  <?php echo $result["sembuh"] ?></button>
				<button type="button" class="btn btn-danger font-weight-bold">Meninggal :  <?php echo $result["meninggal"] ?></button>
			</div>


		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="dataPerProvinsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalScrollableTitle">Data Per Provinsi</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" style="overflow-y: scroll;height: 450px; overflow-x: scroll;">
						<div class="table-responsive table-full-width">
							<table class="table">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th>Kode provinsi</th>
										<th>Provinsi</th>
										<th>positif</th>
										<th class="text-right">Sembuh</th>
										<th class="text-right">Meninggal</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach ($resultProvinsi as $row): ?>
									<tr>
										<td class="text-center"><?php echo $no++?></td>
										<td class="text-center"><?php echo $row["attributes"]["Kode_Provi"] ?></td>
										<td class="text-center"><?php echo $row["attributes"]["Provinsi"] ?></td>
										<td class="text-center"><button class="btn btn-success font-weight-bold"><?php echo $row["attributes"]["Kasus_Posi"] ?></button></td>
										<td class="text-center"><button class="btn btn-info font-weight-bold"><?php echo $row["attributes"]["Kasus_Semb"] ?></button></td>
										<td class="text-center"><button class="btn btn-danger font-weight-bold"><?php echo $row["attributes"]["Kasus_Meni"] ?></button></td>

									</tr>
								<?php endforeach ?>


							</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

				</div>
			</div>
		</div>
		<!-- Button trigger modal -->


		<!-- Modal -->
	</div>

	<div class="modal fade" id="dataG" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalScrollableTitle">Data Global</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="overflow-y: scroll;height: 450px; overflow-x: scroll;">
					<div class="table-responsive table-full-width">
						<table class="table">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th>Negara</th>
									<th>positif</th>
									<th class="text-right">Sembuh</th>
									<th class="text-right">Meninggal</th>
									<th class="text-center">Di Konfirmasi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach ($dataGlobal as $rowG): ?>
								<tr>
									<td class="text-center"><?php echo $no++?></td>
									<td class="text-center"><?php echo $rowG["attributes"]["Country_Region"] ?></td>
									<td class="text-center"><button class="btn btn-success font-weight-bold"><?php echo $rowG["attributes"]["Active"] ?></button></td>
									<td class="text-center"><button class="btn btn-info font-weight-bold"><?php echo $rowG["attributes"]["Recovered"] ?></button></td>
									<td class="text-center"><button class="btn btn-danger font-weight-bold"><?php echo $rowG["attributes"]["Deaths"] ?></button></td>
									<td class="text-center"><button class="btn btn-dark font-weight-bold"><?php echo $rowG["attributes"]["Confirmed"] ?></button></td>

								</tr>
							<?php endforeach ?>


						</tbody>
					</table> 
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>
<!-- global -->
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Informasi Aplikasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="overflow-y: scroll;height: 450px; overflow-x: scroll;">
				<ul class="list-group">
					<li class="list-group-item"><p>Pembuat : Rahmad Riyadi</p>
					<p>Email : rahmadriyadi164@gmail.com</p></li>
					<li class="list-group-item"><h3 class="font-weight-bold">Teknologi</h3><p>Codeigniter 3</p>
						<p>LEAFLET.JS</p>
						<p>BOOSTRAP 4</p>
						<p>DLL</p></li>
						<li class="list-group-item"><h3 class="font-weight-bold">SUMBER API</h3><br><p>https://api.kawalcorona.com/indonesia</p>
							<p>https://services5.arcgis.com/VS6HdKS0VfIhv8Ct/arcgis/rest/services/COVID19_Indonesia_per_Provinsi/FeatureServer/0/query?where=1%3D1&outFields=*&outSR=4326&f=json</p>
							<p>https://api.kawalcorona.com/indonesia/provinsi</p>	
							<p>https://api.kawalcorona.com/</p></li>

						</ul>






					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

					</div>
				</div>
			</div>


		</body>
		<!--   Core JS Files   -->
		<script src="<?php echo base_url('assets')?>/js/core/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url('assets')?>/js/core/popper.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url('assets')?>/js/core/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url('assets')?>/js/plugins/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>

		<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
		<script src="<?php echo base_url('assets')?>/js/now-ui-dashboard.js" type="text/javascript"></script>
		<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
		integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
		crossorigin=""></script>
		<script type="text/javascript">
			var map = L.map('peta').setView([-2.3199973,99.4322917],4);

			L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
				maxZoom: 18,
				id: 'mapbox/streets-v11',
				tileSize: 512,
				zoomOffset:-1,
				accessToken: 'pk.eyJ1IjoieWFkaS0xMjMiLCJhIjoiY2s4ZW03MTV2MTN5dDNmbjJkdjF2ZnBlOSJ9.5_9A63d89OV5-rYlhd5BTg'
			}).addTo(map);
	var prov_0 = L.marker([-5.7773029,106.1174687,210876]).addTo(map); //jakarta
	var  prov_1 = L.marker([-6.8665409,106.4836825]).addTo(map); //jawaB
	var  prov_2 = L.marker([-6.4457721,105.3795085]).addTo(map); //banten
	var  prov_3 = L.marker([-8.4556974,114.5110384],).addTo(map);//jawat
	var prov_4 = L.marker([-6.9673453,109.0020412,8]).addTo(map);//jawaTe
	var prov_5 = L.marker([-4.8234012,117.1944347,7]).addTo(map);//sulawesiS
	var prov_6 = L.marker([-8.4556974,114.5110384]).addTo(map);//bali
	var prov_7 = L.marker([-7.803249,110.3398253,13]).addTo(map);//DIY
	var prov_8= L.marker([0.0985018,114.186156,7]).addTo(map);//kaltim
	var prov_9= L.marker([1.8298874,96.4967397,7]).addTo(map);//sumatraU
	var prov_10= L.marker([-0.4784549,108.8666036,7]).addTo(map);//kalbar
	var prov_11= L.marker([-4.8590903,133.3095202,6]).addTo(map);//papua
	
	var prov_12 = L.marker([-1.5551571,97.9999872,7]).addTo(map);//sumatraB
	var prov_13= L.marker([-7.3058478,105.4083244]).addTo(map);//lampung
	var prov_14 = L.marker([-1.3832529,111.0455091,7]).addTo(map);//kalteng
	var prov_15= L.marker([1.6999101,103.9761952,7]).addTo(map);//kepulauan riau
	var prov_16= L.marker([4.0377725,94.4040142,7]).addTo(map);//aceh
	var prov_17= L.marker([-3.0293457,114.3294485,8]).addTo(map);//kalsel

	
	var prov_18= L.marker([0.8977381,99.6741386],7).addTo(map);//riau
	var prov_19 = L.marker([-1.1319263,119.5697961,7]).addTo(map);//sultengah
	var prov_20 = L.marker([-4.4946033,121.6191765,8]).addTo(map);//sulteng
	
	var prov_21 = L.marker([-1.610435,103.5394876,12]).addTo(map);//jambi
	var prov_22 = L.marker([-3.2747704,103.0069862,8]).addTo(map);//sumsel
	var prov_23 = L.marker([-8.5933632,116.456985,8]).addTo(map);//nusa tenggara barat
	var prov_24 = L.marker([1.5802124,114.0305335,7]).addTo(map);//kaliUT
	var prov_25= L.marker([2.9266669,122.9012879,7]).addTo(map);//sulawesi utara
	var prov_26 = L.marker([-1.6229931,130.0340475,7]).addTo(map);//paupa B
	var prov_27 = L.marker([-2.4581055,105.8567464,8]).addTo(map);//Bangka Belitung
		var prov_28 = L.marker([1.5802124,114.0305335,7]).addTo(map);//kalimayan utara

	var prov_29 = L.marker([2.9266669,122.9012879,846703]).addTo(map);//sulawesi utara
	var prov_30 = L.marker([-1.6229931,130.0340475,847468]).addTo(map);//papua barat

	
	var prov_29 = L.marker([2.9266669,122.9012879,846703]).addTo(map);//sulawesi utara
	var prov_30 = L.marker([-1.6229931,130.0340475,847468]).addTo(map);//papua barat

	var prov_31 = L.marker([-3.8253431,102.2345378,26435]).addTo(map);//bengkulu
	var prov_32 = L.marker([-1.6229931,130.0340475,847468]).addTo(map);//papua barat
	
	// var marker2 = L.marker([-6.4457721,105.3795085]).addTo(map);
	// var marker2 = L.marker([-6.4457721,105.3795085]).addTo(map);
	
	var circle = L.circle([51.508, -0.11], {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.5,
		radius: 500
	}).addTo(map);

	var polygon = L.polygon([
		[51.509, -0.08],
		[51.503, -0.06],
		[51.51, -0.047]
		]).addTo(map);

	// tandai dengan pop up
	// dki.bindPopup("DKI Jakarta").openPopup();
	// jawaB.bindPopup("Jawa Barat").openPopup();
	// marker.bindPopup("Lampung").openPopup();
	// marker1.bindPopup("Bali").openPopup();
	// marker2.bindPopup("Banten").openPopup();
	
	<?php foreach ($resultProvinsi as $key => $value): ?>
		prov_<?php echo $key; ?>.bindPopup("<h4 class='font-weight-bold text-dark''><?php echo $value["attributes"]["Provinsi"] ?></h4><br>Positif : <button class='btn btn-primary font-weight-bold'><?php echo $value["attributes"]["Kasus_Posi"] ?></button> Sembuh : <button class='btn btn-success font-weight-bold'><?php echo $value["attributes"]["Kasus_Semb"] ?></button> <br>Meninggal : <button class='btn btn-danger font-weight-bold'><?php echo $value["attributes"]["Kasus_Meni"] ?></button>").openPopup();
	<?php endforeach ?>
	
	circle.bindPopup("I am a circle.");
	polygon.bindPopup("I am a polygon.");


	// popup lengkap
	var popup = L.popup();

	function onMapClick(e) {
		popup
		.setLatLng(e.latlng)
		.setContent("You clicked the map at " + e.latlng.toString())
		.openOn(map);
	}

	map.on('click', onMapClick);

// data json
// var geojsonFeature = {
//     "type": "Feature",
//     "properties": {
//         "name": "Coors Field",
//         "amenity": "Baseball Stadium",
//         "popupContent": "Kasus Virus Corona"
//     },
//     "geometry": {
//         "type": "Point",
//         "coordinates": [-104.99404, 39.75621]
//     }
// };
// L.geoJSON(geojsonFeature).addTo(map);

// var myLines = [{
//     "type": "LineString",
//     "coordinates": [[-100, 40], [-105, 45], [-110, 55]]
// }, {
//     "type": "LineString",
//     "coordinates": [[-105, 40], [-110, 45], [-115, 55]]
// }];

// var myLayer = L.geoJSON().addTo(map);
// myLayer.addData(geojsonFeature);

// style
// var myLines = [{
//     "type": "LineString",
//     "coordinates": [[-100, 40], [-105, 45], [-110, 55]]
// }, {
//     "type": "LineString",
//     "coordinates": [[-105, 40], [-110, 45], [-115, 55]]
// }];

// var myStyle = {
//     "color": "#ff7800",
//     "weight": 5,
//     "opacity": 0.65
// };

// L.geoJSON(myLines, {
//     style: myStyle
// }).addTo(map);

// titik
// var states = [{
//     "type": "Feature",
//     "properties": {"party": "Republican"},
//     "geometry": {
//         "type": "Polygon",
//         "coordinates": [[
//             [-7.3058478,105.4083244],
//             [-7.3058478,105.4083244],
//             [-96.58,  45.94],
//             [-104.03, 45.94],
//             [-104.05, 48.99]
//         ]]
//     }
// }, {
//     "type": "Feature",
//     "properties": {"party": "Democrat"},
//     "geometry": {
//         "type": "Polygon",
//         "coordinates": [[
//             [-109.05, 41.00],
//             [-102.06, 40.99],
//             [-102.03, 36.99],
//             [-109.04, 36.99],
//             [-109.05, 41.00]
//         ]]
//     }
// }];

// L.geoJSON(states, {
//     style: function(feature) {
//         switch (feature.properties.party) {
//             case 'Republican': return {color: "#ff0000"};
//             case 'Democrat':   return {color: "#0000ff"};
//         }
//     }
// }).addTo(map);

// // jason marker

// var geojsonMarkerOptions = {
//     radius: 8,
//     fillColor: "#ff7800",
//     color: "#000",
//     weight: 1,
//     opacity: 1,
//     fillOpacity: 0.8
// };

// L.geoJSON(geojsonFeature, {
//     pointToLayer: function (feature, latlng) {
//         return L.circleMarker(latlng, geojsonMarkerOptions);
//     }
// }).addTo(map);

// // clik layer
// function onEachFeature(feature, layer) {
//     // does this feature have a property named popupContent?
//     if (feature.properties && feature.properties.popupContent) {
//         layer.bindPopup(feature.properties.popupContent);
//     }
// }

// var geojsonFeature = {
//     "type": "Feature",
//     "properties": {
//         "name": "Coors Field",
//         "amenity": "Baseball Stadium",
//         "popupContent": "This is where the Rockies play!"
//     },
//     "geometry": {
//         "type": "Point",
//         "coordinates": [-4.9452477,103.7706043]
//     }
// };

// L.geoJSON(geojsonFeature, {
//     onEachFeature: onEachFeature
// }).addTo(map);

// 	// show map

// 	var someFeatures = [{
//     "type": "Feature",
//     "properties": {
//         "name": "Coors Field",
//         "show_on_map": true
//     },
//     "geometry": {
//         "type": "Point",
//         "coordinates": [-4.9452477,103.7706043]
//     }
// }, {
//     "type": "Feature",
//     "properties": {
//         "name": "Busch Field",
//         "show_on_map": false
//     },
//     "geometry": {
//         "type": "Point",
//         "coordinates": [-104.98404, 39.74621]
//     }
// }];

// L.geoJSON(someFeatures, {
//     filter: function(feature, layer) {
//         return feature.properties.show_on_map;
//     }
// }).addTo(map);
</script>
</html>