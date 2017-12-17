<?php

namespace App;

use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;


class Chat implements MessageComponentInterface
{
    private $clients;

    function __construct()
    {
        $this->clients = new \SplObjectStorage();
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);

        echo "New connection!\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $data = json_decode(json_decode($msg, true), true);

        if ($this->saveMessage($data)) {
            echo 'Saved message to DB';
        } else {
            echo 'Failed to save message';
        }
        var_dump($from);
        foreach ($this->clients as $client) {
            if ($client !== $from) {
                $client->send($data['chat']);
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);

        echo "A User disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }

    public function saveMessage($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        include './config/connection.php';

        $now = date('Y-m-d H:i:s');
        $id = $data['id_live_chat'];
        $chat = $data['chat'];
        $sql = " INSERT INTO chat (id_live_chat, chat, created_date) VALUES ('$id', '$chat', '$now')";

        mysql_query($sql);

        return true;
    }
}
