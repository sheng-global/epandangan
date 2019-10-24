<?php
/*
*  Title: File Upload Helper
*  Version: 1.0
*  Author: Fadli Saad
*  Website: https://fadli.my
*/
class Upload_helper extends Model {
	
	public function add($data){

		// Simple validation (max file size 2MB and only two allowed mime types)
		$validator = new \FileUpload\Validator\Simple(getenv('UPLOAD_SIZE'), ['application/pdf', 'image/jpeg', 'image/pjpeg', 'image/png']);

		// Simple path resolver, where uploads will be put
		$pathresolver = new \FileUpload\PathResolver\Simple(getenv('UPLOAD_FOLDER'));

		// The machine's filesystem
		$filesystem = new \FileUpload\FileSystem\Simple();

		// FileUploader itself
		$fileupload = new \FileUpload\FileUpload($data['files'], $_SERVER);

		// file extension
		$extension = end(explode(".", $data['files']['name']));
		$newFileName = $data['file_id'].".".strtolower($extension);

		// rename file
		$filenamegenerator = new \FileUpload\FileNameGenerator\Custom($newFileName);

		// Adding it all together. Note that you can use multiple validators or none at all
		$fileupload->setPathResolver($pathresolver);
		$fileupload->setFileSystem($filesystem);
		$fileupload->setFileNameGenerator($filenamegenerator);
		$fileupload->addValidator($validator);

		// Doing the deed
		list($files, $headers) = $fileupload->processAll();

		// Outputting it, for example like this
		foreach($headers as $header => $value) {
		    header($header . ': ' . $value);
		}

		echo json_encode(['files' => $files]);

		foreach($files as $file){
		    
		    //Remember to check if the upload was completed
		    if ($file->completed) {
		        echo $file->getRealPath();
		        
		        // Call any method on an SplFileInfo instance
		        var_dump($file->isFile());

		        $stm  = "SELECT * FROM attachment WHERE file_id = :file_id";
				$bind = array(
					'file_id' => $data['file_id']
				);

				$checkQuery = $this->pdo->fetchAll($stm, $bind);

		        // delete and unlink file if exist
		        if($checkQuery){

		        	try{
						$stm  = "DELETE FROM attachment WHERE id = :id";
						$bind = array(
							'id' => $checkQuery[0]['id']
						);
						
						return $this->pdo->fetchAffected($stm, $bind);
						unlink(getenv('UPLOAD_FOLDER').$newFileName);
					}
					catch(Exception $e){
						echo $e->getMessage();
					}
		        }

				try{
					$stm  = "INSERT INTO attachment (file_id, extension, type, tmp_name, error, size) VALUES (:file_id, :extension, :type, :tmp_name, :error, :size)";
					$bind = array(
						'file_id' => $data['file_id'],
						'extension' => $extension,
						'type' => $data['files']['type'],
						'tmp_name' => $data['files']['tmp_name'],
						'error' => $data['files']['error'],
						'size' => $data['files']['size']
					);
					
					return $this->pdo->fetchAffected($stm, $bind);
				}
				catch(Exception $e){
					return $e->getMessage();
				}
		    }
		}
		
	}

	public function get($data){

		$stm  = "SELECT CONCAT(file_id, '.', extension) AS file FROM attachment WHERE file_id = :file_id";
		$bind = array(
			'file_id' => $data['id']
		);

		$result = $this->pdo->fetchAll($stm, $bind);
		return $result;
	}
}