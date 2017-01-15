<?php

namespace Gpenverne\OpenSubtitlesBundle\Service;

use Kminek\OpenSubtitles\Client;

class OpenSubtitlesClient
{
    const DEFAULT_USER_AGENT = 'OSTestUserAgentTemp';

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $language = 'eng';

    /**
     * @param string $username
     * @param string $password
     * @param string $userAgent
     */
    public function __construct($username, $password, $userAgent = self::DEFAULT_USER_AGENT)
    {
        $this->username = $username;
        $this->password = $password;
        $this->userAgent = $userAgent;
        $this->client = Client::create([
            'username' => $this->username,
            'password' => $this->password,
            'useragent' => $this->userAgent,
        ]);
    }

    /**
     * @param string $language
     *
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @param  string|array|int $params
     *
     * @return array
     */
    public function getSubtitles($params)
    {
        if (is_int($params)) {
            $params = [
                'imdbid' => $query,
            ];
        } elseif (!is_array($params)) {
            $params = [
                'query' => $params,
            ];
        }

        if (null !== $this->language) {
            $params['sublanguageid'] = $this->language;
        }

        return $this->client->searchSubtitles([$params])->toArray()['data'];
    }

    /**
     * @param  string $method
     * @param  array $args
     *
     * @return mixed
     */
    public function __call($method, $args = [])
    {
        return call_user_func_array([$this->client], $args);
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }
}
