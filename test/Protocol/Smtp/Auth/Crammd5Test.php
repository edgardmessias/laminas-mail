<?php

/**
 * @see       https://github.com/laminas/laminas-mail for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mail/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mail/blob/master/LICENSE.md New BSD License
 */

namespace LaminasTest\Mail\Protocol\Smtp\Auth;

use Laminas\Mail\Protocol\Smtp\Auth\Crammd5;
use ReflectionClass;

/**
 * @category   Laminas
 * @package    Laminas_Mail
 * @subpackage UnitTests
 * @group      Laminas_Mail
 */
class Crammd5Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Crammd5
     */
    protected $auth;

    public function setUp()
    {
        $this->auth = new Crammd5();
    }

    public function testHmacMd5ReturnsExpectedHash()
    {
        $class = new ReflectionClass('Laminas\Mail\Protocol\Smtp\Auth\Crammd5');
        $method = $class->getMethod('_hmacMd5');
        $method->setAccessible(true);

        $result = $method->invokeArgs(
            $this->auth,
            array('frodo', 'speakfriendandenter')
        );

        $this->assertEquals('be56fa81a5671e0c62e00134180aae2c', $result);
    }
}
