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
     *
     */
    const URL = "https://api.instagram.com/v1/users/%s/media/recent?access_token=%s";
    /**
     * @var string
     */
    protected $userUrl;
    /**
     * @var int
     */
    protected $numOfPictures = 500;
    /**
     * @var
     */
    protected $saveDir;

    /**
     * Instagramm constructor.
     *
     * @param string $userId
     * @param string $accessToken
     * @param int    $numOfPictures
     * @param        $saveDir
     */
    public function __construct($userId, $accessToken, $numOfPictures, $saveDir)
    {
        $this->numOfPictures = $numOfPictures;
        $this->saveDir       = $saveDir;

        $this->userUrl = sprintf(self::URL, $userId, $accessToken);
    }


    /**
     * @throws \Exception
     */
    public function extract()
    {
        $url = $this->userUrl;

        $imgCounter = 0;

        while ($imgCounter < $this->numOfPictures) {
            $result = @file_get_contents($url);

            if (!$result) {
                throw new \Exception('Could not get pictures');
            } else {
                $result = json_decode($result, true);
                $url    = $result['pagination']['next_url'];

                foreach ($result['data'] as $pic) {

                    $content = @file_get_contents($pic['images']['low_resolution']['url']);
                    if (!$content) {
                        continue;
                    }
                    file_put_contents($this->saveDir . '/' . $imgCounter . '.jpg', $content);
                    $imgCounter++;
                }
            }
        }
    }
}
