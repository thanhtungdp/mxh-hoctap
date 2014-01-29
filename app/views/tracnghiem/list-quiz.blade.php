@extends("tracnghiem.quiz")

@section('title')
	@if(isset($chuyenmuc_id))
		{{TracNghiemController::getChuyenmucNameById($chuyenmuc_id)}} |
	@endif
	Danh sách trắc nghiệm
@endsection

@section('hero-unit')
<link rel="stylesheet" href="{{Asset('assets/css/tracnghiem/re-trac-nghiem.css')}}"/>

<div class="hero-unit-inner text-center">
	<div class="text-in-hero">
	  <h2>Hệ thống tạo Trắc Nghiệm Online</h2>
	  <h4>Chỉ với vài click đơn giản bạn đã có thể chia sẻ kiến thức</h4>
	</div>
</div>
@endsection

@section('content')
<link rel="stylesheet" href="{{Asset('assets/css/tracnghiem/do-quiz.css')}}"/>
<script type="text/javascript">
	$.ytLoad();
	$(document).ready(function(){
		var check_back=false;
		changeSelectChuyenmuc(location.pathname);
		function changeSelectChuyenmuc(url){
			var id="";
			var index;
			for(var i=url.length;i>0;i--){
				if(url[i]=="/"){
					index=i;
					break;
				}				
			}
			for(var i=index+1;i<url.length;i++){
				id+=url[i];
			}
			var id_text=id;
			id=parseInt(id);
			$("#list-chuyen-muc ul").find(".selected").removeClass("selected");
			$("#list-chuyen-muc ul li a#chuyen-muc-"+id).addClass("selected");	
			$("#list-chuyen-muc ul li a#chuyen-muc-"+id_text).addClass("selected");	
		}
		function addToDoQuiz(data){
			var html="";
			if(data.length>0){
                for(var i=0;i<data.length;i++){
					html+='<div class="de-trac-nghiem">'+
								'<div class="including">'+
									'<a  href="'+data[i].url+'" data-pjax="body"><p class="title-18 title-quiz pull-left">'+data[i].chu_de+'</p></a>'+
									'<a  href="'+data[i].url+'" data-pjax="body"><button class="btn btn-do-quiz pull-right"><span class="iconQuiz-info iconQuizPen"></span>Làm bài</button></a>'+
								'</div>'+

								'<ul class="info nav including">'+
									'<li><span class="iconQuiz-info iconQuizQuestion"></span>'+data[i].count_cauhoi+'</li>'+
									'<li><span class="iconQuiz-info iconQuizAuthor"></span><span class="author-text">'+data[i].author_username+'</span></li>'+
									'<li><span class="iconQuiz-info iconQuizCategory"></span>'+data[i].chuyenmuc_name+'</li>'+
								'</ul>'+
							'</div><hr/>';						
                }
            }
            else
            	html='<h3 class="text-center">Không có chủ đề nào </h3>';
			$("#do-quiz").html(html);
		}
		function changeContent(url){
			$.ajax({
	            type:"GET",
	            url:url+"?getJSON",
	            dataType:'json',
	            beforeSend:function(){
	            	$("#do-quiz").html("<p class='text-center'><img src='"+getURL()+"img/ajax-loader.gif' class='text-center'/></p>")
	            },
	            success:function(data){
	            	$('#do-quiz').empty();
	            	addToDoQuiz(data);
	                history.pushState(null, null, url);	 
	            }
	        });
			
		}
		window.setTimeout(function() {
		    window.addEventListener("popstate", function(e) {
		    	if(check_back==true){
		      		changeContent(location.pathname);
		      		changeSelectChuyenmuc(location.pathname);
		      	}
		    }, false);
		 }, 1);
	    

		$("#list-chuyen-muc ul li a").live('click',function(){
			$(".ui-loader").hide();
			var url=$(this).attr("href");
			$("#list-chuyen-muc ul").find(".selected").removeClass("selected");
			$(this).addClass("selected");	

			//Hide menu
			$("#btn-toggle").addClass("collapsed");

			changeContent(url);
			check_back=true;
			return false;
		});
		$("#frmSearch").submit(function(){		
			var search=$(this).find("input[name=tracnghiem-search]").val();
			var chuyenmuc_id=$(this).find("select[name=chuyenmuc_id]").val();
			var url=$(this).attr("action")+"/"+search+"/"+chuyenmuc_id;
			if(search=="")
				alert("Chưa nhập chuỗi để tìm kiếm");
			else
				$.ajax({
					type:"GET",
					url:url+"?getJSON",
					dataType:'json',
					beforeSend:function(){
		            	$("#do-quiz").html("<p class='text-center'><img src='"+getURL()+"img/ajax-loader.gif' class='text-center'/></p>")
		            },
					success:function(data){
						$('#do-quiz').empty();
		            	addToDoQuiz(data);
		                history.pushState(null, null, url+"");	 
					}
				});
			return false;
		});
	});
</script>
<div id="searchform">
	<div class="container">
		<form action="{{Asset('trac-nghiem/tim-kiem')}}" id="frmSearch" style="">
			<div class="row">
				<div class="span8">
					@if(isset($text_search))
						<input type="text" name="tracnghiem-search" class="span8" value="{{$text_search}}"/>
					@else
						<input type="text" name="tracnghiem-search" class="span8" placeholder="Tìm kiếm ..."/>
					@endif
				</div>
				<div class="span2">
					<select class="span2" name="chuyenmuc_id">
						<option value="">Chọn chuyên mục</option>
						<option value="">Tất cả</option>
						@foreach(TracNghiemChuyenMuc::get() as $chuyenmuc)
						<option value="{{$chuyenmuc->id}}">{{$chuyenmuc->chuyen_muc}}</option>
						@endforeach
					</select>
				</div>
				<div class="span2">
					<button class="span2 btn"><span class="iconQuiz-info iconQuizFind"></span>Tìm</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div id="quiz">
	<div class="container">
		<div class="row">
			<div class="span4">
				<div id="sidebar">
					<div class="including row-sidebar navbar" id="chuyen-muc">
						<p class="title-18">Chuyên mục</p>
						<button type="button" class="btn btn-navbar" id="btn-toggle" data-toggle="collapse" data-target="#list-chuyen-muc">
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		              	</button>
						<div class="nav-collapse collapse" id="list-chuyen-muc">
							<ul class="chuyen-muc menu-left-sidebar">
								<li><a href="{{Asset('trac-nghiem/danh-sach-trac-nghiem')}}" id="chuyen-muc-danh-sach-trac-nghiem">Tất cả</a></li>
								@foreach(TracNghiemChuyenMuc::get() as $chuyenmuc)
								<li><a href="{{TracNghiemController::getUrlChuyenMuc($chuyenmuc->chuyen_muc,$chuyenmuc->id)}}" id="chuyen-muc-{{$chuyenmuc->id}}">{{$chuyenmuc->chuyen_muc}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="span8">
				<div id="do-quiz">
					@if(count($data_chude)==0) 
					<h3 class="text-center">Không có chủ đề nào </h3>
					@endif
					@foreach($data_chude as $chude)
					<div class="de-trac-nghiem">
						<div class="including">
							<a href="{{TracNghiemController::getUrlChuDe($chude->chu_de,$chude->id)}}" data-pjax="body"><p class="title-18 title-quiz pull-left">{{$chude->chu_de}}</p></a>
							<a href="{{TracNghiemController::getUrlChuDe($chude->chu_de,$chude->id)}}" data-pjax="body"><button class="btn btn-do-quiz pull-right"><span class="iconQuiz-info iconQuizPen"></span>Làm bài</button></a>
						</div>

						<ul class="info nav including">
							<li><span class="iconQuiz-info iconQuizQuestion"></span>{{TracNghiemController::getCountCauHoi($chude->id)}}</li>
							<li><span class="iconQuiz-info iconQuizAuthor"></span><span class="author-text">{{UserController::getUsernameById($chude->author_id)}}</span></li>
							<li><span class="iconQuiz-info iconQuizCategory"></span>{{TracNghiemController::getChuyenmucNameById($chude->chuyenmuc_id)}}</li>
						</ul>
					</div>
					<hr/>
					@endforeach
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection