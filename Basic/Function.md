# 함수

## 1. 함수란?

하나의 로직을 재실행할 수 있도록 하는 것으로  
**코드의 재사용성을 높여준다.**  

## 2. 선언과 호출

함수 키워드 `function` 뒤에 함수의 이름이 오고, 괄호가 따라온다.  
괄호 안에서 함수에 대한 입력 값을 담을 변수의 이름이 오고, 복수의 입력 값을 정의 할 때는 변수와 변수 사이에 콤마로 구분한다.  
중괄호에는 함수가 실행될 코드가 온다.  

```php
<?php
function numbering(){
    $i = 0;
    while ($i<10){
        echo $i;
        $i += 1;
    }
}
// 호출
numbering();
?>
```

## 3. 입력과 출력
입력된 값을 연산해 출력하는 것이 함수의 기본적인 역할이다.  

* `return`: 함수를 종료시키며, `return`뒤에 따라오는 값을 함수의 결과로 반환한다.  
* `argument`: 인자, 함수로 유입되는 입력 값을 의미한다. 어떤 값을 인자로 전달하느냐에 따라서 함수가 반환되는 값이나 메소드의 동작방법을 다르게 할 수 있다.  

```php
<?php
function get_argument($arg){
    return $arg;
}
 
print get_argument(1);
print get_argument(2);
 
?>
```