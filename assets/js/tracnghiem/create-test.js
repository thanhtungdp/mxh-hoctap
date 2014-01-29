$(document).ready(function(){
    alert(1);
    var url='<?php echo Asset('');?>';
    var so_cau=1;
    var tong_so_cau=1;
    var cau_selected=$("#so-cau li:first");
    var cau_hoi=new Array();
    var errors = new Array();
    cau_hoi[0]=new cau_hoi_object;
    cau_hoi[1]=new cau_hoi_object;

    function cau_hoi_object(noi_dung,cauA,cauB,cauC,cauD,dap_an,dap_an_index){
        this.noi_dung="";                 //Nội dung câu hỏi
        this.cauA=cauA;                         //Nội dung câu A
        this.cauB=cauB;                         //Nội dung câu B
        this.cauC =cauC;                        //Nội dung câu C
        this.cauD=cauD;                         //Nội dung câu D
        this.dap_an='no'       //Lưa chọn câu đúng
        this.dap_an_index="-1";
        this.xoa=false;
    }

    function changeSelected(object){
        $("#so-cau li").removeClass("cau-selected");
        object.addClass("cau-selected");
        cau_selected=object;
    }
    function changeValue(){
        //Thây đổi các giá trị Input

        $(".cau_so").empty();
        $(".cau_so").append("Câu "+cau_selected.attr("dir"));

        var stt=cau_selected.attr('dir');   //Số thứ tự câu hỏi
        $("textarea[name=noi-dung-cau-hoi]").val(cau_hoi[stt].noi_dung);
        $("textarea[name=cauA]").val(cau_hoi[stt].cauA);
        $("textarea[name=cauB]").val(cau_hoi[stt].cauB);
        $("textarea[name=cauC]").val(cau_hoi[stt].cauC);
        $("textarea[name=cauD]").val(cau_hoi[stt].cauD);
        if(cau_hoi[stt].dap_an_index>=0 && cau_hoi[stt].dap_an_index<=3)
            $("input[name=dap-an]")[cau_hoi[stt].dap_an_index].checked=true;
        else{
            $("input[name=dap-an]").attr('checked',false);
        }
    }

    function kiem_tra_cau_hoi(){
        //Kiểm tra các câu hỏi xem đã được điền nội dung và kết quả
        var chu_de=$("input[name=chu-de]").val();
        var dem=1;
        if(chu_de=="")
            errors[0]="<i>Chưa điền chủ đề </i>";
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
        $(".alert").css('display','block');
        $(".show_loi").empty();
        for(var i=0;i<errors.length;i++){
            $(".show_loi").append(errors[i]+"<br/>");
        }
    }

    $("#so-cau li").live('click',function(){
        changeSelected($(this));
        changeValue();
    });

    ///////////////////////////////////
    /////// Thêm câu //////////////
    $("input[name=add_cau]").live('click',function(){
        so_cau++;
        tong_so_cau++;
        $("#column-cauhoi").append("<p class='cau-hoi' dir='"+so_cau+"'> Câu "+so_cau+"</p>");
        //changeSelected($("#column-cauhoi p:last"));
        //cau_hoi[cau_selected.attr('dir')]=new cau_hoi_object;
        //changeValue();
    });

    ///////////////////////////////////
    /////// Xóa câu //////////////////
    $(".del_cau").live('click',function(){
        if(tong_so_cau!=1){
            var index=cau_selected.index();
            if(index==0)
                index++;
            cau_hoi[cau_selected.attr('dir')].xoa=true;
            cau_selected.remove();
            changeSelected($("#so-cau li:nth-child("+index+")"));
            changeValue();

        }else alert("Bạn không thể xóa câu này !");
    });


    $("input[name=luu-toan-bo]").live('click',function(){
        errors=[]; ///Làm trống lỗi
        var chu_de=$("input[name=chu-de]").val();
        kiem_tra_cau_hoi();
        if(errors.length==0)
            $.ajax({
                type:"POST",
                url:url+"them-chu-de",
                data:{
                    'chu_de':chu_de,
                    'cau_hoi':cau_hoi
                },
                dataType:'json',
                success:function(data){
                    alert("Đã gửi");
                }
            });
        else show_loi();//Show ra lỗi
    });
    $("textarea[name=noi-dung-cau-hoi]").blur(function(){
        cau_hoi[cau_selected.attr("dir")].noi_dung=$(this).val();
    });
    $("textarea[name=cauA]").blur(function(){
        cau_hoi[cau_selected.attr("dir")].cauA=$(this).val();
    });
    $("textarea[name=cauB]").blur(function(){
        cau_hoi[cau_selected.attr("dir")].cauB=$(this).val();
    });
    $("textarea[name=cauC]").blur(function(){
        cau_hoi[cau_selected.attr("dir")].cauC=$(this).val();
    });
    $("textarea[name=cauD]").blur(function(){
        cau_hoi[cau_selected.attr("dir")].cauD=$(this).val();
    });
    $("input[name=dap-an]").live('click',function(){
        cau_hoi[cau_selected.attr("dir")].dap_an=$(this).val();
        cau_hoi[cau_selected.attr("dir")].dap_an_index=$(this).attr('dir');
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
});