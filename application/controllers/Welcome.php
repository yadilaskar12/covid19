<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	var $API="";
	public function __construct()
	{
		parent::__construct();
		$this->API="https://api.kawalcorona.com/indonesia";

	}
	public function index()
	{
		// $url=curl_init();
		// curl_setopt($url, CURLOPT_URL,"https://api.kawalcorona.com/indonesia/provinsi");
		// curl_setopt($url,CURLOPT_RETURNTRANSFER,1);

		// $output=curl_exec($url);
		// curl_close($url);
		// $d=json_decode($output);1
		// var_dump($d);
		$as=file_get_contents("https://api.kawalcorona.com/indonesia");
		$dataPerProvinsi=file_get_contents("https://api.kawalcorona.com/indonesia/provinsi");
		$global=file_get_contents("https://api.kawalcorona.com/");

		// $dataMapPenyebaran=file_get_contents("https://services5.arcgis.com/VS6HdKS0VfIhv8Ct/arcgis/rest/services/COVID19_Indonesia_per_Provinsi/FeatureServer/0/query?where=1%3D1&outFields=*&outSR=4326&f=json");
		$ad=json_decode($as,true);
		$data2=json_decode($dataPerProvinsi,true);
		$map=json_decode($dataMapPenyebaran,true);
		$globaData=json_decode($global,true);
		foreach ($ad as $ads) {
			$covid=[
				"name"=>$ads["name"],
				"positif"=>$ads["positif"],
				"sembuh"=>$ads["sembuh"],
				"meninggal"=>$ads["meninggal"]

			];
		}
		

		// QteXGJJkdo4J4ak#wzDG pass:covid 00webhost


		// foreach ($data2 as $key) {
		// 	$covid2=[
		// 		"Kode_Provi"=>$key[0]["Kode_Provi"],
		// 		"Provinsi"=>$key[0]["Provinsi"],
		// 		"Kasus_Semb"=>$key[0]["Kasus_Semb"],
		// 		"Kasus_Posi"=>$key[0]["Kasus_Posi"],
		// 		"Kasus_Meni"=>$key[0]["Kasus_Meni"]

		// 	];
		// }
		$data["result"]=$covid;
		$data["resultProvinsi"]=$data2;
		$data["dataGlobal"]=$globaData;
		$data["mapp"]=$map["features"];
		$this->load->view('welcome_message',$data);
	}
}
