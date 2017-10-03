# Observer

Observer ― 状態の変化を通知する

## 概要

観察対象のオブジェクトが変化したときに通知してもらい、その変化を他のオブジェクトにも伝えるためのパターン

## 登場人物

### Subject

観測対象
内部には観測クラスであるObserver型のオブジェクトを保持しており、
Observer型のオブジェクトを登録、削除するAPI、
またObserver型のオブジェクトに通知をおこなうAPIが提供される
通知をおこなう場合、SubjectからはObserverで定義されたAPIを通じて、
ConcreteObserverクラスで実装されている具体的な処理を呼び出す

### Observer

観測クラス
通知を受け取るためのAPIを定義する
具体的な処理内容は、サブクラスのConcreteObserverで実装する
Listener、Handlerと呼ばれる場合もある

### ConcreteSubjectクラス

Subjectクラスのサブクラス
Observerクラスに影響する状態を保持する
また、その状態を取得するためのAPIを提供する
この保持した状態が変化したとき、
Observer型のオブジェクトに通知を送ります。

### ConcreteObserverクラス
Observerクラスのサブクラス
Observerクラスで定義されたAPIを実装したクラス
このクラスに通知を受け取った場合の具体的な処理内容を記述する

なお、ConcreteObserverクラスどうしは、
通知を受ける順番が変わっても正しく動作するよう設計される必要がある

