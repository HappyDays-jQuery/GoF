<?php

namespace GoF\Mediator;

class ChatRoom extends Mediator
{
    /**
     * @var Colleague[]
     */
    private $users = [];

    /**
     * @param Colleague $user
     */
    public function createColleagues(Colleague $user)
    {
        $user->setMediator($this);
        if (!array_key_exists($user->getName(), $this->users)) {
            $this->users[$user->getName()] = $user;
            printf("%sさんが入室しました\n", $user->getName());
        }
    }

    /**
     * @param string $from
     * @param string $to
     * @param string $message
     */
    public function sendMessage($from, $to, $message)
    {
        if (array_key_exists($to, $this->users)) {
            $this->users[$to]->receiveMessage($from, $message);
            return;
        }

        printf("%sさんは入室していないようです\n", $to);
    }
}
