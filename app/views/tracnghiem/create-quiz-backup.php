@extends("tracnghiem.quiz")

@section("title")
	Tạo hệ thống Trắc Nghiệm Online | {{getTitle()}}
@endsection

@section('hero-unit')
<link rel="stylesheet" href="{{Asset('assets/css/tracnghiem/re-trac-nghiem.css')}}"/>
<div class="hero-unit-inner text-center">
	<div class="text-in-hero">
	  <h2>Hệ thống tạo Trắc Nghiệm Online</h2>
	  <h4>Chỉ với vài click đơn giản bạn đã có thể chia sẻ kiến thức</h4>
	</div>
</div>
<script type="text/javascript"></script>
@endsection

@section('content')
<script type="text/javascript" src="{{Asset('assets/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{Asset('assets/ckeditor/adapters/jquery.js')}}"></script>


<div id="thongtin-tracnghiem">
	<div class="container">
		<div class="including">
			<h4 class="title-20 pull-left">Chủ đề</h4>
			<input type="text" class="span10 pull-right" name="chu-de" placeholder="Chủ đề của bài tập trắc nghiệm"/>
		</div>
		<div class="including">
            <div class="row">
                <div class="span6">
        			<h4 class="title-20 pull-left">Thời gian</h4>
        			<input type="text" class="span4 pull-right" name="thoi-gian" placeholder="Thời gian làm bài được tính bằng phút. VD: 45"/>
		        </div>
                <div class="span6">
                    <h4 class="title-20 pull-left">Chuyên mục</h4>
                    <select name="chuyen-muc" class="pull-right">
                        <option value="null">Chọn chuyên mục</option>
                        @foreach(TracNghiemChuyenMuc::get() as $chuyenmuc)
                        <option value="{{$chuyenmuc->id}}">{{$chuyenmuc->chuyen_muc}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
	</div>
</div>
<div class="container" id="alert">

</div>

<script type="text/javascript">
    $(document).ready(function(){
        var settings = {
        showArrows: true,
        autoReinitialise: true,
        stickToBottom:true
        };
        $('#cau-hoi').jScrollPane(settings);
        
    });
</script>
<div id="tao-tracnghiem">
	<div class="container">
		<div class="row">
			<div class="span3" id="column-cauhoi">
				<p class="title-18">Câu hỏi</h4>
				<div id="cau-hoi" class="including" overflow="auto">
					<p class="cau-hoi selected" dir="1">Câu 1</p>
				</div>
				<div class="including">
					<button class="btn title-18" name="addCauHoi">Thêm +</button>
					<button class="btn title-18" name="delCauHoi">Xóa -</button>
				</div>
			</div>
			<div class="span6" id="column-noidung">
				<p class="title-18">Nội dung</p>
				<div class="noidung including">
					<div>
						<p>Nội dung</p>
						<textarea name="noi-dung-cau-hoi" id="editor1" class="ckeditors" ></textarea>
					</div>
                    <div><button type="submit" id="test"></button></div>
					<div><p>Câu A</p><textarea class="txt-dapan ckeditors" id="editor2" name="cauA"></textarea></div>
					<div><p>Câu B</p><textarea class="txt-dapan ckeditors" id="editor3" name="cauB"></textarea></div>
					<div><p>Câu C</p><textarea class="txt-dapan ckeditors" id="editor4" name="cauC"></textarea></div>
					<div><p>Câu D</p><textarea class="txt-dapan ckeditors" id="editor5" name="cauD"></textarea></div>
				    
                </div>
			</div>
			<div class="span3" id="column-dapan">
				<p class="title-18">Đáp án đúng</p>
				<p class="dap-an" dir="A" index="2">Câu A</p>
				<p class="dap-an" dir="B" index="3">Câu B</p>
				<p class="dap-an" dir="C" index="4">Câu C</p>
				<p class="dap-an" dir="D" index="5">Câu D</p>
			</div>
		</div>
		<button class="btn text-center" id="luu-tracnghiem">Lưu</button>
        
	</div>
</div>
<script type="text/javascript">
    var load={
      customDurations: function() {
                        $.ytLoad({
                            startPercentage: 50,
                            startDuration: 2000,
                            completeDuration: 500,
                            fadeDelay: 2000,
                            fadeDuration: 2000
                        });
                    }
    }
    load.customDurations();
    $(document).ready(function(){
        var url=getURL();
        var so_cau=1;
        var tu_khoa;
        var tong_so_cau=1;
        var cau_selected=$("#cau-hoi .cau-hoi:first");
        var cau_hoi=new Array();
        var errors = new Array();
        cau_hoi[0]=new cau_hoi_object;
        cau_hoi[1]=new cau_hoi_object;

        function cau_hoi_object(noi_dung,cauA,cauB,cauC,cauD,dap_an,dap_an_index){
            this.noi_dung="";                 //Nội dung câu hỏi
            this.cau_a=cauA;                         //Nội dung câu A
            this.cau_b=cauB;                         //Nội dung câu B
            this.cau_c =cauC;                        //Nội dung câu C
            this.cau_d=cauD;                         //Nội dung câu D
            this.dap_an='no'       //Lưa chọn câu đúng
            this.dap_an_index="-1";
            this.xoa=false;
        }

        function changeSelected(object){
            $("#column-cauhoi p").removeClass("selected");
            object.addClass("selected");
            cau_selected=object;
        }

        function changeValue(){
            //Thây đổi các giá trị Input
            var stt=cau_selected.attr('dir');   //Số thứ tự câu hỏi
            $("textarea[name=noi-dung-cau-hoi]").val(cau_hoi[stt].noi_dung);
            $("textarea[name=cauA]").val(cau_hoi[stt].cau_a);
            $("textarea[name=cauB]").val(cau_hoi[stt].cau_b);
            $("textarea[name=cauC]").val(cau_hoi[stt].cau_c);
            $("textarea[name=cauD]").val(cau_hoi[stt].cau_d);
            changeDapAn($("#column-dapan .dap-an:nth-child("+(cau_hoi[stt].dap_an_index)+")"));
        }
        function changeDapAn(object){
            $("#column-dapan .dap-an").removeClass("selected");
            object.addClass("selected");
        }
        function kiem_tra_cau_hoi(){
            //Kiểm tra các câu hỏi xem đã được điền nội dung và kết quả
            var chu_de=$("input[name=chu-de]").val();
            var chuyen_muc=$("select[name=chuyen-muc]").val();
            var thoi_gian=$("input[name=thoi-gian]").val();

            var dem=0;
            if(chu_de==""){
                errors[dem]="<strong>Chưa điền chủ đề<strong>";
                dem++;
            }
            if(thoi_gian!=""){
                if(isNormalInteger(thoi_gian)==false){
                    alert(1);
                    errors[dem]="<strong>Thời gian phải là số nguyên</strong>";
                    dem++;
                }
            }
            if(chuyen_muc=="null"){
                errors[dem]="<strong>Chưa chọn chuyên mục</strong>";
                dem++;
            }

            for(var i=1;i<=tong_so_cau;i++){
                if(cau_hoi[i].xoa==false){
                    if(cau_hoi[i].noi_dung==""){
                        errors[dem]="<u>Câu "+i+"</u> chưa điền nội dung câu hỏi";
                        dem++;
                    }
                    if(cau_hoi[i].dap_an=="no")
                    {
                        errors[dem]="<u>Câu "+i+" </u> chưa chọn đáp án đúng";
                        dem++;
                    }
                }
            }
        }

        function show_loi(){
            $("#alert").empty();
            $("#alert").append('<div class="alert">'+
              '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
              '<div class="show_loi">'+
              '</div>'+
            '</div>');

            $(".alert").css('display','block');
            $(".show_loi").empty();
            for(var i=0;i<errors.length;i++){
                $(".show_loi").append(errors[i]+"<br/>");
            }
            window.location.href=location.pathname+"#alert";
        }
         
        $("#cau-hoi .cau-hoi").live('click',function(){
            changeSelected($(this));
            changeValue();
        });

         
        ///////////////////////////////////
        /////// Thêm câu //////////////
        $("button[name=addCauHoi]").click(function(){
            so_cau++;
            tong_so_cau++;
            $("#cau-hoi .jspPane").append("<p class='cau-hoi' dir='"+so_cau+"'> Câu "+so_cau+"</p>");
            changeSelected($("#cau-hoi p:last"));
            cau_hoi[cau_selected.attr('dir')]=new cau_hoi_object;
            changeValue();
            
        });

        ///////////////////////////////////
        /////// Xóa câu //////////////////
        $("button[name=delCauHoi]").click(function(){
            if(tong_so_cau!=1){
                var length_cau_hoi =$("#cau-hoi .jspPane .cau-hoi").length;
                var index=$(".cau-hoi").index(cau_selected);
                if(index==0)
                    index++;
                cau_hoi[cau_selected.attr('dir')].xoa=true;
                cau_selected.remove();
                if(index+1==length_cau_hoi){
                    changeSelected($("#cau-hoi .cau-hoi:nth-child("+(index)+")"));
                }
                else
                    changeSelected($("#cau-hoi .cau-hoi:nth-child("+(index+1)+")"));
                changeValue();


            }else alert("Bạn không thể xóa câu này !");
        });

        function isNormalInteger(str) {
            var n = ~~Number(str);
            return String(n) === str && n >= 0;
        }
        $("#luu-tracnghiem").click(function(){

            errors=[]; ///Làm trống lỗi
             $("#alert").empty();
            var chu_de=$("input[name=chu-de]").val();
            var thoi_gian=$("input[name=thoi-gian]").val();
            var chuyen_muc=$("select[name=chuyen-muc]").val();
            
            kiem_tra_cau_hoi();
            if(errors.length==0){
                
                $.ajax({
                    type:"POST",
                    url:url+"trac-nghiem/tao-he-thong-trac-nghiem",
                    data:{
                        'chu_de':chu_de,
                        'thoi_gian':thoi_gian,
                        'chuyen_muc':chuyen_muc,
                        'cau_hoi':cau_hoi
                    },
                    dataType:'json',
                    beforeSend:function(){
                        $("#thongtin-tracnghiem .container").empty();
                        $("#tao-tracnghiem").empty();
                        $("#thongtin-tracnghiem .container").prepend("<p class='text-center'><img src='{{Asset('img/ajax-loader.gif')}}'/></p>");
                    },
                    success:function(data){
                        var html="<div class='text-center'><h3>Đã tạo chủ đề: "+chu_de+"</h3>"+
                                "<p>Link chủ đề <a href='"+data.url+"'>"+data.url+"</a></p>"+
                                "<p>Chúng tôi sẽ kiểm duyệt trước khi bài của bạn được đăng lên trang chủ</p>"+
                                "</div>";
                        $("#thongtin-tracnghiem .container").html(html);       
                        
                        //$("#thongtin-tracnghiem").empty();
                    }
                });
            }
            else show_loi();//Show ra lỗi
        });
        $("textarea[name=noi-dung-cau-hoi]").blur(function(){
            cau_hoi[cau_selected.attr("dir")].noi_dung=$(this).val();
        });
        $("textarea[name=cauA]").blur(function(){
            cau_hoi[cau_selected.attr("dir")].cau_a=$(this).val();
        });
        $("textarea[name=cauB]").blur(function(){
            cau_hoi[cau_selected.attr("dir")].cau_b=$(this).val();
        });
        $("textarea[name=cauC]").blur(function(){
            cau_hoi[cau_selected.attr("dir")].cau_c=$(this).val();
        });
        $("textarea[name=cauD]").blur(function(){
            cau_hoi[cau_selected.attr("dir")].cau_d=$(this).val();
        });
        $("#column-dapan .dap-an").live('click',function(){
            cau_hoi[cau_selected.attr("dir")].dap_an=$(this).attr("dir");
            cau_hoi[cau_selected.attr("dir")].dap_an_index=$(this).attr('index');
            changeDapAn($(this));
        });
        $(".close").live('click',function(){
            $("#warning").append("" +
                "<div class='alert alert-block span10' style='display:none'>"+
            "<button type='button' class='close' data-dismiss='alert'>×</button>"+
                "<h4>Warning!</h4>"+
            "<div class='show_loi'>"+
                "</div>"+
                "</div>");
        });

        var config={
                    toolbar: [  
                            [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],          // Defines toolbar group without name.                                                        // Line break - next group will be placed in new line.
                            { name: 'basicstyles', items: [ 'Bold', 'Italic','Underline','-','EqnEditor'] }
                        ]
                }
        $(".ckeditors").ckeditor(function(){
            var data = $( 'textarea.editor' ).val();           
        },config);
        for (var i in CKEDITOR.instances) {
            alert(i);
            CKEDITOR.instances[i].on('change', function() {
                //alert(CKEDITOR.instances[i].getData());
            });
        }
        $("#test").live('click',function(){
            var editor1=CKEDITOR.instances['editor1'].getData();
            var editor2=CKEDITOR.instances['editor2'].getData();
            var editor3=CKEDITOR.instances['editor3'].getData();
            var editor4=CKEDITOR.instances['editor4'].getData();
            var editor5=CKEDITOR.instances['editor5'].getData();
            CKEDITOR.instances['editor1'].setData("thefn choi nao no");
            //alert(editor1+editor2+editor3+editor4+editor5);
        });
    });

</script>
<script type="text/javascript">
            $(document).ready(function(){
                //Add ckeditor
                

                for(var i=1;i<=5;i++){
                 // CKEDITOR.replace( 'editor'+i,config);                           
                }
              
                
                
            });
        </script>
@endsection