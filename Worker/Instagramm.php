<?php

namespace Paunin\Worker;

/**
 * Class Instagramm
 *
 * @package Paunin\Worker
 */
class Instagramm
{
    /**
     * @const string
     */
    const URL = "https://api.instagram.com/v1/users/%s/media/recent?access_token=%s";
    /**
     * @var string
     */
    protected $userUrl;
    /**
     * @var int
     */
    protected $numOfPictures = 100;
    /**
     * @var string
     */
    protected $saveDir;

    /**
     * @var string
     */
    protected $displayDir;

    /**
     * Instagramm constructor.
     *
     * @param string $userId
     * @param string $accessToken
     * @param int    $numOfPictures
     * @param string $saveDir
     * @param string $displayDir
     */
    public function __construct($userId, $accessToken, $numOfPictures, $saveDir, $displayDir)
    {
        $this->numOfPictures = $numOfPictures;
        $this->saveDir       = $saveDir;
        $this->displayDir    = $displayDir;

        $this->userUrl = sprintf(self::URL, $userId, $accessToken);
    }

    /**
     * @param $count
     * @param $fileName
     */
    protected function linkFile($count, $fileName)
    {
        $dest = $this->displayDir . "/" . $count . ".jpg";

        if (file_exists($dest)) {
            unlink($dest);
        }
        symlink($this->saveDir . "/" . $fileName, $this->displayDir . "/" . $count . ".jpg");
    }

    protected function log($text)
    {
        echo "LOG: $text \n";
    }

    /**
     * @throws \Exception
     *
     * @return $this
     */
    public function extract()
    {

        $arrContextOptions = [
            "ssl" => [
                "verify_peer"      => false,
                "verify_peer_name" => false,
            ],
        ];

        $this->log('Start extracting');
        $url = $this->userUrl;

        $this->log("Trying to get $url");
        $result = file_get_contents($url, false, stream_context_create($arrContextOptions));
//        $this->log($result);

        if (!$result) {
            throw new \Exception('Could not get pictures');
        } else {
            $result = json_decode($result, true);

            foreach ($result['data'] as $pic) {
                $content = file_get_contents(
                    $pic['images']['low_resolution']['url'],
                    false,
                    stream_context_create($arrContextOptions)
                );
                $picId   = $pic['id'];
                if (!$content) {
                    continue;
                }
                file_put_contents($this->saveDir . '/' . $picId . '.jpg', $content);
            }
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function numberise()
    {
        $count = 0;

        $files = $this->listFiles();

        foreach ($files as $fileName) {
            if ($count < $this->numOfPictures) {
                $this->linkFile($count, $fileName);
            } else {
                $this->deleteFile($this->saveDir . "/" . $fileName);
            }

            $count++;

        }

        return $this;
    }

    public function clean()
    {
        return $this;
    }

    /**
     * @return array
     */
    protected function listFiles()
    {
        $dir   = opendir($this->saveDir);
        $files = [];
        while (false != ($file = readdir($dir))) {
            if (preg_match('|.*\.jpg$|', $file)) {
                $files[] = $file;
            }
        }
        rsort($files);

        return $files;
    }

    /**
     * @param $file
     *
     * @return bool
     */
    protected function deleteFile($file)
    {
        return unlink($file);
    }
}
