# Chain of Responsibility

Chain of Responsibility ― 責任のたらい回し

## 概要

自分の責任で対処する必要かどうかを判断し、自分で対処できない場合は他に任せる

## 登場人物

### Handler

処理オブジェクトの親クラスに相当し、要求を処理するためのAPIを定義します。これは、サブクラスで具体的な処理が実装する
また、内部にHandler型のオブジェクトを保持します。自分が処理できなかった場合、このHandler型のオブジェクトに処理を移譲する

### ConcreteHandler

Handlerのサブクラス
処理オブジェクトの実クラスに相当し、
Handlerクラスで定義されたAPIを実装する

### Clientクラス

チェーンを構成しているConcreteHandlerクラスに処理を委譲する


