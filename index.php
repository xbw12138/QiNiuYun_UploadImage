<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图床</title>
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap-theme.css" type="text/css">
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.css" type="text/css">
</head>
<body>
        <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title">图床</h3>
                </div>
                <div class="panel-body">
                        <div class="col-lg-6">
                                <div class="input-group">
                                  <span class="input-group-btn">
                                    <input class="btn btn-default" type="button" id="fileSelect" onclick="document.getElementById('selectfile').click()" value="选择图片"></input>
                                  </span>
                                  <input type="text" id="imgurl" class="form-control" placeholder="图片外链">
								<span class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="upload">上传图片</button>
                                  </span>
                                </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                        <input type="file" id="selectfile" style="display:none" multiple accept="image/*" onChange="document.getElementById('fileSelect').value=this.value">            
                </div>
                <div class="panel-footer">©️copyright xbw power by 七牛云</div>
        </div>
    
</body>
<script src="asset/js/jQuery.min.js"></script>
<script>
    $(document).ready(function(){
        function upload(){
            var formData = new FormData();
            formData.append('img', $('#selectfile')[0].files[0]);
            $.ajax({
                type:"POST",
                url:"server/upload.php",
                dataType:"json",
                mimeType: "multipart/form-data",
                contentType: false,
                processData: false,
                data:formData,
                success:function(data){
                    if(data.code){
                        $("#imgurl").val(data.url);
                    }else{
                        alert(data.msg);
                    }
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            });
        }
        $("#upload").click(function(){
            upload();
        });
    })
</script>
</html>