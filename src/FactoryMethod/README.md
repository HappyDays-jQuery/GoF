# Factory Method

Factory Method ― インスタンス作成をサブクラスにまかせる

## FactoryパターンとFactory Methodパターンの違い
   
### Factoryパターン
   
Factoryクラスがオブジェクトの生成処理に加えて生成するオブジェクトの種類の変更をファクトリの処理の中で動的に行う
   
   
### Factory Methodパターン
   
生成するオブジェクトごとにファクトリを用意することで、オブジェクトの生成処理を柔軟に行える

## 登場人物

### 抽象クラス

- Product :Productクラス
- Creator :Factoryクラス

### 具象クラス

- ConcreteCreator :IdCardFactoryクラス
- ConcreteProduct :IdCardクラス

## ex)

```
$factory = new IDCardFactory();
$card = $factory->create("hoge");
$card->useProduct()
```
        
        
