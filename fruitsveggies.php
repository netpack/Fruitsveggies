<?
/*Dev by www.netpack.pt*/
require_once "excel_reader2.php";
$data = new Spreadsheet_Excel_Reader("fruit-vegetable-consumption-region.xls",false);
$cidade = $data->val(13,'B',1);
$valor_persons_cidades_en_2010 = $data->val(13, 'L', 1);

//echo "Showing stats for: ".$cidade;

?>


<div class="cidades_bg" style="display:none">
<span id="bt_1">North East</span>
<div class="linhabranca"></div>
<span id="bt_2">North West</span>
<div class="linhabranca"></div>
<span id="bt_3">Yorkshire and the Humber</span>
<div class="linhabranca"></div>
<span id="bt_4">East Midlands</span>
<div class="linhabranca"></div>
<span id="bt_5">West Midlands</span>
<div class="linhabranca"></div>
<span id="bt_6">East of England</span>
<div class="linhabranca"></div>
<span id="bt_7">London</span>
<div class="linhabranca"></div>
<span id="bt_8">South East</span>
<div class="linhabranca"></div>
<span id="bt_9">South West</span>

</div>
<div class="body">
<div class="all header"><div class="margem1">Showing stats for: <span id="txt_cidade"><? echo $cidade ?></span></div><div id="bt_list_cidades">Area</div></div>
<div class="mainbody">
<div id="frutos_stats"><div id="img_frutos"></div><div id="txt_percent"><span id="valor">0</span>%</div></div>
<div id="txtbase1">Percentage of adults (16+) who met the recommended guidelines of consuming five or more portions of fruit and vegetables a day</div>
<div id="txtbase2">
*Based on the stats from 2010 from the <a href="http://data.london.gov.uk/dataset/fruit-and-vegetable-consumption-region" target="_blank">London Datastore</a>
under the <a href="http://reference.data.gov.uk/id/open-government-licence" target="_blank">UK Open Government Licence (OGL)</a>
for the <a href="http://www.programmr.com/hired_london_hackathon" target="_blank">Hired.com London Hackathon 2015</a><br>
<div id="txt_importante">Sorry to ask, but what have YOU ATE TODAY? Is it really organic food?</div>
</div>
</div>
<div class="all footer">Developed by Netpack - Online Solutions! <a href="http://netpack.pt" target="_blank">www.netpack.pt</a></div>
</div>


<script src="jquery.js"></script>
<style>
.body{
	
	background: url('medieval_england_map2.jpg') no-repeat center center fixed; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	top:0;
	left:0;
	width:100%;
	height:100%;

	position:fixed;

}
.header{
    box-shadow: 2px 2px 2px #3e3e3e;
    font-size: 2.5em;
    font-weight: bolder;
    height: 3em;
    min-width: 550px;
    padding-top: 0.5em;
}
.mainbody{
height:auto;
min-height:85%;
}
.footer{
height:2.5em;
box-shadow: 2px 2px 2px #3e3e3e;
position:fixed;
bottom:0;
left:0;
color:#FFF;
padding-top:.5em;
text-align:center;
}
.all{
width:100%;
background-color:rgba(198,240,222,.86);
color:#39745A;
}
#img_frutos{
	background-image: url("veggies.png");
    background-size: cover;
    height: 203px;
    width: 220px;
    float:left;
}
#frutos_stats{
    left: 20%;
    position: absolute;
    top: 320px;
}
#txt_percent{
	float:left;
	margin-top:25px;
	font-size:6.2em;
	color:#FFF;
	font-weight:bolder;
	text-shadow: 4px 2px #333333;
}
#bt_list_cidades{
	background-color: #fff;
    border: 1px solid black;
    float: right;
    margin-right: 15px;
    padding: 4px;
    cursor:pointer;
}
.cidades_bg{
	background-color: rgba(0, 0, 0, 0.7);
    color: #fff;
    left: 0;
    padding-bottom: 30px;
    padding-top: 30px;
    position: fixed;
    text-align: center;
    top: 4em;
    width: 100%;
    z-index: 101;
}
.linhabranca{
	background-color: #fff;
    height: 1px;
    margin: 30px auto;
    width: 90%;
}
.cidades_bg span{
	width:100%;
	text-align:center;
	cursor:pointer;
}
.margem1{
	margin-left:10px;
	float: left;
}
#txtbase1{
    color: #fff;
    font-size: 2em;
    font-weight: bolder;
    height: 5em;
    padding: 5%;
    position: fixed;
    text-align: justify;
    text-shadow: 4px 2px #000000;
    top: 55%;
    width: 90%;
    background-color: rgba(0, 0, 0, 0.66);
    padding: 5%;
    left:0;
}
#txtbase2{
    padding: 5%;
    position: fixed;
    text-align: justify;
    text-shadow: 1px 1px #000000;
    top: 80%;
    left:0;
    width: 90%;
    color:#FFF;
    background-color:rgba(0,0,0,.66);
}
a{
	text-decoration:none;
	color:#FFF;
}
#txt_importante{
width:100%;text-align: right;font-weight:bolder;margin-top:10px;
}
</style>

<script type="text/javascript">

	$(document).ready(function(){
			console.log('Engine loaded dude!');
			novovalor=0;




			$("#bt_1").click(function(){
				<? 
					$cidade_1 = $data->val(7,'B',1);
					$valor_persons_cidades_en_2010_1 = $data->val(7, 'L', 1);
				?>
				valor1 = <? echo $valor_persons_cidades_en_2010_1?>;
				cidade1 = "<? echo $cidade_1 ?>";
				$("#txt_cidade").text(cidade1);
				$(".cidades_bg").fadeToggle('fast');
				$('#valor').text("0");
				muda_txt(valor1);
			});
			
			


			<? 
					
					for($i=2;$i<=9;$i++){

							$col = 6+$i;
							$ncidade[$i] = $data->val($col,'B',1);
							$nvalor_persons_cidades_en_2010[$i] = $data->val($col,'L', 1);

						echo "
							$('#bt_".$i."').click(function(){
									$('#txt_cidade').text('".$ncidade[$i]."');
									$('.cidades_bg').fadeToggle('fast');
									$('#valor').text('0');
									muda_txt('".$nvalor_persons_cidades_en_2010[$i]."');
							});
						";
					}


				?>


			



			

			$("#bt_list_cidades").click(function(){

						$(".cidades_bg").fadeToggle('fast');
				});

			
			valor = <?php echo $valor_persons_cidades_en_2010?>;
			console.log('valor: '+valor);
			

			muda_txt = function(valorpassado){
					valoratual = parseInt($('#valor').text());
					//console.log('valoratual: '+valoratual);
					setTimeout(function(){
							if(valoratual<valorpassado){
								//console.log('inside if 86');
								if(novovalor!=valorpassado){
									novovalor = valoratual+1;
								}
									//console.log('novovalor: '+novovalor);
									//$('#valor').fadeOut(10,function(){
											$('#valor').text(novovalor).fadeIn(30,function(){muda_txt(valorpassado);});
										//});
									
									
							}			
						},50);

				}
			muda_txt(valor);
			
			
		});

</script>




<?







exit; //done.. exiting!