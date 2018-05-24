<html>
<head>
    <title></title>
    <script src="./resource/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./resource/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <h1 class="page-header">Amn</h1>
    <div class="col-md-6">

        <label class="control-label">关键字：</label>
        <div class="input-group">
            <input class="form-control " id="index" type="text">
            <span class="input-group-btn">
       	 <a id="forword" class="btn btn-default" href="#">Go!</a>
     	 </span>
        </div>
        <pre id="pre" style="display:none">
            <div id="data"></div>
        </pre>
    </div>
<!-- 
    <div  class="col-md-12" id="iframe" style="display:none">
        <div class="panel panel-default">
            <div class="panel-heading">结果</div>
            <div class="panel-body embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" name="in" ></iframe>
            </div>
        </div>
        
    </div> -->
</div>
<script>

    $("#index").bind("input propertychange", function () {
	   setTimeout(send,1000);
       // send();
      
    });
    function send(){
	  //alert("1");
        var data = $("#index").val();
        var forwordUrl = "https://www.baidu.com/s?wd=" + data;
        $("#forword").attr('href', forwordUrl);
        //alert($.trim(data));  输出 去除前后空格的字符串
        if ($.trim(data)) {
            $("#pre").css("display", "");
            // $("#iframe").css("display", "");
        } else {
            $("#pre").css("display", "none");
            // $("#iframe").css("display", "none");
        }
//	 alert(data);
        $.ajax({
            type: "post",
            async: "false",
            url: "test.php",
            data: {
                "data": data
            },
            success: function (result) {
                if(result=='null'){
                    $("#pre").css("display", "none");
                    // $("#iframe").css("display", "none");
                }else{
                    $("#data").html(result);
                 }
            },
            fail: function () {
                alert("faile");
            }
        })
	}
</script>

</body>
</html>