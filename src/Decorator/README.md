# Decorator

Decorator ― 飾り枠と中身の同一視

## 概要

透過的なインタフェース(API)を保ったまま、既存のオブジェクトを新しいDecoratorオブジェクトでかぶせるすることで既存の関数やクラスの中身を直接触ることなく、その外側から機能を追加したり書き換えたりする。また、既存のクラスを拡張する際にクラスの継承の代替手段として用いられる。

## 登場人物

### Component

すべての要素に共通の処理（オペレーション）を持つ抽象クラス

### ConcreteComponent

単独要素クラス

### Decorator

Componentと共通処理を持つ

