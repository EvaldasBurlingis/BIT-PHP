<?php declare(strict_types = 1);

    $fm = new FileManager();
    $cwd = getcwd();

    /**
     * Change directory
     */
    if (isset($_POST) && $_POST['action'] === 'cd') {

        $path = $_POST['path'];

        if($path === '/') $fm->setPath($cwd);
        if($path !== '/') $fm->setPath(($cwd . $path));

        $fm->setAction($_POST['action']);

        echo $fm->getJsonResponse();
    } 

    /**
     * Create new directory
     */
    if (isset($_POST) && $_POST['action'] === 'mkdir') {

        $path = $_POST['path'];

        if($path === '/') $fm->setPath($cwd);
        if($path !== '/') $fm->setPath(($cwd . $path));

        $fm->setAction($_POST['action']);
        $fm->createNewDir($_POST['new_folder_name']);

        echo $fm->getJsonResponse();
    }

    /**
     * Delete file
     */
    if (isset($_POST) && $_POST['action'] === 'unlink') {

        $path = $_POST['path'];

        if($path === '/') $fm->setPath($cwd);
        if($path !== '/') $fm->setPath(($cwd . $path));

        $fm->setAction($_POST['action']);
        $fm->deleteFile($_POST['file']);

        echo $fm->getJsonResponse();
    }

    /**
     * 
     * Catch all error
    */

    if (
        isset($_POST) && 
        $_POST['action'] !== 'mkdir' && 
        $_POST['action'] !== 'cd' &&
        $_POST['action'] !== 'unlink'
    ) {
        $data = [ 
            'success' => false,
            'error' => 'Bad Request'
        ];
    
        echo json_encode($data);
    }



    class FileManager
    {
        
        private string $path;
        private string $action;


        /**
         * Return current path
         * 
         * @return string
         */
        private function getPath() : string
        {
                return $this->path;
        }


        /**
         * Set current path
         * 
         * @return self
         */
        public function setPath(string $path) : self
        {
                $this->path = $path;

                return $this;
        }


        /**
         * Get active action
         * 
         * @return string
         */
        private function getAction() : string
        {
                return $this->action;
        }


        /**
         * Set active action
         * 
         * @return self
         */
        public function setAction(string $action) : self
        {
                $this->action = $action;

                return $this;
        }


        /**
         * Get all files and directories that are
         * stored inside given path on webserver
         * 
         * @return array
         */
        private function getFilesAndFolders(string $path) : array
        {

            return array_values(array_diff(scandir($path), array('..', '.')));    
        }


        /**
         * Get folders that are inside given path
         * 
         * @return array
         */
        private function getFolders() : array
        {   

            $files_and_folders = $this->getFilesAndFolders($this->path);  
            $folders = [];

            if($this->path === getcwd()) {

                foreach ($files_and_folders as $fnd) {

                    if (is_dir($fnd)) array_push($folders, $fnd);

                }

            } else {

                foreach ($files_and_folders as $fnd) {

                    if (is_dir(($this->path . $fnd))) array_push($folders, $fnd);

                }
            }

            return $folders;
        }


        /**
         * Get files that are inside given path
         * 
         * @return array
         */
        private function getFiles() : array
        {   

            $files_and_folders = $this->getFilesAndFolders($this->path);
            $files = [];

            if($this->path === getcwd()) {

                foreach ($files_and_folders as $fnd) {

                    if (is_file($fnd)) array_push($files, $fnd);

                }

            } else {
                
                foreach ($files_and_folders as $fnd) {

                    if (is_file(($this->path . $fnd))) array_push($files, $fnd);
                }
            }

            return $files;
        }

        /**
         * Create new directory
         *
         * @return void
        */
        public function createNewDir(string $new_folder_name) : void
        {
            $new_dir_path = $this->path . '/' . $new_folder_name;

            mkdir($new_dir_path);
        }

        /**
         * Create new directory
         *
         * @return void
        */
        public function deleteFile(string $file) : void
        {
            $file_path = $this->path . '/' . $file;

            unlink($file_path);
        }

        /**
         * JSON response to api call
         * 
         * @return string
         */
        public function getJsonResponse() : string
        {
            // Response to cd operation
            $response = [
                'success' => true,
                'data' => [
                    'path' => $this->getPath(),
                    'folders' => $this->getFolders(),
                    'files' => $this->getFiles()
                ]
            ];

            return json_encode($response);
        }
    }