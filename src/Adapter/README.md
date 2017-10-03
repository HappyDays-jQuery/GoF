# Adapter

Adapter ― 一皮かぶせて再利用

- 既存のクラスを書き換えずにAdapterパターンを利用することのメリット
  - 既存のクラス(Adaptee)をもう一度テストする必要がなくなる
  - Adapterパターンによってバグが発生しても、既存のクラス(Adaptee)にバグがないことが保証される
- Adaptee役とTargetの機能がかけ離れてる場合は、Adapterパターンは非推奨
- Targetをクラスすることで、委譲を利用したAdapterパターンも可能(AdapterでAdapteeのインスタンスを保持)

## 登場人物

### Target

対象インタフェース

### Adapter

再利用先

### Adaptee

再利用元

## ex)

Adapter適用前の出力

```
Apple=iPhone
Google=Android
Git=Hub
DesignPattern=Adapter
```

Adapter適用後の出力

```
# written by FileProperties
# Tuesday, 26-Sep-2017 18:31:02 JST
Apple=iPhone
Google=Android
Git=Hub
DesignPattern=Adapter
```


