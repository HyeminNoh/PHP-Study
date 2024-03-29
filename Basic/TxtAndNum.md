# 문자와 숫자

## 1. 문자

### 1-1. 작은 따옴표  

일반적으로 `작은 따옴표`로 감싸 표현한다.  

작은 따옴표가 문자의 시작과 끝을 알려주는 `구분자` 역할을 하게 되는데,  
문자 안에 작은 따옴표(구분자)를 포함하고 싶을 때는 앞에 역슬래시(\)를 붙인다.  

주석을 표기할 때는 전방 슬래시 두개(//)를 사용한다.  

```php
print 'Single quotes are preferred in all cases';
print 'I\'m hyemin';
```

### 1-2. 큰 따옴표

`큰 따옴표`를 사용해 문자열을 표현할 수도 있다.
사용 가능한 특수한 문자가 추가 된다.  

| 값 | 의미 |
|---|:---:|
|\n| 줄 바꿈 |
|\r| 캐리지 리턴 |
|\t| 탭 |
|\\| \ |
|\$| $ |
|\"| " |
|\0 .. \777| 8 진수 |
|\x0 .. \xFF| 16 진수 |

**작은 따옴표 문자열과 큰 따옴표 문자열의 가장 큰 차이는 큰따옴표 문자열 안에 포함된 변수명이 해당 변수의 값으로 대치된다는 점이다.**

### 1-3. 문자열 관련 함수

* 문자열 정리
    * trim(): 공백 제거
    * ltrim(): 문자열 앞 공백 제거
    * chop(): 문자열 뒤 공백 제거
    * nl2br(): 줄바꿈문자를 <br/>태그로 변경
    
* 대소문자
    * strtoupper(): 문자열 전체 대문자로 변경
    * strtolower(): 문자열 전체 소문자로 변경
    * ucfirst(): 문자열 첫 문자가 영문일 경우 대문자로 변경
    * ucword(): 문자열 내 각 단어 첫 문자를 대문자로 변경
    
* 문자열 나누기/합치기
    * explode(): 지정 문자를 기준으로 문자를 나누어 배열로 반환  
    * implode(): 배열을 지정문자 기준으로 전, 후에 붙여 문자열을 합친다.
    * substr(): 문자열을 특정 기준으로부터 원하는 길이만큼 잘라 반환

```php
<?php
// explode 예시
$result = explode('a', 'thisisapineapple');

echo $result[0] . ' / ' . $result[1] . ' / ' . $result[2];
?>
// 결과 : thisis / pine / pple

<?php
// implode 예시
$array = array('one', 'two', 'three');

echo implode(' / ', $array);
?>
// 결과 : one / two / three

<?php
// substr 예시

$str = 'Hello World';

echo substr($str, 2); // 결과 : He (처음부터 2개)
echo substr($str, 3, 5); // 결과 : lo Wo (3번부터 5개)
echo substr($str, -4, 2); // 결과 : or (뒤에서 4번째부터 2개)
echo substr($str, -5, -2); // 결과 : Worl (뒤에서 5번째부터 뒤에 2번째까지)
?>
```

* 문자열 비교
    * strcmp(): 앞의 문자열을 기준으로 두 문자열이 같으면 0, 앞의 문자열이 크면 1, 반대라면 -1 리턴
    * strcasecmp(): strcmp와 같으나 대소문자를 구분하지 않음

* 문자열 길이
    * strlen(): 문자열의 길이를 정수 값으로 리턴

* 문자열 찾기
    * strstr(): 문자열 내부에 찾는 문자열이 포함되는지 확인하는 함수
    찾는 문자열이 있을 경우 해당 문자열부터 이후 문자열 전부 리턴,
    찾는 문자열이 없을 경우 false를 리턴
    * stristr(): strstr() 함수와 동일하나 대소문자를 구분하지 않는다.
    * strchr(): strstr() 함수와 비슷하지만 문자를 찾는다.
    * strrch(): strchr() 함수와 동일하나 찾는 문자를 해당 문자열 뒤에서부터 찾는다.

* 문자열 내 위치 찾기
    * strpos(): 문자열 내부에 찾는 문자열이나 문자의 위치를 정수로 리턴
    * strrpos(): strpos() 함수와 동일하나 뒤에서부터 찾는다.

* 문자열 변경
    * str_replace(): 문자열에서 문자(열)을 찾아 대체문자(열)로 변경
    * substr_replace(): 문자열의 특정 위치의 문자를 대체문자(열)로 변경
    
```php
<?php

$str = 'Hello World';

echo str_replace('lo', 'l', $str); // 결과 : Hell World
echo substr_replace($str, 'i He', 1); // 결과 : Hi Hello World
?>
```

## 2. 숫자 

일반적인 숫자표현 방식과 유사하나 천단위를 구분하기 위해 사용하는 쉼표 등의 문자는 사용할 수 없다.  
아래의 예시처럼 유효하게 표기 가능하다.  

```php
print 56;
print 56.4;
print -213;
print -12.5;
```

### 2-1. 산술 연산자

| 연산자 | 설명 |
|---|:---:|
|+| 더하기 |
|-| 빼기 |
|*| 곱하기 |
|/| 나눈 후, 몫 반환 |
|%| 나눈 후, 나머지 반환 |
|**| 왼쪽 피연사자의 값에 오른쪽 피연사자의 값을 제곱 |
