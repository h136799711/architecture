# itboye/architecture

[![Latest Stable Version](https://poser.pugx.org/itboye/architecture/v/stable)](https://packagist.org/packages/itboye/architecture)
[![Total Downloads](https://poser.pugx.org/itboye/architecture/downloads)](https://packagist.org/packages/itboye/architecture)
[![Monthly Downloads](https://poser.pugx.org/itboye/architecture/d/monthly)](https://packagist.org/packages/itboye/architecture)
[![Daily Downloads](https://poser.pugx.org/itboye/architecture/d/daily)](https://packagist.org/packages/itboye/architecture)
[![License](https://poser.pugx.org/itboye/architecture/license)](https://packagist.org/packages/itboye/architecture)

## 基础代码 

## 安装 

```
composer require itboye\architecture ^1.1
```
## 升级 
1.0.* 到 1.1   
需要额外安装 
```
#  如果用到了IpHelper类
composer require itboye\component_ip ^1.0
#  如果用到了加解密相关
composer require itboye\component_encrypt ^1.0
```
###  20180926 
1. 移除非核心功能代码
2. 迁移加解密、ip helper 、message queue 
