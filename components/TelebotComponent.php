<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 11.03.19
 * Time: 11:14
 */

namespace app\components;


use Yii;
use yii\base\Component;
use yii\httpclient\Client;

class TelebotComponent extends Component
{
    public $botToken;
    public $channelId;
    public $admins;
    public $adminChats;
    private $api = 'https://api.telegram.org/bot';
    private $client;
    private $url;


    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->client = new Client();
        $this->url = $this->api . $this->botToken;
    }

    /**
     * @return array|mixed
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\httpclient\Exception
     */
    public function getMe(){
        $request = $this->client->get($this->url. '/getMe');
        $response = $this->client->send($request);

        return $response->getData();
    }

    public function getUpdates($lastUpdateId = 0){
        $request = $this->client->get($this->url. '/getUpdates', ['offset' => $lastUpdateId]);
        $response = $this->client->send($request);

        return $response->getData();
    }

    public function setWebhook(){
        $params['url'] = 'https://reworkhub.com/telegram/get';
        $request = $this->client->get($this->url. '/setWebhook', $params);
        $response = $this->client->send($request);
        var_dump($response->getData());
        Yii::info('Hook was set', 'telegram');
    }

    public function deleteWebhook(){
        $request = $this->client->get($this->url. '/deleteWebhook');
        $response = $this->client->send($request);
        var_dump($response->getData());

        Yii::info('Hook was delete', 'telegram');
    }

    public function getWebhookInfo(){
        $request = $this->client->get($this->url. '/getWebhookInfo');
        $response = $this->client->send($request);
        var_dump($response->getData());

        Yii::info($response->getData(), 'telegram');
    }

    public function sendMessage($chatId, $msg, $options = null)
    {
        $params = ['chat_id' => $chatId, 'text' => $msg];

        if($options){
            foreach ($options as $key => $option){
                $params[$key] = $option;
            }
        }

        $request = $this->client->get($this->url. '/sendMessage', $params);
        $response = $this->client->send($request);

        return $response->getContent();
    }

    public function editMessage($chatId, $msg, $options = null)
    {
        $params = ['chat_id' => $chatId, 'text' => $msg];

        if($options){
            foreach ($options as $key => $option){
                $params[$key] = json_encode($option);
            }
        }

        $request = $this->client->get($this->url. '/editMessageText', $params);
        $response = $this->client->send($request);

        return $response->getData();
    }
}