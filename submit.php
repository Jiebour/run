<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>提交作业</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/run.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-1.5.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <style>
  input{
    width: 100%;
  }

  .foot{
    width: 33.33%;
    float: left;
    height: 50px;
    line-height: 50px;
  }


  /*图片预览区域CSS*/
    #preview {
      width: 100%;
      height:300px;
      line-height: 300px;
      text-align: center;
      border:1px solid gray;
    }
/*隐藏file input*/
    #file {
      display: none;
    }
  </style>

  <body>
<div class="container">
<br>
<div class="row">
  <div class="col-xs-2">总程</div>
  <div class="col-xs-9"><input type="text" name="km"/></div>
  <div class="col-xs-1"></div>
</div>

<br>

<div class="row">
  <div class="col-xs-2">总程</div>
  <div class="col-xs-9"><input type="text" name="km"/></div>
  <div class="col-xs-1"></div>
</div>

<br>

<div class="row">
  <div class="col-xs-12">
    <button type="button" id="upBtn" class="btn btn-success btn-block">提交</button>
  </div>
</div>

<br>

<div class="row">
  <div class="col-xs-12 center">
    1号跑班，2015年12月18日 17：43
  </div>
</div>

<br>

<div class="row">
  <div class="col-xs-4 center">---------------</div>
  <div class="col-xs-4 center">跑步数据截图</div>
  <div class="col-xs-4 center">---------------</div>
</div>





<div data-role="page">

  <div data-role="content">
<!-- 图片递交表单 -->
    <form action="upload_file.php" id="fileinfo" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file" /> 
    <br />
<!-- 图片预览区域 -->
    <div id="preview" onclick="$('input[type=file]').click()">Click Here to Choose Image</div>  
    </form>
  </div><!-- /content -->
</div><!-- /page -->










<div class="row">
  <div class="col-xs-2"></div>
  <div class="col-xs-10"></div>
</div>



<div class="row">
  <div class="col-xs-2"></div>
  <div class="col-xs-10"></div>
</div>



<div class="row">
  <div class="col-xs-2"></div>
  <div class="col-xs-10"></div>
</div>


<div class="row">
  <div class="col-xs-2"></div>
  <div class="col-xs-10"></div>
</div>

</div><!--main container-->






<div id="footer" style="">
     <div class="foot center">发现跑班</div>
     <div class="foot center">提交作业</div>
     <div class="foot center">炮友中心</div>
     <div clear="both;"></div>
</div>


<script type="text/javascript">

$(document).ready(function(){
$('h1').css("display", "none");
});





//图片上传AJAX
    $("#upBtn").click(function()
    { //判断是否选择了图片
      var imgPath = $('[type=file]').val();
      if (imgPath == "") {
        alert("请选择上传的图片");
        return;
      }
//创建表单数据，用于AJAX上传
      var fd = new FormData(document.getElementById("fileinfo"));
      $.ajax({
        url: "upload_file.php",
        type: "POST",
        data: fd,
        processData: false, 
        contentType: false, 
        success: uploadSuccess

      });

    })
//上传成功后的回调函数
    function uploadSuccess() {
      alert("图片上传成功");
    }
// 两种图片预览的方法
// 方法1：使用URL
        function preview1(file) {  
            var img = new Image(), url = img.src = URL.createObjectURL(file)  
            var $img = $(img)  
            img.onload = function() {  
                URL.revokeObjectURL(url)  
                $('#preview').empty().append($img)  
            }  
        }  
//方法2：使用FileReader（HTML5新增）
        function preview2(file) {  
            var reader = new FileReader()  
            reader.onload = function(e) {  
                var $img = $('<img>').attr("src", e.target.result)  
                $('#preview').empty().append($img)  
            }  
            reader.readAsDataURL(file)  
        }  
//选择图片时把显示预览图，选择方法2预览图片
        $(function() {  
            $('[type=file]').change(function(e) {  
                var file = e.target.files[0]  
                preview2(file)  
            })  
        })  
    </script>  


  </body>
</html>