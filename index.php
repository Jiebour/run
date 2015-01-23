<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type"  content="text/html;  charset=utf-8"  />
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.css">
	<script src="http://code.jquery.com/jquery-1.5.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.js"></script>
	<style>
/*图片预览区域CSS*/
		#preview {
			width: 100%;
			height:300px;
			border:1px solid gray;
		}
/*隐藏file input*/
		#file {
			display: none;
		}
	</style>
</head>

<body>

<div data-role="page">

	<div data-role="header">
		<h1>选择图片上传</h1>
	</div><!-- /header -->

	<div data-role="content">
<!-- 图片递交表单 -->
		<form action="upload_file.php" id="fileinfo" method="post" enctype="multipart/form-data">
		<input type="file" name="file" id="file" /> 
		<br />
<!-- 图片预览区域 -->
		<div id="preview" onclick="$('input[type=file]').click()">Click Here to Choose Image</div>  
		<input type="button" name="button" id="upBtn" value="上传" />
		</form>
	</div><!-- /content -->


</div><!-- /page -->
</body>

</body>
</html>

<script type="text/javascript">  
//图片上传AJAX
		$("#upBtn").click(function()
		{	//判断是否选择了图片
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