# Bridge

Bridge ― 機能の階層と実装の階層を分ける

## メリット
- クラス階層の見通しが良くなる

「機能」と「実装」を提供するクラス群が分けられているので、クラス階層を理解しやすく、見通しが良くなります。つまり、保守性が高くなると言えます。機能と実装が1つのクラスで実装されていると、概してクラス階層が複雑になり、どの部分が機能なのか実装なのかが分かりづらくなるため、保守性が低くなりがちです。

- 最終的に作成すべきクラス数を抑えることができる

## 概要
抽出されたクラスと実装を分離して、それらを独立して変更できるようにするパターン

## 登場人物

### Abstraction
抽出されたクラスのインターフェイスを定義

### RefinedAbstraction

Abstractionで定義したインターフェイスを拡張する

### Implementor

実装を行うクラスのインターフェイスを定義する

### ConcreteImplementor

Implementorで定義したインターフェイスを実装する
