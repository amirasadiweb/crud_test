<?php

namespace Imanghafoori\HelpersTests;

use Illuminate\Http\Exceptions\HttpResponseException;
use InvalidArgumentException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BasicTest extends TestCase
{
    public function testSample()
    {
        $value = nullable(null)->getOr('hello');
        $this->assertEquals('hello', $value);

        $value = nullable(null, ['fgbfgb'], function ($v) {
            return is_null($v);
        })->getOr('hello');
        $this->assertEquals('hello', $value);

        $value = nullable(null)->getOr('hello');
        $this->assertEquals('hello', $value);

        $value = nullable([], ['sdf'], function ($v) {
            return empty($v);
        })->getOr('hello');
        $this->assertEquals('hello', $value);

        $value = nullable([], 'sdfv', function ($v) {
            return [] === $v;
        })->getOr('hello');
        $this->assertEquals('hello', $value);

        $value = nullable([], 'oh no', 'is_array')->getOr('hello');
        $this->assertEquals('hello', $value);

        $value = nullable('not null')->getOr('hello');
        $this->assertEquals('not null', $value);

        $value = nullable(null, 'my error')->getOr(function ($msg) {
            $this->assertEquals('my error', $msg);

            return 'hey there';
        });
        $this->assertEquals('hey there', $value);

        $value = nullable(false, [123])->getOrSend(function ($value) {
            $this->assertEquals(123, $value);

            return redirect()->to('/');
        });
        $this->assertEquals(false, $value);
    }

    public function testSendsResponse()
    {
        $this->expectException(HttpResponseException::class);

        nullable(null)->getOrSend(function () {
            return redirect()->to('/');
        });
    }

    public function testSendsResponseAsArray()
    {
        $this->expectException(HttpResponseException::class);

        nullable(null)->getOrSend([new Responses(), 'error']);
    }

    public function testSendsResponseAsArray23()
    {
        $this->expectException(HttpResponseException::class);

        nullable(null)->getOrSend(redirect()->to('/'));
    }

    public function testSendsResponseAsArray213()
    {
        $this->expectException(\InvalidArgumentException::class);

        nullable(null)->getOrSend('ada');
    }

    public function testSendsResponseAsArray2113()
    {
        $this->expectException(\InvalidArgumentException::class);

        nullable(null)->getOrSend(function () {
            return 'sdcsd';
        });
    }

    public function testSendsResponseAsArray2413()
    {
        $this->expectException(NotFoundHttpException::class);

        nullable(null)->getOrAbort(404);
    }

    public function testSendsResponseAsArray2416()
    {
        $val = nullable(false)->getOrAbort(404);

        $this->assertEquals(false, $val);
    }

    public function testThrowException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('hi');
        $this->expectExceptionCode(11);

        nullable(null)->getOrThrow(InvalidArgumentException::class, 'hi', 11);
    }

    public function testThrowException2()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('hi');
        $this->expectExceptionCode(11);

        nullable(null)->getOrThrow(new InvalidArgumentException('hi', 11));
    }

    public function testThrowException3()
    {
        $value = nullable('I am not null1')->getOrThrow(new InvalidArgumentException('hi', 11));

        $this->assertEquals('I am not null1', $value);
    }

    public function testOnValue()
    {
        $val = nullable('I am not null');
        $value = $val->onValue(function ($value) {
            $this->assertEquals('I am not null', $value);

            return 'hey there';
        });

        $this->assertEquals('hey there', $value);
    }

    public function testOnValue2()
    {
        $foo = 'foo';
        $value = nullable(null)->onValue(function () use (&$foo) {
            $foo = $foo.' hello';
        });

        $this->assertNull($value);
        $this->assertEquals('foo', $foo);
    }

    public function testGetOrAbortUsingPredicate()
    {
        $this->expectException(NotFoundHttpException::class);

        $value = nullable(null, ['abc'], function ($v) {
            return is_null($v);
        })->getOrAbort(404);
    }

    public function testGetOrSendUsingPredicate()
    {
        $this->expectException(HttpResponseException::class);

        $value = nullable(null, ['abc'], function ($v) {
            return is_null($v);
        })->getOrSend(function () {
            return redirect()->to('/');
        });
    }

    public function testGetOrThrowUsingPredicate()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('hi');
        $this->expectExceptionCode(11);

        $value = nullable(null, ['abc'], function ($v) {
            return is_null($v);
        })->getOrThrow(InvalidArgumentException::class, 'hi', 11);
    }

    public function testOnValueUsingPredicate()
    {
        $foo = 'foo';
        $value = nullable(null, ['abc'], function ($v) {
            return is_null($v);
        })->onValue(function () use (&$foo) {
            $foo = $foo.' hello';
        });

        $this->assertNull($value);
        $this->assertEquals('foo', $foo);
    }
}

class Responses
{
    public function error()
    {
        return redirect()->to('/');
    }

    public function error2()
    {
        return 'ascasc';
    }
}
