
<style>
    #massage{
        height: 500px;
        width: 500px;
    }
    body{
        box-sizing: border-box;
        margin: 0px;
        padding: 0px;
    }
    * {
    -ms-overflow-style: none;  /* Internet Explorer 10+ */
    scrollbar-width: none;  /* Firefox */
}
*::-webkit-scrollbar { 
    display: none;  /* Safari and Chrome */
}
    *{
        box-sizing: border-box;
        margin: 0px;
        padding: 0px;
    }
    .adminview h1{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        height: 40px;
        width: 100%;
        background-color: palegoldenrod;
    }
    .adminview .distribution{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        background-color: black;
        border-radius: 5px;
        color:palegoldenrod;
        width:250px;
        height:300px;
        cursor: pointer;
        user-select: none;
    }
    .adminview{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="adminview">
        <h1>WELL COME TO ADMIN PANEL</h1>
        <div class="distribution">
            <span>DISTRIBUTION</span>
        </div>
    </div>
   <!-- <form action="txtinput.php" method="post">
        <textarea name="news" id="massage"></textarea>
        <input type="submit" value="news" >

    </form>
   <br>
    <form action="input.php" method="post" enctype="multipart/form-data">
        <input type="file" name="upfile" id="massage">
        <input type="submit" value="upload" name="upload1">

        <br>
        <h2> upload on gellary</h2>
    <form action="input.php" method="post" enctype="multipart/form-data">
        <input type="file" name="gellary" id="massage">
        <input type="submit" value="upload" name="upload2">

    </form>

    <h2> upload video</h2>
    <form action="input.php" method="post" enctype="multipart/form-data">
        <label for="type">choose video type</label>
        <select name="typ" id="" required>
            <option value="vsit">sit</option>
            <option value="vbikkho">bikkho</option>
            <option value="vbonna">bonna</option>
        </select>
        <input type="file" name="video" id="massage" required>
        <input type="submit" value="submit" name="upload3">

    </form>-->
</body>
<script>
    let distribute=document.querySelector(".distribution");
    distribute.addEventListener("click",dis_action);
    function dis_action(){
          window.open("http://192.168.0.105/rapid%20force/admin/distribution-input.php","_blank");
    }
</script>
</html>