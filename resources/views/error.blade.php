<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="/js/jquery-3.3.0.min.js"></script>
        <title>CODE对照表</title>
        <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" 
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
        crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h3>CODE对照表</h3>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-striped">
                <tr>
                    <td>No.</td>
                    <td>code</td>
                    <td>msg</td>
                    <td>showMsg</td>
                </tr>
                <?php
                $num = 1;
                foreach ($data as $key => $value) {
                    echo "<tr>
                            <td>".$num."</td>
                            <td>".$key."</td>
                            <td>".$value['msg']."</td>
                            <td>".$value['showMsg']."</td>
                         </tr>";
                    $num ++;
                }
                ?>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
    
    </body>
</html>
