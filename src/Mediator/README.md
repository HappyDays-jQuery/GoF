# Mediator

Mediator ― 相手は相談役1人だけ

## 登場人物

### Mediator
仲介者
Colleagueからの通知を受け取るメソッドを定義

### ConcreteMediator

Mediatorのサブクラスで、Mediatorの実装

### Colleague

Mediatorに通知をおこなう
「colleague」とは「同僚」「仲間」という意味
Mediatorクラスからの通知を受け取るメソッドを定義する場合もあります。

### ConcreteColleague

Colleagueクラスのサブクラス
内部にMediatorオブジェクトを保持しており、
このMediatorオブジェクトを通じて他のConcreteColleagueクラスとやりとりをおこなう

