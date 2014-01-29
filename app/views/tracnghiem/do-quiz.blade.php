@extends('tracnghiem.quiz')

@section('title')
	@if(!empty($data_cauhoi))
		{{TracNghiemController::getChudeNameById($chude_id)}}
	@else
	Không tìm thấy chủ đề này
	@endif
@endsection

@section('hero-unit')
<style type="text/css">
	.hero-unit{
   	background-position-y: -150px !important;
	}
</style>
<link rel="stylesheet" href="{{Asset('assets/css/tracnghiem/re-trac-nghiem.css')}}"/>
<style type="text/css">
.hero-unit{
		min-height: 220px !important;
	}
</style>
@endsection
@section('content')
<script type="text/javascript">
	//Positon fixed
	var width=$(window).width();
	var scrollTop=$(window).scrollTop();
	function changSizeKetQua(){
		if(width>768){
		   if(scrollTop>=300){

		   	 $("#sidebar").css("width","25%");
		   	 $("#sidebar").css("position","fixed");
		   	 $("#sidebar").css("top","0");
		   }
		   if(scrollTop<300){
		   	 $("#sidebar").css("width","initial");
		   	 $("#sidebar").css("position","initial");
		   	 $("#sidebar").css("top","0");
		   }
		   $("#nap-bai-bot").css("display","none");
		}
		else{
			$("#nap-bai-bot").css("display","block");
			$("#sidebar").css("width","initial");
		   	 $("#sidebar").css("position","initial");
		   	 $("#sidebar").css("top","0");
		}
	}
	$(window).scroll(function() {
		scrollTop=parseInt($(window).scrollTop());
	    changSizeKetQua();
	});
	$(window).resize(function(){
		width=parseInt($(window).width());
		changSizeKetQua();

	});
</script>
<script type="text/javascript">	
	$(document).ready(function(){
        var settings = {
        showArrows: true,
        autoReinitialise: true,
        stickToBottom:true
        };
        
		var timer; //Timer Interval
		function cau_hoi_object(){
			this.cau_selected="";
			this.dap_an="";
		};
		var cau_hoi=new Array();
		var cau_sai=new Array();
		<?php $i=1;?>
		@foreach($data_cauhoi as $cauhoi)
			cau_hoi[{{$i}}]=new cau_hoi_object();
			cau_hoi[{{$i}}].dap_an='{{$cauhoi->dap_an}}';
		<?php $i++ ?>
		@endforeach
		var so_cau=cau_hoi.length-1;
		var cau_dung=0;
		$(".all-dap-an a").live('click',function(){
			$(".ui-loader").hide();
			$(this).closest('.all-dap-an').find(".selected").removeClass("selected");
			$(this).find(".dap-an").addClass("selected");
			var cau=$(this).attr('dir');
			cau_hoi[cau].cau_selected=$(this).attr('href');
			return false;
		});

		$("#list-cau-sai a").live('click',function(){
			$(".ui-loader").hide();
		});
		function nap_bai(){
			var dem=0;
			for(var i=1;i<=so_cau;i++){
				if(cau_hoi[i].dap_an==cau_hoi[i].cau_selected){
					cau_dung++;		//Tăng câu đúng
				}
				else{
					cau_sai[dem]=i;	//Lưu câu sai
					dem++;
				}
			}	
			$("#timer").css("display","none");
			clearInterval(timer);
			replaceKetqua();	
			show_ket_qua();
			scroll_to("#sidebar");
			$('#list-cau-sai').jScrollPane(settings);
		}
		function show_ket_qua(){
			$("#ket-qua").css("display","block");
			$("#ket-qua .time").empty();
            $("#ket-qua .time").append(cau_dung+' / '+so_cau);
           if(cau_sai.length!=0){
	            var str="";
	            for(var i=0;i<cau_sai.length;i++){
	            	str="<a href='#cau-hoi-"+cau_sai[i]+"'>Câu"+cau_sai[i]+"</a>";
	            	$("#list-cau-sai ul").append("<li>"+str+"</li>");
	            }
           }
		};
		
		function replaceKetqua(){
			for(var i=0;i<cau_sai.length;i++){
				var dap_an=cau_hoi[cau_sai[i]].dap_an;
				var cau_selected=cau_hoi[cau_sai[i]].cau_selected;
				$("#cau-hoi-"+cau_sai[i]+" a[href="+cau_selected+"] .dap-an").removeClass("selected").addClass("selected-error");
				$("#cau-hoi-"+cau_sai[i]+" a[href="+dap_an+"] .dap-an").addClass("selected");
				
			}
		}
		$("button#nap-bai").live('click',function(){
			nap_bai();
		});
		$("button#nap-bai-bot").live('click',function(){
			nap_bai();
		});
		$("#start-timer").live('click',function(){
			
			$("#timer button#start-timer").remove();
			var phut='{{TracNghiemController::getThoigianChudeById($chude_id)}}';
			phut=parseInt(phut);
			var giay=00;
			var s_giay;
			var s_phut;
			var time;
			timer=setInterval(function(){
				if(giay==0) {
					phut--;
					if(phut==-1) {
						alert("Hết giờ làm bài");
						nap_bai();
					}
					giay=60;
				}
				giay--;
				if(giay%10==giay)
					s_giay="0"+giay;
				else s_giay=giay;
				time=phut+" : "+s_giay;
				$("#timer .time").html(time);			
			},1000)
		});
	});
</script>'

<link rel="stylesheet" href="{{Asset('assets/css/tracnghiem/do-quiz.css')}}"/>
<div id="tracnghiem-info">
	<div class="container">
		@if(!empty($data_cauhoi))
		<h3 class="text-center">Chủ đề: {{TracNghiemController::getChudeNameById($chude_id)}}</h3>
		<p class="text-center">Được tạo bởi <span class="author-text">{{UserController::getUsernameByChudeId($chude_id)}}</span></p>
		@else
		<h3 class="text-center">Không tồn tại chủ đề này</h3>
		@endif
	</div>
</div>
<div class="container" id="alert">

</div>
@if(!empty($data_cauhoi))
<div id="quiz">
	<div class="container">
		<div class="row">
			<div class="span4">
				<div id="sidebar">
					<div class="including row-sidebar" id="timer">
						<p class="title-18">Thời gian</p>
						<h2 class="time">{{TracNghiemController::getThoigianChudeById($chude_id)}}:00</h2>
						<button class="btn text-center" id="start-timer">Bắt đầu</button>
						<p>Nếu như bạn muốn làm bài theo thời gian hãy chọn bắt đầu.<br/>
							Bạn có thể không chọn chức năng này</p>
						<hr/>
						<button class="btn" id="nap-bai">Nạp bài</button>
					</div>
					<div class="including row-sidebar including row-sidebar navbar" id="ket-qua" style="display:none">
						<p class="title-18">Kết quả</p>
						<h2 class="time"></h2>
						<hr/>
						<div class="including">
							<button class="btn" style="width:100px;height:30px;color:white;background:#EC4454">Sai</button>
							<button class="btn" style="width:100px;height:30px;color:white;">Đúng</button>
						</div>
						<p class="title-18">Các câu sai</p>
						<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#list-cau-sai">
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		              	</button>
		              	<div class="nav-collapse collapse" id="list-cau-sai" style="height:300px">
							<ul class="menu-left-sidebar">
							</ul>
						</div>
						
						
					</div>
				</div>
			</div>
			<div class="span8">
				<div id="do-quiz">
					<?php $i=1;?>
					@foreach($data_cauhoi as $cauhoi)
					<div class="cau-hoi" id="cau-hoi-{{$i}}">
						<p class="text-cau-hoi"><span class="title-16">Câu {{$i}}:</span>{{$cauhoi->noi_dung}}</p>
						<div class="all-dap-an including">
							@if(!empty($cauhoi->cau_a))
								<a href="A" dir="{{$i}}" data=""><div class="dap-an"><span class="character-dapan">A.</span>{{$cauhoi->cau_a}}</div></a>
							@endif
							@if(!empty($cauhoi->cau_b))
								<a href="B" dir="{{$i}}"><div class="dap-an"><span class="character-dapan">B.</span>{{$cauhoi->cau_b}}</div></a>
							@endif
							@if(!empty($cauhoi->cau_c))
								<a href="C" dir="{{$i}}"><div class="dap-an"><span class="character-dapan">C.</span>{{$cauhoi->cau_c}}</div></a>
							@endif
							@if(!empty($cauhoi->cau_d))
								<a href="D" dir="{{$i}}"><div class="dap-an"><span class="character-dapan">D.</span>{{$cauhoi->cau_d}}</div></a>
							@endif
						</div>
					</div>
					<hr/>
					<?php $i++ ?>
					@endforeach
					<button class="btn" id="nap-bai-bot">Nạp bài</button>
				</div>
			</div>
			
		</div>
	</div>
</div>
@endif
@endsection