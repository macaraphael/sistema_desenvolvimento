<?php
class directoryOption{
    public function delDirectory($dir) {
            if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir") $this->delDirectory($dir."/".$object); else unlink($dir."/".$object);
                }
            }
                reset($objects);
                rmdir($dir);
            }

    }
    public function Unzip($pathNamerquivo, $destination){
        try{
            $zip = new ZipArchive;
            if($zip->open($pathNamerquivo) === TRUE){
                $zip->extractTo($destination);
                $zip->close();
            }
        }catch(Exception $e){
            echo 'Erro ao descopactar, verifique: '.$e->getMessage();
            $logs = new logs;
            $logs->write($e->getMessage(), $e->getFile(), $e->getLine());
        }
        
    }
    public function compact($fileName, $folder = null, $folderOutput = null, $encryption = false){ 
        $pagar = false;
        if($folder == null){
            $folder = SDIRECTORY;
            $pegar = true;
        }else{
            //$folder = strtolower(getcwd()).'/'.$folder;
        }
        
        if($folderOutput == null){
            $folderOutput = 'tmp';
			@mkdir('tmp');
        }
                
        $zip = new ZipArchive();
        $fileNameNew = md5($fileName);
        $zip->open("{$folderOutput}/{$fileNameNew}.zip", ZipArchive::CREATE);
        $list    = new RecursiveDirectoryIterator($folder);
        $recursivo = new RecursiveIteratorIterator($list);
        foreach ($recursivo as $obj){
            if(@$pegar == true){
                $pathName = $obj->getPathname();
                $clearPathName = str_replace($folder.DIRECTORY_SEPARATOR,"",$pathName);
                $zip->addFile($clearPathName);
            }else{
                $pathName = $obj->getPathname();
                $zip->addFile($pathName);
            }
        }
        $zip->close();
    }
    public function listTree($directory){
        
    }
}